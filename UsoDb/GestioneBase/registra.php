<?php
    include "vars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restrazione utente in DB</title>
</head>
<body>
    <h1>Esecuzione registrazione su DB</h1>
    <?php
        if (isset($_POST["name"])){
            $nome=$_POST["name"];
            $cognome=$_POST["cognome"];
            $email=$_POST["email"];
            $nick=$_POST["nick"];
            $passwd=md5($_POST["passwd"]);

            $link=mysqli_connect(
                $db_host,
                $db_login,
                $db_pass,
                $db_name
            ) or die ("Attenzione: problemi connessione db");

            $dati="INSERT INTO utenti (id, nome, cognome, email, nick, passwd)
                   VALUES (NULL,
                            '$nome',
                            '$cognome',
                            '$email',
                            '$nick',
                            '$passwd'
                           );";
            mysqli_query($link,$dati)
            or die ("Problemi, Problemi Problemi: $dati");
            echo "Utente registrato";
            mysqli_close($link);
        } else {
            echo "Mancano i parametri di input";
        }

    ?>
    <h2><a href="menu.html">HOME</a></h2>
    
</body>
</html>