<?php 
    $food_str = file_get_contents('food.json');
    $food_arr = json_decode($food_str, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi van a hűtőmban?</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Mi van a hűtőmban?</h1>
    <table>
        <tr>
            <th>Kép</th>
            <th>Név</th>
            <th>Darab</th>
            <th>Típus</th>
            <th>Hűtőberakás dátuma</th>
            <th>Lejárati dátum</th>
        </tr>
        <?php foreach($food_arr as $food):?>
            <tr class="<?= strtotime($food['expdate']) < strtotime('today') ? "lejart" : "" ?>">
                <td><img src="<?= $food['link'] ?? "https://cdn.pixabay.com/photo/2014/03/25/15/19/cross-296507_640.png" ?>" alt="" width=50 height=50></td>
                <td><?= $food['name'] ?></td>
                <td><?= $food['number'] ?></td>
                <td><?= $food['type'] ?></td>
                <td><?= $food['date'] ?></td>
                <td><?= $food['expdate'] ?></td>
            </tr>
        <?php endforeach; ?>


    </table>

    <a href='addfood.php'>Elem hozzáadása</a>
</body>
</html>