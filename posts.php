<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/sidebar.php'; ?>

        <!-- MAIN -->
        <div id="main">
            <h1>Entradas del blog</h1>
            <?php $posts = getPosts($connection);
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
            endif; ?>
        </div>
    </div>


    <?php require_once 'inc/footer.php'; ?>