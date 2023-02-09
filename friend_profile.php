<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';
    $friend_id = $_GET['friend_id'];
    $friend = R::load('users', $friend_id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title> <?php echo $friend->login ?> </title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <div class="flex lk">
            <div style="width: 40vw">
                <h3> <?php echo $friend->name.' '.$friend->surname ?> </h3>
                <div class="name">
                    <h4> <?php echo $friend->login ?> </h4> 
                </div>
                <p class="p3"> <b>Описание: </b> <?php echo $friend->description ?> </p>
            </div>
            <img src="img/from_users/<?php echo $friend->path; ?>" alt="">
        </div>
        <h2>
           Публикации
        </h2>
        <?php
            $log_id = $friend->id;
            $k = 0;
            $posts = R::find('posts');
            foreach ($posts as $post){
                if ($post['user_id'] == $log_id){
                    echo '<div class="content" style="border-top: 0.2vw solid #fff; border-bottom: 0.2vw solid #fff; padding: 4vh 0">';
                    echo '<h3>'.$post['name'].'</h3>';
                    echo '<h4>'.$post['login'].'</h4>';
                    echo '<p class="p3">'.$post['description'].'</p> ';
                    echo '</div>';
                    $k += 1;

                };
            };
            if ($k == 0){
                echo '<h3>Публикаций не найдено!</h3>';
            };
        ?>
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>

