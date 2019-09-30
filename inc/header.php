<?php require_once 'config.php';
require_once 'helpers.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Mi primer blog</title>
</head>
<body>
    <!-- HEADER -->
    <header id= "header">
    <!-- LOGO -->
        <div id="logo">
            <a href="index.php">Blog de videojuegos</a>
        </div>

        
        <!-- MENU -->
        <nav id= "menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php $categories = getCategories($connection);
                
                    while ($category = mysqli_fetch_assoc($categories)): 
                ?>
                        <li>
                            <a href="category.php?id=<?= $category['id'];?>"><?= $category['name'] ?></a>
                        </li>
                     <?php endwhile; ?>
                <li>
                    <a href="index.php">Sobre mí</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
  

    <div id="container">