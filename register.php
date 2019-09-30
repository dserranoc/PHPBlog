<?php
require_once 'inc/config.php';

//GET DATA FROM FORM
    if (isset($_POST)) {
        $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : false;
        $surname = isset($_POST['surname']) ? mysqli_real_escape_string($connection, $_POST['surname']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : false;
        $errors= array();
//CHECK DATA BEFORE INSERT IN DATABASE
    // Name validation
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $validated_name= true;
    } else {
        $validated_name= false;
        $errors['name'] = 'El nombre no es válido';
        echo $errors['name'];
    }
    // Surname validation
    if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
        $validated_surname= true;
    } else {
        $validated_surname= false;
        $errors['surname'] = 'Los apellidos no son válidos';
        echo $errors['surname'];
    }
    // Email validation
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validated_email= true;
    } else {
        $validated_email= false;
        $errors['email'] = 'El email no es válido';
        echo $errors['email'];
    }
    // Password validation
    if(!empty($password)){
        $validated_password= true;
    } else {
        $validated_password= false;
        $errors['password'] = 'La contraseña no puede estar vacía';
        echo $errors['password'];
    }
    // IF THERE IS NO ERRORS, INSERT USER IN THE DATABASE
    $save_user = false;
    if (empty($errors)) {
        $save_user = true;
        //ENCRYPT PASSWORD
        $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        //INSERT

        $sql = "INSERT INTO usuarios VALUES(null, '$name', '$surname', '$email', '$secure_password', CURDATE())";
        $insert = mysqli_query($connection, $sql);

        if($insert) {
            $_SESSION['completed'] = 'Te has registrado correctamente';
        } else {
            $_SESSION['errors']['general'] = 'Ha habido un error';
        }


    } else {
        $_SESSION['errors'] = $errors;

    }
    }
    header('Location: index.php');




