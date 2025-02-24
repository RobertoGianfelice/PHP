<?php
session_start();
?>
<html>

<body style="background-color: lightcoral;">
  <?php
  //Acquisico i dati parametri di input
  if (
    !isset($_POST["nome"]) || $_POST["nome"] == "" ||
    !isset($_POST["voto"]) || $_POST["voto"] == ""
  ) {
    echo "<h2>Dati di input mancanti </h2>";
  } else {
    $nome = $_POST["nome"];
    $voto = $_POST["voto"];

    if (!isset($_SESSION[$nome])) {
      // Il campo $nome non esiste all'interno di voti: lo creo
      echo "Aggiungo il voto <br>";
    } else {
      echo "Aggiorno il voto <br>";
    }

    // Inserisco la nuova votazione nella SESSION relativa a $nome
    $_SESSION[$nome] = $voto;
    echo "Aggiunto il voto <br>";

    print_r($_SESSION);
  }
  ?>
  <br>
  <h2><a href="RegistroVotiBase.html">HOME</a></h2>
</body>

</html>