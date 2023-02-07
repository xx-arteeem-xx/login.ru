<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title> <?php echo $config['sections'][0] ?> </title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2> <?php echo $config['sections'][0] ?> </h2>
        <?php

            $a = 0;
            $posts = R::find('posts');
            foreach ($posts as $post){
                echo '<div class="content" style="border-top: 0.2vw solid #fff; border-bottom: 0.2vw solid #fff; padding: 4vh 0">';
                echo '<h3>'.$post['name'].'</h3>';
                echo '<h4>'.$post['login'].'</h4>';
                echo '<p class="p3">'.$post['description'].'</p> ';
                echo '</div>';

            };

        ?>
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>