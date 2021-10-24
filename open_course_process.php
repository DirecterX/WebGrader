<?php
   include('config.php');
   if(!isset($_SESSION['Username'])):
    header("location:../../WebGrader/Login/Login.php");
   endif;
   $Course_ID = $_GET['Course_ID'];
   $userid = $_SESSION['User_ID'];
   $errors = [];
   $yesterday_date = date('Y-m-d',strtotime("-1 days"));
   $today_date = date('Y-m-d');
   $next_month = date('Y-m-d',strtotime("+1 month"));




   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
      if ($role=='Owner'){
         $check_date = "SELECT Start_date,End_date from course Where Course_ID = '$Course_ID'";
         $check_date_q = mysqli_query($connect,$check_date) or die(mysqli_error());
         $date_result = mysqli_fetch_array($check_date_q);
         $start_date = $date_result['Start_date'];
         $end_date = $date_result['End_date'];

         echo $start_date;
         if ($start_date>$today_date){
            echo 'start_date ='.$today_date;
            $open_course = "UPDATE course 
            SET Start_date='".$today_date."'
            WHERE Course_ID='".$Course_ID."'";
            mysqli_query($connect,$open_course) or die(mysqli_error());
            //header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID.""); 


         }
         if($end_date<=$today_date){
            echo 'start_date ='.$today_date;
            echo 'end_date ='.$next_month;
            $open_course = "UPDATE course 
            SET Start_date='".$$yesterday_date."',End_date='".$next_month."'
            WHERE Course_ID='".$Course_ID."'";
            mysqli_query($connect,$open_course) or die(mysqli_error());
            header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID."");
         }
         

         header("location:../../WebGrader/Course.php?Course_ID=".$Course_ID."");
      }else{

      header("location:../../WebGrader/Course_Info.php?Course_ID=".$Course_ID."");
      }
   
?>

