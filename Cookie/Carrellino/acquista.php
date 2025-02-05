<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caricamento credito</title>
</head>

<body>
    <?php
    print_r($_REQUEST);
    echo "</br>";
    if (!isset($_REQUEST["articolo"]) or 
         !isset ($_REQUEST["quantity"])) {
        // La pagina è acceduta senza passare per il
        echo "Sorry, articolo o quantità non specificati <br>";
    } else {
        //aggiorno credito locale con eventuale credito precedente
        if (isset($_COOKIE["credito"])) {
            $creditoLocale = $_COOKIE["credito"];
            $carrello=$_REQUEST["articolo"]*$_REQUEST["quantity"];
            if ($creditoLocale >= $carrello) {
                echo "Il credito attuale vale " . $creditoLocale . "<br>";
                $creditoLocale -= $carrello;
                echo "Il credito aggiorato vale " . $creditoLocale . "<br>";
                setcookie("credito", $creditoLocale, time() + 86400 * 30);
            } else {
                echo "Sorry: credito non sufficiente </br>";
            }
        } else {
            echo "Sorry: credito non presente </br>";
        }
    }
    ?>
    <!-- Rimando alla pagina di scelta taglio ricarica -->
    <a href="carica.html">Go Home</a>
    <br>
    <a href="catalogo.html">Go Catalogo</a>
</body>

</html>
