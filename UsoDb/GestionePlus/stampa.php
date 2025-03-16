<?php
include "vars.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stampa Utenti nel DB</title>
</head>

<body>
    <h1>Utenti Presenti nel DB</h1>
    <?php
    $link = mysqli_connect(
        $db_host,
        $db_login,
        $db_pass,
        $db_name
    ) or die("Attenzione: problemi connessione db");

    $dati = "SELECT nome, cognome, avatar
               from utenti";

    $risultato = mysqli_query($link, $dati)
        or die("Problemi nell'esecuzione di $dati");

    $numeriRighe = mysqli_num_rows($risultato);

    if ($numeriRighe > 0) {
        echo "<h1> Utenze nel db</h1>";
        echo "<table border=1>";

        echo "<th>Nome</th><th>Cognome</th><th>Image</th>";
        for ($x = 0; $x < $numeriRighe; $x++) {
            $row = mysqli_fetch_assoc($risultato);
            echo "<tr>";
            echo "<td>" . $row["nome"]    . "</td>";
            echo "<td>" . $row["cognome"] . "</td>";

            if ($row['avatar'] != NULL) {
                echo "<td>" .
                         "<a href=\"" . DIR_IMG . "/" . $row['avatar'] . "\" target=\"_blank\">" .
                            "<img src=\"" . DIR_IMG . "/" . $row['avatar'] . "\" height=\"100\">" .
                         "</a></td>";
            } else {
                echo "<td> Nessuna Immagine </td>";
            }

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nel db non ci sono utenze registrate";
    }

    mysqli_close($link);

    ?>
    <h2><a href="menu.html">HOME</a></h2>

</body>

</html>