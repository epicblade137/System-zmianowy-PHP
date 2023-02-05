<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotowe</title>
</head>
<body>

<?php

if (isset($_POST["name"])) {

  
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $shift = $_POST["shift"];
 
    function generate_random_letters($length) {
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $random_letters = "";
        for ($i = 0; $i < $length; $i++) {
          $random_letters .= $letters[rand(0, strlen($letters) - 1)];
        }
        return $random_letters;
      }

    function create_login($name, $lastname) {
          
        $random_letters = generate_random_letters(2);
          
        $login = substr($name, 0, 2) . $random_letters . substr($lastname, 0, 2) . $random_letters;
        
        return strtoupper($login);
    }

  $log = create_login($name, $lastname);

    $b = array(
        "serv" => 'localhost',
        "us" => 'root',
        "pas" => '',
        "db" => 'zaklad');

    $c = mysqli_connect($b["serv"], $b["us"], $b["pas"], $b["db"]);
    $q = mysqli_query($c, "INSERT INTO pracownicy (`prac_imie`,`prac_nazwisko`,`prac_data_reje`,`prac_zmiana`, `prac_login`) VALUES ('$name', '$lastname',NOW(), '$shift', '$log')");
    mysqli_close($c);
}
?>

<h1>Login użytkownika: <?=$log?></h1>
<a href="../index.html">Wróć</a>
</body>
</html>