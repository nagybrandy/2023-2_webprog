<?php 
    $errors = []; // store the errors
    $data = []; // store the correct values
    $input = $_GET;

    function is_empty($a) {
        return !(isset($a) && strlen(trim($a)) > 0);
    }
    function validate($input, &$errors, &$data) {
        
        // name -> has to be given, name has to be at least 3 characters
        if(is_empty($input["name"]))  {
            $errors[] = "You must enter your name!";
        } else if (strlen($input['name']) < 3 ){
            $errors[] = "The name should be longer than 3 characters!";
        } else {
            $data['name'] = $input['name'];
        }

        // email -> filter_validate function
        if(is_empty($input["email"]))  {
            $errors[] = "You must enter your e-mail!";
        } else if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Enter a valid e-mail address!";
        } else {
            $data['email'] = $input['email'];
        }

        // Card number -> regex
        if(preg_match('/^\d{12}$/', $input['cardnum'])){
            
        }
        // CVV -> regex

        // expiry date -> filter_var

        // check if the checkbox is on!

        // check if the color is chosen, and if it is in this array ['Black', 'Red', 'Blue']

        // +++ make it so it keeps all values, the form should keep its state

        return count($errors) === 0;
    }
    $is_valid = $_GET ? validate($input, $errors, $data) : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
</head>
<body>
    <h1>You might have a chance to win a new Iphone!!!😍😍</h1>
    <h2>The only thing you have to do is fill out this form.</h2>
    <form action="" method="get" novalidate>

        <h4>Name</h4>
        <input type="text" name="name" id="" value="<?= $data['name'] ?? '' ?>">

        <h4>E-mail</h4>
        <input type="email" name="email" id="" value="<?= $data['email'] ?? '' ?>">

        <h4>Card Number</h4>
        <input type="text" name="cardnum" id="">

        <h4>CCV/CVV</h4>
        <input type="text" name="cvv" id="">

        <h4>Color</h4>
        <select name="color" id="">
            <option value="1">Blue</option>
            <option value="2">Red</option>
            <option value="3">Black</option>
        </select>

        <h4>Expiry date</h4>
        <input type="date" name="date" id="">

        <h4>Agreeing to the contract<input type="checkbox" name="agree" id=""></h4>
    
    <input type="submit" value="Send">
    </form>
    <?php if(!$is_valid): ?>
        <ul style="color:red">
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>YOU'VE JUST WON A NEW IPHONE! 😍😍</h1>
    <?php endif; ?>
</body>
</html>