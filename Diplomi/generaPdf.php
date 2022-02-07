<?php
include "varsAccessoDB.php";

function estraiNome($password,$db_host,$db_login,$db_pass,$database)
{
  //Connessione al DB
  $link=mysqli_connect( "$db_host", "$db_login","$db_pass")
  or die ("Non riesco a connettermi a <b>$db_host");

  //Selezione il DB da utilizzare
  mysqli_select_db ($link, $database)
  or die ("Non riesco a selezionare il db $database<br>");

  //Preparo la Query
  $dati= "SELECT nome
          from diplomi
          where chiave='$password';";
  //Eseguo la query
  $rs=mysqli_query ($link, $dati)
  or die ("Non riesco ad eseguire la query $dati" . mysqli_error($link));

  //Recupero il numero di righe nel cursore del risultato
  $nr = mysqli_num_rows($rs);

  if ($nr == 1){    //Ci sono delle righe nella tabella
        $row = mysqli_fetch_assoc($rs);
        $nome=$row['nome'];
        //echo "Bentornato " . $row['nome'];
  }else{  //La tabella è vuota
        //echo "Credenziali di accesso errate ";
        $nome="-";
  }

  //Chiudo la connessione
  mysqli_close ($link);
  return ($nome);
}


$fontPath= $_SERVER["DOCUMENT_ROOT"] . '/font/';
$fpdfPath=$_SERVER["DOCUMENT_ROOT"]  . '/fpdf.php';
// dichiarare il percorso dei font
define('FPDF_FONTPATH',$fontPath);
//questo file e la cartella font si trovano nella stessa directory
require($fpdfPath);

class PDF extends FPDF
{
  // Page header
  function Header()
  {
      // Logo
      $this->Image('diploma.png',10,6,280);
  }
  function dataInItaliano()
  {
    $mesi = array("Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre","Novembre", "Dicembre");
    // giorno del mese
    $numero_giorno_mese = date("j");
    // nome del mese in italiano
    $numero_mese = date("n");
    $nome_mese = $mesi[$numero_mese-1];
    // numero dell'anno
    $anno = date("Y");
    return ($numero_giorno_mese . " ". $nome_mese . " " . $anno);
  }
  // Page footer
  function Footer()
  {
      // Line break
      $this->Ln(20);
      $this->SetY(155);
      $this->SetX(65);
      // Arial italic 8
      $this->SetFont('Arial','I',18);
      // Ricavo la data in italiano
      $data=$this->dataInItaliano();
      // Stampo a video
      $this->Cell(40,10,$data,0,0,'L');
  }
}

if (!isset($_GET["password"]) or $_GET["password"]=="") {
  echo "<h1> Codice di accesso mancante</h1>";
} else {
  $password=$_GET["password"];
  $nome=estraiNome($password,$db_host,$db_login,$db_pass,$database);
  if ($nome!="-") {
    // Instanciation of inherited class
    $pdf = new PDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Times','',24);
    $pdf->SetY(96);
    $pdf->SetX(10);
    $pdf->SetTextColor(53,68,101);

    $pdf->Cell(0,10,$nome,0,1,'C');
    $pdf->Output();
  } else {
    echo "<h1> Codice di accesso al diploma errato o non esistente</h1>";
  }
}
?>
