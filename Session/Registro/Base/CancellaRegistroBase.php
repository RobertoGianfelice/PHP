<?php
  session_start();
?>
<html>
  <body>
    <?php
      session_unset();
      header("location: RegistroVotiBase.html");
    ?>
  </body>
</html>
