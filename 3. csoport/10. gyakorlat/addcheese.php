<?php 
 session_start();
 echo $_SESSION["name"];
 echo $_SESSION["pw"];
 $errors = [];
 $data = [];
 $input = $_GET;
 $is_valid=false;

 $isloggedin = $_SESSION ? $_SESSION['name'] == 'admin' && $_SESSION['pw'] == 'sajt' : false;
 echo $isloggedin;

if($input != []){
    $is_valid = validate($data, $errors, $input);
} 
 function validate(&$data, &$errors, $input) {
     // CREATE VALIDATION LOGIC HERE!
     if(isset($input["name"]) && strlen(trim($input['name'])) >= 4 ){
        $data["name"]=$input["name"];
    } else {
        $errors []= "Legalább 4 karakter hosszú nevet adj meg szókozök nélkül!";
     }

     if(!preg_match("/^[a-zA-Z\s]*$/", $input["type"])){
         $data["type"]=$input["type"];
    } else {
        $errors []= "Add meg a típusát!";
     }

     if(!filter_var($input["age_m"], FILTER_VALIDATE_INT)){
        $errors []= "Add meg, hogy hány hónapos a sajt!";
     } else {
        $data["age_m"]=$input["age_m"];
     }
     return count($errors) === 0;
 }

  // Itt add hozzá a jsonhöz, ha valid!
  if($is_valid){
    $data["origin"]=$input["origin"];
    $cheese_str = file_get_contents("cheese_stock.json");
    $cheese_arr = json_decode($cheese_str, true);

    array_push($cheese_arr,$data);
    $json=json_encode($cheese_arr, JSON_PRETTY_PRINT);
    file_put_contents("cheese_stock.json", $json);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új sajt érkezett!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Új sajt érkezett!</h1>

    <form action="addcheese.php" method="get" novalidate> 
        <h4>Sajt neve</h4>
        <input type="text" name="name" value="<?= $_GET['name'] ?? "" ?>">
        
        <h4>Származási hely</h4>
        <select name="origin" >
            <option value="gr"  <?= isset($_GET['origin']) ? ($_GET['origin']=="gr"  ? "selected" : "" ) : "" ?>>Görögország   </option>
            <option value="fr"  <?= isset($_GET['origin']) ? ($_GET['origin']=="fr"  ? "selected" : "" ) : "" ?>>Franciaország </option>
            <option value="it"  <?= isset($_GET['origin']) ? ($_GET['origin']=="it"  ? "selected" : "" ) : "" ?>>Olaszország   </option>
            <option value="ger" <?= isset($_GET['origin']) ? ($_GET['origin']=="ger" ? "selected" : "" ) : "" ?>>Németország   </option>
        </select>
        
        <h4>Típus</h4>
        <input type="text" name="type" value="<?= $_GET['type'] ?? "" ?>">
        
        <h4>Kor (hónap)</h4>
        <input type="number" name="age_m" value="<?= $_GET['age_m'] ?? "" ?>">
        
        <input type="submit" value="Küldés">
    </form>
    <div id=results>
<?php if($is_valid): ?>
        <!-- Ez jelenjen meg, ha valid -->
        <h2>Sikeres hozzáadás! 😍</h2>
        <a href='index.php'>Vissza a főoldalra</a>
<?php elseif($_GET!=[]):?>
        <!-- Ez pedig, ha nem valid -->
        <h2>Sikertelen hozzáadás! 😢😭</h2>
        <ul id="errors">
            <?php foreach($errors as $error):?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
<?php endif;?>
    </div>

    <ul id="help">
            <li><a href="addcheese.php?name=&origin=gr&type=&age_m=">❌cheesename ❌cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=&age_m=">✅cheesename ❌cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=fehér&age_m=">✅cheesename ✅cheesetype ❌cheeseage</a></li>
            <li><a href="addcheese.php?name=Feta&origin=gr&type=fehér&age_m=3">✅cheesename ✅cheesetype ✅cheeseage</a></li>
    </ul>
</body>
</html>
