<?php
    $errors = [];
    $data = [];
    $input = $_GET;
    $is_valid = validate($errors, $data, $input);
    // CREATE VALIDATION LOGIC HERE!
    function validate(&$errors, &$data, $input){
        if (isset($input["name"]) && strlen(trim($input["name"])) > 0) {
            $data["name"] = $input["name"];
        }
        else {
            #$errors["name"] = "Name was set incorrectly!";
            $errors[] = "Name was set incorrectly";
        }
 
        if (isset($input["number"]) && filter_var($input["number"], FILTER_VALIDATE_INT)) {
            $data["number"] = $input["number"];
        }
        else {
            #$errors["quantity"] = "Quantity was set incorrectly";
            $errors[] = "Quantity was set incorrectly";
        }        

        if (isset($input["expdate"]) && isValidDate($input['expdate'])) {
            $data["expdate"] = $input["expdate"];
        }
        else {
            $errors[] = "Expiration date was set incorrectly";
        }  
        $data['type'] = $input['type'];
        $data['date'] = date('Y-m-d');
        $data['link'] = $input['link'];
        var_dump($data);

        return count($errors) === 0;
    }

    function isValidDate($date) {
        return (strtotime($date) !== false);
    }

    // ADD TO THE JSON FILE HERE!
    if($is_valid) {
        $food_str = file_get_contents("food.json");
        $food_arr = json_decode($food_str, true);

        // add new value to the array
        array_push($food_arr, $data);

        $json = json_encode($food_arr, JSON_PRETTY_PRINT);
        file_put_contents('food.json', $json);

        // put the whole array back to the json file
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Food Item Added</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Save</title>
</head>
<body>
   
<?php if($is_valid): ?>
    <!-- Display this if successful -->
    <h1>Successfully added! 😍</h1>
    <a href='index.php'>Back to main page</a>
<?php else: ?>  
    <!-- Display this if unsuccessful -->
    <h1>Failed to add! 😢😭</h1>
    <a href='addfood.php?<?= $_SERVER['QUERY_STRING'] ?>'>Add new</a>
<?php endif; ?>

<?php if ($errors) : ?>
        <ul style="font-size: 25px;color: red;">
        <?php foreach($errors as $error) : ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
<?php endif; ?>
</body>
</html>
