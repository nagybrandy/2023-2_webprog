<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='background-color: <?= $_POST['backgroundcolor'] ?? '#cccccc' ?>'>
    <form action="index.php" method="post">
        <input type="color" name="backgroundcolor" id="">
        <input type="text" name="ar" id="" hidden>
        <input type="submit" value="Küldés">
    </form>
</body>
</html>