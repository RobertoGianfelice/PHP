<?php
include "vars.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stampa Utenti nel DB</title>
    <style>
        body {
            background-color: antiquewhite;
            font-size: 300%;
        }
        table,th,td {
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    <h1>Utenti Presenti nel DB</h1>
    <?php

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

        $dati = "SELECT nome, cognome, avatar
                from utentiIMG";

        try {
            $risultato = mysqli_query($link, $dati);
        } catch(mysqli_sql_exception $e) {
            die ("Problemi!!! Problemi!!! " . $e->getMessage());
        }

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
