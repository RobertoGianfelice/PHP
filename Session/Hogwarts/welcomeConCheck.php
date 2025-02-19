<?php
  session_start();
?>
<html>
  <body>
    <?php
      if (isset($_SESSION["nome"]) and isset($_SESSION["email"])) {
        $_SESSION["nome"]=  $_GET["name"];
        $_SESSION["email"]= $_GET["email"];
        echo "<h1>Welcome " . $_GET["name"] . "<br> </h1>";
        echo "<h1>Your email address is: " . $_GET["email"] . "<br> </h1>";

        echo "<br> <a href=\"credenziali.php\">Verifica le credenziali</a>";

      } else {
        echo "<h1>Non ci sono le variabili di input definite</h1>";
      }
    ?>
  </body>
</html>
