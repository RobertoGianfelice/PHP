<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oblivion</title>
</head>
<body style="background-color:red;">
    <?php
        session_destroy();
    ?>
    <h1>Non ricordo più nulla</h1>
    <a href="input.html">Torna a casa</a>
    
</body>
</html>