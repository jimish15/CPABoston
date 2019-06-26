<?php

function check_empty_fields($required_fields_array){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd popular the form error array
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field";
        }
    }

    return $form_errors;
}


function check_min_length($fields_to_check_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}


function check_email($data){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'email';
    //check if the key email exist in data array
    if(array_key_exists($key, $data)){

        //check if the email field has a value
        if($_POST[$key] != null){

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}

function show_errors($form_errors_array){
    $errors = "<p><ul style='color: red;'>";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "<li> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

function flashMessage($message, $passOrFail = "Fail"){

    if($passOrFail === "Pass")
    {
         $data = "<div class='alert alert-success'> {$message} </p>";
    }
    else
    {
        $data = "<div class='alert alert-danger'> {$message} </p>";
    }

    return $data;
}

function redirectTo($page){

    header("Location: {$page}.php");
}

function checkDuplicateEmail($value, $db){

    try
    {
        $sqlQuery = "SELECT email FROM users WHERE email=:email";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':email' => $value));

        if($row = $statement->fetch())
        {
            return true;
        }

        return false;
    }
    catch (PDOException $ex)
    {
        //handle exception
    }
}

function checkDuplicateUsername($value, $db){

    try
    {
        $sqlQuery = "SELECT username FROM users WHERE username=:username";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':username' => $value));

        if($row = $statement->fetch())
        {
            return true;
        }

        return false;
    }
    catch (PDOException $ex)
    {
        //handle exception
    }
}

function rememberMe($user_id){

    $encryptCookieData = base64_encode("UaQteh5i4y3dntstemYODEC{$user_id}");


    //Cookie set to expire in about 30 days
    setcookie("rememberUserCookie", $encryptCookieData, time()+60*60*24*100, "/");

}

function isCookieValid($db){

     $isValid = false;
    if (isset($_COOKIE['rememberUserCookie'])) {

        /**
         * Decode cookies and extract user ID
         */
        $decryptCookieData = base64_decode($_COOKIE['rememberUserCookie']);
        $user_id = explode("UaQteh5i4y3dntstemYODEC", $decryptCookieData);
        $userID = $user_id[1];

        /**
         * check if id retrieved from the cookie exist in the database
         * */
        $sqlQuery = "SELECT * FROM users WHERE id = :id";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':id' => $userID));

        if($row = $statement->fetch()){
            $id = $row['id'];
            $username = $row['username'];

            /**
             * Create the user session variable
             */
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $isValid = true;
        }else{
            /**
             * cookie ID is invalid destroy session and logout user
             */
            $isValid = false;
            signout();
        }
    }

    return $isValid;
}

function signout(){

    unset($_SESSION['username']);
    unset($_SESSION['id']);

   if(isset($_COOKIE['rememberUserCookie'])){
        unset($_COOKIE['rememberUserCookie']);
        setcookie('rememberUserCookie', null, -1, '/');
    }
    session_destroy();
    session_regenerate_id(true);
    redirectTo('index');

}
/*
function guard(){

    $isValid = true;
    $inactive = 60 * 15; //15 mins
    $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    if((isset($_SESSION['fingerprint']) && $_SESSION['fingerprint'] != $fingerprint)){
        $isValid = false;
        signout();
    }else if((isset($_SESSION['last_active']) && (time() - $_SESSION['last_active']) > $inactive) && $_SESSION['username']){
        $isValid = false;
        signout();
    }else{
        $_SESSION['last_active'] = time();
    }

    return $isValid;

}
*/

function isValidImage($file){

    $form_errors = array();

    //split file name into an array using the dot (.)
    $part = explode(".", $file);

    //target the last element in the array
    $extension = end($part);

    switch(strtolower($extension)){
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':

        return $form_errors;
    }

    $form_errors[] = $extension . " is not a valid image";
    return $form_errors;
}

function uploadAvatar($username){

    $isImageMoved = false;

    if($_FILES['avatar']['tmp_name']){

        //File in the temp location
        $temp_file = $_FILES['avatar']['tmp_name'];
        $ds = DIRECTORY_SEPARATOR; //uploads/
        $avatar_name = $username.".jpg";

        $path = "uploads".$ds.$avatar_name; //uploads/demo.jpg

        if(move_uploaded_file($temp_file, $path)){

            $isImageMoved = true;
        }

    }

    return $isImageMoved;

}