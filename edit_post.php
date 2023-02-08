<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    $id = $_SESSION['post_id'];
    $editpost = R::load('posts', $id);
    if (isset($data['edit'])){

        $editpost->name = $data['editname'];
        $editpost->description = $data['editdescription'];
        R::store( $editpost );

        header('Location: /my_posts.php');

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
    <title>Редактирование</title>
</head>
<body>
    
    <?php include "includes/header.php" ?>
    
    <nav>

        <h2>Редактирование</h2>
        <form action="/edit_post.php" method="POST">
            <div class="name">
                <h3>    
                    Название: 
                </h3>
                <input tabindex="1" type="text" name="editname" required placeholder="Имя" value="<?php echo $editpost['name'] ?>">
            </div>

            <div class="name">
                <h3>
                    Описание: 
                </h3>
                <textarea tabindex="2" name="editdescription"><?php echo $editpost['description'] ?></textarea>
            </div>

            <div class="name">
                <button tabindex="3" type="submit" name="edit" >Изменить</button>
            </div>
        </form>

    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>