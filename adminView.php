<?php
$page_title = "User Authentication - Eligibility Form Page";
include_once 'partials/adminHeaders.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

$getid = $_GET['adminView'];

$selview = "SELECT * FROM `eform` WHERE `id` = '$getid'";
$qry = mysqli_query($connect, $selview);

$selassoc = mysqli_fetch_assoc($qry);

$id = $selassoc['id'];
$email = $selassoc['email'];
$projectName = $selassoc['projectName'];
$shortProjectDescription = $selassoc['shortProjectDescription'];
$projectStreetAddress = $selassoc['projectStreetAddress'];
$projectNeighborhood = $selassoc['projectNeighborhood'];
$projectZip = $selassoc['projectZip'];
$applicantOrg = $selassoc['applicantOrg'];
$contactPersonTitle = $selassoc['contactPersonTitle'];
$phoneNumber = $selassoc['phoneNumber'];

$amountRequested = $selassoc['amountRequested'];
$totalProjectCost = $selassoc['totalProjectCost'];
$fundingNeed = $selassoc['fundingNeed'];
$fundingSources = $selassoc['fundingSources'];
$checkfundingRequest = $selassoc['checkfundingRequest'];
$constructionDesign = $selassoc['constructionDesign'];
$propertyOwner = $selassoc['propertyOwner'];
$uploadAgreement = $selassoc['uploadAgreement'];

$expectedStartDate = $selassoc['expectedStartDate'];
$expectedCompleteDate = $selassoc['expectedCompleteDate'];
$pickCategory = $selassoc['pickCategory'];
$yourProject = $selassoc['yourProject'];
$intendedUsers = $selassoc['intendedUsers'];
$generalPublic = $selassoc['generalPublic'];
$masterPlan = $selassoc['masterPlan'];
$maintenance = $selassoc['maintenance'];
$historicLandscape = $selassoc['historicLandscape'];
$publicArt = $selassoc['publicArt'];

if(isset($_POST['updateview']))
{

	$upid = $_POST['upid'];
	$upemail = $_POST['upemail'];
	$upprojectName = $_POST['upprojectName'];
	$upshortProjectDescription = $_POST['upshortProjectDescription'];
	$upprojectStreetAddress = $_POST['upprojectStreetAddress'];
	$upprojectNeighborhood = $_POST['upprojectNeighborhood'];
	$upprojectZip = $_POST['upprojectZip'];
	$upapplicantOrg = $_POST['upapplicantOrg'];
	$upcontactPersonTitle = $_POST['upcontactPersonTitle'];
	$upphoneNumber = $_POST['upphoneNumber'];

	$upamountRequested = $_POST['upamountRequested'];
	$uptotalProjectCost = $_POST['uptotalProjectCost'];
	$upfundingNeed = $_POST['upfundingNeed'];
	$upfundingSources = $_POST['upfundingSources'];
	$upcheckfundingRequest = $_POST['upcheckfundingRequest'];
	$upconstructionDesign = $_POST['upconstructionDesign'];
	$uppropertyOwner = $_POST['uppropertyOwner'];
	$upuploadAgreement = $_POST['upuploadAgreement'];
	$upexpectedStartDate = $_POST['upexpectedStartDate'];
	$upexpectedCompleteDate = $_POST['upexpectedCompleteDate'];
	$uppickCategory = $_POST['uppickCategory'];
	$upyourProject = $_POST['upyourProject'];
	$upintendedUsers = $_POST['upintendedUsers'];
	$upgeneralPublic = $_POST['upgeneralPublic'];
	$upmasterPlan = $_POST['upmasterPlan'];
	$upmaintenance = $_POST['upmaintenance'];
	$uphistoricLandscape = $_POST['uphistoricLandscape'];
	$uppublicArt = $_POST['uppublicArt'];	


	$selviewdata = "UPDATE `eform` SET `email`='$upemail',`projectName`='$upprojectName',`shortProjectDescription`='$upshortProjectDescription',`projectStreetAddress`= '$upprojectStreetAddress',`projectNeighborhood`='$upprojectNeighborhood',`projectZip`='$upprojectZip',`applicantOrg`='$upapplicantOrg',`contactPersonTitle`='$upcontactPersonTitle',`phoneNumber`='$upphoneNumber',`amountRequested`='$upamountRequested',`totalProjectCost`='$uptotalProjectCost',`fundingNeed`='$upfundingNeed',`fundingSources`='$upfundingSources',`checkfundingRequest`='$upcheckfundingRequest',`constructionDesign`='$upconstructionDesign',`propertyOwner`='$uppropertyOwner',`uploadAgreement`='$upuploadAgreement',`expectedStartDate`='$upexpectedStartDate',`expectedCompleteDate`='$upexpectedCompleteDate',`pickCategory`='$uppickCategory',`yourProject`='$upyourProject',`intendedUsers`='$upintendedUsers',`generalPublic`='$upgeneralPublic',`masterPlan`='$upmasterPlan',`maintenance`='$upmaintenance',`historicLandscape`='$uphistoricLandscape',`publicArt`='$uppublicArt' WHERE `id` = '$upid'";

	$qry = mysqli_query($connect, $selviewdata);

	if($qry)
	{
		header("location: admin.php");
	}
}

if(isset($_POST['approveBtn'])) {
	$upStatus = $_POST['upStatus'];
	$seleditt = "UPDATE `eform` SET `eStatus`='Approved' Where `id`='$id'";
	$qry = mysqli_query($connect, $seleditt);
	if($qry) {
		header("location: admin.php");
	}
} elseif(isset($_POST['rejectBtn'])) {
	$seleditt = "UPDATE `eform` SET `eStatus`='Rejected' WHERE `id`='$id'";
	$qry = mysqli_query($connect, $seleditt);
	if($qry) {
		header("location: admin.php");
	}
}

?>

<div class="container" style="background-color: rgba(255,255,255,0.7); padding-left: 30px; padding-bottom: 20px; border-radius: 20px;">

	<div>

		<a href="admin.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Eligibility & Information Form</h2><hr>

	</div>

	<div class="clearfix"></div>

	<div style="padding-right: 100px;">
		
		<form action="" method="POST" enctype="multipart/form-data">

			<p>This Eligibility Form is required to apply for Community Preservation funds for affordable housing, historic preservation, and parks, and open space, and outdoor recreation captial projects.<br/>
			Please contact us if you need any assistance or have questions. Staff email & phone numbers are at the end of this form.<br/>
			Eligibility form DEADLINE: Housing - Friday, August 24, 2018 / Open Space & Preservation - Friday, September 7, 2018.<br/>
			There are sections below for each CPA category; you will be directed to the section for your project: historic preservation; affordable housing; OR open space.</p>

			<p style="color: red;">* Required</p>

			<div style="display: none;">
				<label for="idField">Form ID:<font color="red"> *</font></label>
				<input type="text" name="upid" class="form-control" id="idField" value="<?php echo $id; ?>">
			</div>

			<div class="form-group">
				<label for="emailField">Email Address:<font color="red"> *</font></label>
				<input type="text" name="upemail" class="form-control" id="emailField" value="<?php echo $email; ?>" readonly>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Summary Details</h4>

			<div class="form-group">
				<label for="projectField">Project Name:<font color="red"> *</font></label>
				<input type="text" name="upprojectName" class="form-control" id="projectField" value="<?php echo $projectName; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="descriptionField">Short Project Description:<font color="red"> *</font></label>
				<input type="text" name="upshortProjectDescription" class="form-control" id="emailField" value="<?php echo $shortProjectDescription; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="addressField">Project Street Address:<font color="red"> *</font></label>
				<input type="text" name="upprojectStreetAddress" class="form-control" id="emailField" value="<?php echo $projectStreetAddress; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="neighborhoodField">Project Neighborhood:<font color="red"> *</font></label>
				<input type="text" name="upprojectNeighborhood" class="form-control" id="neighborhoodField" value="<?php echo $projectNeighborhood; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="zipField">Project Zip-Code:<font color="red"> *</font></label>
				<input type="text" name="projectZip" class="form-control" id="zipField" value="<?php echo $projectZip; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="appOrgField">Applicant Organization:<font color="red"> *</font></label>
				<input type="text" name="upapplicantOrg" class="form-control" id="appOrgField" value="<?php echo $applicantOrg; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="contactField">Contact Person & Title:<font color="red"> *</font></label>
				<input type="text" name="upcontactPersonTitle" class="form-control" id="contactField" value="<?php echo $contactPersonTitle; ?>"readonly>
			</div>

			<div class="form-group">
				<label for="phoneNumberField">Phone Number:<font color="red"> *</font></label>
				<input type="text" name="upphoneNumber" class="form-control" id="phoneNumberField" value="<?php echo $phoneNumber; ?>"readonly>
			</div>

			
			
			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Funding Request</h4>

			<div class="form-group">
				<label for="amountRequestedField">Amount Requested:<font color="red"> *</font></label>
				<input type="text" name="upamountRequested" class="form-control" id="amountRequestedField" value="<?php echo $amountRequested; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="totalProjectCostField">Total Project Cost:<font color="red"> *</font></label>
				<input type="text" name="uptotalProjectCost" class="form-control" id="totalProjectCostField" value="<?php echo $totalProjectCost; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="fundingNeedField">Why is Funding Needed:<font color="red"> *</font></label>
				<input type="text" name="upfundingNeed" class="form-control" id="fundingNeedField" value="<?php echo $fundingNeed; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="fundingSourcesField">Other Funding Sources or in-kind support(not whether received, decision pending, or will apply):<font color="red"> *</font></label>
				<input type="text" name="upfundingSources" class="form-control" id="fundingSourcesField" value="<?php echo $fundingSources; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="checkfundingRequestField">Project Funding Request is for(check all that apply):<font color="red"> *</font></label>
				<input type="text" name="upcheckfundingRequest" class="form-control" id="checkfundingRequestField" value="<?php echo $checkfundingRequest; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="constructionDesignField">What do you hope to do? Describe construction or design details:<font color="red"> *</font></label>
				<input type="text" name="upconstructionDesign" class="form-control" id="constructionDesignField" value="<?php echo $constructionDesign; ?>" readonly>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Property Ownership & Control</h4>

			<p style="font-weight: bold;">If you are not the property owner, please submit sity control documentation and/or a memorandum of agreement (MOA) with the property owner outlining who will receive the funds, who will do the proposed work, and who will maintain the property upon completion.

			All completed projects using CPA funds will require a deed restriction, for housing affordability, conservation land, or as a historic resource in perpetuity. You can read more about how to do this in the Community Preservation Plan appendix.</p>

			<div class="form-group">
				<label for="propertyOwnerField">Who is the property owner and manager?<font color="red"> *</font></label>
				<input type="text" name="uppropertyOwner" class="form-control" id="propertyOwnerField" value="<?php echo $propertyOwner; ?>" readonly>
			</div>

			<div class="ediv">
				<label for="uploadAgreementField">Pleas upload an agreement with the owner aanswering the questions listed above or provide site control documentation of you are not the property owner.<font color="red"> *</font></label>
		

				<input style="padding: 5px; cursor: pointer; background-color:rgba(251, 77, 66, 0.6);color: #071822; font-weight: bold; border: 2px solid #071822; border-radius: 5px; text-align: center;"type="button" value="<?php echo $uploadAgreement; ?>" onclick="window.location.href='uploads/<?php echo $uploadAgreement; ?>'" />
			</div>


			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Timeline</h4>

			<div class="ediv">
				<label for="expectedStartDateField">Expected Start Date:<font color="red"> *</font></label></br>
				<input type="text" name="upexpectedStartDate" class="form-control" id="expectedStartDateField" value="<?php echo $expectedStartDate; ?>" readonly>
			</div>


			<div class="ediv">
				<label for="expectedCompleteDateField">Expected Completion Date:<font color="red"> *</font></label>
				<input type="text" name="upexpectedCompleteDate" class="form-control" id="expectedCompleteDateField" value="<?php echo $expectedCompleteDate; ?>" readonly>
			</div>

			<div class="ediv">
				<label for="pickCategoryField">Category (Pick the one that best describes your project):<font color="red"> *</font></label><br/>
				<input type="text" name="uppickCategory" class="form-control" id="pickCategoryField" value="<?php echo $pickCategory; ?>" readonly>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Parks, Open Space & Outoor Recreation</h4>

			<p style="font-weight: bold;">Please answer the following questions if your application is for parks, open space, or outdoor recreation. CPA funds may not be used for maintenance, programming, park events, or activities - only for captial improvements and acquisition of new green space. CPA cannot support astroturf athletic fields.</p>

			<div class="ediv">
				<label for="yourProjectField">Is your project?(check all that apply):<font color="red"> *</font></label><br/>
				<input type="text" name="upyourProject" class="form-control" id="yourProjectField" value="<?php echo $yourProject; ?>" readonly>
			</div>

			<div class="ediv">
				<label for="intendedUsersField">Who are the intended users of your proposed project?<font color="red"> *</font></label>
				<input type="text" name="upintendedUsers" class="form-control" id="intendedUsersField" value="<?php echo $intendedUsers; ?>" readonly>
			</div>

			<div class="ediv">
				<label for="generalPublicField">If your open space will not be open to the general public, please explain:<font color="red"> *</font></label>
				<input type="text" name="upgeneralPublic" class="form-control" id="generalPublicField" value="<?php echo $generalPublic; ?>" readonly>
			</div>


			<div class="ediv">
				<label for="masterPlanField">Do you have a master plan or management plan:<font color="red"> *</font></label><br/>
				<input type="text" name="upmasterPlan" class="form-control" id="masterPlanField" value="<?php echo $masterPlan; ?>" readonly>			
			</div>

			<div class="ediv">
				<label for="maintenanceField">Who will do ongoing maintenance after project completion?<font color="red"> *</font></label>
				<input type="text" name="upmaintenance" class="form-control" id="maintenanceField" value="<?php echo $maintenance; ?>" readonly>
			</div>
			
			<div class="ediv">
				<label for="historicLandscapeField">Is your project part of a historic landscape?<font color="red"> *</font></label>
				<input type="text" name="uphistoricLandscape" class="form-control" id="historicLandscapeField" value="<?php echo $historicLandscape; ?>" readonly>
			</div>

			<div class="ediv">
				<label for="publicArtField">Does your project include public art?<font color="red"> *</font></label><br/>
				<input type="text" name="uppublicArt" class="form-control" id="publicArtField" value="<?php echo $publicArt; ?>" readonly>			
			</div><br/>

			<p style="font-weight: bold;">Thank you! We will let you know within a few weeks of submission if your project is eligible. Fall applications will be available on www.boston.gov/cpa by August 15, 2018 and will be due of Friday, September 28, 2018.</p>

			<p>For help and questions, contact us!</p>

			<p>- christine.poff@boston.gov / 617-635-0277</br>
			- thadine.brown@boston.gov / 617-635-0545</br>
			- allyson.quinn@boston.gov / 617-635-4637</p>

			

		</form>

	</div>

</div>

<?php include_once 'partials/footers.php'; ?>




</body>
</html>