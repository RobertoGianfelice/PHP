<?php
session_start();
?>
<html>

<body style="background-color: lightblue;">
  <?php
  session_unset();
  header("location: RegistroVoti.html");
  ?>
</body>

</html>