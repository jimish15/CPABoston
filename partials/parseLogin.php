<?php

include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['loginBtn'])){
	
//array to hold errors
$form_errors = array();

//validate
$required_fields = array('username', 'password');

$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

if(empty($form_errors))
{
	//collect from data
	$user = $_POST['username'];
	$password = $_POST['password'];

	isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";


	//check if user exist in the database
	$sqlQuery = "SELECT * FROM users WHERE username = :username";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array(':username' => $user));

	while($row = $statement->fetch())
	{

		$id = $row['id'];
		$hashed_password = $row['password'];
		$username = $row['username'];
		$activated = $row['activated'];
		$role = $row['role']; 

		if($role == 'admin') {
			redirectTo('admin');
		} else {
			echo $welcome = "<script type=\"text/javascript\">
							swal({
							title: \"Welcome Back $username\",
							text: \"You're being logged in.\",
							type: 'success',
							timer: 3000,
							showConfirmButton: false });

							setTimeout(function(){
								window.location.href = 'index.php';
								}, 3000);
					</script>";
		}

		if($activated === "0"){

			$result = flashMessage("Please activate your account");

		}
		else{

			if(password_verify($password, $hashed_password)){
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;

			//$fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
			//$_SESSION['last_activity'] = time();
			//$_SESSION['fingerprint'] = $fingerprint;

			if($remember === "yes"){

				rememberMe($id);

			}

			echo $welcome = "<script type=\"text/javascript\">
							swal({
							title: \"Welcome Back $username\",
							text: \"You're being logged in.\",
							type: 'success',
							timer: 3000,
							showConfirmButton: false });

							setTimeout(function(){
								window.location.href = 'index.php';
								}, 3000);
					</script>";
			
			//redirectTo('index');
			}
			else
			{
			
			$result = flashMessage("Invalid username or password");
			
			}
		}

		
	}

}
else
{
	if(count($form_errors) == 1)
	{
		$result = flashMessage("There was one error in the form");
	}
	else
	{
		$result = flashMessage("There were " .count($form_errors). " one error in the form");
	}
}

}