<?php

$page_title = "Admin Authentication - Homepage";
include_once 'partials/adminHeaders.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");
//include("approve.php");
//include("reject.php");

?>

<style>
      
    #eligibilityTable{
  		font-family: Times New Roman;
  		border-collapse: collapse;
 		width: 100%;
 		
	}

	#eligibilityTable td, #eligibilityTable th {
  		border: 1px solid #ddd;
  		padding: 8px;
  		text-align: left;
  		color: white;
  		
  		;
	}

	#eligibilityTable tr:nth-child(even){background-color: #5D6D7E;}
	#eligibilityTable tr:nth-child(odd){background-color: #85929E;}

	

	#eligibilityTable th {
 		padding-top: 12px;
  		padding-bottom: 12px;
  		text-align: left;
  		background-color: #071822;
  		color: white;
	}

	#cpaTable{
  		font-family: Times New Roman;
  		border-collapse: collapse;
 		width: 20%;
 		margin-top: -122px;
 
	}

	#cpaTable td, #cpaTable th {
  		border: 1px solid #ddd;
  		padding: 8px;
  		text-align: left;
  	
	}



	.rejectBtn{
		width: 100px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 15px; 
		background-color:rgba(231, 76, 60, 0.8); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 5px;  
		text-align: center; 
		float: center; 
		 
		margin-top: 5px;

	}

	.rejectBtn:hover{background-color:#F5B7B1;}

	.approveBtn{
		width: 100px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 15px; 
		background-color:rgba(46, 204, 113, 0.8); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 5px;  
		text-align: center; 
		float: center;



	}

	.approveBtn:hover{background-color:#ABEBC6;}

	.viewFormBtn{
		width: 100px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 15px; 
		background-color:rgba(127, 179, 213, 0.9); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 5px;  
		text-align: center; 
		float: center;



	}

	.viewFormBtn:hover{background-color:#D4E6F1;}

	.viewPdfBtn{
		width: 100px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 15px; 
		background-color:rgba(178, 186, 187, 0.8); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 5px;  
		text-align: center; 
		float: center;

		margin-top: 5px;

	}

	.viewPdfBtn:hover{background-color:#E5E8E8;}

	.eligibilityTable{
		float: left;
		width: 100%;
		
	}

	.logoutBtn
	{
		width: 100px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 15px; 
		background-color: #CB4335; 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 10px;  
		text-align: center; 
		float: center;
		color: white;

	}

	.logoutBtn:hover{background-color:#F1948A; color: black;}

	
	
</style>

<div class="container">

  <div class="flag">
    
 
	<?php if(!isset($_SESSION['username'])): ?>

		<!-- <h1>Community Preservation</h1> -->
    	<!-- <p class="lead">We use funds to support historic preservation, affordable housing, and parks and open space.</p> -->
		
		<!-- <P class="lead">You are currently not logged in. Click here to login: <a href="login.php">Login</a>. If you do not have an account, then click here to register: <a href="signup.php">Register</a></P> -->

	<?php else: ?>
		

		<div>
			
			<a href="logout.php" style="float: right; margin-top: 20px;"><input type='submit' class='logoutBtn' value='Logout'></a>

			<h1 class="lead" style="font-size: 40px; text-align: left;">Welcome Admin</h1><hr>

		</div>

		<div style="margin-top: 5px; float: center;">

			<h5 style="font-weight: bold;">Administration Panel</h5>
			
		
		</div>

		<div>
			<h3 id="yourform" style="text-align: left; margin-top: 40px; width: 250px; background-color: #071822; color: #fff; padding: 10px; border-radius: 5px 0px 25px 5px;">Submitted Forms</h3>
		</div>

		<div class="eligibilityTable">
		
			<table id="eligibilityTable" style="float: left;">
				
				<tr>
					<th>ID</th>
					<th style="margin-right: 50px;">Project Name</th>
					<th style="margin-right: 20%;">Email</th>
					<th style="width: 135px;">Eligibility Form</th> 
					<th style="width: 135px;">Eligibility Status</th>
					<th style="width: 125px;">Approve/Reject</th>
					<th>CPA Form</th>
					<th>CPA Status</th>
					<th style="width: 125px;">Approve/Reject</th>
				</tr>

				<tr>
					
					<?php

					$sel = "SELECT `id`, `projectName`, `email`, `eStatus`, `cStatus` FROM `eform`";

					$qrydisplay = mysqli_query($connect, $sel);


					while($row = mysqli_fetch_array($qrydisplay)) {
						$id = $row['id'];
						$projectName = $row['projectName'];
						$email = $row['email'];
						$eStatus = $row['eStatus'];
						$cStatus = $row['cStatus'];

						echo "<tr><td>".$id."</td>";
						echo "<td>".$projectName."</td>";
						echo "<td>".$email."</td>";
						echo "<td><a href='adminView.php?adminView=$id'><input type='submit' class='viewFormBtn' value='View Form'></a><br><a href='formPDF.php?formPDF=$id'><input type='submit' class='viewPdfBtn' value='View PDF'></a></td>";
						echo "<td>".$eStatus."</td>";
						echo "<td><a href='approve.php?id=$id'><input type='submit' class='approveBtn' value='Approve'></a><br><a href='reject.php?id=$id'><input type='submit' class='rejectBtn' value='Reject'></a></td>";
						echo "<td><a href='adminCpaView.php?adminCpaView=$id'><input type='submit' class='viewFormBtn' value='View Form'></a><br><a href='cpaformPDF.php?cpaformPDF=$id'><input type='submit' class='viewPdfBtn' value='View PDF'></a></td>";
						echo "<td>".$cStatus."</td>";
						echo "<td><a href='cApprove.php?id=$id'><input type='submit' class='approveBtn' value='Approve'></a><br><a href='cReject.php?id=$id'><input type='submit' class='rejectBtn' value='Reject'></a></td>";
						echo "<input type='hidden' name='hidden' value=".$eStatus."/></tr>";
					}

					?>

				</tr>

			</table>

		</div>
		
		
	<?php endif ?>


  </div>

</div>

<?php include_once 'partials/footers.php'; ?>

</body>
</html>