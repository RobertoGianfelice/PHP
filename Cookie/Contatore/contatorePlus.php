<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni</title>
</head>

<body>
    <?php
    print_r($_REQUEST);
    //Recupero parametri di ingresso
    if (isset($_REQUEST["valore"]) && $_REQUEST["valore"]!="") {
        $valore=$_REQUEST["valore"];
    } else {
        $valore=0;
    }

    if (isset($_COOKIE["contatore"])) {
        $cookie_contatore = $_COOKIE["contatore"];
    }else {
        $cookie_contatore=0;
    }

    if (isset($_COOKIE["history"])) {
        $history = $_COOKIE["history"] . $_REQUEST["operazione"];
    }else {
        $history="";
    }
    
    switch ($_REQUEST["Bottone"]) {
        case "Aggiorna":
            switch ($_REQUEST["operazione"]) {
                case "+":
                    $contatore_aggiornato=$cookie_contatore+$valore;
                    break;
                case "-":
                    $contatore_aggiornato=$cookie_contatore-$valore;
                    break;
                case "*":
                    $contatore_aggiornato=$cookie_contatore*$valore;
                    break;
                case "/":
                    $contatore_aggiornato=$cookie_contatore/$valore;
                    break;
            }
            $history= $history . $valore;
            setcookie("contatore", $contatore_aggiornato, time() + 60, "/");
            echo "<h2>Contatore vale: " . $contatore_aggiornato . "</h2>";
            setcookie("history", $history, time() + 60, "/");
            echo "<h2>History vale " . $history . "</h2>";
        break;
        case "Azzera":
            setcookie("contatore", 0, time() + 60, "/");
            setcookie("history", "", time() + 60, "/");
            echo "<h2>Totale azzerato</h2>";
            echo "<h2>History azzerato</h2>";
        break;
        default:
            echo "Valore ricevuto " . $_REQUEST["Bottone"];
            break;
        
    }

    ?>
    <h3>Aggiornamento effettuato</h3>
    <a href="contatorePlus.html" >Home</a>
</body>

</html>