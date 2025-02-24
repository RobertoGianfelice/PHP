<?php
session_start();
?>
<html>

<body style="background-color: lightblue;">
  <?php
  //Acquisico i dati parametri di input
  $classe = $_POST["classe"];
  $nome = $_POST["nome"];
  $materia = $_POST["materia"];
  $voto = $_POST["voto"];


  if (!isset($_SESSION[$classe])) {
    // Il campo $nome non esiste all'interno di voti: lo creo
    echo "Creo " . $classe . "<br>";
  } else {
    echo "Aggiungo il voto in " . $classe . "<br>";
  }

  $_SESSION[$classe][$nome][$materia] = $voto;
  echo "<br><h2>Voto $voto Inserito nel registro di " . $nome . "</h2><br>";
  print_r($_SESSION);
  ?>
  <br>
  <h2><a href="RegistroVoti.html">HOME</a></h2>
</body>

</html>