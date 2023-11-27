<?php
    session_start();
    if(isset($_GET['logout'])) {
        session_destroy();
    } else {
        $is_valid = $_POST ? $_POST['name'] == 'admin' && $_POST['pw'] == 'sajt' : false;
        if($is_valid) { 
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['pw'] = $_POST['pw'];
        } else {
            echo 'Sikertelen bejelntkezés!';
        }
    }
    
    $cheese_str = file_get_contents("cheese_stock.json");
    $cheese_arr = json_decode($cheese_str, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajtológia Tanszék Raktára</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sajtológia Tanszék Raktára</h1>
    <table> <!-- Sajtos táblázat -->
        <tr>
            <th>Sz. hely</th>
            <th>Név</th>
            <th>Típus</th>
            <th>Kor (hónap)</th>
        </tr>
        <?php foreach($cheese_arr as $cheese):?>
        <tr class="<?=$cheese["age_m"]>24 ? "old" : "" ?>">
            <td><img src="img/<?=$cheese["origin"]?>.png"></td>
            <td><?=$cheese["name"]?></td>
            <td><?=$cheese["type"]?></td>
            <td><?=$cheese["age_m"]?> hónap</td>
        </tr>
        <?php endforeach;?>

    </table>
    
    <?php if(isset($_SESSION['name']) && isset($_SESSION['pw'])): ?>
        <a href='addcheese.php'>Új sajt érkezett!</a>
        <a href='index.php?logout=1'>Kijelentkezés</a>
    <?php else: ?>
        <form action="index.php" method="post">
            <h4>Név</h4>
            <input type="text" name="name" id="">
            <h4>Jelszó</h4>
            <input type="password" name="pw" id="">
            <input type="submit" value="Küldés">
        </form>
    <?php endif;?>
</body>
</html>