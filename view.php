<?php
$page_title = "User Authentication - Eligibility Form Page";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

$getid = $_GET['view'];

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


	$selviewdata = "UPDATE `eform` SET `email`='$upemail',`projectName`='$upprojectName',`shortProjectDescription`='$upshortProjectDescription',`projectStreetAddress`= '$upprojectStreetAddress',`projectNeighborhood`='$upprojectNeighborhood',`projectZip`='$upprojectZip',`applicantOrg`='$upapplicantOrg',`contactPersonTitle`='$upcontactPersonTitle',`phoneNumber`='$upphoneNumber' WHERE `id` = '$upid'";

	$qry = mysqli_query($connect, $selviewdata);

	if($qry)
	{
		header("location: index.php");
	}
}

?>

<div class="container" style="background-color: rgba(255,255,255,0.7); padding-left: 30px; padding-bottom: 20px; border-radius: 20px;">

	<div>

		<a href="index.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 60px; padding-top: 10px;">CPA Boston - Eligibility & Information Form</h2><hr>

	</div>

	<div class="clearfix"></div>

	<div style="padding-right: 100px;">
		
		<form action="" method="POST">

			<div class="form-group">
				<label for="emailField">Email Address:</label>
				<input type="text" name="upemail" class="form-control" id="emailField" value="<?php echo $email; ?>" disabled>
			</div>

			<h4 style="width: 300px; background-color: #071822; color: #fff; padding: 10px; border-radius: 0px 0px 25px 0px; margin-top: 25px; margin-bottom: 25px;">Summary Details</h4>

			<div class="form-group">
				<label for="projectField">Project Name:</label>
				<input type="text" name="upprojectName" class="form-control" id="projectField" value="<?php echo $projectName; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="descriptionField">Short Project Description:</label>
				<input type="text" name="upshortProjectDescription" class="form-control" id="emailField" value="<?php echo $shortProjectDescription; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="addressField">Project Street Address:</label>
				<input type="text" name="upprojectStreetAddress" class="form-control" id="emailField" value="<?php echo $projectStreetAddress; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="neighborhoodField">Project Neighborhood:</label>
				<input type="text" name="upprojectNeighborhood" class="form-control" id="neighborhoodField" value="<?php echo $projectNeighborhood; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="zipField">Project Zip-Code:</label>
				<input type="text" name="projectZip" class="form-control" id="zipField" value="<?php echo $projectZip; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="appOrgField">Applicant Organization:</label>
				<input type="text" name="upapplicantOrg" class="form-control" id="appOrgField" value="<?php echo $applicantOrg; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="contactField">Contact Person & Title:</label>
				<input type="text" name="upcontactPersonTitle" class="form-control" id="contactField" value="<?php echo $contactPersonTitle; ?>"disabled>
			</div>

			<div class="form-group">
				<label for="phoneNumberField">Phone Number:</label>
				<input type="text" name="upphoneNumber" class="form-control" id="phoneNumberField" value="<?php echo $phoneNumber; ?>"disabled>
			</div>

			

		</form>

	</div>

</div>

<?php include_once 'partials/footers.php'; ?>




</body>
</html>