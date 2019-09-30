<?php

//CONNECT TO DATABASE
    //Connection variables
        $host = 'localhost';
        $db_user = 'pruebas';
        $db_password = 'pruebas';
        $database = 'blog_php';

    //Connection
        $connection = mysqli_connect($host, $db_user, $db_password, $database);

    // Set Charset to UTF-8
        mysqli_query($connection, "SET NAMES 'utf8'");


// START SESSION
if(!isset($_SESSION)){
    session_start();
    }
