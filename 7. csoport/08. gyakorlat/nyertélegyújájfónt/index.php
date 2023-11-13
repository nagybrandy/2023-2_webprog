<?php
$input = $_GET;
$errors = [];
$data = [];

function is_empty($a){
    return !(isset($a) && strlen(trim($a)) > 0);
}
function validate($input, &$errors, &$data) {
    // név -> van-e név, 3nál hosszabb-e

    if(is_empty($input['name'])){
        $errors []= 'A nevet kötelező megadni!';
    } else if(strlen($input['name']) < 3) {
        $errors []= 'A név legalább 3 karakterből kell, hogy álljon!';
    } else {
        $data['name'] = $input['name'];
    }

    // e-mail -> filter_var

    if(is_empty($input['email'])){
        $errors []= 'A e-mailt kötelező megadni!';
    } else if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
        $errors []= 'Valós e-mail címet adj meg!';
    } else {
        $data['email'] = $input['email'];
    }

    // bankkártyaszám -> regex

    // cvv -> regex
    if(!preg_match('/^\d{3}$/', $input['cvv'])) {
        $errors []= 'A CVV megadása kötelező, és pontosan 3 számból áll!';
    } else {
       $data['cvv'] = $input['cvv'];
    }
    // lejárati dátum -> filter_var

    // szín -> tartalmazza valamilyet ezek közül: red, black, blue

    // be van e pipálva a checkbox
    return count($errors) === 0;
}

$is_valid = $_GET ? validate($input, $errors, $data) : false;
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
    <h1>NYERLY EGGY ULLY ÁJFÓN-nT! 🤩🤩</h1>
    <h2>Csak add meg az adataidat! 😉😉</h2>

    <form action="index.php" method="get" novalidate>
        <h4>Név</h4>
        <input type="text" name="name" id="" value="<?= $data['name'] ?? ''?>">

        <h4>E-mail</h4>
        <input type="email" name="email" id="" value="<?= $data['email'] ?? '' ?>">

        <h4>Bankártyaszám</h4>
        <input type="text" name="cardnumber" id="">

        <h4>CVV*</h4>
        <input type="text" name="cvv" id="" value="<?= $data['cvv'] ?? '' ?>">

        <h4>Lejárati dátum</h4>
        <input type="date" name="date" id="">

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

    <?php if($is_valid): ?>
        <h1>GRATULÁLOK, NYERTÉL EGY ÚJ IPHONE-T!!! 😍😍😍</h1>
    <?php else: ?>
        <ul style="color:red">
            <?php foreach($errors as $error): ?>
                <li><?=$error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>