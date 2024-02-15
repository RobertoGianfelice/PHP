<?php
  session_start();
?>
<html>
  <body>
    <h1>Apri secondo rotore</h1>
    <?php
        if (!isset($_SESSION["rotUtente1"]) or 
            (!isset($_GET["rotUtente2"]) or $_GET["rotUtente2"]=="")) {
            echo "<h1>Specificare i dati, please!</h1>";
            echo "<a href=\"start.php\">Specifica il valore del secondo rotore da provare</a>";
            die;
        }
        if ($_SESSION["rot2"] != $_GET["rotUtente2"] ) {
            unset($_SESSION["rotUtente1"]);
            echo "<h1>Combinazione errata, sorry!</h1>";
            echo "<a href=\"start.php\">Riprova, sarai più fortunato !?</a>";
            die;
        }
        $_SESSION["rotUtente2"]=$_GET["rotUtente2"];
    ?>
    <h1>Secondo rotore esatto!</h1>
    <h2>Imposta il terzo</h2>
    <form action="terzo.php" method="get">
      Rotore3: <input type="number" name="rotUtente3" min="0" max="9"><br>
    <input type="submit">
</form>
  </body>
</html>