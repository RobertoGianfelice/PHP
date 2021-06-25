<!DOCTYPE HTML>
<html>
<head>
<!-- definisco il colore del font usato per gli errori -->
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  Nome: <input type="text" name="name" placeholder="Inserire nome">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" placeholder="Inserire una email valida">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Sito Web: <input type="text" name="website" placeholder="Inserire l'indirzzo del sito web">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Commento: <textarea name="comment" placeholder="aggiungere un commento" rows="5" cols="40"></textarea>
  <br><br>
  Genere:
  <input type="radio" name="gender" value="female">Donna
  <input type="radio" name="gender" value="male">Uomo
  <input type="radio" name="gender" value="other">Altro
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Invia">
</form>

<?php
echo "<h2>Valori inseriti:</h2>";
echo "Nome=".$name;
echo "<br>";
echo "Email=".$email;
echo "<br>";
echo "Sito web=".$website;
echo "<br>";
echo "Commento=".$comment;
echo "<br>";
echo "Genere=".$gender;
?>

</body>
</html>
