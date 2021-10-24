<?php
   include('config.php');
   if(!isset($_SESSION['Username'])):
    header("location:/WebGrader/Login/Login.php");
   endif;
   $Course_ID = $_GET['Course_ID'];
   $userid = $_SESSION['User_ID'];

   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
   $errors = [];
   




   $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
   $result = mysqli_fetch_assoc($checkcourserole);
   $role = $result["Role"];
      if ($role=='Owner'){
         $del_course = "DELETE FROM course WHERE Course_ID = '$Course_ID'";
         mysqli_query($connect,$del_course) or die(mysqli_error());
         
         $del_course_role="DELETE FROM course_role WHERE Course_ID = '$Course_ID'";
         mysqli_query($connect,$del_course_role) or die(mysqli_error());

         $del_course_assignment="DELETE FROM assignment WHERE Course_ID = '$Course_ID'";
         mysqli_query($connect,$del_course_assignment) or die(mysqli_error());

         $del_submit = "SELECT * FROM submition WHERE Course_ID = '$Course_ID'";
        $delsubm = mysqli_query($connect,$del_submit);
                $i=0;
                while($row = mysqli_fetch_array($delsubm)){
                    $del_exac = "DELETE FROM exec_output WHERE Submit_ID = '$row['Submit_ID']'"
                }
                
         $del_course_submit="DELETE FROM submition WHERE Course_ID = '$Course_ID'";
         mysqli_query($connect,$del_course_submit) or die(mysqli_error());
         header("location:/WebGrader/Home.php");

      }else{
      array_push($errors, "Something is Wrong");
      $_SESSION['error'] = "Something is Wrong";
      header("location:/WebGrader/Course.php?Course_ID=".$Course_ID."");
      }
   
?>

