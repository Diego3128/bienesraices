<?php

declare(strict_types=1);

namespace App;

class Propiedad
{
    // database (mysqli instance)
    protected static $db;
    // each column name of propiedad table
    protected static $dbColumns = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    // Possible erros when trying to create an instance
    protected static $errors = [];
    //Atributes of the instance
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    // set the connection to db
    public static function setDB($database)
    {
        self::$db = $database;
    }
    // get errors
    public static function getErrors(): array
    {
        return self::$errors;
    }
    //Get all properties (array of objects)
    public static function all(): array
    {
        $query = "SELECT * FROM propiedades";

        return $result = self::querySQL($query);
    }
    // Search a record by its id
    public static function findById(int $id): Propiedad | null
    {
        $query = "SELECT * FROM propiedades WHERE id={$id}";

        $result = self::querySQL($query);

        return array_shift($result);
    }
    //solve a sql query
    public static function querySQL(string $query): array | bool
    {
        //consult db
        $result = self::$db->query($query);
        //final array that will be returned with the records
        $array = [];
        //get records
        if ($result->num_rows > 0) {
            while ($record = $result->fetch_assoc()) {
                //push each record into the array// each record is an object
                $array[] = self::createObject($record);
            }
        }
        return $array;
    }
    //create objects taking a record from db (active record)
    protected static function createObject(array $record): Propiedad
    {
        //create a (empty) property object based on a record from db
        $object = new self;
        //create an object that resembles the record brought fron db
        foreach ($record as $key => $value) {
            //check the keys from the record array with the properties of the object
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }
        return $object;
    }

    //Constructor
    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL;
        $this->titulo = $args["titulo"] ?? '';
        $this->precio = $args["precio"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->habitaciones = $args["habitaciones"] ?? '';
        $this->wc = $args["wc"] ?? '';
        $this->estacionamiento = $args["estacionamiento"] ?? '';
        $this->creado = $args["creado"] ?? date("Y/m/d");
        $this->vendedorId = $args["vendedorId"] ?? '';
    }
    //save a propery (update or create)
    public function save()
    {
        if (!is_null($this->id)) {
            //update  a record
            $this->update();
        } else {
            //create a new record
            $this->create();
        }
    }
    //update a property
    protected function update()
    {
        //Get an array with the sanitized attributes
        $attributes = $this->sanitizeAttributes();
        //array with this shape in each index: "key = 'value'"
        $values = [];

        foreach ($attributes as $key => $value) {
            $values[] = "$key = '{$value}'";
        }

        $query = "UPDATE propiedades SET ";
        $query .= join(", ", $values);
        $query .= " WHERE id ='" . self::$db->escape_string($this->id) . "'";
        $query .= "LIMIT 1";

        $result = self::$db->query($query);

        if ($result) {
            header("location: /admin?result=2");
        }
    }
    // create a new property
    protected function create(): void
    {
        //Get an array with the sanitized attributes
        $attributes = $this->sanitizeAttributes();

        //separate column name and values
        $columns = join(", ", array_keys($attributes));
        $values = join("','", array_values($attributes));

        // Create sql query
        $query = "INSERT INTO propiedades (";

        $query .= $columns . ")";
        //add a ' to the first and last value
        $query .= " VALUES ('" . $values . "')";

        //do the query to save a new property
        $result = self::$db->query($query);
        //insertion queries return a boolean

        if ($result) {
            header("location: /admin?result=1");
        } else {
            header("location: /admin?result=4");
        }
    }
    //delete a property
    public function delete(): void
    {
        $query = "DELETE FROM propiedades WHERE id={$this->id} LIMIT 1";

        $result = self::$db->query($query);

        if ($result) {
            $this->deleteImg();
            header("location: /admin?result=3");
        } else {
            header("location: /admin?result=4");
        }
    }
    //form an array resembling the record in db
    public function createAttributes(): array
    {
        //associative array with the same structure as the table (propiedades) in db
        $attributes = [];

        foreach (self::$dbColumns as $columnName) {
            //ignore id column cuz it doesn't exist (yet) when creating a new property
            if ($columnName === 'id') continue;
            //create an index with the name of the column and assign its value
            $attributes[$columnName] = $this->$columnName;
        }
        return $attributes;
    }
    public function sanitizeAttributes(): array
    {
        //get an assc array with the property info
        $attributes = $this->createAttributes();
        //sanitize array before saving it into the db
        $sanitizedArray = [];

        foreach ($attributes as $key => $value) {
            //sanitize each value
            $sanitizedArray[$key] = trim(self::$db->escape_string($value));
        }
        return $sanitizedArray;
    }
    //validate inputs
    public function validateInputs(): array
    {
        if (!$this->titulo) {
            self::$errors[] = "El titulo es necesario";
        }
        if (!$this->precio) {
            self::$errors[] = "El precio es necesario";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errors[] = "La descripción es muy corta";
        } elseif (!$this->descripcion) {
            self::$errors[] = "La descripción es obligatoria";
        }
        if (!$this->wc) {
            self::$errors[] = "El numero de baños es requerido";
        }
        if (!$this->habitaciones) {
            self::$errors[] = "El numero de habitaciones es requerido";
        }
        if (!$this->estacionamiento) {
            self::$errors[] = "El numero de lugares de estacionamiento es requerido";
        }
        if (!$this->vendedorId) {
            self::$errors[] = "Elija un vendedor";
        }
        // validate image
        if (!$this->imagen) {
            self::$errors[] = "La imagen es obligatoria";
        }

        return self::getErrors();
    }
    //upload image
    public function setImage(String $image)
    {
        //when updating check if an previous image exists
        //an id attribute only has a value when updating  a new property
        if (!is_null($this->id)) {
            $this->deleteImg();
        }
        //set new image
        if ($image) {
            $this->imagen = $image;
        }
    }
    //delete image from the server
    protected function deleteImg()
    {
        $image = IMAGES_DIR . $this->imagen;
        if (file_exists($image)) {
            unlink($image);
        }
    }
    //sync the object in memory with the changes made by the user
    public function synchronize(array $args = []): void
    {
        //update the current object (the object calling the method ($this))
        if (!empty($args)) {
            foreach ($args as $key => $value) {
                //check if the key is a property in the current object
                if (property_exists($this, $key) && (!is_null($value) || !empty($value))) {
                    $this->$key = $value;
                }
            }
        }
    }
}
