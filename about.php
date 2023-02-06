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
    <title><?php echo $config['sections'][1] ?></title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2><?php echo $config['sections'][1] ?></h2>
        <div class="content">
            <h3>
                Lorem, ipsum dolor.
            </h3>
            <p class="p2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum suscipit tenetur, quos veniam accusantium itaque molestias aliquam asperiores ex! Minima animi delectus, unde eos nesciunt id voluptate fugiat aliquid corrupti?<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo praesentium, illo non odit dolorem hic?<br><br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis facere aliquid soluta recusandae laudantium. Ipsum laudantium explicabo necessitatibus quia non, animi deserunt mollitia ratione reprehenderit ad quaerat neque molestias rem commodi? Accusantium illum magni ullam doloribus earum amet ex voluptas. <br><br>
                Ea nulla possimus deserunt odit eius assumenda enim ducimus magnam, optio aspernatur sapiente modi quae quas sed nemo dolorem quibusdam. Laudantium hic incidunt magnam blanditiis perspiciatis tempore. Molestiae quos ex numquam fugit voluptates doloremque quisquam aperiam fugiat ipsam.<br><br>
            </p>
            <img src="img/2.jpg" alt="">
            <p class="p2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum suscipit tenetur, quos veniam accusantium itaque molestias aliquam asperiores ex! Minima animi delectus, unde eos nesciunt id voluptate fugiat aliquid corrupti?<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo praesentium, illo non odit dolorem hic?<br><br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis facere aliquid soluta recusandae laudantium. Ipsum laudantium explicabo necessitatibus quia non, animi deserunt mollitia ratione reprehenderit ad quaerat neque molestias rem commodi? Accusantium illum magni ullam doloribus earum amet ex voluptas. <br><br>
                Ea nulla possimus deserunt odit eius assumenda enim ducimus magnam, optio aspernatur sapiente modi quae quas sed nemo dolorem quibusdam. Laudantium hic incidunt magnam blanditiis perspiciatis tempore. Molestiae quos ex numquam fugit voluptates doloremque quisquam aperiam fugiat ipsam.<br><br>
            </p>
        </div>
    </nav>

    <?php include "includes/footer.php" ?>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>