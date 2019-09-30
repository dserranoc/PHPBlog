<?php require_once 'inc/header.php'; ?>
<?php

if (!isset($_POST['search'])) {
    Header('Location: index.php');
}


?>

<?php require_once 'inc/sidebar.php'; ?>
        <!-- MAIN -->
        <div id="main">
        <?php $search = getPosts($connection, null, null, $_POST['search']);?>
        <?php if ($search) : ?>
            <h1>Se han encontrado <?= mysqli_num_rows($search)?> resultado(s) para "<?=$_POST['search']?>"</h1>
            <?php else : ?>
            <h1>No se han encontrado resultados para "<?=$_POST['search']?>"</h1>
<?php endif; ?>
               <?php if (!empty($search)) :
                
                while ($post = mysqli_fetch_assoc($search)): 
            ?>
            <a href="post.php?id=<?= $post['id'];?>">
                <article class="post">
                    <h2><?= $post['title'];?></h2>
                    <span class="date"><?=$post['category'].' | '.$post['date'];?></span>
                    <p><?= substr($post['content'], 0, 500)." [...]";?></p>
                </article>
            </a>
            <?php endwhile; 
            endif ?>
             
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>