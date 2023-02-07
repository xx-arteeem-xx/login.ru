<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['newpost'])){

        $new_post = R::dispense('posts');
        $new_post->user_id = $_SESSION['logged_user']->id;
        $new_post->login = $_SESSION['logged_user']->login;
        $new_post->name = $data['postname'];
        $new_post->description = $data['postdescription'];
        R::store($new_post);
        header('Location: /lk.php');
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
    <title>Публикация</title>
</head>
<body>
    
    <?php include "includes/header.php" ?>
    
    <nav>
        <h2>Публикация</h2>
        <form action="/new-post.php" method="POST">

            <div class="name">
                <h3>
                    Название статьи: 
                </h3>
                <input tabindex="1" type="text" name="postname" placeholder="Имя" required value="<?php echo @$data['name'] ?>">
            </div>

            <div class="name">
                <h3>
                    Что у вас нового?: 
                </h3>
                <textarea tabindex="2" name="postdescription" style="width: 50vw; height: 50vh"><?php echo @$data['description'] ?></textarea>
            </div>

            
            <div class="name">
                <button tabindex="3" type="submit" name="newpost" >Опубликовать</button>
            </div>

        </form>
        
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>