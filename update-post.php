<?php require_once 'redirection.php'; ?>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/sidebar.php'; ?>

<?php $post = the_post($connection,$_GET['id']);
$content = mysqli_fetch_assoc($post);
?>

<div id="main">
<h1>Editar entrada</h1>
<p>Esta es la página de edición de entradas. Aquí podrás escribir lo que quieras en una entrada ya creada y se mostrará en la entrada correspondiente.<p>
<br>
<form action="save-post.php?edit=<?=$content['id']?>" method="POST">
<?php if(isset($_SESSION['post-errors']['name'])): ?>
    <div class=" alert error-alert"><?=$_SESSION['post-errors']['name']; ?></div>
<?php endif; ?>
<label for="name">Nombre: </label>
<input type="text" name="name" value="<?=$content['title'];?>">


<?php if(isset($_SESSION['post-errors']['category'])): ?>
    <div class=" alert error-alert"><?=$_SESSION['post-errors']['category']; ?></div>
<?php endif; ?>
<label for="category">Categoría: </label>
<select name="category" >
    <?php $categories = getCategories($connection);
    if(!empty($categories)) :
    while($category = mysqli_fetch_assoc($categories)) : ?>

    <option value="<?=$category['id']?>" <?=($category['id'] == $content['categoria_id']) ? 'selected="selected"' : ''?>>
    <?=$category['name']?>
    </option>

    <?php endwhile; endif; ?>

</select>
<?php if(isset($_SESSION['post-errors']['content'])): ?>
    <br>
    <br>
    <div class=" alert error-alert"><?=$_SESSION['post-errors']['content']; ?></div>
<?php endif; ?>
<label for="content">Contenido: </label>

<textarea name="content" rows="10" cols="106"><?=$content['content']?></textarea>
<input type="submit" value="Modificar">

</form>
<?php deleteError(); ?>

</div>









<?php require_once 'inc/footer.php'; ?>