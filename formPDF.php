<?php
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

$sql = "SELECT * FROM eform";

$records = mysqli_query($connect, $sql);

require("fpdf/fpdf.php");

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->cell(40, 10, "Name", 1, 0, 'C');

while($row = mysqli_fetch_array($records))
{
	$pdf->cell(40, 10, $row['email'], 1, 1, 'C');
}

$pdf->output();


?>
