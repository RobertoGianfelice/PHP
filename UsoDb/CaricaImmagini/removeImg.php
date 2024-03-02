<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php   //dati accesso al db
    include "vars.php";
    include "notificheUtente.php";
    ?>
    <h1>Cancellazione Immagine</h1>
    <?php
    
    if (isset($_GET["toBeRemoved"]) and $_GET["toBeRemoved"] != "") {
        $fileToRemove = $_GET["toBeRemoved"];
        echo "<p>connetto al db...</p>";
        $link = mysqli_connect("$db_host", "$db_login", "$db_pass", $database)
            or die("Non riesco a connettermi al db $database su <b>$db_host");

        //Preparo la Query
        $dati = " DELETE FROM images 
                  WHERE immagine='$fileToRemove';";
        //Eseguo la query
        mysqli_query($link, $dati)
            or die("Non riesco ad eseguire la query $dati" . mysqli_error($link));

        notifyToUser(" <CENTER><H1>Immagine rimossa dal DB </CENTER> ");

        //Chiudo la connessione
        mysqli_close($link);
        unlink(DIR_IMG . "/" . $fileToRemove);
        try {
            notifyToUser(" <CENTER><H1>Immagine rimossa dal SERVER </CENTER> ");
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            notifyToUser(" <CENTER><H1>Problemi nel rimouvere l'immagine dal SERVER </CENTER> ");
        }
    } else {
        notifyToUser("Nome immagine da rimuovere mancante");
    }

    ?>
    <br>
    <a href="caricaImg.html">Torna alla pagina di caricamento</a>
</body>

</html>