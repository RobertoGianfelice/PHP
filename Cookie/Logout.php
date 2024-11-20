
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
</head>
<body>
    <?php
        $cookie_name="utente";
        $cookie_value=$$_COOKIE[$cookie_name];
        setcookie($cookie_name,$cookie_value,time()-180,"/");
    ?>
    <h3>Accesso Teminato</h3>
    <a href=\"Registrati.html\">Identificati</a>
    
</body>
</html>