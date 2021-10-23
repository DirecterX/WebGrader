<?php
   include('config.php');
   if(!isset($_SESSION['Username'])):
    header("location:../../WebGrader/Login/Login.php");
   endif;
   $Course_ID = $_GET['Course_ID'];
   $userid = $_SESSION['User_ID'];
   $errors = [];

   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
   $end_date = date('Y-m-d',strtotime("-1 days"));




   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
      if ($role=='Owner'){
         $close_course = "UPDATE course 
         SET End_date='".$end_date."'
         WHERE Course_ID='".$Course_ID."'";
         mysqli_query($connect,$close_course) or die(mysqli_error());
         header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID."");


         header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID."");
      }else{

      header("location:../../WebGrader/Course_Info.php?Course_ID=".$Course_ID."");
      }
   
?>

