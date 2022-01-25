<?php
  session_start();
?>
<html>
  <body>
    <?php
      session_unset();
      header("location: RegistroVoti.html");
    ?>
  </body>
</html>
