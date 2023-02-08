<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['delete'])){
        $post_id = $data['postid'];
        $delposts = R::load('posts', $post_id);
        R::trash($delposts); 
    };
    if (isset($data['edit'])){
        $post_id = $data['postid'];
        $_SESSION['post_id'] = $post_id;
        header('Location: /editpost.php');
    };
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title><?php echo $config['sections'][1] ?></title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2><?php echo $config['sections'][1] ?></h2>

        <?php
            $log_id = $_SESSION['logged_user']->id;
            $a = 0;
            $posts = R::find('posts');
            foreach ($posts as $post){
                if ($post['user_id'] == $log_id){
                    echo '<div class="content" style="border-top: 0.2vw solid #fff; border-bottom: 0.2vw solid #fff; padding: 4vh 0">';
                    echo '<h3>'.$post['name'].'</h3>';
                    echo '<h4>'.$post['login'].'</h4>';
                    echo '<p class="p3">'.$post['description'].'</p> ';
                    echo '  <form action="my_posts.php" method="post">
                                <input type="hidden" value="'.$post['id'].'" name="postid">
                                <div class="flex" style="width: 45vw">
                                    <button type="submit" name="delete">Удалить</button>
                                    <button type="submit" name="edit">Редактировать</button>
                                </div>
                            </form>';
                    echo '</div>';
                }

            };
        ?>
    </nav>
            



    <?php include "includes/footer.php" ?>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>