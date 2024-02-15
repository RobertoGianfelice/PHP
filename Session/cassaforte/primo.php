<?php
  session_start();
?>
<html>
  <body>
    <h1>Apri primo rotore</h1>
    <?php
        if ((!isset($_GET["rotUtente1"]) or $_GET["rotUtente1"]=="")) {
            echo "<h1>Specificare i dati, please!</h1>";
            echo "<a href=\"start.php\">Specifica il valore del primo rotore da provare</a>";
            die;
        }
        if ($_SESSION["rot1"] != $_GET["rotUtente1"] ) {
            echo "<h1>Combinazione errata, sorry!</h1>";
            echo "<a href=\"start.php\">Valore del primo rotore errato</a>";
            die;
        }
        $_SESSION["rotUtente1"]=$_GET["rotUtente1"];
    ?>
    <h1>Primo rotore esatto!</h1>
    <h2>Imposta il secondo</h2>
    <form action="secondo.php" method="get">
      Rotore2: <input type="number" name="rotUtente2" min="0" max="9"><br>
    <input type="submit">
</form>
  </body>
</html>
