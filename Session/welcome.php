<?php
  session_start();
?>
<html>
  <body>
    <h1>Welcome <?php echo $_REQUEST["name"]; ?><br> </h1>
    <h1>Your email address is: <?php echo $_REQUEST["email"]; ?></h1>

    <?php
      $_SESSION["nome"]=  $_REQUEST["name"];
      $_SESSION["email"]= $_REQUEST["email"];
    ?>
    <br>
    <?php
      $url="credenziali.php";
      echo "<a href=\"" . $url . "\">Verifica le credenziali</a>";
    ?>
  </body>
</html>
