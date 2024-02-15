<?php
  session_start();
?>
<html>
  <body>
    <h1>Apri terzo rotore</h1>
    <?php
        if (!isset($_SESSION["rotUtente1"]) or 
            !isset($_SESSION["rotUtente2"]) or
            (!isset($_GET["rotUtente3"]) or $_GET["rotUtente3"]=="")) {
            echo "<h1>Specificare i dati, please!</h1>";
            echo "<a href=\"start.php\">Specifica il valore del primo rotore da provare</a>";
            die;
        }
        if ($_SESSION["rot3"] != $_GET["rotUtente3"] ) {
            unset($_SESSION["rotUtente1"]);
            unset($_SESSION["rotUtente2"]);

            echo "<h1>Combinazione errata, sorry!</h1>";
            echo "<a href=\"start.php\">Riprova, sarai più fortunato !?</a>";
            die;
        }
        session_destroy();
    ?>
    <h1>Terzo rotore esatto!</h1>
    <h2>Cassaforte aperta</h2>
    <a href="setComb.html">Clicca per riprovare</a>
</form>
  </body>
</html>