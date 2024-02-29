<html>

<head>
    <title>Memorizza immagine</title>
</head>

<body>
    <?php   //dati accesso al db
    include "vars.php";
    include "notificheUtente.php";
    ?>
    <H1> Memorizzo il file sul server</H1><BR>
    <?php
    # Definizioni costanti di lavoro
    define('DIR_IMG', 'Images');

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
                echo "</br>----------</br>";

                # verifica esistenza del file nella direcory del server per evitare sovrascritture
                if (file_exists(DIR_IMG . $_FILES["$fileName"]["name"])) {
                    echo $_FILES["$fileName"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file(
                        $_FILES["$fileName"]["tmp_name"],
                        DIR_IMG . "/" . $_FILES["$fileName"]["name"]
                    );
                    notifyToUser( "New Stored in: " . DIR_IMG . "/" . $_FILES["$fileName"]["name"]);
                }
            }
        } else {
            notifyToUser( "Invalid file");
        }
    }

    if (isset($_FILES["toBeUploaded"]) and $_FILES["toBeUploaded"]["name"] != "") {
        checkFileAndSave("toBeUploaded");
        $nomeImg = $_FILES["toBeUploaded"]["name"];


        //Connessione al DB
        echo "<p>connetto al db...</p>";
        $link = mysqli_connect("$db_host", "$db_login", "$db_pass", $database)
            or die("Non riesco a connettermi al db $database su <b>$db_host");

        //Preparo la Query
        $dati = " INSERT INTO immagini VALUES (
					    '$nomeImg');";
        //Eseguo la query
        mysqli_query($link, $dati)
            or die("Non riesco ad eseguire la query $dati" . mysqli_error($link));

        notifyToUser( " <CENTER><H1>Immagine archiviata con successo </CENTER> ");

        //Chiudo la connessione
        mysqli_close($link);
    } else {
        notifyToUser( "Nome file non specificato. Non è stata carica alcuna immagine nel db");
    }

    ?>
    <br>
    <a href="caricaImg.html">Torna alla pagina di caricamento</a>

</body>

</html>