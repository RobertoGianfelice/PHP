<?php

$fontPath= $_SERVER["DOCUMENT_ROOT"] . '/gianfelice/font/';
$fpdfPath=$_SERVER["DOCUMENT_ROOT"]  . '/gianfelice/fpdf.php';
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

if (!isset($_REQUEST["nome"]) or $_REQUEST["nome"]=="" or
    !isset($_REQUEST["cognome"]) or $_REQUEST["cognome"]=="" ) {
  echo "<h1> Dati di input mancanti, riprova</h1>";
  echo "<a href=\"./Input.html\">Clicca qui</a>";
} else {
  $nome=$_REQUEST["nome"] . " " . $_REQUEST["cognome"];
  // Instanciation of inherited class
  $pdf = new PDF('L','mm','A4');
  $pdf->AddPage();
  $pdf->SetFont('Times','',24);
  $pdf->SetY(96);
  $pdf->SetX(10);
  $pdf->SetTextColor(53,68,101);

  $pdf->Cell(0,10,$nome,0,1,'C');
  $pdf->Output();
}
?>
