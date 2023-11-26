<?php
    $errors = [];
    $input = $_GET;
    $data = [];

    $is_valid = validate($input, $errors, $data);
    // IDE KÉSZÍTSD EL A VALIDÁLÁST!
    function validate($input, &$errors, &$data) {
        
        if(isset($input['name']) && strlen(trim($input['name'])) > 2 ){
            $data['name'] = $input['name'];
        } else {
            $errors[] = 'Add meg a nevet, ami legalább 3 karakter hosszú!';
        }

        if(isset($input['expdate']) && strlen(trim($input['expdate'])) > 0 ){
            $data['expdate'] = $input['expdate'];
        } else {
            $errors []= 'Add meg a lejárti dátumot!';
        }

        if(isset($input['number']) && filter_var($input['number'], FILTER_VALIDATE_INT)){
            $data['number'] = $input['number'];
        } else {
            $errors []= 'Adj meg egy számot darabszámnak!';
        }
        
        return count($errors) == 0;
    }

    if($is_valid){
        $data['date'] = date('Y-m-d');
        $data['type'] = $input['type'];
        $data['link'] = $input['link'];

        $food_str = file_get_contents('food.json');
        $food_arr = json_decode($food_str, true);

        array_push($food_arr, $data);

        $json = json_encode($food_arr, JSON_PRETTY_PRINT);
        file_put_contents('food.json', $json);
    }
    echo $_SERVER["QUERY_STRING"];
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
        <a href='addfood.php?<?= $_SERVER["QUERY_STRING"] ?>'>Új hozzzáadása</a>
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