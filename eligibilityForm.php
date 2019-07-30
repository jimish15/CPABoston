<?php

$page_title = "User Authentication - Eligibility Form Page";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");


if(isset($_POST['submitEligibilityBtn']))
{
	$email = $_POST['email'];
	$projectName = $_POST['projectName'];
	$shortProjectDescription = $_POST['shortProjectDescription'];
	$projectStreetAddress = $_POST['projectStreetAddress'];
	$projectNeighborhood = $_POST['projectNeighborhood'];
	$projectZip = $_POST['projectZip'];
	$applicantOrg = $_POST['applicantOrg'];
	$contactPersonTitle = $_POST['contactPersonTitle'];
	$phoneNumber = $_POST['phoneNumber'];

	$amountRequested = $_POST['amountRequested'];
	$totalProjectCost = $_POST['totalProjectCost'];
	$fundingNeed = $_POST['fundingNeed'];
	$fundingSources = $_POST['fundingSources'];
	
	$checkfundingRequest = $_POST['checkfundingRequest'];
	$checkfunding = implode(",", $checkfundingRequest);

	$constructionDesign = $_POST['constructionDesign'];
	$propertyOwner = $_POST['propertyOwner'];
	
	$uploadAgreement = rand(1000,10000)."-".$_FILES["uploadAgreement"]["name"];
	$tname = $_FILES["uploadAgreement"]["tmp_name"];
	$uploads_dir = 'uploads';
	move_uploaded_file($tname, $uploads_dir.'/'.$uploadAgreement);

	$expectedStartDate = $_POST['expectedStartDate'];
	$expectedCompleteDate = $_POST['expectedCompleteDate'];
	$pickCategory = $_POST['pickCategory'];
	
	$yourProject = $_POST['yourProject'];
	$yProject = implode(",", $yourProject);

	$intendedUsers = $_POST['intendedUsers'];
	$generalPublic = $_POST['generalPublic'];
	
	$masterPlan = $_POST['masterPlan'];
	$mPlan = implode(",", $masterPlan);

	$maintenance = $_POST['maintenance'];
	$historicLandscape = $_POST['historicLandscape'];
	
	$publicArt = $_POST['publicArt'];
	$pArt = implode(",", $publicArt);


	$sql = "INSERT INTO `eform`(`email`, `projectName`, `shortProjectDescription`, `projectStreetAddress`, `projectNeighborhood`, `projectZip`, `applicantOrg`, `contactPersonTitle`, `phoneNumber`, `amountRequested`,`totalProjectCost`,`fundingNeed`,`fundingSources`,`checkfundingRequest`,`constructionDesign`,`propertyOwner`,`uploadAgreement`,`expectedStartDate`,`expectedCompleteDate`,`pickCategory`,`yourProject`,`intendedUsers`,`generalPublic`,`masterPlan`,`maintenance`,`historicLandscape`,`publicArt`) VALUES ('$email','$projectName','$shortProjectDescription','$projectStreetAddress','$projectNeighborhood','$projectZip','$applicantOrg','$contactPersonTitle','$phoneNumber','$amountRequested','$totalProjectCost','$fundingNeed','$fundingSources','$checkfunding','$constructionDesign','$propertyOwner','$uploadAgreement','$expectedStartDate','$expectedCompleteDate','$pickCategory','$yProject','$intendedUsers','$generalPublic','$mPlan','$maintenance','$historicLandscape','$pArt')";

	$qry = mysqli_query($connect, $sql);

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

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Eligibility & Information Form</h2><hr>

	</div>

	<div style="padding-right: 100px;">

		<form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to submit this form?')">

			<p>This Eligibility Form is required to apply for Community Preservation funds for affordable housing, historic preservation, and parks, and open space, and outdoor recreation captial projects.<br/>
			Please contact us if you need any assistance or have questions. Staff email & phone numbers are at the end of this form.<br/>
			Eligibility form DEADLINE: Housing - Friday, August 24, 2018 / Open Space & Preservation - Friday, September 7, 2018.<br/>
			There are sections below for each CPA category; you will be directed to the section for your project: historic preservation; affordable housing; OR open space.</p>

			<p style="color: red;">* Required</p>

			<div>
				<label for="emailField">Email Address:<font color="red"> *</font></label>
				<input type="text" name="email" class="form-control" id="emailField" maxlength="100" value="<?php if(isset($email)) echo $email; ?>" required>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Summary Details</h4>

			<div class="ediv">
				<label for="projectNameField">Project Name:<font color="red"> *</font></label>
				<input type="text" name="projectName" class="form-control" id="projectNameField" placeholder="Enter Your Answer" maxlength="50" required>
			</div>

			<div class="ediv">
				<label for="shortProjectDescriptionField">Short Project Description:<font color="red"> *</font></label>
				<input type="text" name="shortProjectDescription" class="form-control" id="shortProjectDescriptionField" placeholder="Enter Your Answer"maxlength="1000" required>
			</div>
			
			<div class="ediv">
				<label for="projectStreetAddressField">Project Street Address:<font color="red"> *</font></label>
				<input type="text" name="projectStreetAddress" class="form-control" id="projectStreetAddressField" placeholder="Enter Your Answer" maxlength="200">
			</div>
			
			<div class="ediv">
				<label for="projectNeighborhoodField">Project Neighborhood:<font color="red"> *</font></label>
				<input type="text" name="projectNeighborhood" class="form-control" id="projectNeighborhoodField" placeholder="Enter Your Answer" maxlength="200">
			</div>
			
			<div class="ediv">
				<label for="projectZipField">Project Zip-Code:<font color="red"> *</font></label>
				<input type="text" name="projectZip" class="form-control" id="projectZipField" placeholder="Enter Your Answer" maxlength="5">
			</div>
			
			<div class="ediv">
				<label for="applicantOrgField">Applicant Organization:<font color="red"> *</font></label>
				<input type="text" name="applicantOrg" class="form-control" id="applicantOrgField" placeholder="Enter Your Answer" maxlength="100">
			</div>

			<div class="ediv">
				<label for="contactPersonTitleField">Contact Person & Title:<font color="red"> *</font></label>
				<input type="text" name="contactPersonTitle" class="form-control" id="contactPersonTitleField" placeholder="Enter Your Answer" maxlength="100">
			</div>
			
			<div class="ediv">
				<label for="phoneNumberField">Phone Number:<font color="red"> *</font></label>
				<input type="text" name="phoneNumber" class="form-control" id="phoneNumberField" placeholder="Enter Your Answer" maxlength="10">
			</div>



			
			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Funding Request</h4>
			
			<div class="ediv">
				<label for="amountRequestedField">Amount Requested:<font color="red"> *</font></label>
				<input type="text" name="amountRequested" class="form-control" id="amountRequestedField" placeholder="Enter Your Answer" maxlength="10">
			</div>

			<div class="ediv">
				<label for="totalProjectCostField">Total Project Cost:<font color="red"> *</font></label>
				<input type="text" name="totalProjectCost" class="form-control" id="totalProjectCostField" placeholder="Enter Your Answer" maxlength="10">
			</div>

			<div class="ediv">
				<label for="fundingNeedField">Why is Funding Needed:<font color="red"> *</font></label>
				<input type="text" name="fundingNeed" class="form-control" id="fundingNeedField" placeholder="Enter Your Answer" maxlength="1000">
			</div>

			<div class="ediv">
				<label for="fundingSourcesField">Other Funding Sources or in-kind support(not whether received, decision pending, or will apply):<font color="red"> *</font></label>
				<input type="text" name="fundingSources" class="form-control" id="fundingSourcesField" placeholder="Enter Your Answer" maxlength="200">
			</div>

			<div class="ediv">
				<label for="checkfundingRequestField">Project Funding Request is for(check all that apply):<font color="red"> *</font></label><br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequest" value="Planning & Design"><lable>Planning & Design</lable><br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequest" value="Construction"><lable>Construction</lable><br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequest" value="Aquisition(purchase)"><lable>Aquisition(purchase)</lable><br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequest" value="Other"><lable>Other</lable><br/>


				<input type="text" name="checkfundingRequest[Other]" class="form-control" id="checkfundingRequestField" placeholder="Enter Your Answer" maxlength="200">
				
			</div>

			<div class="ediv">
				<label for="constructionDesignField">What do you hope to do? Describe construction or design details:<font color="red"> *</font></label>
				<input type="text" name="constructionDesign" class="form-control" id="constructionDesignField" placeholder="Enter Your Answer" maxlength="250">
			</div>


			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Property Ownership & Control</h4>

			<p style="font-weight: bold;">If you are not the property owner, please submit sity control documentation and/or a memorandum of agreement (MOA) with the property owner outlining who will receive the funds, who will do the proposed work, and who will maintain the property upon completion.

			All completed projects using CPA funds will require a deed restriction, for housing affordability, conservation land, or as a historic resource in perpetuity. You can read more about how to do this in the Community Preservation Plan appendix.</p>

			<div class="ediv">
				<label for="propertyOwnerField">Who is the property owner and manager?<font color="red"> *</font></label>
				<input type="text" name="propertyOwner" class="form-control" id="propertyOwnerField" placeholder="Enter Your Answer" maxlength="50">
			</div>

			<div class="ediv">
				<label for="uploadAgreementField">Please upload an agreement with the owner aanswering the questions listed above or provide site control documentation of you are not the property owner.<font color="red"> *</font></label>
				<small style="font-weight: bold;">Please upload only PDF's or DOC's</small></br>
				<input type="file" name="uploadAgreement" id="uploadAgreementField">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Timeline</h4>

			<div class="ediv">
				<label for="expectedStartDateField">Expected Start Date:<font color="red"> *</font></label></br>
				<input type="text" name="expectedStartDate" class="form-control" id="expectedStartDateField" placeholder="MM/DD/YYYY" maxlength="10">
			</div>


			<div class="ediv">
				<label for="expectedCompleteDateField">Expected Completion Date:<font color="red"> *</font></label>
				<input type="text" name="expectedCompleteDate" class="form-control" id="expectedCompleteDateField" placeholder="MM/DD/YYYY" maxlength="10">
			</div>

			<div class="ediv">
				<label for="pickCategoryField">Category (Pick the one that best describes your project):<font color="red"> *</font></label><br/>
				<input type="radio" name="pickCategory" value="Parks, Open Space, or Outdoor Recreation">Parks, Open Space, or Outdoor Recreation<br/>
				<input type="radio" name="pickCategory" value="Historic Preservation">Historic Preservation<br/>
				<input type="radio" name="pickCategory" value="Affordable Housing">Affordable Housing<br/>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Parks, Open Space & Outoor Recreation</h4>

			<p style="font-weight: bold;">Please answer the following questions if your application is for parks, open space, or outdoor recreation. CPA funds may not be used for maintenance, programming, park events, or activities - only for captial improvements and acquisition of new green space. CPA cannot support astroturf athletic fields.</p>

			<div class="ediv">
				<label for="yourProjectField">Is your project?(check all that apply):<font color="red"> *</font></label><br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="A Public Park Improvement">A Public Park Improvement<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="Acquisition (purchase) of land for open space uses">Acquisition (purchase) of land for open space uses<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="An Urban Farm, COmmunity Garden, or Food Forest">An Urban Farm, COmmunity Garden, or Food Forest<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="A Schoolyard">A Schoolyard<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="A Waterfront Resource">A Waterfront Resource<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="An Outdoor Recreation Facility">An Outdoor Recreation Facility<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="On Private Property">On Private Property<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="Other">Other<br/>
				
				<input type="text" name="yourProject[Other]" class="form-control" id="yourProjectField" placeholder="Enter Your Answer" maxlength="200">
			</div>

			<div class="ediv">
				<label for="intendedUsersField">Who are the intended users of your proposed project?<font color="red"> *</font></label>
				<input type="text" name="intendedUsers" class="form-control" id="intendedUsersField" placeholder="Enter Your Answer" maxlength="250">
			</div>

			<div class="ediv">
				<label for="generalPublicField">If your open space will not be open to the general public, please explain:<font color="red"> *</font></label>
				<input type="text" name="generalPublic" class="form-control" id="generalPublicField" placeholder="Enter Your Answer" maxlength="250">
			</div>

			<div class="ediv">
				<label for="masterPlanField">Do you have a master plan or management plan:<font color="red"> *</font></label><br/>
				<input type="radio" name="masterPlan[]" id="masterPlanField" value="Yes">Yes<br/>
				<input type="radio" name="masterPlan[]" id="masterPlanField" value="No">No<br/>
				<input type="radio" name="masterPlan[]" id="masterPlanField" value="Other">Other<br/>
				<input type="text" name="masterPlan[Other]" class="form-control" id="masterPlanField" placeholder="Enter Your Answer" maxlength="50">			
			</div>

			<div class="ediv">
				<label for="maintenanceField">Who will do ongoing maintenance after project completion?<font color="red"> *</font></label>
				<input type="text" name="maintenance" class="form-control" id="maintenanceField" placeholder="Enter Your Answer" maxlength="50">
			</div>
			
			<div class="ediv">
				<label for="historicLandscapeField">Is your project part of a historic landscape?<font color="red"> *</font></label>
				<input type="text" name="historicLandscape" class="form-control" id="historicLandscapeField" placeholder="Enter Your Answer" maxlength="50">
			</div>

			<div class="ediv">
				<label for="publicArtField">Does your project include public art?<font color="red"> *</font></label><br/>
				<input type="radio" name="publicArt[]" id="publicArtField" value="Yes">Yes<br/>
				<input type="radio" name="publicArt[]" id="publicArtField" value="No">No<br/>
				<input type="radio" name="publicArt[]" id="publicArtField" value="Other">Other<br/>
				<input type="text" name="publicArt[Other]" class="form-control" id="publicArtField" placeholder="Enter Your Answer" maxlength="50">			
			</div><br/>

			<p style="font-weight: bold;">Thank you! We will let you know within a few weeks of submission if your project is eligible. Fall applications will be available on www.boston.gov/cpa by August 15, 2018 and will be due of Friday, September 28, 2018.</p>

			<p>For help and questions, contact us!</p>

			<p>- christine.poff@boston.gov / 617-635-0277</br>
			- thadine.brown@boston.gov / 617-635-0545</br>
			- allyson.quinn@boston.gov / 617-635-4637</p>

			<input type="submit" name="submitEligibilityBtn" class="btn btn-primary" style="border-radius: 10px; padding-left: 35px; padding-right: 35px; margin-top: 25px; background-color: #071822; color: #fff; font-size: 20px;" value="Submit" onclick="errorFunction();">
			

		</form>

		<script type="text/javascript">

		function errorFunction() {
		  
		  var checkfundingRequest = document.getElementsByName('checkfundingRequest[]');

		  var hasChecked = false;

		  for (var i = 0; i < checkfundingRequest.length; i++)
		  {
		  	if (checkfundingRequest[i].checked) 
		  	{
		  		hasChecked = true;
		  		break;
		  	}
		  }

		  if (hasChecked == false) 
		  {
		  	alert("All fields must be filled before submitting the form");
		  	return false;
		  }
		  return true;
		}


		</script>

	</div>

</div>

</body>
</html>