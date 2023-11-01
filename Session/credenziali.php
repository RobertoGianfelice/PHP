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
        if (isset($_SESSION["nome"])) {
          echo " <h1> L'utente attualmente collegato e' " .
                $_SESSION["nome"] . "</h1>";
          switch ($_SESSION["nome"]) {
            case "Harry":
            case "Hermione":
            case "Ron":
              echo "Utente conosciuto";
              echo "<a href=\"" . $_SESSION["nome"] . ".html\">Vai alla pagina di " . $_SESSION["nome"] ."</a>";
              break;
            default:
              echo "Utente sconosciuto<br>";
              echo "<a href=\"input.html\"> Riprova </a>";
            }
        } else{
          echo "<h1>Attualmente non c'e' nessun utente collegato </h1>";
        }
      ?>
    </h1>
  </body>
</html>
