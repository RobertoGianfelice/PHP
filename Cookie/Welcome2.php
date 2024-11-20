<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momorizza cookie</title>
</head>

<script>
    let secondi=30;
    function parti() {
      myTime = setInterval(myTimer ,1000);
    }

    function myTimer() {
      secondi-=1;
      if (secondi==0) {
        clearTimeout(myTime);
      } else {
        document.getElementById("secondi").innerHTML=secondi;
      }
    }
</script>
<body onLoad='parti()'>

    <?php
        $cookie_name="utente";
    
        if (!isset($_COOKIE[$cookie_name])) {
            echo "<h3>Non ti conosco</h3> <br>";
            echo "<a href=\"Registrati.html\">Identificati</a>";
        } else {
            echo "<h3 id='secondi' >30</h3>";
            echo "Ciao $_COOKIE[$cookie_name] " . "-" . $_COOKIE["counter"] . "<br>";
            setcookie("counter",$_COOKIE["counter"]+1,time()+30,"/");

            echo "<a href=\"Logout.php\">Sganciati</a>";
        }
    ?>
    
</body>
</html>