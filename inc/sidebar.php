<!-- SIDEBAR -->
<aside id="sidebar">

<div id="search" class="block-aside">
                <h3>Buscar en el blog: </h3>
               <form action="search.php" method="POST">
                    <input type="text" name="search" />
                    <input type="submit" value="Buscar" />
                </form>
            </div>
        <?php if(isset($_SESSION['user'])): ?>
            <div id="logged-user" class="block-aside">
                <h3>¡Hola <?=$_SESSION['user']['name']; ?>!</h3>
                <!-- ACTION BUTTONS -->
                <a href="logout.php" class="button">Cerrar sesión</a>
                <a href="publish.php" class="button orange-button">Publicar</a>
                <a href="create-category.php" class="button purple-button">Crear categoría</a>
                <a href="profile.php" class="button green-button">Mi perfil</a>
            </div>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user'])): ?>
            <div id="login" class="block-aside">
                <h3>Identifícate</h3>
                <?php if(isset($_SESSION['login_error'])): ?>
                    <div class=" alert error-alert"><?=$_SESSION['login_error']; ?></div>
                <?php endif; ?>
                <form action="login.php" method="POST">
                    <label for="email">Email: </label>
                    <input type="email" name="email" />
                    <label for="password">Contraseña: </label>
                    <input type="password" name="password" />

                    <input type="submit" value="Entrar" />
                </form>
            </div>

            <div id="register" class="block-aside">
                <h3>Regístrate</h3>
                <?php if(isset($_SESSION['completed'])): ?> 
                    <div class="alert success-alert">
                        <?=$_SESSION['completed']?>
                    </div>

                <?php elseif(isset($_SESSION['errors']['general'])): ?>
                    <div class="alert error-alert">
                        <?=$_SESSION['errors']['general']?>
                    </div>
                <?php endif; ?>
                <form action="register.php" method="POST">
                    <label for="name">Nombre: </label>
                    <input type="text" name="name" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : ''; ?>

                    <label for="surname">Apellidos: </label>
                    <input type="text" name="surname" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname') : ''; ?>

                    <label for="email">Email: </label>
                    <input type="email" name="email" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>

                    <label for="password">Contraseña: </label>
                    <input type="password" name="password" />
                    <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : ''; ?>

                    <input type="submit" value="Registrar" name="submit" />
                </form>
                <?php deleteError(); ?>
            </div>
            <?php endif; ?>
        </aside>