<?php

$page_title = "User Authentication - Login Page";
include_once 'partials/headers.php';
include_once 'partials/parseLogin.php';

?>

<div class="container">
	
	<section class="col col-lg-7">

		<a href="index.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 50px">Sign in Form</h2><hr>

		<div>
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>

		<div class="clearfix"></div>

		<form action="" method="post">
  			<div class="form-group">
    			<label for="usernameField">Username</label>
    			<input type="text" class="form-control" name="username" id="usernameField" aria-describedby="emailHelp" placeholder="Enter Username">
  			</div>

  			<div class="form-group">
    			<label for="passwordField">Password</label>
    			<input type="password" name="password" class="form-control" id="passwordField" placeholder="Enter Password">
  			</div>

  			<div class="checkbox">
   				<label>
   					<input name="remember" value="yes" type="checkbox"> Remember Me
   				</label>
 			</div>

 			<button type="submit" name="loginBtn" class="btn btn-primary" style="padding-left: 35px; padding-right: 35px;">Sign in</button>
 			


		</form>

	</section>

</div>



<?php include_once 'partials/footers.php'; ?>

</body>
</html>