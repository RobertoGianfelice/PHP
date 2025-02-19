<?php
session_start();
?>
<?php
include "utility.php";
?>

<html>

<body>
  <h1>Apri secondo rotore</h1>
  <?php
  stampaArray("_REQUEST", $_REQUEST);
  stampaArray("_SESSION", $_SESSION);

  if (
    !isset($_SESSION["rotUtente1"]) or
    (!isset($_REQUEST["rotUtente2"]) or $_REQUEST["rotUtente2"] == "")
  ) {
    echo "<h1>Specificare i dati, please!</h1>";
    echo "<a href=\"start.php\">Specifica il valore del secondo rotore da provare</a>";
    die;
  }
  if ($_SESSION["rot2"] != $_REQUEST["rotUtente2"]) {
    unset($_SESSION["rotUtente1"]);
    echo "<h1>Combinazione errata, sorry!</h1>";
    echo "<a href=\"start.php\">Riprova, sarai più fortunato !?</a>";
    die;
  }
  $_SESSION["rotUtente2"] = $_REQUEST["rotUtente2"];
  ?>
  <h1>Secondo rotore esatto!</h1>
  <h2>Imposta il terzo</h2>
  <form action="terzo.php" method="POST">
    <label for="rotore">Rotore3:</label>
    <input type="number" id="rotore" name="rotUtente3" min="0" max="9"><br>
    <input type="submit">
  </form>
</body>

</html>