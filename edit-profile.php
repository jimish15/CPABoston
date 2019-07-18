<?php
$page_title = "User Authentication - Edit Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';

?>


<div class="container">
	<section class="col col-lg-7">

		<a href="profile.php" style="float: right; margin-top: 15px;">Back</a>

		<h2 style="margin-top: 50px;">Edit Profile</h2><hr>

		<div>
			
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($from_errors)) echo show_errors($from_errors); ?>

		</div>
		<div class="clearfix"></div>

		<?php if (!isset($_SESSION['username'])): ?>
			<P class="lead">You are not authorized to view this page <a href="login.php">Login</a> Not a member yet? <a href="signup.php">Register</a> </P>

		<?php else: ?>

			<form method="post" action="" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="emailField">Email</label>
					<input type="text" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?> "disabled>
				</div>
				

				<div class="form-group">
					<label for="usernameField">Username</label>
					<input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" class="form-control" id="usernameField">
				</div>

				<div class="form-group">
					<label for="fileField">Profile Image</label><br>
					<input type="file" name="avatar" id="fileField">
				</div>
				
				<input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
				<button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right">Update Profile</button>
			</form>

		<?php endif ?>
	</section>

</div>

<?php include_once 'partials/footers.php'; ?>

</body>
</html>