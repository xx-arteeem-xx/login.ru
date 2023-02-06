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
    <title><?php echo $config['sections'][2] ?></title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2><?php echo $config['sections'][2] ?></h2>
        <div class="content">
            <h3>
                Lorem, ipsum dolor sit.
            </h3>
            <h3>
                +78005553535
            </h3>
            <h3>
                682 Ashley Street<br>
                New York, NY 10009
            </h3>
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A5db09e858f3e091b0d0a90da1dc091831dd421e0bc3e8797765ac26f596e7755&amp;source=constructor" width="642" height="452" frameborder="0"></iframe>
        </div>
    </nav>

    <?php include "includes/footer.php" ?>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>