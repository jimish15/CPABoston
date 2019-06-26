<?php

if (isset($_POST['eligibilityBtn'])) {

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "forms";

	$email = $_POST['email'];
	$projectName = $_POST['projectName'];
	$description = $_POST['description'];
	$address = $_POST['Address'];
	$neighborhood = $_POST['neighborhood'];
	$zipCode = $_POST['zipCode'];
	$appOrg = $_POST['ApplicantOrganization'];
	$contactPerson = $_POST['contactPerson'];
	$phoneNumber = $_POST['phoneNumber'];

	$connect = mysqli_connect($hostname, $username, $password, $databaseName);

	$query="INSERT INTO eligibilityform(email,projectName,shortProjectDescription,projectStreetAddress,projectNeighborhood,projectZip,applicantOrg,contactPersonTitle,phoneNumber)VALUES('$email','$projectName','$description','$address','$neighborhood','$zipCode','$appOrg','$contactPerson','$phoneNumber')";


	$result = mysqli_query($connect,$query);

	if($result){
		echo 'Data Inserted';
	}
	else{
		echo 'Data Not Inserted';
	}

}



?>