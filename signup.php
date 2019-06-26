<?php

$page_title = "User Authentication - Register Page";
include_once 'partials/headers.php';
include_once 'partials/parseSignup.php';

?>

<div class="container">
    
    <section class="col col-lg-7">

        <a href="index.php" style="float: right; margin-top: 15px;">Back</a>

        <h2 style="margin-top: 50px">Registration Form</h2><hr>

        <div>
            <?php if(isset($result)) echo $result; ?>
            <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>

        <div class="clearfix"></div>


        <form action="" method="post">

            <div class="form-group">
                <label for="emailField">Email:</label>
                <input type="text" class="form-control" name="email" id="emailField" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="usernameField">Username:</label>
                <input type="text" class="form-control" name="username" id="usernameField" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label for="passwordField">Password:</label>
                <input type="password" name="password" class="form-control" id="passwordField" placeholder="Enter Password">
            </div>

            <button type="submit" name="signupBtn" class="btn btn-primary pull-right" style="float: left; padding-left: 35px; padding-right: 35px; font-size: 18px;">Register</button>
        </form>
        
    </section>

</div>


<?php include_once 'partials/footers.php'; ?>

</body>
</html>