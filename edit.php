<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['edit'])){

        $id = $_SESSION['logged_user']->id;


        if ($data['editname'] != $_SESSION['logged_user']->name){
            $sql = "UPDATE users SET name = '".$data['editname']."' WHERE id = '".$id."'";
            R::exec($sql);
            $_SESSION['logged_user']->name = $data['editname'];
        }
        if ($data['editsurname'] != $_SESSION['logged_user']->surname){
            $sql = "UPDATE users SET surname = '".$data['editsurname']."' WHERE id = '".$id."'";
            R::exec($sql);
            $_SESSION['logged_user']->surname = $data['editsurname'];
        }
        if ($data['editdescription'] != $_SESSION['logged_user']->description){
            $sql = "UPDATE users SET description = '".$data['editdescription']."' WHERE id = '".$id."'";
            R::exec($sql);
            $_SESSION['logged_user']->description = $data['editdescription'];
        }
        
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
    <title>Редактирование</title>
</head>
<body>
    
    <?php include "includes/header.php" ?>
    
    <nav>
        <h2>Редактирование</h2>
        <form action="/edit.php" method="POST">


            <div class="name">
                <h3>
                    Имя: 
                </h3>
                <input tabindex="1" type="text" name="editname" required placeholder="Имя" value="<?php echo $_SESSION['logged_user']->name ?>">
            </div>

            <div class="name">
                <h3>
                    Фамилия: 
                </h3>
                <input tabindex="2" type="text" name="editsurname" required placeholder="Фамилия" value="<?php echo $_SESSION['logged_user']->surname ?>">
            </div>

            <div class="name">
                <h3>
                    О себе: 
                </h3>
                <textarea tabindex="3" name="editdescription" value="<?php echo $_SESSION['logged_user']->descpiption ?>"></textarea>
            </div>

            
            <div class="name">
                <button tabindex="4" type="submit" name="edit" >Изменить</button>
            </div>
        </form>
        
        <a href="img_add.php" style="margin-left: 0">Изменить фото профиля</a>

    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>