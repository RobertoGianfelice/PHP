<?php
session_start();
?>
<html>

<body style="background-color: lightgreen">
  <?php
  session_unset();
  header("location: RegistroVoti.html");
  ?>
</body>

</html>