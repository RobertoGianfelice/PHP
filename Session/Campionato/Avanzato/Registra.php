<?php
  session_start();
?>
<html>
  <body>
    <?php
      //Acquisico i dati parametri di input
      $giornata = $_GET["giornata"];
      $squadraCasa=$_GET["squadraCasa"];
      $squadraOspite=$_GET["squadraOspite"];
      $gfatti = $_GET["gfatti"];
      $gsubiti = $_GET["gsubiti"];

      $partita="$squadraCasa" . "-VS-" . "$squadraOspite";
      $risultato="$gfatti" . "-" . "$gsubiti";
      $_SESSION["$giornata"."°"]["$partita"]["risultato"]="$gfatti-$gsubiti";

      echo "<br>Partita inserita per " . $partita . "<br>";
      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroPartite.html">HOME</a></h2>
  </body>
</html>
