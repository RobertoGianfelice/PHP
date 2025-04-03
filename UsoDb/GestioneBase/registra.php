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

            try {
                $link= new mysqli($db_host,$db_login,
                                $db_pass,$db_name);
            } catch(mysqli_sql_exception $e) {
                die ("Problemi!!! Problemi!!! " . $e->getMessage());
            }

            $dati="INSERT INTO utenti (id, nome, cognome, email, nick, passwd)
                   VALUES (NULL,
                            '$nome',
                            '$cognome',
                            '$email',
                            '$nick',
                            '$passwd'
                           );";
                           
            try {
                mysqli_query($link,$dati);
            } catch (mysqli_sql_exception $e) { 
                 die ("Problemi, Problemi Problemi: " . $e->getMessage());
            } 
            echo "Utente registrato";
            mysqli_close($link);
        } else {
            echo "Mancano i parametri di input";
        }

    ?>
    <h2><a href="menu.html">HOME</a></h2>
    
</body>
</html>