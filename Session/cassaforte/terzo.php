<?php
session_start();
?>
<?php
include "utility.php";
?>

<html>

<body>
  <h1>Apri terzo rotore</h1>
  <?php
  stampaArray("_REQUEST", $_REQUEST);
  stampaArray("_SESSION", $_SESSION);

  if (
    !isset($_SESSION["rotUtente1"]) or
    !isset($_SESSION["rotUtente2"]) or
    (!isset($_REQUEST["rotUtente3"]) or $_REQUEST["rotUtente3"] == "")
  ) {
    echo "<h1>Specificare i dati, please!</h1>";
    echo "<a href=\"start.php\">Specifica il valore del primo rotore da provare</a>";
    die;
  }
  if ($_SESSION["rot3"] != $_REQUEST["rotUtente3"]) {
    unset($_SESSION["rotUtente1"]);
    unset($_SESSION["rotUtente2"]);

    echo "<h1>Combinazione errata, sorry!</h1>";
    echo "<a href=\"start.php\">Riprova, sarai più fortunato !?</a>";
    die;
  }
  echo "<h1>Combinazione esatta: Cassaforte aperta</h1>";
  echo "<h2>La cassaforte contiene...</h2>";
  if (!isset($_SESSION["tesoro"]) or $_SESSION["tesoro"] == "") {
    echo "<cite>NULLA</cite>";
  } else {
    echo "<cite>-" . $_SESSION["tesoro"] . "-</cite>";
  }
  session_destroy();
  ?>
  <br><br><a href="setComb.html">Clicca per riprovare</a>
  </form>
</body>

</html>