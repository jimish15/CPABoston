<?php

$page_title = "User Authentication - CPA Form Page";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'resource/formDatabase.php';
?>


<div class="container" style=" background-color:rgba(255, 255, 255, 0.7); padding-bottom: 20px; border-radius: 20px;">

	<div>

		<a href="index.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Eligibility & Information Form</h2><hr>

	</div>

	<section class="col col-lg-7">

		<div>
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>

		<div class="clearfix"></div>


		<form action="" method="POST">
			
			<div class="form-group">
				<label for="emailField">Email Address</label>
				<input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Summary Details</h4>

			<div class="form-group">
				<label for="projectField">Project Name</label>
				<input type="text" name="projectName" class="form-control" id="projectField"
				placeholder="Your Answer">
			</div>

			<!-- Should be a textbox size 250 -->
			<div class="form-group">
				<label for="descriptionField">Short Project Description</label>
				<input type="text" name="description" class="form-control" id="descriptionField"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="projectAddress">Project Street Address</label>
				<input type="text" name="Address" class="form-control" id="projectAddress"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="projectNeighborhood">Project Neighborhood</label>
				<input type="text" name="neighborhood" class="form-control" id="projecctNeighborhood" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="zip">Project Zip Code</label>
				<input type="text" name="zipCode" class="form-control" id="zip"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="organization">Applicant Organization</label>
				<input type="text" name="ApplicantOrganization" class="form-control" id="organization" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="contact">Contact Person & Title</label>
				<input type="text" name="contactPerson" class="form-control" id="contact"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="phone">Phone Number</label>
				<input type="text" name="phoneNumber" class="form-control" id="phone" placeholder="Your Answer">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Funding Request</h4>

			<div class="form-group">
				<label for="amountReq">Amount Requested</label>
				<input type="text" name="amountRequested" class="form-control" id="amountReq" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="cost">Total Project Cost</label>
				<input type="text" name="projectCost" class="form-control" id="cost" placeholder="Your Answer">
			</div>

			<!-- Should be a text box size of 250 -->
			<div class="form-group">
				<label for="fundingFor">Why is Funding Needed?</label>
				<input type="text" name="fundingExplained" class="form-control" id="fundingFor"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="otherFunding">Other Funding Sources or in-kind support (not whether received, decision pending, or will apply)</label>
				<input type="text" name="outsideFunding" class="form-control" id="otherFunding"
				placeholder="Your Answer">
			</div>

			<!-- Should have check boxes -->
			<div class="form-group">
				<label for="request">Project Funding Request is for (check all that apply)</label>
				<br>
				<input type="checkbox" name="fundingRequest"
				<?php if (isset($fundingRequest) && $fundingRequest=="Planning & Design") echo "checked";?>
				value="Planning & Design">Planning & Design
				<br>
				<input type="checkbox" name="fundingRequest"
				<?php if (isset($fundingRequest) && $fundingRequest=="Construction") echo "checked";?>
				value="Construction">Construction
				<br>
				<input type="checkbox" name="fundingRequest"
				<?php if (isset($fundingRequest) && $fundingRequest=="Aquisition") echo "checked";?>
				value="Aquisition">Aquisition(purchase)
				<br>
				<input type="checkbox" name="fundingRequest"
				<?php if (isset($fundingRequest) && $fundingRequest=="Other") echo "checked";?>
				value="Other">Other
				<input type="text" name="other" class="form-control" id="request" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="details">What do you hope to do? Describe construction or design details.</label>
				<input type="textbox" name="designDetails" class="form-control" id="details"
				placeholder="Your Answer">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Property Ownership & Control</h4>

			<p>If you are not the property owner, please submit sity control documentation and/or a memorandum of agreement (MOA) with the property owner outlining who will receive the funds, who will do the proposed work, and who will maintain the property upon completion.</p>
			<p>All completed projects using CPA funds will require a deed restriction, for housing affordability, conservation land, or as a historic resource in perpetuity. You can read more about how to do this in the Community Preservation Plan appendix.</p>

			<div class="form-group">
				<label for="owner">Who is the propery owner and manager?</label>
				<input type="text" name="propertyOwner" class="form-control" id="owner"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="upload">Pleas upload an agreement with the owner aanswering the questions listed above or provide site control documentation of you are not the property owner.</label>
				<!-- This is where the file upload field goes -->
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Timeline</h4>

			<div class="form-group">
				<label for="expectedStart"> Expected Start Date</label>
				<input type="text" name="startDate" class="form-control" id="expectedStart" 
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="expectedCompletion">Expected Completion Date</label>
				<input type="text" name="completionDate" class="form-control" id="expectedCompletion" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="category">Category (pick the one that best describes your project)</label>
				<br>
				<input type="checkbox" name="projectCategory"
				<?php if(isset($projectCategory) && $projectCategory=="Parks") echo "checked";?>value="Parks">Parks, Open Space, or Outdoor Recreation
				<br>
				<input type="checkbox" name="projectCategory"
				<?php if(isset($projectCategory) && $projectCategory=="Historic") echo "checked";?>value="historic">Historic Preservation
				<br>
				<input type="checkbox" name="projectCategory"
				<?php if(isset($projectCategory) && $projectCategory=="Housing") echo "checked";?>value="Housing">Affordable Housing
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Parks, Open Space & Outdoor Recreation</h4>

			<p>Please answer the following questions if your application is for parks, open space, or outdoor recreation. CPA funds may not be used for maintenance, programming, park events, or activities - only for captial improvements and acquisition of new green space. CPA cannot support astroturf athletic fields.</p>

			<div class="form-group">
				<label for="project">Is your project? (check all that apply)</label>
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="park") echo "checked";?>value="park">A Public Park Improvement
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="acquisition") echo "checked";?>value="acquisition">Acquisition (purchase) of land for open space uses
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="farm") echo "checked";?>value="farm">An Urban Farm, Community Garden, or Food Forest
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="schoolyard") echo "checked";?>value="schoolyard">A Schoolyard
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="waterfront") echo "checked";?>value="waterfront">A Waterfront Resource
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="outdoor") echo "checked";?>value="outdoor">An Outdoor Recreation Facility
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if(isset($projectTitle) && $projectTitle=="property") echo "checked";?>value="property">On Private Property
				<br>
				<input type="checkbox" name="projectTitle"
				<?php if (isset($projectTitle) && $projectTitle=="Other") echo "checked";?>
				value="Other">Other
				<input type="text" name="other" class="form-control" id="request" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="users">Who are the intended users of your proposed project?</label>
				<input type="text" name="intendedUsers" class="form-control" id="users"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="openSpace">If your open space will not be open to the general public, please explain.</label>
				<input type="textbox" name="openSpace" class="form-control" id="openSpace"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="plan">Do you have a master plan or management plan for your open space?</label>
				<br>
				<input type="checkbox" name="masterPlan"
				<?php if(isset($masterPlan) && $masterPlan=="Yes") echo "checked";?>value="Yes">Yes
				<br>
				<input type="checkbox" name="masterPlan"
				<?php if(isset($masterPlan) && $masterPlan=="No") echo "checked";?>value="No">No
				<br>
				<input type="checkbox" name="masterPlan"
				<?php if (isset($masterPlan) && $masterPlan=="Other") echo "checked";?>
				value="Other">Other
				<input type="text" name="other" class="form-control" id="request" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="maintenance">Who will do ongoing maintenance after project completion?</label>
				<input type="text" name="projectMaintenance" class="form-control" id="maintenance" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="landscape">Is your project part of a historic landscape?</label>
				<input type="text" name="historicLandscape" class="form-control" id="landscape"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="art">Does your project include public art?</label>
				<br>
				<input type="checkbox" name="publicArt"
				<?php if(isset($publicArt) && $publicArt=="yes") echo "checked";?>value="yes">Yes
				<br>
				<input type="checkbox" name="publicArt"
				<?php if(isset($publicArt) && $publicArt=="no") echo "checked";?>value="no">No
				<br>
				<input type="checkbox" name="publicArt"
				<?php if (isset($publicArt) && $publicArt=="Other") echo "checked";?>
				value="Other">Other
				<input type="text" name="other" class="form-control" id="request" placeholder="Your Answer">
			</div>

			<h4>Thank you! We will let you know within a few weeks of submission if your project is eligible. Fall applications will be available on www.boston.gov/cpa by August 15, 2018 and will be due of Friday, September 28, 2018.</h4>

			<p>For help and questions, contact us!</p>
			<p1>- christine.poff@boston.gov / 617-635-0277</p1>
			<br>
			<p1>- thadine.brown@boston.gov / 617-635-0545</p1>
			<br>
			<p1>- allyson.quinn@boston.gov / 617-635-4637</p1>
			<br>

			<button type="submit" name="eligibilityBtn" class="btn btn-primary" style="border-radius: 10px; padding-left: 35px; padding-right: 35px; margin-top: 25px; background-color: #071822; color: #fff; font-size: 20px;">Submit</button>

		</form>

	</section>

</div>





<?php include_once 'partials/footers.php'; ?>

</body>
</html>