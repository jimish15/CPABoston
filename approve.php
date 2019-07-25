<?php
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include ("resource/formDB.php");

if(isset($_GET['id'])) {
        $row = $_GET['id'];
        $sql = "UPDATE `eform` SET `eStatus` = 'Approved' WHERE `id`='$row'";
        $result = mysqli_query($connect, $sql);
        mysqli_query($connect, $result);
        if($result == 1) {
        header("location: admin.php");
        }
} else {
        $row = $_GET['id'];
        $sql = "UPDATE `eform` SET `eStatus` = 'Not Submitted' WHERE `id` = '$row'";
        $result = mysqli_query($connect, $sql);
        mysqli_query($connect, $result);
        if($result == 1) {
        header('location: admin.php');
        }
}

?>