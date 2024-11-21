<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>

<body>
    <?php
    //Memorizzo i dati sul cookie "utente"
    $cookie_login = $_REQUEST["login"];
    $cookie_password = $_REQUEST["password"];

    //Cookie valido per 30 secondi
    setcookie("login", $cookie_login, time() + 1800, "/");
    setcookie("password", $cookie_password, time() + 1800, "/");
    ?>
    <h3>Accesso effettuato: hai 30 secondi per proseguire</h3>
    <a href="Welcome.php" target="_blank">Usa il Servizio</a>
</body>

</html>