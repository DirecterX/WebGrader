<?php
    include('config.php');

    $assignment_id = $_POST['Assignment_ID'];
    $submit_id = $_POST['Submit_ID'];
    $course_id = $_POST['Course_ID'];

    if(isset($_POST['submit'])){
        
        ########################## GET MAX SCORE FROM ASSIGNMENT ############################
        $select_score_sql = "SELECT Score FROM assignment WHERE Assignment_ID ='$assignment_id'";
        $select_score_query = mysqli_query($connect,$select_score_sql);
        $select_score_rows = mysqli_fetch_array($select_score_query);

        $score = $select_score_rows['Score'];
        $turn_in_status = "passed";

        ############################################ UPDATE SUBMITION STATUS #####################
        $update_submition = $connect->prepare("UPDATE submition SET Score_Gain=? , Turn_in_Status =? WHERE Submit_ID =?");
        $update_submition->bind_param("isi", $score, $turn_in_status, $submit_id);
        $update_submition->execute();
        $update_submition->close();

        header("Location: Course.php?Course_ID=$course_id");
    }

    if(isset($_POST['reject_button'])){
        
        $score = 0;
        $turn_in_status = "not passed";
        ############################################ UPDATE SUBMITION STATUS #####################
        $update_submition = $connect->prepare("UPDATE submition SET Score_Gain=? , Turn_in_Status =? WHERE Submit_ID =?");
        $update_submition->bind_param("isi", $score, $turn_in_status, $submit_id);
        $update_submition->execute();
        $update_submition->close();

        header("Location: Course.php?Course_ID=$course_id");
    }
?>