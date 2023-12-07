<?php
  session_start();
?>
<html>
  <body>
    <?php

    # Definizioni costanti di lavoro
    define('DIR_IMG', './IMG');

	#funzione per verificare la validità del file
	# e se tutto corretto salvare il file nella directory del server
	function checkFileAndSave($fileName,$cf) {
        # verifica sul tipo del file e dimensione massima
        if ((($_FILES["$fileName"]["type"] == "image/gif")
        || ($_FILES["$fileName"]["type"] == "image/jpeg")
        || ($_FILES["$fileName"]["type"] == "image/png")
        || ($_FILES["$fileName"]["type"] == "image/pjpeg"))
        && ($_FILES["$fileName"]["size"] < 30000000)) {
            # verifica errori di upload
            if ($_FILES["$fileName"]["error"] > 0){
              echo "Return Code: " . $_FILES["$fileName"]["error"] . "<br />";
            }else {
            #procedura di salvataggio 
            # verifica esistenza del file nella direcory del server per evitare sovrascritture
            if (file_exists(DIR_IMG . $_FILES["$fileName"]["name"])){
              echo $_FILES["$fileName"]["name"] . " already exists. ";
            } else{
              move_uploaded_file($_FILES["$fileName"]["tmp_name"],
              DIR_IMG . "/" . $cf . ".jpg");
              echo "New Stored in: " . DIR_IMG . "/" . $cf . ".jpg";
            }
            }
          } else {
            echo "Invalid file";
          }
      }
  
      //Acquisico i dati parametri di input
      $cf = $_REQUEST["cf"];
      $nome=$_REQUEST["nome"];
      checkFileAndSave("foto",$cf);

      $persona["nome"]=$nome;
      $foto=DIR_IMG . "/" . $cf . ".jpg";
      $persona["foto"]=$foto;
      $_SESSION[$cf]=$persona;

      echo "<br>Persona inserita  <br>";
      print_r($_SESSION);
    ?>
    <br>
    <h2><a href="Menu.html">HOME</a></h2>
  </body>
</html>