<?php require_once 'redirection.php'; ?>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/sidebar.php'; ?>
<div id="main">

<h1>Mis datos</h1>

<p>Modifica tus datos de usuario:</p>
<br>


<?php if(isset($_SESSION['completed'])): ?> 
                    <div class="alert success-alert">
                        <?=$_SESSION['completed']?>
                    </div>

                <?php elseif(isset($_SESSION['errors']['general'])): ?>
                    <div class="alert error-alert">
                        <?=$_SESSION['errors']['general']?>
                    </div>
                <?php endif; ?>
                <form action="update-user.php" method="POST">
                    <label for="name">Nombre: </label>
                    <input type="text" name="name" value="<?=$_SESSION['user']['name']; ?>" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : ''; ?>

                    <label for="surname">Apellidos: </label>
                    <input type="text" name="surname" value="<?=$_SESSION['user']['surname']; ?>" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname') : ''; ?>

                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?=$_SESSION['user']['email']; ?>"/>
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>

                    
                    <input type="submit" value="Actualizar" name="submit" />
                </form>
                <?php deleteError(); ?>
</div>



<?php require_once 'inc/footer.php'; ?>