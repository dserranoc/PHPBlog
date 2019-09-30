<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/sidebar.php'; ?>

<div id="main">

<?php $post = the_post($connection,$_GET['id']);
$content = mysqli_fetch_assoc($post);
?>

<article class="post">
    <h1><?= $content['title'];?></h1>
    <a href="category.php?id=<?= $content['categoria_id'];?>"><h2><?=$content['category'];?></h2></a>
    <h4><?=$content['creator_name'];?> | <?=$content['date'];?></h4>
    <p><?= $content['content'];?></p>
</article>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $content['usuario_id']) : ?>
<div class="post-buttons">

<a href="delete-post.php?id=<?=$content['id']?>" class="button red-button">Eliminar entrada</a>
<br>
<a href="update-post.php?id=<?=$content['id']?>" class="button green-button">Editar entrada</a>

</div>


<?php endif; ?>


</div>


<?php require_once 'inc/footer.php'; ?>