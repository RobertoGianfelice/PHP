<?php
include "vars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancella Utente</title>
</head>
<body>
    <?php
        $cognome=$_POST["cognome"];
        $link = mysqli_connect(
            $db_host,
            $db_login,
            $db_pass,
            $db_name
        ) or die("Attenzione: problemi connessione db");
        
        $dati="DELETE from utenti
                where cognome='$cognome';";
        
        mysqli_query($link, $dati) 
        or die("Problemi Problemi Problemi: $dati");
        
        $righeCancellate=mysqli_affected_rows($link);
        if ($righeCancellate>0) {
            echo "Sono state cancellate " . $righeCancellate . "riga/righe";
        } else {
            echo "Nessuna riga cancellata dal db";
        }

        mysqli_close($link);

    ?>
    <h2><a href="menu.html">HOME</a></h2>

    
</body>
</html>