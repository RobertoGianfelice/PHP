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

      if (!isset($_SESSION["Voti"])) {
        // Il campo voti non esiste: lo creo come un array
        $_SESSION["Voti"]=array();
      }

      if (!isset($_SESSION["Voti"][$nome])) {
        // Il campo $nome non esiste all'interno di voti: lo creo
        $_SESSION["Voti"][$nome] = array();
        echo "Aggiungo il voto in " . $materia . "<br";
      } else {
        echo "Aggiorno il voto in " . $materia . "<br";
      }

      // Recupero l'array associato a $nome all'interno di Voti in Session
      $votazione = $_SESSION["Voti"][$nome];
      // Inserisco o aggiorno la votazione
      $votazione[$materia] = $voto;
      // Inserisco la nuova votazione nella struttura voti relativa a $nome
      $_SESSION["Voti"][$nome]=$votazione;
      echo "Aggiungo il voto in " . $materia . "<br";

      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="RegistroVoti.html">HOME</a></h2>
  </body>
</html>
