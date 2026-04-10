<?php
    include "vars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancella Utente</title>
    <style>
        body {
            background-color: antiquewhite;
            font-size: 300%;
        }
    </style>

</head>
<body>
    <?php
        $cognome=$_POST["cognome"];
        try {
            $link=mysqli_connect(
                                $db_host,
                                $db_login,
                                $db_pass,
                                $db_name
                            );
        } catch(mysqli_sql_exception $e) {
            die ("Problemi!!! Problemi!!! " . $e->getMessage());
        }        
        $dati="DELETE from utentiIMG
                where cognome='$cognome';";
        
        try {
            mysqli_query($link, $dati) ;
        } catch (mysqli_sql_exception $e){
            die ("Problemi!!! Problemi!!! " . $e->getMessage());

        }
                
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
