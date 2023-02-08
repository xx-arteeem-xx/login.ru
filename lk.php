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
    <title> <?php echo $config['sections'][3] ?> </title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2> <?php echo $config['sections'][3] ?> </h2>
        <div class="flex lk">
            <div>
                <h3> <?php echo $_SESSION['logged_user']->name.' '.$_SESSION['logged_user']->surname ?> </h3>
                <div class="name">
                    <h4> <?php echo $_SESSION['logged_user']->login ?> </h4> 
                </div>
                <p class="p3"> <b>Описание: </b> <?php echo $_SESSION['logged_user']->description ?> </p>
                <a href="edit.php" style="margin-left: 0">Редактировать</a>
                <a href="new_post.php">Создать публикацию</a>
            </div>
            <img src="img/from_users/<?php
             if ($_SESSION['logged_user']->path == ""){
                echo "def.jpg";
             }
             else{
                echo $_SESSION['logged_user']->path;
             };
            ?>" alt="">
        </div>
        
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>