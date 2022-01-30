<?php
  session_start();
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      $nome=$_GET["nome"];
      $voto = $_GET["voto"];


      if (!isset($_SESSION[$nome])) {
        // Il campo $nome non esiste all'interno di voti: lo creo
        echo "Aggiungo il voto <br>";
      } else {
        echo "Aggiorno il voto <br>";
      }

      // Inserisco la nuova votazione nella SESSION relativa a $nome
      $_SESSION[$nome]=$voto;
      echo "Aggiungo il voto <br>";

      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroVotiBase.html">HOME</a></h2>
  </body>
</html>
