<?php
// import database connection
require 'includes/config/database.php';
// creat a connection instance
$db = connectToDB();

// possible errors to show  user
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $email = mysqli_escape_string($db, filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL));
    $password = mysqli_escape_string($db, $_POST["password"]);

    if (!$email) {
        $errors[] = "El email es obligatorio";
    }
    if (!$password) {
        $errors[] = "El password es invalido";
    }

    if (empty($errors)) {
        //check if that user exists
        $query = "SELECT email, password FROM usuarios WHERE email='{$email}'";

        $result = mysqli_query($db, $query);

        if ($result->num_rows) {
            // check if the password is correct
            $user = mysqli_fetch_assoc($result);
            // check if the password matches the hash
            $auth = password_verify($password, $user["password"]);

            if ($auth) {
                //user's authenticated // Fill Session array with user info
                session_start();
                $_SESSION["user_email"] = $email;
                $_SESSION["loggedin"] = true;
                header("location: /admin");
            } else {
                $errors[] = "El password para: " . $email . " es incorrecto";
            }
        } else {
            // user not found
            $errors[] = "El usuario: " . $email .   " " .  "NO existe";
        }
    }
}

require './includes/functions.php';
includeTemplate(templateName: 'header');
?>

<main class="container section">
    <h2>Iniciar Sesion</h2>

    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $e): ?>
            <div class="alert error"><?php echo $e ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="" class="form" method="POST">
        <fieldset>
            <legend>Credenciales</legend>

            <div>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu contraseña" id="password" name="password" required>
            </div>

            <input type="submit" value="Ingresar" class="btnSmall btnSmall--yellow">

        </fieldset>

    </form>
</main>

<?php
includeTemplate(templateName: 'footer');
?>