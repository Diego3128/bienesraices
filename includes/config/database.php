 <?php
    // database settings
    function connectToDB(): mysqli
    {
        $dbConecction = mysqli_connect("localhost", "root", "root", "bienesraices_crud");

        if (!$dbConecction) {
            echo ("could not connect <br>");
            die("There was an error trying to connect");
        } else {
            // echo ("conection successful <br>");
            return $dbConecction;
        }
    }
