<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Credenziali</title>
  </head>
  <body>
      <?php
      print("<h2>roberto</h2>");
        if (isset($_SESSION["nome"])) {
          echo " <h1> L'utente attualmente collegato e' " .
                $_SESSION["nome"] . "</h1>";
          echo "<a href=\"" . $_SESSION["nome"] . ".html\">Vai alla pagina di " . $_SESSION["nome"] ."</a>";
        } else{
          echo "<h1>Attualmente non c'e' nessun utente collegato </h1>";
        }
      ?>
    </h1>
  </body>
</html>
