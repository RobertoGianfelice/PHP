<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<body>
    <?php
    include "accessodb.php";
    ?>
    <center>
        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Wizarding_World_of_Harry_Potter_Castle.jpg" alt="Il castello di Hogwarts" height="300px">
    </center>

    <h1 style="text-align :center;">Seleziona la Casa di tuo interesse</h1>
    <?
    $link = mysqli_connect("$db_host", "$db_login", "$db_pass", "$db_name")
        or die("Non riesco a connettermi a <b>$db_host");

    if (isset($_GET["nuovaCasa"]) and $_GET["nuovaCasa"]) {
        $nuovaCasa = $_GET["nuovaCasa"];
        //Preparo la Query
        $dati = " INSERT into LeCase values(NULL, \"$nuovaCasa\")";
        mysqli_query($link, $dati)
            or die("Non riesco ad eseguire la query $dati");
    }

    //Preparo la Query
    $dati = " SELECT nome from LeCase;";

    //Eseguo la query
    $rs = mysqli_query($link, $dati)
        or die("Non riesco ad eseguire la query $dati");

    //Recupero il numero di righe nel cursore del risultato
    $nr = mysqli_num_rows($rs);
    if ($nr != 0) { //Ci sono delle righe nella tabella
        echo "<form action=\"AlunniCasa.php\" method=\"get\">\n";
        echo "<label for=\"casa\">Scegli una casa:</label>";
        echo "<select name=\"casa\" id=\"casa\">";

        //Ciclo sul risultato e costruisco le tr della tabella
        for ($x = 0; $x < $nr; $x++) {
            $row = mysqli_fetch_assoc($rs);
            echo "<option value=\"" . $row['nome'] . "\">" . $row['nome'] . "</option>";
        }
        echo "</select>";

        echo "<br>";
        echo "<input type=\"submit\" value=\"Invia\" >";
        echo "</form>";
    } else {
        echo "non ci sono case nella scuola di Hogwarts";
    }

    mysqli_close($link);
    ?>
    <form action="" method="get">
        <input type="text" name="nuovaCasa" id="nome">
        <input type="submit" value="Aggiungi una nuova Casa" style="color:red;">
    </form>
    <h1 style="text-align:center"><a href="./home.php">HOME</a></h1>
</body>