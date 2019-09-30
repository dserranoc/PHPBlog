<?php

function showError($errors, $field) {
    $alert = '';
    if (isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert error-alert'>".$errors[$field]."</div>";
    }
    return $alert;
}

function deleteError() {
    $deleted = false;
    $_SESSION['errors'] = null;
    if(isset($_SESSION['content-error'])) {
        $_SESSION['content-error'] = null;
        $deleted = true;
    }
    if(isset($_SESSION['post-errors'])) {
        $_SESSION['post-errors'] = null;
        $deleted = true;
    }
    if(isset($_SESSION['completed'])) {
        $_SESSION['completed'] = null;
        $deleted = true;
    }
    return $deleted;
}


function getCategories($connection) {
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categories = mysqli_query($connection, $sql);
    $result = array();
    if ($categories && mysqli_num_rows($categories) >=1) {
        $result = $categories;
    } else {
        $result = false;
    }
    return $result;
}


function getCategory($connection, $id) {
$sql = "SELECT * FROM categorias WHERE id = $id";
    $categories = mysqli_query($connection, $sql);
    $result = array();
    if ($categories && mysqli_num_rows($categories) >=1) {
        $result = mysqli_fetch_assoc($categories);
    } else {
        $result = false;
    }
    return $result;
}

function getPosts($connection, $limit = null, $category = null, $search = null) {
    $sql = "SELECT e.*, c.name AS 'category' FROM entradas e"." INNER JOIN categorias c ON e.categoria_id=c.id ";
    if(!empty($category) && is_numeric($category)) {
        $sql .="WHERE e.categoria_id = $category";
    }

    if(!empty($search)) {
        $sql .="WHERE e.title LIKE '%$search%'";
    }
    
    $sql .=" ORDER BY e.id DESC";
    if($limit && is_numeric($limit)) {
        $sql .= " LIMIT $limit";
    }
    $posts = mysqli_query($connection, $sql);
    $result = array();
    if ($posts && mysqli_num_rows($posts) >=1) {
        $result = $posts;
    } else {
        $result = false;
    }
    return $result;
}

function the_post($connection, $id){
$sql = "SELECT e.*, CONCAT(u.name, ' ', u.surname) AS creator_name, c.name AS 'category' FROM entradas e"." INNER JOIN categorias c ON e.categoria_id=c.id"." INNER JOIN usuarios u ON e.usuario_id=u.id"." WHERE e.id = $id";
$post = mysqli_query($connection, $sql);
return $post;
}

