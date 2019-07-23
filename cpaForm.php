<?php

$page_title = "User Authentication - CPA Form Page";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';


$connect = mysqli_connect("localhost","root","","form");

$getid = $_GET['cpaForm'];

$selview = "SELECT * FROM `eform` WHERE `id` = '$getid'";
$qry = mysqli_query($connect, $selview);

$selassoc = mysqli_fetch_assoc($qry);

$id = $selassoc['id'];
$projectName = $selassoc['projectName'];
$cEmail = $selassoc['cEmail'];
$cProjectName = $selassoc['cProjectName'];
$cProjectNeighborhood = $selassoc['cProjectNeighborhood'];
$cProjectZip = $selassoc['cProjectZip'];
$cApplicantOrg = $selassoc['cApplicantOrg'];
$cContactPersonTitle = $selassoc['cContactPersonTitle'];
$cPhoneNumber = $selassoc['cPhoneNumber'];

$cPickCategory = $selassoc['cPickCategory'];

$cAmountRequested = $selassoc['cAmountRequested'];
$cTotalProjectCost = $selassoc['cTotalProjectCost'];
$cShortProjectDescription2 = $selassoc['cShortProjectDescription2'];
$cProjectSummary = $selassoc['cProjectSummary'];
$cNeedsAssessment = $selassoc['cNeedsAssessment'];
$cProjectTimeline = $selassoc['cProjectTimeline'];
$cExperienceCapacity = $selassoc['cExperienceCapacity'];
$cOrganizationalPlan = $selassoc['cOrganizationalPlan'];
$cPublicBenefit = $selassoc['cPublicBenefit'];
$cCommunitySupport = $selassoc['cCommunitySupport'];
$cSustainability = $selassoc['cSustainability'];
$cProjectGoals = $selassoc['cProjectGoals'];
$cBudgetExplanation = $selassoc['cBudgetExplanation'];

$cUploadPropertyControl = $selassoc['cUploadPropertyControl'];
$cUploadCouncilSupport = $selassoc["cUploadCouncilSupport"];
$cUploadCommunitySupport = $selassoc["cUploadCommunitySupport"];
$cUploadAppearance = $selassoc["cUploadAppearance"];
$cUploadDesign = $selassoc["cUploadDesign"];
$cUploadResult = $selassoc["cUploadResult"];
$cUploadBudget = $selassoc["cUploadBudget"];
$cUploadIRS = $selassoc["cUploadIRS"];
$cUploadProfit = $selassoc["cUploadProfit"];
$cUploadBalance = $selassoc["cUploadBalance"];



if(isset($_POST['submitCpaBtn']))
{
	$upid = $_POST['upid'];
	$upcEmail = $_POST['upcEmail'];
	$upcProjectName = $_POST['upcProjectName'];
	$upcProjectNeighborhood = $_POST['upcProjectNeighborhood'];
	$upcProjectZip = $_POST['upcProjectZip'];
	$upcApplicantOrg = $_POST['upcApplicantOrg'];
	$upcContactPersonTitle = $_POST['upcContactPersonTitle'];
	$upcPhoneNumber = $_POST['upcPhoneNumber'];

	$cPickCategory = $_POST['upcPickCategory'];

	$upcAmountRequested = $_POST['upcAmountRequested'];
	$upcTotalProjectCost = $_POST['upcTotalProjectCost'];
	$upcShortProjectDescription2 = $_POST['upcShortProjectDescription2'];
	$upcProjectSummary = $_POST['upcProjectSummary'];
	$upcNeedsAssessment = $_POST['upcNeedsAssessment'];
	$upcProjectTimeline = $_POST['upcProjectTimeline'];
	$upcExperienceCapacity = $_POST['upcExperienceCapacity'];
	$upcOrganizationalPlan = $_POST['upcOrganizationalPlan'];
	$upcPublicBenefit = $_POST['upcPublicBenefit'];
	$upcCommunitySupport = $_POST['upcCommunitySupport'];
	$upcSustainability = $_POST['upcSustainability'];
	$upcProjectGoals = $_POST['upcProjectGoals'];
	$upcBudgetExplanation = $_POST['upcBudgetExplanation'];


	$upcUploadPropertyControl = rand(1000,10000)."-".$_FILES["upcUploadPropertyControl"]["name"];
	$tname = $_FILES["upcUploadPropertyControl"]["tmp_name"];
	$uploads_dir = 'uploads';
	move_uploaded_file($tname, $uploads_dir.'/'.$upcUploadPropertyControl);

	
	$upcUploadCouncilSupport = rand(1000,10000)."-".$_FILES["upcUploadCouncilSupport"]["name"];
	$tname2 = $_FILES["upcUploadCouncilSupport"]["tmp_name"];
	$uploads_dir2 = 'uploads';
	move_uploaded_file($tname2, $uploads_dir2.'/'.$upcUploadCouncilSupport);


	$upcUploadCommunitySupport = rand(1000,10000)."-".$_FILES["upcUploadCommunitySupport"]["name"];
	$tname3 = $_FILES["upcUploadCommunitySupport"]["tmp_name"];
	$uploads_dir3 = 'uploads';
	move_uploaded_file($tname3, $uploads_dir3.'/'.$upcUploadCommunitySupport);


	$upcUploadAppearance = rand(1000,10000)."-".$_FILES["upcUploadAppearance"]["name"];
	$tname4 = $_FILES["upcUploadAppearance"]["tmp_name"];
	$uploads_dir4 = 'uploads';
	move_uploaded_file($tname4, $uploads_dir4.'/'.$upcUploadAppearance);


	$upcUploadDesign = rand(1000,10000)."-".$_FILES["upcUploadDesign"]["name"];
	$tname5 = $_FILES["upcUploadDesign"]["tmp_name"];
	$uploads_dir5 = 'uploads';
	move_uploaded_file($tname5, $uploads_dir5.'/'.$upcUploadDesign);


	$upcUploadResult = rand(1000,10000)."-".$_FILES["upcUploadResult"]["name"];
	$tname6 = $_FILES["upcUploadResult"]["tmp_name"];
	$uploads_dir6 = 'uploads';
	move_uploaded_file($tname6, $uploads_dir6.'/'.$upcUploadResult);


	$upcUploadBudget = rand(1000,10000)."-".$_FILES["upcUploadBudget"]["name"];
	$tname7 = $_FILES["upcUploadBudget"]["tmp_name"];
	$uploads_dir7 = 'uploads';
	move_uploaded_file($tname7, $uploads_dir7.'/'.$upcUploadBudget);


	$upcUploadIRS = rand(1000,10000)."-".$_FILES["upcUploadIRS"]["name"];
	$tname8 = $_FILES["upcUploadIRS"]["tmp_name"];
	$uploads_dir8 = 'uploads';
	move_uploaded_file($tname8, $uploads_dir8.'/'.$upcUploadIRS);


	$upcUploadProfit = rand(1000,10000)."-".$_FILES["upcUploadProfit"]["name"];
	$tname9 = $_FILES["upcUploadProfit"]["tmp_name"];
	$uploads_dir9 = 'uploads';
	move_uploaded_file($tname9, $uploads_dir9.'/'.$upcUploadProfit);


	$upcUploadBalance = rand(1000,10000)."-".$_FILES["upcUploadBalance"]["name"];
	$tname10 = $_FILES["upcUploadBalance"]["tmp_name"];
	$uploads_dir10 = 'uploads';
	move_uploaded_file($tname10, $uploads_dir10.'/'.$upcUploadBalance);
	
	$selviewdata2 = "UPDATE `eform` SET `cEmail`='$upcEmail',
	`cProjectName`='$upcProjectName',
	`cProjectNeighborhood`='$upcProjectNeighborhood',
	`cProjectZip`= '$upcProjectZip',
	`cApplicantOrg`='$upcApplicantOrg',
	`cContactPersonTitle`='$upcContactPersonTitle',
	`cPhoneNumber`='$upcPhoneNumber',
	`cPickCategory`='$upcPickCategory',
	`cAmountRequested`='$upcAmountRequested',
	`cTotalProjectCost`='$upcTotalProjectCost',
	`cShortProjectDescription2`='$upcShortProjectDescription2',
	`cProjectSummary`='$upcProjectSummary',
	`cNeedsAssessment`='$upcNeedsAssessment',
	`cProjectTimeline`='$upcProjectTimeline',
	`cExperienceCapacity`='$upcExperienceCapacity',
	`cOrganizationalPlan`='$upcOrganizationalPlan',
	`cPublicBenefit`='$upcPublicBenefit',
	`cCommunitySupport`='$upcCommunitySupport',
	`cSustainability`='$upcSustainability',
	`cProjectGoals`='$upcProjectGoals',
	`cBudgetExplanation`='$upcBudgetExplanation',
	`cUploadPropertyControl`='$upcUploadPropertyControl',
	`cUploadCouncilSupport`='$upcUploadCouncilSupport',
	`cUploadCommunitySupport`='$upcUploadCommunitySupport',
	`cUploadAppearance`='$upcUploadAppearance',
	`cUploadDesign`='$upcUploadDesign',
	`cUploadResult`='$upcUploadResult',
	`cUploadBudget`='$upcUploadBudget',
	`cUploadIRS`='$upcUploadIRS',
	`cUploadProfit`='$upcUploadProfit',
	`cUploadBalance`='$upcUploadBalance'WHERE `id` = '$upid'";

	$qry = mysqli_query($connect, $selviewdata2);

	if($qry)
	{
		header("location: index.php");
	}
}

?>


<style type="text/css">
	
	.ediv
	{
		margin-top: 10px;
	}



</style>

<div style="background-color: rgba(255,255,255,0.7); padding-left: 30px; padding-bottom: 20px; border-radius: 20px;" class="container">
	
	<div>

		<a href="index.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Fall 2019 Application</h2><hr>

	</div>

	<div style="padding-right: 100px;">

		<form method="POST" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?')">

			<p>Please read the application overview prior to completing this form. It will serve as a guide and has lots of helpful information.</p>

			<p style="color: red;">* Required</p>

			<div style="display: none;">
				<label for="idField">Form ID:<font color="red"> *</font></label>
				<input type="text" name="upid" class="form-control" id="idField" value="<?php echo $id; ?>">
			</div>

			<div>
				<label for="emailField">Email:<font color="red"> *</font></label>
				<input type="text" name="upcEmail" class="form-control" id="emailField" value="<?php echo $email; ?>" readonly>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Cover Sheet</h4>
			
			<div>
				<label for="projectNameField">Project Name:<font color="red"> *</font></label>
				<input type="text" name="upcProjectName" class="form-control" id="projectNameField" value="<?php echo $projectName; ?>" readonly>
			</div>
 			
 			<div class="ediv">
				<label for="shortProjectNeighborhoodField">Project Street Address & Neighborhood:<font color="red"> *</font></label>
				<input type="text" name="upcProjectNeighborhood" class="form-control" id="shortProjectNeighborhoodField" placeholder="Enter Your Answer"maxlength="1000" required>
			</div>



			
			<div class="ediv">
				<label for="projectZipField">Project Zip-Code:<font color="red"> *</font></label>
				<input type="text" name="upcProjectZip" class="form-control" id="projectZipField" placeholder="Enter Your Answer" maxlength="5" required>
			</div>

			
			<div class="ediv">
				<label for="applicantOrgField">Applicant Organization:<font color="red"> *</font></label>
				<input type="text" name="upcApplicantOrg" class="form-control" id="applicantOrgField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>
			
			<div class="ediv">
				<label for="contactPersonTitleField">Contact Person & Title:<font color="red"> *</font></label>
				<input type="text" name="upcontactPersonTitle" class="form-control" id="contactPersonTitleField" placeholder="Enter Your Answer" maxlength="100" required>
			</div>
			
			
			<div class="ediv">
				<label for="phoneNumberField">Phone Number:<font color="red"> *</font></label>
				<input type="text" name="upcPhoneNumber" class="form-control" id="phoneNumberField" placeholder="Enter Your Answer" maxlength="100" required>
			</div>

			
			<div class="ediv">
				<label>Category (Pick the one that best describes your project):<font color="red"> *</font></label><br/>
				<input type="radio" name="upcPickCategory" value="Parks, Open Space, or Outdoor Recreation" required>Parks, Open Space, or Outdoor Recreation<br/>
				<input type="radio" name="upcPickCategory" value="Historic Preservation" required>Historic Preservation<br/>
				<input type="radio" name="upcPickCategory" value="Affordable Housing" required>Affordable Housing<br/>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Funding Request</h4>
			
			<div class="ediv">
				<label for="amountRequestedField">Amount Requested:<font color="red"> *</font></label>
				<input type="text" name="upcAmountRequested" class="form-control" id="amountRequestedField" placeholder="Enter Your Answer" maxlength="10" required>
			</div>

			<div class="ediv">
				<label for="totalProjectCostField">Total Project Cost:<font color="red"> *</font></label>
				<input type="text" name="upcTotalProjectCost" class="form-control" id="totalProjectCostField" placeholder="Enter Your Answer" maxlength="10" required>
			</div>

			<div class="ediv">
				<label for="shortProject2Field">Short Project Description - For The CPA Webpages:<font color="red"> *</font></label>
				<input type="text" name="upcShortProjectDescription2" class="form-control" id="shortProject2Field" placeholder="Enter Your Answer" maxlength="1000" required>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Questions</h4>

			<p style="color: red;">Please limit your answers to no more than 250 words. If you go beyond that, you risk having it cut.</p>


			<div class="ediv">
				<label for="projectSummaryField">1. Project Summary & Anticipated Outcome: Information about your organization is not needed here, just describe what you hope to do (e.g. build 10 units of affordable housing or repair roof) and why this project will make a difference - the outcome.<font color="red"> *</font></label>
				<input type="text" name="upcProjectSummary" class="form-control" id="projectSummaryField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="needsAssessmentField">2. Needs Assessment: Why do you need the funds? How bad are the existing conditions? What are the neighborhood challenges you hope to address?<font color="red"> *</font></label>
				<input type="text" name="upcNeedsAssessment" class="form-control" id="projectSummaryField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="projectTimelineField">3. Project Implementation / Timeline: Divide your project into three milestones that make sense to you. Attach anticipated completion dates for each stage and cost.<font color="red"> *</font></label>
				<input type="text" name="upcProjectTimeline" class="form-control" id="projectTimelineField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="experienceCapacityField">4. Experience & Capacity: Convince us that you have the ability to carry out the steps and oversight needed to complete the project. How have you been a good steward or landlord? Have you done projects like this before? Share your history of caring for the resource.<font color="red"> *</font></label>
				<input type="text" name="upcExperienceCapacity" class="form-control" id="experienceCapacityField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="organizationalPlanField">5. Organizational Strategy & Plan: How does this project fit into your current programming or capital work and future plans?<font color="red"> *</font></label>
				<input type="text" name="upcOrganizationalPlan" class="form-control" id="organizationalPlanField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="publicBenefitField">6. Public Benefit: Who will the project serve?<font color="red"> *</font></label>
				<input type="text" name="upcPublicBenefit" class="form-control" id="publicBenefitField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="communitySupportField">7. Community Support and Opposition: List the required community meetings you have had for the project and attendance. If community members have been opposed, let us know why - please be honest!<font color="red"> *</font></label>
				<input type="text" name="upcCommunitySupport" class="form-control" id="communitySupportField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="sustainabilityField">8. Sustainability & Maintenance: How will the site or building be maintained going forward? Share a detailed plan - who will be responsible?<font color="red"> *</font></label>
				<input type="text" name="upcSustainability" class="form-control" id="sustainabilityField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="projectGoalsField">9. How does your project meet the goals outlined in the Community Preservation Plan and Boston 2030? If you are applying for historic preservation funds, share the project's significance and how it contributes to the character of your neighborhood.<font color="red"> *</font></label>
				<input type="text" name="upcProjectGoals" class="form-control" id="projectGoalsField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>

			<div class="ediv">
				<label for="budgetExplanationField">10. Budget Explanation: feel free to share any unusual circumstances, budget details you'd like to explain, or information about additional fundraising.<font color="red"> *</font></label>
				<input type="text" name="upcBudgetExplanation" class="form-control" id="budgetExplanationField" placeholder="Enter Your Answer" maxlength="200" required>
			</div>


			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Uploads</h4>

			<p style="font-weight: bold;">Please upload each of the forms listed below.</p>

			<div class="ediv">
				<label for="propertyControlField">Property Control: If you do not own the property, upload an agreement with the owner that gives you permission to implement the project and outlines who will receive funds, hire and manage contractors, and do ongoing maintenance.<font color="red"> *</font></label>
				
				<input type="file" name="upcUploadPropertyControl" id="propertyControlField" required>
			</div>

			<div class="ediv">
				<label for="councilSupportField">City Council Support: upload a letter from your district councilor supporting the project. <font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadCouncilSupport" id="councilSupportField" required>
			</div>

			<div class="ediv">
				<label for="communitySupportField">Community Support: if you have a petition signed by neighbors who are excited about the project, please upload.<font color="red"> *</font></label>
				
				<input type="file" name="upcUploadCommunitySupport" id="communitySupportField" required>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Visuals</h4>

			<div class="ediv">
				<label for="appearanceField">Current appearance: upload ONE photo of your site/facility/resource.<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadAppearance" id="appearanceField" required>
			</div>

			<div class="ediv">
				<label for="designField">Design: upload ONE design drawing.<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadDesign" id="designField" required>
			</div>


			<div class="ediv">
				<label for="resultField">Finished result: upload a rendering of what you hope your completed project will look like, if you have one.<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadResult" id="resultField" required>
			</div>
			

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Budget & Financials</h4>

			<p style="font-weight: bold;">Please use the CPA budget format. To do this: 1) click on the link below; 2) you have to make a copy before you can start to fill it in; 3) download the copy to save and rename it; 4) last - upload below under Budget.</p>

			<a href="https://docs.google.com/spreadsheets/d/1vgDWBj1VUx9wmLWGI5cARTyts0kfcmAjvNeJYkFiSwI/edit?usp=sharing">https://docs.google.com/spreadsheets/d/1vgDWBj1VUx9wmLWGI5cARTyts0kfcmAjvNeJYkFiSwI/edit?usp=sharing</a>

			<div class="ediv">
				<label for="budgetField">Budget:<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadBudget" id="budgetField" required>
			</div>

			<div class="ediv">
				<label for="irsField">Most recent Form 990 or IRS submission for applicant organization:<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadIRS" id="irsField" required>
			</div>

			<div class="ediv">
				<label for="profitField">Profit & Loss statement for last full year:<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadProfit" id="profitField" required>
			</div>

			<div class="ediv">
				<label for="balanceField">Balance Statement:<font color="red"> *</font></label></br>
				
				<input type="file" name="upcUploadBalance" id="balanceField" required>
			</div>
			

			<p style="font-weight: bold; margin-top: 20px;">Thank you! We will let you know if your application is complete and will be considered for funding.</p>

			<p>For help and questions, contact us!</p>

			<p>- christine.poff@boston.gov / 617-635-0277</br>
			- thadine.brown@boston.gov / 617-635-0545</br>
			- allyson.quinn@boston.gov / 617-635-4637</p>

			

			<input type="submit" name="submitCpaBtn" class="btn btn-primary" style="border-radius: 10px; padding-left: 35px; padding-right: 35px; margin-top: 25px; background-color: #071822; color: #fff; font-size: 20px;" value="Submit" onclick="errorFunction();">
			

		</form>

	</div>

</div>

</body>
</html>