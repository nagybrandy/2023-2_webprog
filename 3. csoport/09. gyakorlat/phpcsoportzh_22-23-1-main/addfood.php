<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új kaja érkezik!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/elte-fi/www-assets@19.10.16/styles/mdss.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Új Kaja érkezik!</h1>


<form action="isvalid.php" method="get" nofiltervalidate> 
    <label>Étel neve</label> <br> 
    <input type="text" name="name" value="<?= $_GET['name'] ?? "" ?>" > <br><br>
    <label>Típus</label><br> 
    <select name="type">
        <option value="nincs">Nincs</option>
        <option value="zöldség">zöldség</option>
        <option value="húsféle">húsféle</option>
        <option value="tejtermék">tejtermék</option>
    </select> <br><br>
    <label>Darab</label><br> <input type="number" name="number" value="<?= $_GET['number'] ?? "" ?>" > <br><br>
    <label>Lejárati dátum</label><br> <input type="date" name="expdate" value="<?= $_GET['expdate'] ?? "" ?>" > <br><br>
    <label>Kép (nem kötelező)</label><br> <input type="text" name="link" value="<?= $_GET['link'] ?? "" ?>" ><br><br>
    <input type="submit" value="Küldés">
<form>

</body>
</html>
