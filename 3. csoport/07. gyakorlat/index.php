<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = "Bendi";
    echo "<h1>Hello $name!</h1>";
    echo date("H:i:s");
    ?>

    <?php for ($i = 0; $i < 5; $i++): ?>
        <h1 style="font-size:<?= $i * 10 ?>px">Hello Világ!</h1>
    <?php endfor; ?>

    <?php
    $hibauzik = ['Béna vagy', 'Elírtál mindent', 'Haljál inkább meg'];
    //$hibauzik []= 'yo vagy azért na';
    $hibauzik[-5] = 'Helo';
    $hibauzik[] = 'asd';
    var_dump($hibauzik);
    // ul -> li, foreach
    ?>
    <ul>
        <?php foreach ($hibauzik as &$elem): ?>
            <li>
                <?= strlen($elem) > 3 ? $elem : "Ez itt hibás hiba." ?>
            </li>
            <!--  <li><?= $helooo ?? "NIncs itt semmi látnivaló!" ?></li> -->
        <?php endforeach; ?>
    </ul>

    <select name="" id="">
    <?php
        $filmek = [5 => "Akció", 4 => "Dráma", 8 => "Vígjáték"];
        foreach ($filmek as $key => $elem): ?>
            <option value="<?= $key?>"><?= $elem ?></option>
       <?php endforeach; ?>
    ?>
    </select>
    



</body>

</html>