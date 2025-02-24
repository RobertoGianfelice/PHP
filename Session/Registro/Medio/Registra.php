<?php
session_start();
?>
<html>

<body style="background-color: lightgreen">
  <?php
  //Acquisico i dati parametri di input
  $nome = $_POST["nome"];
  $materia = $_POST["materia"];
  $voto = $_POST["voto"];

  $_SESSION[$nome][$materia] = $voto;
  echo "<br>Voto Inserito nel registro di " . $nome . "<br>";
  print_r($_SESSION);
  ?>
  <br>
  <h2><a href="RegistroVoti.html">HOME</a></h2>
</body>

</html>