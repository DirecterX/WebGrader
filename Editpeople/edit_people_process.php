<?php
    include ("../config.php");
	$uid = $_SESSION['User_ID'];
    $userid = $_POST['User_ID'];
    $courseid = $_POST['Course_ID'];
    $role = $_POST['Role'];
    $errors = [];


            $update="update course_role set Role ='".$role."' where User_ID='".$userid."'and Course_ID = '".$courseid."' ";
            
            if ( mysqli_query($connect,$update)==1) {
                $_SESSION["Role"] = $result["Role"];
                header("location:../Course.php?Course_ID=$courseid");
            }
?>