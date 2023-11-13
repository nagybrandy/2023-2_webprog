<?php

$errors = [];
$input = $_GET;
$data = [];

function is_empty($a){
    return !(isset($a) && strlen(trim($a)) > 0);
}
function validate($input, &$data, &$errors){
    // név -> 3-nál több karakterből álljon, és megadtuk!
    if(is_empty($input['name'])){
        $errors []= 'A név megadása kötelező!';
    } else if(strlen(trim($input['name'])) < 3) {
        $errors []= 'A név túl rövid!';
    } else {
        $data['name'] = $input['name'];
    }

    // email -> megadtuk-e, tényleg email-e filter
    if(is_empty($input['email'])){
        $errors []= 'A e-mail megadása kötelező!';
    } else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $errors []= 'Valódi e-mailt adj meg!';
    } else {
        $data['email'] = $input['email'];
    }

    // CVV -> regex - 3 számot adtunk-e meg

    // select-et tényleg azt a 3-at adtuk-e meg

    // elfogadta -> tényleg bepipáltuk-e
    return count($errors) == 0;
}
$isvalid = validate($input, $data, $errors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <title>Document</title>
</head>
<body>
    <h1>NYERTÉL EGY ÚJ IPHONE-T! 🤩🤩</h1>
    <h2>Csak add meg az adataidat! 😉😉</h2>

    <form action="index.php" method="get" novalidate>
        <h4>Név</h4>
        <input type="text" name="name" id="" value="<?= $data['name'] ?? '' ?>">

        <h4>E-mail</h4>
        <input type="email" name="email" id=""  value="<?= $data['email'] ?? '' ?>">

        <h4>Bankártyaszám</h4>
        <input type="text" name="cardnumber" id="">

        <h4>CVV</h4>
        <input type="text" name="cvv" id="">

        <h4>Szín</h4>
        <select name="color" id="">
            <option value="">-- Válassz színt! --</option>
            <option value="blue">Kék</option>
            <option value="red">Piros</option>
            <option value="black">Fekete</option>
        </select>

        <h4>Elfogadom a játék feltételeit <input type="checkbox" name="agreed" id=""></h4>
        

        <input type="submit" value="Küldés">
    </form>

    <?php if($_GET && $isvalid): ?>
        <h2>GRATULÁLUNK, MEGRENDELTED AZ ÚJ IPHONOD!</h2>
    <?php else: ?>
        <ul style="color:red">
            <?php foreach ($errors as $hiba): ?>
                <li><?= $hiba ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>