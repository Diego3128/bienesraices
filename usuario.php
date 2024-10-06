<?php
//import database connection
require 'includes/config/database.php';
$db = connectToDB();
//create and email and password
$email = "correo2@correo.com";
$password = "12345";
$password = password_hash($password, PASSWORD_DEFAULT);

//query to create a new user
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$password}')";
//insert user into the database

// These type of queries return true or false
$result = mysqli_query($db, $query);

mysqli_close($db);
