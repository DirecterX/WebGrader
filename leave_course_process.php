<?php 
include('config.php');

$Course_ID = $_GET['Course_ID'];
$useridkick = $_GET['User_ID'];
$delesubmit = "DELETE FROM submition WHERE User_ID = ".$useridkick." AND Course_ID = ".$Course_ID." ";
$delesubmit_q = mysqli_query($connect,$delesubmit);

$delerole = "DELETE FROM course_role WHERE User_ID = ".$useridkick." AND Course_ID = ".$Course_ID.""; 
$delerole_q = mysqli_query($connect,$delerole);

header("location:/WebGrader/Class.php");
?>