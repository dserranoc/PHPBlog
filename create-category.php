<?php require_once 'redirection.php'; ?>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/sidebar.php'; ?>


<div id="main">
<h1>Crear categoría</h1>
<p>Añade nuevas categorías al blog para que los usuarios puedan usarlas al crear sus entradas<p>
<br>

<form action="save-category.php" method="POST">
<label for="name">Nombre: </label>
<input type="text" name="name">
<input type="submit" value="Crear">

</form>

</div>










<?php require_once 'inc/footer.php'; ?>