<?php

$page_title = "User Authentication - CPA Form Page";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'resource/formDatabase.php';

?>


<div class="container" style=" background-color:rgba(255, 255, 255, 0.7); padding-bottom: 20px; border-radius: 20px;">

	<div>

		<a href="index.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Fall 2019 Application</h2><hr>

	</div>

	<section class="col col-lg-7">

		<div>
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>

		<div class="clearfix"></div>

		<p>Please read the application overview prior to completeing this form. It will serve as a guide and has lots of helpful information.</p>
		<p>Any files that are uploaded will be shared outside of the organization they belong to.</p>

		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="emailField">Email Address</label>
				<input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px; padding-left: ">Cover Sheet</h4>

			<div class="form-group">
				<label style="font-weight: bold;" for="projectField">Project Name</label>
				<input type="text" name="projectName" class="form-control" id="projectField"
				placeholder="Your Answer">
			</div>

			<!-- Should be a textbox size 250 -->

			<div class="form-group">
				<label for="projectAddress">Project Street Address & Neighborhood</label>
				<input type="text" name="AddressNeighborhood" class="form-control" id="projectAddress"
				placeholder="Your Answer">
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

			<div class="form-group">
				<label for="emailField">Email Address</label>
				<input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
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
				<label for="fundingFor">Short Project Description - for the CPA webpages</label>
				<input type="text" name="fundingExplained" class="form-control" id="fundingFor"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="summary">1. Project Summary & Anticipated Outcome: Information about your organization is not needed here, just describe what you hope to do (e.g. build 10 units of affordable housing or repair roof) and why tis project will make a difference - the outcome.</label>
				<input type="textbox" name="projectSummary" class="form-control" id="summary"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="assessment">2. Needs Assessment: Why do you need the funds? How bad are the existing conditions? What are the neighborhood challenges you hope to address?</label>
				<input type="textbox" name="needsAssessment" class="form-control" id="assessment" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="timeline">3. Project Implementation/Timeline: Divide your project into three milestones that make sense to you. Attach anticipated completion dates for each stage and cost.</label>
				<input type="textbox" name="projectTimeline" class="form-control" id="timeline"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="experience">4. Experience & Capacity: Convince us that you have the ability to carry out the steps and oversight needed to complete the project. How have you been a good steward or landlord? Have you done projects like this before? Share your history of caring for the resource.</label>
				<input type="textbox" name="projectExperience" class="form-control" id="experience" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="plan">5. Organizational Strategy & Plan: How does this project fit into your current programming or capital work and future plans?</label>
				<input type="textbox" name="projectPlan" class="form-control" id="plan" 
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="benefit">6. Public Benefit: Who will the project serve?</label>
				<input type="textbox" name="publicBenefit" class="form-control" id="benefit"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="support">7. Community Support & Opposition: List the required community meetings you have had for the project and attendance. If community members have been opposed, let us know why - please be honest!</label>
				<input type="textbox" name="communitySupport" class="form-control" id="support"
				placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="sustainability">8. Sustainability & Maintenance: How will the site or building be maintained going forward? Share a detailed plan - who will be responsible?</label>
				<input type="textbox" name="projectSustainability" class="form-control" id="sustainability" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="goals">9. How does your project meet the goals outlined in the Community Preservation Plan and Boston2030? If you are applying for historic preservation funds, share the project's significance and how it contributes to the character of your neighborhood.</label>
				<input type="textbox" name="projectGoals" class="form-control" id="goals" placeholder="Your Answer">
			</div>

			<div class="form-group">
				<label for="budget">10. Budget Explanation: feel free to share any unusual circumstances, budget details you'd like to explain, or information about additional fundraising.</label>
				<input type="textbox" name="budgetExplaination" class="form-control" id="budget" placeholder="Your Answer">
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Uploads</h4>
			
			<p>Please upload each of the forms listed below.</p>

			<div class="form-group">
				<label for="control">Property Control: If you do not own the property, upload an agreement with the owner that gives you permission to implement the project and outlines who will receive funds, hire and manage contractors, and do ongoing maintenance.</label>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="councilSupport">City Council Support: Upload a letter from your district councilor supporting the project.</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="communitySupport">Community Support: IF you have a petition signed by neighbors who are excited about the project, please upload.</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Project Visuals</h4>

			<div class="form-group">
				<label for="appearance">Current Appearance: Upload ONE photo of your site/facility/resource.</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="design">Design: Upload ONE design drawing.</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="designResult">Finished Result: Upload a rendering of what you hope your completed project will look like, if you have one.</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Budget & Financials</h4>
			
			<p>Please use the CPA budget format. To do this: 1) click on the link below; 2) you have to make a copy befor you can start to fill it in; 3)download the copy to save and rename it; 4) last - upload below under Budget.</p>

			<div class="form-group">
				<label for="budgetFile">Budget</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="IRSsubmission">Most recent Form990 or IRS submission for applicant organization</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="profit">Profit & Loss statement for full year</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<div class="form-group">
				<label for="balanceStatement">Balance Statement</label>
				<br>
				<button type="add file" name="fileBtn" class="btn btn-primary" style="padding-left: 5px; padding-right: 5px;">Add File</button>
			</div>

			<h4>Thank you! We will let you know if your application is complete and will be considered for funding.</h4>

			<p>For help and questions, contact us!</p>
			<p1>- christine.poff@boston.gov / 617-635-0277</p1>
			<br>
			<p1>- thadine.brown@boston.gov / 617-635-0545</p1>
			<br>
			<p1>- allyson.quinn@boston.gov / 617-635-4637</p1>
			<br>

			<button type="submit" name="eligibilityBtn" class="btn btn-primary" style=" border-radius: 10px; padding-left: 35px; padding-right: 35px; margin-top: 25px; background-color: #071822; color: #fff; font-size: 20px;">Submit</button>
	</section>

</div>


<?php include_once 'partials/footers.php'; ?>

</body>
</html>