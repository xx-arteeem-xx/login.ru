<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['on_login'])){


        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));

        if ( $user ){
            if(password_verify($data['pass'], $user->password)){
                $_SESSION['logged_user'] = $user;
                header('Location: /lk.php');
            }
            else{
                $errors[] = 'Неверный пароль!';
            };
        }
        else{
            $errors[] = 'Пользователя не существует!';
        };


        if ( ! empty($errors)){
            echo '<div style="position: absolute; top:65vh; left:10vw; color: red"><h3>'.array_shift($errors).'</h3></div>';
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
    <title>Вход</title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2>Вход</h2>
        <form action="/login.php" method="POST">
            <div class="name">
                <h3>
                    Логин: 
                </h3>
                <input tabindex="1" type="text" name="login" placeholder="Логин" required autocomplete="username" value="<?php echo @$data['login'] ?>">
            </div>
            <div class="name">
                <h3>
                    Пароль: 
                </h3>
                <input tabindex="2" type="password" name="pass" placeholder="Пароль" required autocomplete="current-password">
            </div>
            
            <div class="name">
                <button type="submit" name="on_login" tabindex="3">Войти</button>
            </div>
        </form>
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>