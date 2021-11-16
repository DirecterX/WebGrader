<?php
    include('config.php');

    $assignment_id = $_REQUEST['Assignment_ID'];
    $end_date = $_REQUEST['End_date'];
    
    $update_date1 = $connect->prepare("UPDATE assignment SET End_date=? WHERE Assignment_ID =?");
    $update_date1->bind_param("si", $end_date, $assignment_id);
    $update_date1->execute();
    if($update_date1->execute()){
        echo "success";
    }else{
        echo "failed";
    }

    $update_date1->close();

?>