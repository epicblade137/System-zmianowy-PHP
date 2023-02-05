<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotowe</title>
</head>
<body>
<h1>Wyświetlenie zmiany</h1>
<?php
if (isset($_POST["login"])) {

    $login = $_POST["login"];

    $b = array(
        "serv" => 'localhost',
        "us" => 'root',
        "pas" => '',
        "db" => 'zaklad'
    );

    $c = mysqli_connect($b["serv"], $b["us"], $b["pas"], $b["db"]);
    $q = mysqli_query($c, "SELECT `prac_imie`,`prac_nazwisko`,`prac_data_reje`,`prac_zmiana` FROM `pracownicy` WHERE prac_login LIKE '$login';");
    $row = mysqli_fetch_assoc($q);
    mysqli_close($c);

}
?>

<h2>Zmiana: <?=$row['prac_zmiana'];?></h2>
<h2>Imię: <?=$row['prac_imie'];?></h2>
<h2>Nazwisko: <?=$row['prac_nazwisko'];?></h2>
<h2>Data rejestracji: <?=$row['prac_data_reje'];?></h2>

</body>
</html>