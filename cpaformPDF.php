<?php
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

$getid = $_GET['cpaformPDF'];

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
$pdf->cell(0, 10, "CPA Boston - Fall 2019 Application", 0, 1, 'C');
$pdf->cell(0, 5, "Please read the application overview prior to completing this form. It will serve as a guide", 0, 1, 'C');
$pdf->cell(0, 4, "and has lots of helpful information.", 0, 1, 'C');

$pdf->cell(10, 5, "", 0, 1, 'C');

while($row = mysqli_fetch_array($records))
{
	$pdf->cell(0, 10, "Email:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cEmail'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "COVER SHEET", 0, 1, 'L');

	$pdf->cell(0, 7, "Project Name:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cProjectName'], 1, 1, 'L');

	$pdf->cell(0, 10, "Project Street Address & Neighborhood:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cProjectNeighborhood'], 1, 1, 'L');
	
	$pdf->cell(0, 10, "Project Zip-Code:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cProjectZip'], 1, 1, 'L');

	$pdf->cell(0, 10, "Applicant Organization:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cApplicantOrg'], 1, 1, 'L');

	

	$pdf->cell(0, 10, "Contact Person & Title:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cContactPersonTitle'], 1, 1, 'L');

	$pdf->cell(0, 10, "Phone Number:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cPhoneNumber'], 1, 1, 'L');

	$pdf->cell(0, 10, "Category (Pick the one that best describes your project):", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cPickCategory'], 1, 1, 'L');

	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "FUNDING REQUEST", 0, 1, 'L');

	$pdf->cell(0, 7, "Amount Requested:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cAmountRequested'], 1, 1, 'L');

	$pdf->cell(0, 10, "Total Project Cost:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cTotalProjectCost'], 1, 1, 'L');

	$pdf->cell(0, 10, "Short Project Description - For The CPA Webpages:", 0, 1, 'L');
	$pdf->cell(0, 10, $row['cShortProjectDescription2'], 1, 1, 'L');



	$pdf->cell(0, 3, "", 0, 1, 'L');
	$pdf->cell(0, 10, "QUESTIONS", 0, 1, 'L');

	$pdf->cell(0, 13, "Please limit your answers to no more than 250 words. If you go beyond that, you risk having it cut.", 0, 1, 'L');



	$pdf->cell(0, 7, "1. Project Summary & Anticipated Outcome: Information about your organization is not needed here, just", 0, 1, 'L');
	$pdf->cell(0, 5, "describe what you hope to do(e.g. build 10 units of affordable housing or repair roof) and why this project", 0, 1, 'L');
	$pdf->cell(0, 5, "will make a difference - the outcome.", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cProjectSummary'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "2. Needs Assessment: Why do you need the funds? How bad are the existing conditions? What are the", 0, 1, 'L');
	$pdf->cell(0, 5, "neighborhood challenges you hope to address?", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cNeedsAssessment'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "3. Project Implementation / Timeline: Divide your project into three milestone that makes sense to you.", 0, 1, 'L');
	$pdf->cell(0, 5, "Attach anticipated completion dates for each stage and cost.", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cProjectTimeline'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "4. Experience & Capacity: Convince us that you have the ability to carry out the steps and oversight", 0, 1, 'L');
	$pdf->cell(0, 5, "needed to complete the project. How have you been a good steward or landlord? Have you done projects", 0, 1, 'L');
	$pdf->cell(0, 5, "like this before? Share your history of caring for the resource.", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cExperienceCapacity'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "5. Organizational Strategy & Plan: How does this project fit into your current programming or capital", 0, 1, 'L');
	$pdf->cell(0, 5, "work and future plans?", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cOrganizationalPlan'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "6. Public Benefit: Who will the project serve?", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cPublicBenefit'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "7. Community Support and Opposition: List the required community meetings you had for the project and", 0, 1, 'L');
	$pdf->cell(0, 5, "attendance. If community members have been opposed, let us know why - please be honest!", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cCommunitySupport'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 12, "8. Sustainability & Maintenance: How will the site or building be maintained going forward? Share", 0, 1, 'L');
	$pdf->cell(0, 0, "a detailed plan - who will be responsible?", 0, 1, 'L');
	$pdf->cell(0, 4, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cSustainability'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "9. How does your project meet the goals outlined in the Community Preservation Plan and Boston 2030?", 0, 1, 'L');
	$pdf->cell(0, 5, "If you are applying for historic preservation funds, share the project's significance and how it ", 0, 1, 'L');
	$pdf->cell(0, 5, "contributes to the character of your neighborhood.", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cProjectGoals'], 1, 1, 'L');

	$pdf->cell(0, 5, "", 0, 1, 'L');

	$pdf->cell(0, 5, "10. Budget Explanation: feel free to share any unusual circumstances, budget details you'd like to", 0, 1, 'L');
	$pdf->cell(0, 5, "explain, or information about additional fundraising.", 0, 1, 'L');
	$pdf->cell(0, 2, "", 0, 1, 'L');
	$pdf->cell(0, 12, $row['cBudgetExplanation'], 1, 1, 'L');

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