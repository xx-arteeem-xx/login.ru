<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['push'])){

        $get  = R::findOne( 'users', ' login = ? ', [$data['friendlogin']]);
        $idget = $get->id;
        $idsent = $_SESSION['logged_user']->id;

        $errors = array();
        if (R::count('users', "login = ?", array($data['friendlogin'])) == 0 ){
            $errors[] = 'Пользователя с таким логином не существует!';
        }
        else{
            if ($data['friendlogin'] == $_SESSION['logged_user']->login){
                $errors[] = 'Вы не можете отправить запрос дружбы самому себе!';
            }
            else{
                $checks = R::find('friends');
                foreach($checks as $check){
                    if (($check->idsent == $idsent) && ($check->idget == $idget)){
                        $errors[] = 'Вы не можете отправить запрос дружбы дважды!';
                    }
                    else{
                        if (($check->idsent == $idget) && ($check->idget == $idsent)) {
                            $errors[] = 'Вам уже отправлен запрос дружбы от этого пользователя!';
                        };
                    };
                };
            };
        };

        if (empty($errors)){
            
            $friend = R::dispense('friends');
            $friend->idsent = $idsent;
            $friend->idget = $idget;
            $friend->value = 1;
            R::store($friend);
            echo '<div style="position: absolute; top:15vh; left:10vw; color: green"><h3>Запрос отправлен!</h3></div>';
        }
        else{
            echo '<div style="position: absolute; top:15vh; left:10vw; color: red"><h3>'.array_shift($errors).'</h3></div>';
        };
    }
    if (isset($data['unpush'])){
        $del_id = $data['friend_id'];
        $del = R::load('friends', $del_id);
        R::trash($del);
    };

    if (isset($data['add'])){
        $add_id = $data['friend_id'];
        $add = R::findOne('friends', 'id = ?', array($add_id));
        $add->value = 2;
        R::store($add);
    };

    if (isset($data['go'])){
        $_SESSION['friend_id'] = $data['friend_id'];
        $_SESSION['table_id'] = $data['table_id'];
        header('Location: /friend_profile.php');
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
    <title><?php echo $config['sections'][2] ?></title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2><?php echo $config['sections'][2] ?></h2>
        <h3>
            Отправить запрос дружбы по логину
        </h3>
        <form action="friends.php" method="POST">
            <div class="flex" style="border: 0.2vw solid #fff; padding: 3vh 2vw; background-color: #0f0f29">
                <input type="text" name="friendlogin" required placeholder="Логин" style="width: 50vw">
                <button type="submit" name="push" style="margin: 0">Отправить запрос</button>
            </div>
        </form>
        <h3>
            Отправленные запросы
        </h3>
        <?php
            $friends = R::find('friends');
            $k = 0;
            foreach($friends as $friend){
                if (($friend->idsent == $_SESSION['logged_user']->id) && ($friend->value == 1)) {
                    $userget = R::load('users', $friend->idget);
                    echo '<div class="flex" style="border: 0.2vw solid #fff; padding: 3vh 2vw; background-color: #0f0f29; margin-bottom: 5vh">
                        <img src="img/from_users/'.$userget->path.'" style="width: 5vw; height: 5vw; border-radius: 50%; object-fit: cover; object-position: center">
                        <div style="width: 40vw">
                            <h3>'.$userget->name.' '.$userget->surname.'</h3>
                            <h4>'.$userget->login.'</h4>
                        </div>
                        <form action="friends.php" method="POST">
                            <input type="hidden" name="friend_id" value="'.$friend->id.'">
                            <button type="submit" name="unpush" style="margin: 0">Отменить запрос</button>
                        </form>
                    </div>';
                    $k += 1;
                };
                
            };
            if ($k == 0){
                echo '<h4>Запросов не найдено!</h4><br>';
            }
        ?>
        <h3>
            Входящие запросы
        </h3>

        <?php
            $friends = R::find('friends');
            $k = 0;
            foreach($friends as $friend){
                if (($friend->idget == $_SESSION['logged_user']->id) && ($friend->value == 1)) {
                    $usersent = R::load('users', $friend->idsent);
                    echo '<div class="flex" style="border: 0.2vw solid #fff; padding: 3vh 2vw; background-color: #0f0f29; margin-bottom: 5vh">
                        <img src="img/from_users/'.$usersent->path.'" style="width: 5vw; height: 5vw; border-radius: 50%; object-fit: cover; object-position: center">
                        <div style="width: 20vw">
                            <h3>'.$usersent->name.' '.$usersent->surname.'</h3>
                            <h4>'.$usersent->login.'</h4>
                        </div>
                        <form action="friends.php" method="POST">
                            <input type="hidden" name="friend_id" value="'.$friend->id.'">
                            <div class="flex">
                                <button type="submit" name="add" style="margin: 0 1vw ">Принять запрос</button>
                                <button type="submit" name="unpush" style="margin: 0">Отклонить запрос</button>
                            </div>
                        </form>
                    </div>';
                    $k += 1;
                };
                
            };
            if ($k == 0){
                echo '<h4>Запросов не найдено!</h4><br>';
            }
        ?>

        <h3>
            Друзья
        </h3>

        <?php
            $friends = R::find('friends', 'ORDER BY id DESC');
            $k = 0;
            foreach($friends as $friend){
                if ((($friend->idget == $_SESSION['logged_user']->id) || ($friend->idsent == $_SESSION['logged_user']->id)) && ($friend->value == 2)) {
                    if ($friend->idget == $_SESSION['logged_user']->id) {
                        $usersent = R::load('users', $friend->idsent);
                    }
                    else{
                        $usersent = R::load('users', $friend->idget);
                    }
                    
                    echo '<div class="flex" style="border: 0.2vw solid #fff; padding: 3vh 2vw; background-color: #0f0f29; margin-bottom: 5vh">
                        <img src="img/from_users/'.$usersent->path.'" style="width: 5vw; height: 5vw; border-radius: 50%; object-fit: cover; object-position: center">
                        <div style="width: 40vw">
                            <h3>'.$usersent->name.' '.$usersent->surname.'</h3>
                            <h4>'.$usersent->login.'</h4>
                        </div>
                        <form action="friends.php" method="POST">
                            <input type="hidden" name="friend_id" value="'.$usersent->id.'">
                            <input type="hidden" name="table_id" value="'.$friend->id.'">
                            <button type="submit" name="go" style="margin: 0">Посмотреть профиль</button>
                        </form>
                    </div>';
                    $k += 1;
                };
                
            };
            if ($k == 0){
                echo '<h4>Запросов не найдено!</h4><br>';
            }
        ?>
    </nav>

    <?php include "includes/footer.php" ?>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>