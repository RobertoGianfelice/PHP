<?php
session_start();
?>
<?php
#Verifico i parametri di input e di sessione
if (isset($_GET["casa"]) and $_GET["casa"] != "") {
  $casa = $_GET["casa"];
  $_SESSION["casa"] = $casa;
  unset($_SESSION["id_casa"]); #Se ho aggioranto il nome della casa nella session
                               # DEVO ricalcolare l'id della casa
} elseif (isset($_SESSION["casa"]) and ($_SESSION["casa"] != "")) {
  $casa = $_SESSION["casa"];
} else {
  echo "<h1 style=\"text-align:center\"><a href=\"./home.php\">HOME</a></h1>";
  die("Mancano i parametri di input");
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <?php
  echo "<title>Casa:" . $casa . "</title>";
  ?>
</head>

<body>
  <?php
  include "accessodb.php";
  ?>
  <h1 style="text-align: center;"><?php echo $casa; ?></h1>

  <?php
  $link = mysqli_connect("$db_host", "$db_login", "$db_pass", "$db_name")
    or die("Non riesco a connettermi a <b>$db_host");

  if (isset($_GET["nuovoStudente"]) and $_GET["nuovoStudente"] != "") {
    if (!isset($_SESSION["id_casa"]) or $_SESSION["id_casa"] == "") {
      # Recupero l'id della casa
      $dati = "select id_casa from LeCase where nome=\"$casa\";";
      $rs = mysqli_query($link, $dati)
        or die("Non riesco ad eseguire la query $dati");
      $nr = mysqli_num_rows($rs);
      if ($nr != 0) {    //Ci sono delle righe nella tabella
        $row = mysqli_fetch_assoc($rs);
        $id_casa = $row["id_casa"];
        $_SESSION["id_casa"] = $row['id_casa'];
      } else {
        echo "<h2>Ops!!! Problemi nel recuperare i dati della casa $casa</h2>";
        die();
      }
    }
    $nuovoStudente = $_GET["nuovoStudente"];
    $id_casa = $_SESSION["id_casa"];
    $dati = " INSERT into studenti values(NULL, \"$nuovoStudente\",$id_casa)";
    mysqli_query($link, $dati)
      or die("Non riesco ad eseguire la query $dati");
  }
  //Preparo la Query
  $dati = " SELECT studenti.nome, studenti.id_casa
                 from studenti, LeCase
                 where studenti.id_casa=LeCase.id_casa and Lecase.nome=\"$casa\";";

  //Eseguo la query
  $rs = mysqli_query($link, $dati)
    or die("Non riesco ad eseguire la query $dati");

  //Recupero il numero di righe nel cursore del risultato
  $nr = mysqli_num_rows($rs);

  if ($nr != 0) {    //Ci sono delle righe nella tabella
    //Preparo la struttura della tabella
    echo "<H1 style=\"font-size: 200%; color:blue;text-align:center\">Studenti in corso </H1><BR>\n";
    echo "<center>\n";
    echo "<table border=1 >\n";
    echo "  <th>Studente</th>\n";
    //Ciclo sul risultato e costruisco le tr della tabella
    for ($x = 0; $x < $nr; $x++) {
      $row = mysqli_fetch_assoc($rs);
      echo "<tr>\n";
      echo "<td>" . $row['nome'] . "</td>\n";
      echo "</tr>\n";
      $_SESSION["id_casa"] = $row['id_casa'];
    }

    echo "</table>\n";
    echo "</center>\n";
  } else {  //La tabella è vuota
    echo "Nessun alunno trovato!";
  }

  //Chiudo la connessione
  mysqli_close($link);
  ?>

  <form action="" method="get">
    <input type="text" name="nuovoStudente" id="nome">
    <input type="submit" value="Aggiungi Studente alla Casa" style="color:red;">
  </form>
  <h1 style="text-align:center"><a href="./home.php">HOME</a></h1>


</body>

</html>