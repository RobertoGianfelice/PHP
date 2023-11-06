<?php
  session_start();
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      $classe=$_GET["classe"];
      $nome=$_GET["nome"];
      $materia = $_GET["materia"];
      $voto = $_GET["voto"];

      $_SESSION[$nome][$materia]=$voto;
      echo "<br>Voto Inserito nel registro di ". $nome . "<br>";
      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroVoti.html">HOME</a></h2>
  </body>
</html>
