<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immagini Memorizzate</title>
</head>
<script>
    function ingrandisci(immagine) {
        window.open(immagine);
    }
</script>

<body>
    <?php   //dati accesso al db
    include "vars.php";
    ?>
    <?php
    define('DIR_IMG', 'Images');

    //Connessione al DB
    echo "<p>connetto al db...</p>";
    $conn = new mysqli($db_host, $db_login, $db_pass, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Problemi di connessione a $db_host " . $conn->connect_error);
    }

    //Preparo la Query
    $dati = "SELECT *
            from immagini";

    //Eseguo la query
    $rs = $conn->query($dati);
    if ($conn->connect_error) {
        die("Problemi nell'eseguire la quesry $dati " . $conn->connect_error);
    }

    //Recupero il numero di righe nel cursore del risultato
    $nr = $rs->num_rows;

    if ($nr != 0) {    //Ci sono delle righe nella tabella
        //Preparo la struttura della tabella
        echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Immagini registrate </H1><BR>";

        echo "<table border=1>";
        echo "  <th>Nome File</th>";
        //Ciclo sul risultato e costruisco le tr della tabella
        for ($x = 0; $x < $nr; $x++) {
            $row = $rs->fetch_assoc();
            echo "<tr>";
            echo "<td><img onclick=\"ingrandisci(this.src)\" src=\"" . DIR_IMG . "/" . $row['nomeFile'] . "\" width=\"120px\"></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {  //La tabella è vuota
        notifyToUser("Nessuna immagine presente nel db!");
    }

    //Chiudo la connessione
    $conn->close();

    ?>
    <br>
    <a href="caricaImg.html">Torna alla pagina di caricamento</a>
</body>

</html>

</body>

</html>