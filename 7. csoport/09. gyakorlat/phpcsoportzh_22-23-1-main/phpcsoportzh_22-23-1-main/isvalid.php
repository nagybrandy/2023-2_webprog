<?php
    $errors = [];
    $input = $_GET;
    $data = [];

    $is_valid = validate($errors, $data, $input);
    // IDE KÉSZÍTSD EL A VALIDÁLÁST!
    function validate(&$errors, &$data, $input){
        // név 2 - vagy nem létezik vagy kevesebb mint 3 a hossza
        if(!isset($input['name']) || strlen(trim($input['name'])) === 0){
            $errors []= 'Add meg az étel nevét!';
        }else if(strlen(trim($input['name'])) < 3) {
            $errors []= 'Legalább 3 hosszú étel nevet adj meg!';
        } else {
            $data['name'] = $input['name'];
        }

        // filter_var -> darabszám
        if(!isset($input['number']) || strlen(trim($input['number'])) === 0){
            $errors []= 'Add meg a darabszámot!';
        }else if(!filter_var($input['number'], FILTER_VALIDATE_INT)) {
            $errors []= 'Számot adj meg darabszámnak!';
        } else {
            $data['number'] = $input['number'];
        }
        return count($errors) === 0;
    }

    // ITT ADD HOZZÁ A JSON FÁJLHOZ!

    if($is_valid){
        // Kiolvassuk a json fájlból az adatokat
        // tömböt csinálunk belőle
        $food_str = file_get_contents('food.json');
        $food_arr = json_decode($food_str, true);

        // tömbhöz hozzáfűzzük az új elemet
        // visszaillesztjük a jsonbe
        $data['type'] = $input['type'];
        $data['expdate'] = $input['expdate'];
        $data['date'] = date('Y-m-d');

        array_push($food_arr, $data);

        $new_json = json_encode($food_arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents('food.json', $new_json);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új kaja érkezett</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Mentés</title>
</head>
<body>  
    <?php if($is_valid): ?>
        <!-- Ez jelenjen meg, ha valid -->
        <h1>Sikeres hozzáadás! 😍</h1>
        <a href='index.php'>Vissza a főoldalra</a>
    <?php else: ?>
        <!-- Ez pedig, ha nem valid -->
        <h1>Sikertelen hozzáadás! 😢😭</h1>
        <a href='addfood.php?<?= $_SERVER['QUERY_STRING'] ?>'>Új hozzzáadása</a>
        <?php if ($errors) : ?>
                <ul style="font-size: 25px;color: red;">
                <?php foreach($errors as $error) : ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>