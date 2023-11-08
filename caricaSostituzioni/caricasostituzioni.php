<html>

<head>
  <title>Carica Sostituzioni</title>
</head>

<body>
  <img src="./Img/LogoScuolaVettoriale.png" alt="Logo della scuola" width="300px">
  <H1> Pubblica file sostituzioni</H1><BR>

  <?php
  if ($_POST["password"] != "Antipresidenza") {
    echo "Password Errata";
    echo "<br><a href='index.html'>Torna alla pagina di caricamento</a>";
    die;
  }
  if (isset($_FILES["fileToUpload"])) {
    $target_dir = "Sostituzioni/";
    $target_file = "../sostituzioni.pdf";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    // Allow certain file formats
    if ($fileType != "pdf") {
      echo "Attenzione, il file non è in formato pdf: il file non verrà caricato.";
      echo "<br><a href='index.html'>Torna alla pagina di caricamento</a>";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Il file è stato caricato.";
        echo "<br><br><a href='http://109.239.246.86/totem/' target='_blank'>Vai alla pagina del totem</a>";
      } else {
        echo "Attenzione: errore nel caricamento del file.";
      }
    }
  } else {
    echo "File non specificato";
    echo "<br><a href='index.html'>Torna alla pagina di caricamento</a>";

  }
  ?>

</body>

</html>