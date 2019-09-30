<?php

if (isset($_POST)) {
    require_once 'inc/config.php';

     $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : false;
     $category = isset($_POST['category']) ? (int)$_POST['category'] : false;
     $content = isset($_POST['content']) ? mysqli_real_escape_string($connection, $_POST['content']) : false;
     $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : false;


     $errors= array();

     if(!empty($name)){
        $validated_name= true;
    } else {
        $validated_name= false;
        $errors['name'] = 'El nombre no es válido';
        echo $errors['name'];
    }

    if(!empty($category)){
        $validated_category= true;
    } else {
        $validated_category= false;
        $errors['category'] = 'La categoría no es válida';
        echo $errors['category'];
    }
    if(!empty($content)){
        $validated_content= true;
    } else {
        $validated_content= false;
        $errors['content'] = 'El contenido no puede estar vacío';
        echo $errors['content'];
    }

    if (empty($errors)) {

        if (isset($_GET['edit'])) {
            $post_id = $_GET['edit'];
            $user_id = $_SESSION['user']['id'];
            $sql = "UPDATE entradas SET ".
                "title = '$name', ".
                "categoria_id = '$category', ".
                "content = '$content' ".
                "WHERE id = $post_id AND usuario_id = $user_id";
        } else { 
            $sql = "INSERT INTO entradas VALUES(null, $user_id, $category, '$name', '$content', CURDATE())";
        }
        $insert = mysqli_query($connection, $sql);
        header('Location: index.php');

    } else {
        $_SESSION['post-errors'] = $errors;
        $_SESSION['content-error'] = 'Ha habido un error. Por favor, comprueba que has rellenado los campos correctamente';
        if (isset($_GET['edit'])) {
            header('Location: update-post.php?id='.$_GET['edit']);
        } else{
            header('Location: publish.php');
        }
    }
        
    
}

