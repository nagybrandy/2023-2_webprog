<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Food Arrival!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>New Food Arrival!</h1>

    <form action="isvalid.php" method="get" novalidate> 
        <label>Food Name</label> <br> 
        <input type="text" name="name" value="<?= $_GET['name'] ?? '' ?>"> <br><br>
        <label>Type</label><br> 
        <select name="type">
            <option value="none">None</option>
            <option value="vegetable">Vegetable</option>
            <option value="meat">Meat</option>
            <option value="dairy">Dairy</option>
        </select> <br><br>
        <label>Quantity</label><br> <input type="number" name="number" value="<?= $_GET['number'] ?? '' ?>"> <br><br>
        <label>Expiration Date</label><br> <input type="date" name="expdate" value="<?= $_GET['expdate'] ?? '' ?>"> <br><br>
        <label>Link</label><br> <input type="text" name="link" value="<?= $_GET['link'] ?? '' ?>"> <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
