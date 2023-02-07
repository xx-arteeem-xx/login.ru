<div class="links flex1">
        <a href="index.php"> <?php echo $config['sections'][0] ?> </a>
        <a href="my_posts.php"> <?php echo $config['sections'][1] ?> </a>
        <a href="contacts.php"> <?php echo $config['sections'][2] ?> </a>
    </div>
    <div class="login flex1">
        <?php
            if (isset($_SESSION['logged_user'])){
                echo '<a href="lk.php" id="lk">'.$config['sections'][3].'</a>' ;
                echo '<a href="includes/logout.php">Выйти</a>' ;
            }
            else{
                echo '<a href="reg.php">Зарегистрироваться</a>';
                echo '<a href="login.php">Войти</a>';
            }
        ?>
</div>