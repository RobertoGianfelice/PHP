<?php
  session_start();
?>
<html>
  <body>
    <?php
      session_unset();
      header("location: RegistroPartite.html");
    ?>
  </body>
</html>
