<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['signup'])){

        $errors = array();
        $file = $_FILES['image'];
        if (empty($file)){
            $errors[] = 'Вы не загрузили изображение!';
        }
        else{
            
            $name = $file['name'];
            $pathfile = __DIR__.'/img/from_users/'.$name;
            if (!move_uploaded_file($file['tmp_name'], $pathfile)){
                $errors[] = 'Не удалось загрузить изображение!';
            }
            else{
                if ($file['size']>20971520){
                    $errors[] = 'Нельзя загружать изображения более 20мб!';
                };
            };
        };
        
        if (empty($errors)){ 
            $id = $_SESSION['logged_user']->id;
            if ($name != $_SESSION['logged_user']->path){
                $sql = "UPDATE users SET path = '".$name."' WHERE id = '".$id."'";
                R::exec($sql);
                $_SESSION['logged_user']->path = $name;

            }


        }  
        else{
            echo '<div style="position: absolute; top:70vh; left:10vw; color: red"><h3>'.array_shift($errors).'</h3></div>';
        };
        


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
        <form action="/img_add.php" method="POST" enctype="multipart/form-data">


            <div class="name">
                <h3>
                    Загрузите изображение: 
                </h3>
                <input tabindex="1" type="file" name="image" >
            </div>


            
            <div class="name">
                <button tabindex="2" type="submit" name="signup" >Изменить</button>
            </div>
        </form>
        
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>