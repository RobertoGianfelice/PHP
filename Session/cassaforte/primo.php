<?php
session_start();
?>
<?php
include "utility.php";
?>
<html>

<body>
  <h1>Apri primo rotore</h1>
  <?php
  stampaArray("_REQUEST", $_REQUEST);
  stampaArray("_SESSION", $_SESSION);

  if ((!isset($_REQUEST["rotUtente1"]) or $_REQUEST["rotUtente1"] == "")) {
    echo "<h1>Specificare i dati, please!</h1>";
    echo "<a href=\"start.php\">Specifica il valore del primo rotore da provare</a>";
    die;
  }
  if ($_SESSION["rot1"] != $_REQUEST["rotUtente1"]) {
    echo "<h1>Combinazione errata, sorry!</h1>";
    echo "<a href=\"start.php\">Valore del primo rotore errato</a>";
    die;
  }
  $_SESSION["rotUtente1"] = $_REQUEST["rotUtente1"];
  ?>
  <h1>Primo rotore esatto!</h1>
  <h2>Imposta il secondo</h2>
  <form action="secondo.php" method="get">
    <label for="rotore">Rotore2</label>
    <input type="number" id="rotore" name="rotUtente2" min="0" max="9"><br>
    <input type="submit">
  </form>
</body>:

</html>