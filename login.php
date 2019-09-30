<?php

//START SESSION AND CONNECTION

require_once 'inc/config.php';

// GET DATA FROM FORM

if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    // DELETE PREVIOUS ERRORS
    if (isset($_SESSION['login_error'])) {
        unset($_SESSION['login_error']);
    }

    //DATABASE QUERY TO CHECK ROWS

    $sql = mysqli_query($connection, "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1");

    if ($sql && mysqli_num_rows($sql) == 1) {
        $user = mysqli_fetch_assoc($sql);
        //CHECK PASSWORD
        $valid_password = password_verify($password, $user['password']);

        if ($valid_password) {
        //USE SESSION TO SAVE LOGGED USER DATA
            $_SESSION['user'] = $user;


        } else {
         //IN CASE OF FAILURE, SEND A ERROR SESSION
            $_SESSION['login_error'] = 'Error al iniciar sesión. Comprueba tus datos';
        }
    } else {
        $_SESSION['login_error'] = 'Error al iniciar sesión. Comprueba tus datos';
    }
}

//REDIRECTION TO INDEX

header('Location: index.php');