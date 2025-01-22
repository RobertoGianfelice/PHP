<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>

<body>
    <?php
    //Recupero parametri di ingresso
    if (isset($_REQUEST["incremento"]) && $_REQUEST["incremento"]!="") {
        $incremento=$_REQUEST["incremento"];
    } else {
        $incremento=0;
    }

    if (isset($_COOKIE["contatore"])) {
        $cookie_contatore = $_COOKIE["contatore"];
    }else {
        $cookie_contatore=0;
    }
    $contatore_aggiornato=$cookie_contatore+$incremento;
    switch ($_REQUEST["Bottone"]) {
        case "Aggiungi":
            setcookie("contatore", $contatore_aggiornato, time() + 60, "/");
            echo "<h2>Contatore vale " . $contatore_aggiornato . "</h2>";
        break;
        case "Azzera":
            setcookie("contatore", 0, time() + 60, "/");
            echo "<h2>Contatore azzerato</h2>";
        break;
        default:
            echo "Valore ricevuto " . $_REQUEST["Bottone"];
            break;
        
    }

    ?>
    <h3>Aggiornamento effettuato</h3>
    <a href="contatore.html" >Home</a>
</body>

</html>