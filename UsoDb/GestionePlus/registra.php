<?php
include "vars.php";


#funzione per verificare la validità del file
# e se tutto corretto salvare il file nella directory del server
function checkFileAndSave($fileName)
{
    # verifica sul tipo del file e dimensione massima
    if ((($_FILES["$fileName"]["type"] == "image/gif")
            || ($_FILES["$fileName"]["type"] == "image/jpeg")
            || ($_FILES["$fileName"]["type"] == "image/png")
            || ($_FILES["$fileName"]["type"] == "image/pjpeg"))
        && ($_FILES["$fileName"]["size"] < 30000000)
    ) {
        # verifica errori di upload
        if ($_FILES["$fileName"]["error"] > 0) {
            echo "Return Code: " . $_FILES["$fileName"]["error"] . "<br />";
        } else {
            #procedura di salvataggio
            echo "</br>----------</br>Upload: " . $_FILES["$fileName"]["name"] . "<br />";
            echo "Type: " . $_FILES["$fileName"]["type"] . "<br />";
            echo "Size: " . ($_FILES["$fileName"]["size"] / 1024) . " Kb<br />";
            echo "Temp userfile: " . $_FILES["$fileName"]["tmp_name"] . "<br />";

            # verifica esistenza del file nella direcory del server per evitare sovrascritture
            if (file_exists(DIR_IMG . $_FILES["$fileName"]["name"])) {
                echo $_FILES["$fileName"]["name"] . " already exists. ";
            } else {
                move_uploaded_file(
                    $_FILES["$fileName"]["tmp_name"],
                    DIR_IMG . "/" . $_FILES["$fileName"]["name"]
                );
                echo "New Stored in: " . DIR_IMG . "/" . $_FILES["$fileName"]["name"];
            }
        }
    } else {
        echo "Invalid file";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restrazione utente in DB</title>
</head>

<body>
    <h1>Esecuzione registrazione su DB</h1>
    <?php
    if (isset($_POST["name"])) {
        $nome = $_POST["name"];
        $cognome = $_POST["cognome"];
        $email = $_POST["email"];
        $nick = $_POST["nick"];
        $passwd = md5($_POST["passwd"]);


        if (isset($_FILES["avatar"])) {
            checkFileAndSave("avatar");
            $nomeImg = $_FILES["avatar"]["name"];
        } else {
            $nomeImg = "NULL";
        }

        $link = mysqli_connect(
            $db_host,
            $db_login,
            $db_pass,
            $db_name
        ) or die("Attenzione: problemi connessione db");

        $dati = "INSERT INTO utenti (id, nome, cognome, email, nick, passwd, avatar)
                   VALUES (NULL,
                            '$nome',
                            '$cognome',
                            '$email',
                            '$nick',
                            '$passwd',
                            '$nomeImg'
                           );";
        echo "$dati";
        mysqli_query($link, $dati)
            or die("Problemi, Problemi Problemi: $dati");
        echo "Utente registrato";
        mysqli_close($link);
    } else {
        echo "Mancano i parametri di input";
    }

    ?>
    <h2><a href="menu.html">HOME</a></h2>

</body>

</html>