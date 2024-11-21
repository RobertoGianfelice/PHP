<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momorizza cookie</title>
</head>

<body>

    <?php
        $cookie_name="utente";
        print_r($_COOKIE);
    
        if (isset($_COOKIE["login"]) and 
            isset($_COOKIE["password"])) {
                $login=$_COOKIE["login"];
                $password=$_COOKIE["password"];
                if ($login=="Roberto" and
                    $password=="Francesco") {
                        echo "<h1>Bentornato</h1>";
                } else{
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