<?php

include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

 
if(isset($_GET['id'])) 
{
        $row = $_GET['id'];
        $sql = "UPDATE `eform` SET `cStatus` = 'Rejected' WHERE `id`='$row'";
        $result = mysqli_query($connect, $sql);
        mysqli_query($connect, $result);
        if($result == 1) {
                header("location: admin.php");
        }
}

?>