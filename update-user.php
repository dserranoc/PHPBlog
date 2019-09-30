<?php 


if (isset($_POST)) {
    require_once 'inc/config.php';
    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : false;
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($connection, $_POST['surname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, trim($_POST['email'])) : false;
    $errors= array();
}

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

    //CHECK IF EMAIL EXIST IN THE DATABASE
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($connection, $sql);

    // IF THERE IS NO ERRORS, MODIFY USER IN THE DATABASE
    if(mysqli_num_rows($isset_email) == 0) {
    $save_user = false;
    if (empty($errors)) {
        $save_user = true;
        //MODIFY

        $sql = "UPDATE usuarios SET ".
                "name = '$name', ".
                "surname = '$surname', ".
                "email = '$email' ".
                "WHERE id = ".$_SESSION['user']['id'];
        $insert = mysqli_query($connection, $sql);

        if($insert) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['surname'] = $surname;
            $_SESSION['user']['email'] = $email;
            $_SESSION['completed'] = 'Has actualizado tus datos correctamente';
        } else {
            $_SESSION['errors']['general'] = 'Ha habido un error al actualizar tus datos';
        }
    } else {
        $_SESSION['errors']['general'] = 'Ha habido un error al actualizar tus datos';
    }


    } else {
        $_SESSION['errors'] = $errors;

    }
    
    header('Location: profile.php');


