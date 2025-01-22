<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
</head>

<body>

    <?php
    $loginAuth = "Roberto";
    $passAuth = "Francesco";
    if (isset($_COOKIE["login"]) and isset($_COOKIE["password"])) {
        $login = $_COOKIE["login"];
        $password = $_COOKIE["password"];
        if ($login == $loginAuth and $password == $passAuth) {
            echo "<h1>Bentornato $login</h1>";
        } else {
            echo "<h1>Login errato</h1>";
            echo "<a href=\"registrazione.html\">Identificati</a>";
        }
    } else {
        echo "<h3>Non ti conosco</h3> <br>";
        echo "<a href=\"registrazione.html\">Identificati</a>";
    }
    ?>

</body>

</html>