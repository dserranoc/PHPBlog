<?php require_once 'inc/header.php'; ?>


<?php $category = getCategory($connection, $_GET['id']); 
    if (!isset($category['id'])) {
        Header('Location: index.php');
    }
?>

<?php require_once 'inc/sidebar.php'; ?>
        <!-- MAIN -->
        <div id="main">

            <h1>Entradas de la categoría: <?= $category['name'] ?></h1>
            <?php $posts = getPosts($connection, null, $category['id']);
                if (!empty($posts)) :
                
                while ($post = mysqli_fetch_assoc($posts)): 
            ?>
            <a href="post.php?id=<?= $post['id'];?>">
                <article class="post">
                    <h2><?= $post['title'];?></h2>
                    <span class="date"><?=$post['category'].' | '.$post['date'];?></span>
                    <p><?= substr($post['content'], 0, 500)." [...]";?></p>
                </article>
            </a>
            <?php endwhile; 
            else : ?>
            <br><div class="error">No hay entradas en esta categoría.</div>
                <?php endif; ?>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>