<?php
    session_start();
    if (isset($_SESSION["nome"])) {
        $nome=$_SESSION["nome"];
    } else {
        $nome="Anomimo";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $nome;?></title>
</head>

<body>
    <?php 
        echo "<h1>Questa è la pagina di $nome</h1>";
    ?>
    <a href="input.html">Home</a>
    <a href="dimentica.php">Oblivion</a>
</body>

</html>