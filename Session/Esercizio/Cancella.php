<?php
  session_start();
?>
<html>
  <body>
    <?php
      session_unset();
      header("location: Menu.html");
    ?>
  </body>
</html>