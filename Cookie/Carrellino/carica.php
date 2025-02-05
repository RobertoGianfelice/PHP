<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acquisto</title>
</head>

<body>
    <?php
    print_r($_REQUEST);
    if (!isset($_REQUEST["taglio"])) {
        // La pagina è acceduta senza passare per il
        echo "Sorry, taglio ricarica non specificato <br>";
    } else {
        //aggiorno credito locale con eventuale credito precedente
        if (isset($_COOKIE["credito"])) {
            $creditoLocale = $_COOKIE["credito"];
        } else {
            $creditoLocale = 0;
        }
        echo "Il credito precedente vale " . $creditoLocale . "<br>";
        $creditoLocale += $_REQUEST["taglio"];
        echo "Il credito aggiorato vale " . $creditoLocale . "<br>";
        setcookie("credito", $creditoLocale, time() + 86400 * 30);
    }

    ?>
    <!-- Rimando alla pagina di scelta taglio ricarica -->
    <a href="carica.html">Go Home</a>
    <br>
    <a href="catalogo.html">Go Catalogo</a>

</body>

</html>