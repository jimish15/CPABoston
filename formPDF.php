<?php
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

$getid = $_GET['formPDF'];

$sql = "SELECT * FROM eform WHERE `id` = '$getid'";

$records = mysqli_query($connect, $sql);

require("fpdf/fpdf.php");

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','',12);
$pdf->Image('cboston.png',130,10,70,10);
$pdf->Image('cityofbostonlogo.png',9,6,70,17);
$pdf->cell(10, 10, "", 0, 1, 'C');
$pdf->cell(10, 10, "", 0, 1, 'C');
$pdf->cell(0, 10, "CPA Boston - Eligibility & Information Form", 0, 1, 'C');
$pdf->cell(0, 5, "This Eligibility Form is required to apply for Community Preservation funds for affordable", 0, 1, 'C');
$pdf->cell(0, 4, "housing, historic preservation, and parks, and open space, and outdoor recreation captial projects.", 0, 1, 'C');

$pdf->cell(10, 5, "", 0, 1, 'C');

while($row = mysqli_fetch_array($records))
{
	$pdf->cell(0, 10, "Email:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['email'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "SUMMARY DETAILS", 0, 1, 'L');

	$pdf->cell(0, 7, "Project Name:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['projectName'], 1, 1, 'L');

	$pdf->cell(0, 10, "Short Project Description:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['shortProjectDescription'], 1, 1, 'L');
	
	$pdf->cell(0, 10, "Project Street Address:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['projectStreetAddress'], 1, 1, 'L');

	$pdf->cell(0, 10, "Project Neighborhood:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['projectNeighborhood'], 1, 1, 'L');

	

	$pdf->cell(0, 10, "Project Zip-Code:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['projectZip'], 1, 1, 'L');

	$pdf->cell(0, 10, "Applicant Organization:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['applicantOrg'], 1, 1, 'L');

	$pdf->cell(0, 10, "Contact Person & Title:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['contactPersonTitle'], 1, 1, 'L');

	$pdf->cell(0, 10, "Phone Number:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['phoneNumber'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "FUNDING REQUEST", 0, 1, 'L');

	$pdf->cell(0, 7, "Amount Requested:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['amountRequested'], 1, 1, 'L');

	$pdf->cell(0, 10, "Total Project Cost:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['totalProjectCost'], 1, 1, 'L');

	$pdf->cell(0, 10, "Why is Funding Needed:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['fundingNeed'], 1, 1, 'L');

	$pdf->cell(0, 10, "Other Funding Sources or in-kind support(not whether recieved, decision pending, or will apply):", 0, 1, 'L');
	$pdf->cell(0, 10, $row['fundingSources'], 1, 1, 'L');

	$pdf->cell(0, 10, "Project Funding Request:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['checkfundingRequest'], 1, 1, 'L');

	$pdf->cell(0, 10, "What do you hope to do? Describe construction or design details:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['constructionDesign'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "PROPERTY OWNERSHIP & CONTROL", 0, 1, 'L');

	$pdf->cell(0, 7, "Who is the property owner and manager?", 0, 1, 'L');
	$pdf->cell(0, 10, $row['propertyOwner'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "PROJECT TIMELINE", 0, 1, 'L');

	$pdf->cell(0, 7, "Expected Start Date:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['expectedStartDate'], 1, 1, 'L');

	$pdf->cell(0, 10, "Expected Completion Date:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['expectedCompleteDate'], 1, 1, 'L');

	$pdf->cell(0, 10, "Category (Pick the one that best describes your project):", 0, 1, 'L');
	$pdf->cell(0, 10, $row['pickCategory'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "PARKS, OPEN SPACE & OUTDOOR RECREATION", 0, 1, 'L');

	$pdf->cell(0, 10, "Is your project? (Check all that apply):", 0, 1, 'L');
	$pdf->cell(0, 10, $row['yourProject'], 1, 1, 'L');

	$pdf->cell(0, 10, "Who are the intended users of your proposed project?", 0, 1, 'L');
	$pdf->cell(0, 10, $row['intendedUsers'], 1, 1, 'L');

	$pdf->cell(0, 15, "If your open space will not be open to the general public, please explain:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['generalPublic'], 1, 1, 'L');

	$pdf->cell(0, 10, "Do you have a master plan or management plan:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['masterPlan'], 1, 1, 'L');

	$pdf->cell(0, 10, "Who will do ongoing maintenance after project completion?", 0, 1, 'L');
	$pdf->cell(0, 10, $row['maintenance'], 1, 1, 'L');

	$pdf->cell(0, 10, "Is your project part of a historic landscape?", 0, 1, 'L');
	$pdf->cell(0, 10, $row['historicLandscape'], 1, 1, 'L');

	$pdf->cell(0, 10, "Does your project include public art?", 0, 1, 'L');
	$pdf->cell(0, 10, $row['publicArt'], 1, 1, 'L');

}

$pdf->cell(10, 10, "", 0, 1, 'C');
$pdf->cell(10, 10, "", 0, 1, 'C');
$pdf->cell(0, 5, "Thank you! We will let you know within a few weeks of submission if your project is eligible. Fall applications", 0, 1, 'L');
$pdf->cell(0, 4, "will be availale on www.boston.gov/cpa by August 15, 2019 and will be due on Friday, September 28, 2019", 0, 1, 'L');
$pdf->cell(0, 5, "", 0, 1, 'L');
$pdf->cell(0, 10, "For help and questions, contact us!", 0, 1, 'L');
$pdf->cell(0, 5, "", 0, 1, 'L');
$pdf->cell(0, 7, "- christine.poff@boston.gov / 617-635-0277", 0, 1, 'L');
$pdf->cell(0, 7, "- thadine.brown@boston.gov / 617-635-0545", 0, 1, 'L');
$pdf->cell(0, 7, "- allyson.quinn@boston.gov / 617-635-4637", 0, 1, 'L');

$pdf->output();


?>
