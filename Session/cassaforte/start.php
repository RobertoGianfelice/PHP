<?php
session_start();
?>
<?php
include "utility.php";
?>

<html>

<body>
  <h1>Primo rotore</h1>
  <?php
  stampaArray("_REQUEST", $_REQUEST);
  stampaArray("_SESSION", $_SESSION);
  if (!isset($_SESSION["impostato"])) {
    if ((!isset($_REQUEST["rot1"]) or $_REQUEST["rot1"] == "") or
      (!isset($_REQUEST["rot2"]) or $_REQUEST["rot2"] == "") or
      (!isset($_REQUEST["rot3"]) or $_REQUEST["rot3"] == "")
    ) {
      echo "<h1>Specificare i dati, please!</h1>";
      echo "<a href=\"setComb.html\">Imposta Combinazione</a>";
      die;
    }
    session_unset();
    $_SESSION["impostato"] = 1;
    $_SESSION["tesoro"] = $_REQUEST["tesoro"];
    $_SESSION["rot1"] = $_REQUEST["rot1"];
    $_SESSION["rot2"] = $_REQUEST["rot2"];
    $_SESSION["rot3"] = $_REQUEST["rot3"];
  }
  ?>
  <form action="primo.php" method="POST">
    Rotore1: <input type="number" name="rotUtente1" min="0" max="9"><br>
    <input type="submit">
  </form>
</body>

</html>