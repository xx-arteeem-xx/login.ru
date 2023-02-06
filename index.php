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
    <title> <?php echo $config['sections'][0] ?> </title>
</head>
<body>
    
    <?php include "includes/header.php" ?>

    <nav>
        <h2> <?php echo $config['sections'][0] ?> </h2>
        <div class="flex content">
            <img src="img/1.jpg" alt="" class="img1">
            <p class="p1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quasi nesciunt, laudantium temporibus ratione quae porro molestiae illum in obcaecati.<br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil est quisquam mollitia placeat! Eius eum quas doloremque quibusdam voluptate velit eligendi porro, maiores dolorem possimus nobis saepe tenetur, iure tempora.<br><br>

            </p>
        </div>
        <div class="flex content">
            <img src="img/3.jpg" alt="" class="img1">
            <p class="p1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quasi nesciunt, laudantium temporibus ratione quae porro molestiae illum in obcaecati.<br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil est quisquam mollitia placeat! Eius eum quas doloremque quibusdam voluptate velit eligendi porro, maiores dolorem possimus nobis saepe tenetur, iure tempora.<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, cupiditate?

            </p>
        </div>
        <div class="flex content">
            <img src="img/2.jpg" alt="" class="img1">
            <p class="p1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quasi nesciunt, laudantium temporibus ratione quae porro molestiae illum in obcaecati.<br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil est quisquam mollitia placeat! Eius eum quas doloremque quibusdam voluptate velit eligendi porro, maiores dolorem possimus nobis saepe tenetur, iure tempora.<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, cupiditate?

            </p>
        </div>
        <div class="flex content">
            <img src="img/3.jpg" alt="" class="img1">
            <p class="p1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quasi nesciunt, laudantium temporibus ratione quae porro molestiae illum in obcaecati.<br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil est quisquam mollitia placeat! Eius eum quas doloremque quibusdam voluptate velit eligendi porro, maiores dolorem possimus nobis saepe tenetur, iure tempora.<br><br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam ut ex iusto eveniet ea nam inventore, consequatur autem libero! Repellendus vitae quibusdam temporibus libero adipisci, laborum dolore voluptate voluptatem commodi?

            </p>
        </div>
        <div class="flex content">
            <img src="img/2.jpg" alt="" class="img1">
            <p class="p1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quasi nesciunt, laudantium temporibus ratione quae porro molestiae illum in obcaecati.<br><br>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil est quisquam mollitia placeat! Eius eum quas doloremque quibusdam voluptate velit eligendi porro, maiores dolorem possimus nobis saepe tenetur, iure tempora.<br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ipsam, nobis hic cumque pariatur fugit. Placeat ratione corporis ducimus nisi, reiciendis aliquid dolores totam, animi fugiat facere esse similique recusandae eius nemo voluptas at tempore ipsam quis cupiditate consequuntur? Architecto tempora repudiandae laudantium excepturi quisquam!
                
            </p>
        </div>
    </nav>

    <?php include "includes/footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>