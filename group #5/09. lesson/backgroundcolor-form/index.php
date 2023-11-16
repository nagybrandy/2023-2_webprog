<?php
    $color = $_GET['color'] ?? '#cccccc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?= $color ?>">
    <form action="index.php" method="get">
        <input type="color" name="color" id="" value="<?= $_GET['color'] ?? ""?>">
        <input type="text" name="name" value="<?= $_GET['name'] ?? ""?>">
        <input type="submit" value="Send">
    </form>
</body>
</html>