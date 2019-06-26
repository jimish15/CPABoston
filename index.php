<?php

$page_title = "User Authentication - Homepage";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';

?>

<style>
      
    #eligibilityTable{
  		font-family: Times New Roman;
  		border-collapse: collapse;
 		width: 70%;
 		
	}

	#eligibilityTable td, #eligibilityTable th {
  		border: 1px solid #ddd;
  		padding: 8px;
  		text-align: left;
  		;
	}

	#eligibilityTable tr:nth-child(even){background-color: #f2f2f2;}
	#eligibilityTable tr:nth-child(odd){background-color: #fff;}

	#eligibilityTable tr:hover {background-color: #ddd;}

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
 		width: 30%;
 		
 
	}

	#cpaTable td, #cpaTable th {
  		border: 1px solid #ddd;
  		padding: 8px;
  		text-align: left;
	}

	#cpaTable tr:nth-child(even){background-color: #f2f2f2;}

	#cpaTable tr:hover {background-color: #ddd;}

	#cpaTable th {
 		padding-top: 12px;
  		padding-bottom: 12px;
  		text-align: left;
  		background-color: #071822;
  		color: white;
	}

	.newEligibilityBtn{
		width: 200px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 20px; 
		background-color:rgba(251, 77, 66, 0.6); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 10px; 
		float: right; 
		text-align: center; 
		 
		margin-top: 5px;

	}

	.newEligibilityBtn:hover{background-color:rgba(251, 77, 66, 0.4);}

	.newCpaBtn{
		width: 200px;
		padding: 5px; 
		cursor: pointer; 
		font-size: 20px; 
		background-color:rgba(251, 77, 66, 0.6); 
		color: #071822; font-weight: bold; 
		border: 2px solid #071822; 
		border-radius: 10px; 
		float: right; 
		text-align: center; 
		margin-bottom: 15px; 
		margin-top: 5px;

	}

	.newCpaBtn:hover{background-color:rgba(251, 77, 66, 0.4);}

	.eligibilityTable{
		float: left;
		width: 90%;
		
	}

	.cpaTable{
		float: right;
		width: 30%;
		
		
	}

</style>

<div class="container">

  <div class="flag">
    
 
	<?php if(!isset($_SESSION['username'])): ?>

		<h1>Community Preservation</h1>
    	<p class="lead">We use funds to support historic preservation, affordable housing, and parks and open space.</p>
		
		<P class="lead">You are currently not logged in. Click here to login: <a href="login.php">Login</a>. If you do not have an account, then click here to register: <a href="signup.php">Register</a></P>

	<?php else: ?>
		

		<div>
			
			<a href="logout.php" style="float: right; margin-top: 20px;">Logout</a>

			<h1 class="lead" style="font-size: 40px; text-align: left;">Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></h1><hr>

			<button class=newEligibilityBtn onclick="window.location.href='eligibility.php'">New Eligibility Form</button>

		</div>

		<div style="margin-top: 100px; float: center;">

			<h5 style="font-weight: bold;">Please follow the instruction below prior to completeing the forms.</h5>

			<p>Step 1: First fill out the Eligibility Form.<br>Step 2: Once the Eligibility Form is approved, then fill out the CPA Form.</p>
			
		
		</div>

		<div>
			<h3 id="yourform" style="text-align: left; margin-top: 40px; width: 250px; background-color: #071822; color: #fff; padding: 10px; border-radius: 5px 0px 25px 5px;">Your Forms</h3>

	
		</div>

		<div class="eligibilityTable">
		
			<table id="eligibilityTable" style="float: left;">
				
				<tr>
					<th>Project Name</th>
					<th>Email</th>
					<th>Eligibility Status</th>
				</tr>

				<?php

					$conn = mysqli_connect("localhost","root","","forms");
					if($conn-> connect_error){
						die("Connection failed:".$conn-> connect_error);
					}

		
					
					$result = mysqli_query($conn,"SELECT email, projectName,eligibilitystatus FROM eligibilityform WHERE email = \"$email\"");
					
					if(mysqli_num_rows($result) > 0){
						
						while($row = mysqli_fetch_assoc($result)){
						
						
						?>
						<tr>
							<td><?php echo $row["projectName"];?></td>
							<td><?php echo $row["email"];?></td>
							<td><?php echo $row["eligibilitystatus"];?></td>
							

						</tr>
						<?php

						}
						
						
					}

					

					mysqli_close($conn);

					
				?>

			</table>

		</div>

		<div class="cpaTable">
			
			<table id="cpaTable" style="float: right;">
				
				<tr>
					<th> CPA Status</th>
				</tr>

				<?php

					$conn = mysqli_connect("localhost","root","","forms");
					if($conn-> connect_error){
						die("Connection failed:".$conn-> connect_error);
					}

					
					$sql = "SELECT email cpastatus FROM cpaform WHERE email = \"$email\"";

					$result = $conn-> query($sql);
	

					if($result-> num_rows > 0){
						
						
							while($row = $result-> fetch_assoc()){

								echo "<tr><td>".$row["cpastatus"]."</td></tr>";
							}
							echo "</table>";
						
					}
					else {
						echo "<tr><td>Not Submitted</td></tr>";
					}

					$conn-> close();
				?>

			</table>


		</div>

		

















		
			
			

			

			
			
	<?php endif ?>


  </div>

</div>

<?php include_once 'partials/footers.php'; ?>

</body>
</html>

