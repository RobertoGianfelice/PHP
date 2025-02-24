<?php
session_start();
?>
<html>

<body style="background-color: lightcoral;">
  <?php
  session_unset();
  header("location: RegistroVotiBase.html");
  ?>
</body>

</html>