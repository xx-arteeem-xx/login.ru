<?php
    require_once 'includes/config.php';
    require_once 'includes/db.php';

    $data = $_POST;
    if (isset($data['signup'])){


        $errors = array();
        if ($data['pass'] != $data['pass2']){
            $errors[] = 'Пароли не совпадают!';
        };

        if (R::count('users', "login = ?", array($data['login'])) > 0 ){
            $errors[] = 'Пользователь с таким логином уже существует!';
        };

        if (R::count('users', "email = ?", array($data['email'])) > 0 ){
            $errors[] = 'Пользователь с таким Email уже существует!';
        };

        if (empty($errors)){
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->description = $data['description'];
            $user->password = password_hash($data['pass'], PASSWORD_DEFAULT);
            $user->path = "";
            R::store($user);
            echo '<div style="position: absolute; top:120vh; left:10vw; color: green"><h3>Вы успешно зарегистрированы!</h3></div>';
        }
        else{
            echo '<div style="position: absolute; top:120vh; left:10vw; color: red"><h3>'.array_shift($errors).'</h3></div>';
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
    <title>Регистрация</title>
</head>
<body>
    
    <?php include "includes/header.php" ?>
    
    <nav>
        <h2>Регистрация</h2>
        <form action="/reg.php" method="POST">

            <div class="name">
                <h3>
                    Логин: 
                </h3>
                <input tabindex="1" type="text" name="login" placeholder="Логин" required autocomplete="username" minlength="4" maxlength="15" value="<?php echo @$data['login'] ?>">
            </div>

            <div class="name">
                <h3>
                    Имя: 
                </h3>
                <input tabindex="2" type="text" name="name" placeholder="Имя" required value="<?php echo @$data['name'] ?>">
            </div>

            <div class="name">
                <h3>
                    Фамилия: 
                </h3>
                <input tabindex="3" type="text" name="surname" placeholder="Фамилия" required value="<?php echo @$data['surname'] ?>">
            </div>

            <div class="name">
                <h3>
                    Email: 
                </h3>
                <input tabindex="4" type="email" name="email" placeholder="Email" required autocomplete="email" value="<?php echo @$data['email'] ?>">
            </div>

            <div class="name">
                <h3>
                    Пароль: 
                </h3>
                <input tabindex="5" type="password" name="pass" placeholder="Пароль" required autocomplete="new-password" minlength="8" maxlength="20">
            </div>
            <div class="name">
                <h3>
                    Повторите пароль: 
                </h3>
                <input tabindex="6" type="password" name="pass2" placeholder="Повторите пароль" required autocomplete="new-password" minlength="8" maxlength="20">
            </div>

            <div class="name">
                <h3>
                    Расскажите о себе: 
                </h3>
                <textarea tabindex="7" name="description"><?php echo @$data['description'] ?></textarea>
            </div>

            
            <div class="name">
                <button tabindex="8" type="submit" name="signup" >Зарегистрироваться</button>
            </div>
        </form>
        
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>