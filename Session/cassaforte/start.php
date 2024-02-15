<?php
  session_start();
?>
<html>
  <body>
    <h1>Primo rotore</h1>
    <?php
      if (!isset($_SESSION["impostato"])) {
        if ((!isset($_GET["rot1"]) or $_GET["rot1"]=="") or
            (!isset($_GET["rot2"]) or $_GET["rot2"]=="") or
            (!isset($_GET["rot3"]) or $_GET["rot3"]=="")) {
            echo "<h1>Specificare i dati, please!</h1>";
            echo "<a href=\"setComb.html\">Imposta Combinazione</a>";
            die;
        }
        session_unset();
        $_SESSION["impostato"] = 1;
        $_SESSION["rot1"]= $_GET["rot1"];
        $_SESSION["rot2"]= $_GET["rot2"];
        $_SESSION["rot3"]= $_GET["rot3"];
      }
    ?>
    <form action="primo.php" method="get">
      Rotore1: <input type="number" name="rotUtente1" min="0" max="9"><br>
    <input type="submit">
</form>
  </body>
</html>
