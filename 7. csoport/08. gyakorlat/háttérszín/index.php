<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?= $_POST['color'] ??  '#cccccc'?>">
   <form action="index.php" method="post">
    <input type="color" name="color" value="<?= $_POST['color'] ?? '' ?>">
    <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">

    <input type="submit" value="Küldés">
   </form>
</body>
</html>