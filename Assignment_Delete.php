<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
    endif;
    $Assignment_ID = $_GET['Assignment_ID'];
    $userid = $_SESSION['User_ID'];
    $checkcourserole = mysqli_query($connect,"
        SELECT * 
        FROM course_role 
        INNER JOIN assignment ON assignment.Assignment_ID = '$Assignment_ID'
        WHERE User_ID = '$userid' AND course_role.Course_ID = assignment.Course_ID  ");
    //echo $checkcourserole["Role"];
    $result = mysqli_fetch_assoc($checkcourserole);
    $role = $result["Role"];

    if ($role == "Owner" || $role = "Teacher") {

        $dele_Ass_Sumitall = "DELETE FROM submition WHERE Assignment_ID =  '$Assignment_ID'";
        $dele_Ass_Sumitallq = mysqli_query($connect,$dele_Ass_Sumitall);


        $dele_Ass_TestcaseAll = "DELETE FROM testcase WHERE Assignment_ID =  '$Assignment_ID'";
        $dele_Ass_TestcaseAllq = mysqli_query($connect,$dele_Ass_TestcaseAll);


        $dele_Ass = "DELETE FROM assignment WHERE Assignment_ID =  '$Assignment_ID'";
        $dele_Assq = mysqli_query($connect,$dele_Ass);
        $courseID = $result["Course_ID"];
        header("location:Course.php?Course_ID=$courseID");
    }
