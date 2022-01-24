<?php
  session_start();
?>
<html>
  <body>
    <h1>Welcome <?php echo $_GET["name"]; ?><br> </h1>
    <h1>Your email address is: <?php echo $_GET["email"]; ?></h1>

    <?php
      $_SESSION["nome"]=  $_GET["name"];
      $_SESSION["email"]= $_GET["email"];
    ?>
    <br>
    <a href="credenziali.php">Verifica le credenziali</a>
  </body>
</html>
