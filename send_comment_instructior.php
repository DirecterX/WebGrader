<?php
    include('config.php');

    $submit_id = $_REQUEST['Submit_ID'];
    $instructor_comment = $_REQUEST['Instructor_Comment'];
    
    $update_instructor_comment = $connect->prepare("UPDATE submition SET Instructor_Comment=? WHERE Submit_ID =?");
    $update_instructor_comment->bind_param("si", $instructor_comment, $submit_id);
    $update_instructor_comment->execute();
    if($update_instructor_comment->execute()){
        echo "success";
    }else{
        echo "failed";
    }

    $update_instructor_comment->close();

?>