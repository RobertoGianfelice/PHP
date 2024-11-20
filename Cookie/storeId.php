
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
</head>
<body>
    <?php
        //Memorizzo i dati sul cookie "utente"
        $cookie_name="utente";
        $cookie_value=$_REQUEST["nominativo"];
        //Cookie valido per 30 secondi
        setcookie($cookie_name,$cookie_value,time()+30,"/");
    ?>
    <h3>Accesso effettuato: hai 30 secondi per proseguire</h3>
    <a href="Welcome2.php" target="_blank">Usa il Servizio</a>

    
</body>
</html>