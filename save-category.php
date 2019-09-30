<?php

if (isset($_POST)) {
    require_once 'inc/config.php';

     $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : false;

     $errors= array();

     if(!empty($name)){
        $validated_name= true;
    } else {
        $validated_name= false;
        $errors['name'] = 'El nombre no es válido';
        echo $errors['name'];
    }
    if (count($errors == 0)) {
        $sql = "INSERT INTO categorias VALUES(null, '$name')";
        $insert = mysqli_query($connection, $sql);
    }
        
    
}

header('Location: index.php');