<?php
   include('config.php');
   if(!isset($_SESSION['Username'])):
    header("location:../../WebGrader/Login/Login.php");
   endif;
   $Course_ID = $_GET['Course_ID'];
   $userid = $_SESSION['User_ID'];
   $errors = [];
   
	$Course_Name = $_POST['Course_Name'];
	$Semester = $_POST['Semester'];
	$Schoolyear = $_POST['Schoolyear'];
	$start_date = date("Y-m-d",strtotime($_POST['Start_date']));
	$end_date = date("Y-m-d",strtotime($_POST['End_date']));

   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
   if ($role=='Owner'){
       $update_course = 
       "UPDATE course 
       SET Name ='".$Course_Name."' ,  Start_date='".$start_date."' , End_date='".$end_date."',Schoolyear='".$Schoolyear."' , Semester='".$Semester."' 
       WHERE Course_ID='".$Course_ID."'";
       mysqli_query($connect,$update_course) or die(mysqli_error());
       header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID."");

   }else{
   array_push($errors, "Something is Wrong");
   $_SESSION['error'] = "Something is Wrong";
   header("location:../../WebGrader/Course_Info.php?Course_ID=".$Course_ID."");
   }
 
?>

