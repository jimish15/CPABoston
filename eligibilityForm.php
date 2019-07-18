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

	$sql = "INSERT INTO `eform`(`email`, `projectName`, `shortProjectDescription`, `projectStreetAddress`, `projectNeighborhood`, `projectZip`, `applicantOrg`, `contactPersonTitle`, `phoneNumber`) VALUES ('$email','$projectName','$shortProjectDescription','$projectStreetAddress','$projectNeighborhood','$projectZip','$applicantOrg','$contactPersonTitle','$phoneNumber')";

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

		<form action="" method="POST" enctype="multipart/form-data">

			<div>
				<label for="emailField">Email Address:</label>
				<input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Summary Details</h4>

			<div class="ediv">
				<label for="projectNameField">Project Name:</label>
				<input type="text" name="projectName" class="form-control" id="projectNameField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="shortProjectDescriptionField">Short Project Description:</label>
				<input type="text" name="shortProjectDescription" class="form-control" id="shortProjectDescriptionField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="projectStreetAddressField">Project Street Address:</label>
				<input type="text" name="projectStreetAddress" class="form-control" id="projectStreetAddressField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="projectNeighborhoodField">Project Neighborhood:</label>
				<input type="text" name="projectNeighborhood" class="form-control" id="projectNeighborhoodField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="projectZipField">Project Zip-Code:</label>
				<input type="text" name="projectZip" class="form-control" id="projectZipField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="applicantOrgField">Applicant Organization:</label>
				<input type="text" name="applicantOrg" class="form-control" id="applicantOrgField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="contactPersonTitleField">Contact Person & Title:</label>
				<input type="text" name="contactPersonTitle" class="form-control" id="contactPersonTitleField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="phoneNumberField">Phone Number:</label>
				<input type="text" name="phoneNumber" class="form-control" id="phoneNumberField" placeholder="Enter Your Answer">
			</div>



			
			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Funding Request</h4>
			
			<div class="ediv">
				<label for="amountRequestedField">Amount Requested:</label>
				<input type="text" name="amountRequested" class="form-control" id="amountRequestedField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="totalProjectCostField">Total Project Cost:</label>
				<input type="text" name="totalProjectCost" class="form-control" id="totalProjectCostField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="fundingNeedField">Why is Funding Needed:</label>
				<input type="text" name="fundingNeed" class="form-control" id="fundingNeedField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="fundingSourcesField">Other Funding Sources or in-kind support(not whether received, decision pending, or will apply):</label>
				<input type="text" name="fundingSources" class="form-control" id="fundingSourcesField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="checkfundingRequestField">Project Funding Request is for(check all that apply):</label><br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequestField" value="Planning & Design">Planning & Design<br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequestField" value="Construction">Construction<br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequestField" value="Aquisition(purchase)">Aquisition(purchase)<br/>
				<input type="checkbox" name="checkfundingRequest[]" id="checkfundingRequestField" value="Other">Other<br/>
				<input type="text" name="checkfundingRequest" class="form-control" id="checkfundingRequestField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="constructionDesignField">What do you hope to do? Describe construction or design details:</label>
				<input type="text" name="constructionDesign" class="form-control" id="constructionDesignField" placeholder="Enter Your Answer">
			</div>


			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Property Ownership & Control</h4>

			<p style="font-weight: bold;">If you are not the property owner, please submit sity control documentation and/or a memorandum of agreement (MOA) with the property owner outlining who will receive the funds, who will do the proposed work, and who will maintain the property upon completion.

			All completed projects using CPA funds will require a deed restriction, for housing affordability, conservation land, or as a historic resource in perpetuity. You can read more about how to do this in the Community Preservation Plan appendix.</p>

			<div class="ediv">
				<label for="propertyOwnerField">Who is the property owner and manager?</label>
				<input type="text" name="propertyOwner" class="form-control" id="propertyOwnerField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="uploadAgreementField">Pleas upload an agreement with the owner aanswering the questions listed above or provide site control documentation of you are not the property owner.</label>
				<input type="file" name="uploadAgreement" id="uploadAgreementField">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Timeline</h4>

			<div class="ediv">
				<label for="expectedStartDateField">Expected Start Date:</label>
				<input type="text" name="expectedStartDate" class="form-control" id="expectedStartDateField" placeholder="Enter Your Answer">
			</div>


			<div class="ediv">
				<label for="expectedCompleteDateField">Expected Completion Date:</label>
				<input type="text" name="expectedCompleteDate" class="form-control" id="expectedCompleteDateField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="checkfundingRequestField">Category (Pick the one that best describes your project):</label><br/>
				<input type="radio" name="pickCategory" value="parks">Parks, Open Space, or Outdoor Recreation<br/>
				<input type="radio" name="pickCategory" value="historic">Historic Preservation<br/>
				<input type="radio" name="pickCategory" value="housing">Affordable Housing<br/>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Parks, Open Space & Outoor Recreation</h4>

			<p style="font-weight: bold;">Please answer the following questions if your application is for parks, open space, or outdoor recreation. CPA funds may not be used for maintenance, programming, park events, or activities - only for captial improvements and acquisition of new green space. CPA cannot support astroturf athletic fields.</p>

			<div class="ediv">
				<label for="yourProjectField">Is your project?(check all that apply):</label><br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="park">A Public Park Improvement<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="acquisition">Acquisition (purchase) of land for open space uses<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="farm">An Urban Farm, COmmunity Garden, or Food Forest<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="schoolyard">A Schoolyard<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="waterfront">A Waterfront Resource<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="outdoor">An Outdoor Recreation Facility<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="property">On Private Property<br/>
				<input type="checkbox" name="yourProject[]" id="yourProjectField" value="Other">Other<br/>
				<input type="text" name="yourProject" class="form-control" id="yourProjectField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="intendedUsersField">Who are the intended users of your proposed project?</label>
				<input type="text" name="intendedUsers" class="form-control" id="intendedUsersField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="generalPublicField">If your open space will not be open to the general public, please explain:</label>
				<input type="text" name="generalPublic" class="form-control" id="generalPublicField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="masterPlanField">Do you have a master plan or management plan:</label><br/>
				<input type="checkbox" name="masterPlan[]" id="masterPlanField" value="yes">Yes<br/>
				<input type="checkbox" name="masterPlan[]" id="masterPlanField" value="no">No<br/>
				<input type="checkbox" name="masterPlan[]" id="checkfundingRequestField" value="Other">Other<br/>
				<input type="text" name="masterPlan" class="form-control" id="masterPlanField" placeholder="Enter Your Answer">			
			</div>

			<div class="ediv">
				<label for="maintenanceField">Who will do ongoing maintenance after project completion?</label>
				<input type="text" name="maintenance" class="form-control" id="maintenanceField" placeholder="Enter Your Answer">
			</div>
			
			<div class="ediv">
				<label for="historicLandscapeField">Is your project part of a historic landscape?</label>
				<input type="text" name="historicLandscape" class="form-control" id="historicLandscapeField" placeholder="Enter Your Answer">
			</div>

			<div class="ediv">
				<label for="publicArtField">Does your project include public art?</label><br/>
				<input type="checkbox" name="publicArt[]" id="publicArtField" value="yes">Yes<br/>
				<input type="checkbox" name="publicArt[]" id="publicArtField" value="no">No<br/>
				<input type="checkbox" name="publicArt[]" id="checkfundingRequestField" value="Other">Other<br/>
				<input type="text" name="publicArt" class="form-control" id="publicArt" placeholder="Enter Your Answer">			
			</div><br/>

			<p style="font-weight: bold;">Thank you! We will let you know within a few weeks of submission if your project is eligible. Fall applications will be available on www.boston.gov/cpa by August 15, 2018 and will be due of Friday, September 28, 2018.</p>

			<p>For help and questions, contact us!</p>

			<p>- christine.poff@boston.gov / 617-635-0277</p>
			<p>- thadine.brown@boston.gov / 617-635-0545</p>
			<p>- allyson.quinn@boston.gov / 617-635-4637</p>

			<input type="submit" name="submitEligibilityBtn" class="btn btn-primary" style="border-radius: 10px; padding-left: 35px; padding-right: 35px; margin-top: 25px; background-color: #071822; color: #fff; font-size: 20px;" value="Submit">
			

		</form>

	</div>

</div>

</body>
</html>