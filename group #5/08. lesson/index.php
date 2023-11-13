<?php 
$r = random_int(0,255);
$g = random_int(0,255);
$b = random_int(0,255);

$hex = "#" . dechex($r) . dechex($g) . dechex($b);
$isAllGreater = $r > 128 && $g > 128 && $b > 128;
?>

<!DOCTYPE html>
<html lang="en">
<head'px>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?= $isAllGreater ? $hex : "#cccccc" ?>">

    <?php if ($isAllGreater): ?>
        <h1><?= $hex ?></h1>
    <?php else: ?>
        <h1>Default color</h1>
    <?php endif; ?>
    
    <?php
        $name = "Bendi";
        echo "<h1>Hello $name!</h1>"; 
        date_default_timezone_set("Europe/Budapest");
        echo date("H:i:s");
    ?>
        
    <?php 
    /*         for ($i=6; $i > 0; $i--) { 
            echo "<h$i>Hello World!</h$i>";
        }
        for ($i=0; $i < 6; $i++) { 
            echo "<h1 style='font-size:". $i*10 ."px'>Hello World!</h1>";
        } */
    ?>

    <?php for ($i= 0; $i <= 5; $i++): ?>
        <h1 style="font-size:<?= $i*10 ?>px">Hello World!</h1>
    <?php endfor; ?>
    
    <ul>
        <?php
        $tags = array("You are stupid","Don't do that","Be better!");
        $tags []= "Cats are cool!";
        var_dump($tags);
        foreach ($tags as $keys => $value): ?>
            <li><?=$keys?>:<?=$value?></li>
        <?php endforeach;?>
    </ul>  

</body>
</html>