<?php
  session_start();
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      $classe=$_POST["classe"];
      $nome=$_POST["nome"];
      $materia = $_POST["materia"];
      $voto = $_POST["voto"];


      if (!isset($_SESSION[$classe])) {
        // Il campo $nome non esiste all'interno di voti: lo creo
        echo "Creo " . $classe . "<br>";
      } else {
        echo "Aggiungo il voto in " . $classe . "<br>";
      }

      $_SESSION[$classe][$nome][$materia]=$voto;
      echo "<br>Voto Inserito nel registro di ". $nome . "<br>";
      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroVoti.html">HOME</a></h2>
  </body>
</html>
