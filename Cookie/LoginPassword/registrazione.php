<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>

<body>
    <?php
    //Recupero parametri di ingresso
    if ((!isset($_REQUEST["login"]) or $_REQUEST["login"] == "") or
        (!isset($_REQUEST["password"]) or $_REQUEST["password"] == "")) {
        echo "<h1>Parametri di login mancanti</h1>";
        echo "<a href='registrazione.html'>Registrati</a>";
        exit();
    }

    $cookie_login = $_REQUEST["login"];
    $cookie_password = $_REQUEST["password"];

    //Cookie valido per 60 secondi
    setcookie("login", $cookie_login, time() + 60, "/");
    setcookie("password", $cookie_password, time() + 60, "/");
    ?>
    <h3>Registrazione effettuata</h3>
    <a href="Welcome.php" target="_blank">Usa il Servizio</a>
</body>

</html>