<?php
    include('config.php');

    $submit_id = $_REQUEST['Submit_ID'];
    $student_comment = $_REQUEST['Student_Comment'];
    
    $update_student_comment = $connect->prepare("UPDATE submition SET Student_Comment=? WHERE Submit_ID =?");
    $update_student_comment->bind_param("si", $student_comment, $submit_id);
    $update_student_comment->execute();
    if($update_student_comment->execute()){
        echo "success";
    }else{
        echo "failed";
    }

    $update_student_comment->close();

?>