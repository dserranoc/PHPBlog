<?php

require_once 'inc/config.php';

if (isset($_SESSION['user']) && $_GET['id']) {
    $post_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "DELETE FROM entradas WHERE usuario_id = $user_id AND id = $post_id";

    mysqli_query($connection, $sql);
}

header('Location: index.php');