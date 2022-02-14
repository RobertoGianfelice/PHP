<?php
  session_start();
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      $nome=$_GET["nome"];
      $materia = $_GET["materia"];
      $voto = $_GET["voto"];

      if (!isset($_SESSION["Voti"][$nome])) {
        // Il campo $nome non esiste all'interno di voti: lo creo
        echo "Aggiungo il voto in " . $materia . "<br>";
      } else {
        echo "Aggiorno il voto in " . $materia . "<br>";
      }

      $_SESSION["Voti"][$nome][$materia]=$voto;
      echo "<br>Voto Inserito nel registro di ". $nome . "<br>";
      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroVoti.html">HOME</a></h2>
  </body>
</html>
