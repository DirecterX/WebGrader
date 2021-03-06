<?php
    include('config.php');

    if(isset($_POST['Course_ID']) && isset($_POST['Assignment_Name']) && isset($_POST['Assignment_Score']) && isset($_POST['Assignment_Detail']) && isset($_POST['Assignment_End_date'])){
        $course_id = $_POST['Course_ID'];
        $assignment_name = $_POST['Assignment_Name'];
        $assignment_score = $_POST['Assignment_Score'];
        $assignment_detail = $_POST['Assignment_Detail'];
        $assignment_end_date = $_POST['Assignment_End_date'];
    }else{
        header("Location: home.php");
    }

    ############################################## INSERT ASSIGNMENT ##################################################
    $insert_assignment = $connect->prepare("INSERT INTO assignment (Course_ID,Name,Score,Detail,End_date) VALUES(?,?,?,?,?)");
    $insert_assignment->bind_param("isiss", $course_id, $assignment_name, $assignment_score, $assignment_detail, $assignment_end_date);
    $insert_assignment->execute();
    $insert_assignment->close();

    $last_insert_id = $connect->insert_id;

    $testcase_count = 1;
    $not_hidden = 0;
    while($testcase_count <= $_SESSION['testcase_count']){
        ###################################################### INSERT TESTCASE SECTION #######################################################
      ${"insert_testcase".$testcase_count} = $connect->prepare("INSERT INTO testcase (Assignment_ID,Number,Expected_Result,Input,Is_hidden) VALUES(?,?,?,?,?)");
      ${"insert_testcase".$testcase_count}->bind_param("iissi", $last_insert_id, $testcase_count, $_SESSION['testcase'.$testcase_count], $_SESSION['testcase'.$testcase_count.'_input'], $not_hidden);
      ${"insert_testcase".$testcase_count}->execute();
      ${"insert_testcase".$testcase_count}->close();

      $testcase_count++;
    }

    $hiddencase_count = 1;
    $hidden = 1;
    while($hiddencase_count <= $_SESSION['hiddencase_count']){
        ###################################################### INSERT Hiddencase SECTION #######################################################
      ${"insert_testcase".$testcase_count} = $connect->prepare("INSERT INTO testcase (Assignment_ID,Number,Expected_Result,Input,Is_hidden) VALUES(?,?,?,?,?)");
      ${"insert_testcase".$testcase_count}->bind_param("iissi", $last_insert_id, $testcase_count, $_SESSION['hiddencase'.$hiddencase_count], $_SESSION['hiddencase'.$hiddencase_count.'_input'], $hidden);
      ${"insert_testcase".$testcase_count}->execute();
      ${"insert_testcase".$testcase_count}->close();

      $testcase_count++;
      $hiddencase_count++;
    }

    $_SESSION['pre'] = False;
    header("location:/WebGrader/Course.php?Course_ID=".$course_id."");
?>