<?php
    $r = random_int(0, 255);
    $g = random_int(0, 255);
    $b = random_int(0, 255);
    $isAllGreater = $r > 60 && $g > 60 && $b > 60;
    $color =  "#" . dechex($r) . dechex($g) . dechex($b);
    echo $isAllGreater ? $color : 'Alapszín';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?= $isAllGreater ? $color : "#cccccc" ?>">
    <?php 
        $nev = 'Bendi';
        echo "<h1>Hello $nev!</h1>";
        date_default_timezone_set('Antarctica/Troll');
        echo date("H:i:s");
       /*  for ($i = 0; $i < 10; $i++) {
            echo '<p style="font-size:' . $i + 10 . 'px">szia</p>';
        } */
    ?>
    
    <?php for ($i = 0; $i <= 5; $i++): ?>
        <p style="font-size:<?= $i*10 ?>px">Szia!</p>
    <?php endfor; ?>

    <?php 
        $tomb = ['Béna vagy!', 'Ezt elrontottad!', 'Lehetnél ügyesebb!', 'IT valami nem yo!'];
        $tomb[-5] = 'hello csicska!';
        $tomb []= 'Appendelve vok :)';
        $tomb []= 'Hello';
        var_dump($tomb);
        // ul -> li tömb tartalmát kiírják -> foreach
    ?>

     <ul>
        <?php foreach ($tomb as $value): ?>
            <li><?= $value ?? 'Hello' ?></li>
        <?php endforeach; ?>
    </ul>

    <?php 
        $filmek = [5 => "Akció", 4 => "Dráma", 8 => "Vígjáték"]
    ?>
    
    <select>
        <?php foreach ($filmek as $key => $value): ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>
</body>
</html>