<?php
    include('config.php');
    if(!isset($_SESSION['Username']) AND !isset($_SESSION["User_ID"])):
     header("location:Login/Login.php");
    endif;
    if($_SESSION["Is_admin"]){
        header("location:Home_admin.php");
    }

    $user_id = $_SESSION['User_ID'];
    ############################### GET COURSE ID ##############################
    $student_course_select_sql = "SELECT * FROM course_role WHERE User_ID = '$user_id' AND Role = 'student'";
    $student_course_select_query = mysqli_query($connect,$student_course_select_sql);

    while($student_course_select_rows = mysqli_fetch_array($student_course_select_query)){
      $course_id = $student_course_select_rows['Course_ID'];
      ############################# GET ASSIGNMENT ###############################
      $select_assignment_sql = "SELECT * FROM assignment WHERE Course_ID ='$course_id'";
      $select_assignment_query = mysqli_query($connect,$select_assignment_sql);

      while($select_assignment_rows = mysqli_fetch_array($select_assignment_query)){
        $assignment_id = $select_assignment_rows['Assignment_ID'];
          ####################### select score to check if exist or not #######################################
        $select_score_sql = "SELECT Submit_ID , Score_Gain , Student_Comment , Instructor_Comment , Turn_in_Code , Turn_in_Status , Attempt_count FROM submition WHERE Assignment_ID ='$assignment_id' AND User_ID ='$user_id'";
        $select_score_query = mysqli_query($connect,$select_score_sql);

      if(mysqli_num_rows($select_score_query) == 0){
        $insert_score_sql = "INSERT INTO submition (Course_ID,Assignment_ID,User_ID)
                             VALUES('$course_id','$assignment_id','$user_id')";
        $insert_score_query = mysqli_query($connect,$insert_score_sql); 
        $select_score_query = mysqli_query($connect,$select_score_sql);
                          
    }else{
        
    }
      }
    }

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebGrader | ????????????????????????</title>

  <style>
      .container{
        font-family: 'Kanit', sans-serif;

      }
     

   

</style>

  </style>    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  
  <!-- link font google kanit -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
   
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav " >
<div class="wrapper">

  <!-- Navbar -->
  <div class="sticky-top"> <?php include "template/navbar.php"; ?></div>
  <!-- /.navbar -->

    <div class="content">
      <div class="container">
       <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-6 mt-3" >
          <h4 class="p-2 fw-med text-center ml-3" style="width: 10rem;  border-radius: 5px; background-color: pink;">????????????????????????????????????</h4>
          <div class="to-do-list  m-3 p-2 pl-3" style="background-color: #D8D7E5; border-radius: 5px;">
          <?php 
          $sqlshowworktodo = "SELECT * FROM submition
          WHERE User_ID = ".$_SESSION["User_ID"]."
          ";
          $coun = 0;
          $subid;
          $sqlshowworktodo_q = mysqli_query($connect,$sqlshowworktodo);


          if(mysqli_num_rows($sqlshowworktodo_q) == NULL || mysqli_num_rows($sqlshowworktodo_q)==0){ ?>
            <div class="col-sm-12 col-md-12 col-lg-12">  
              <a style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"> ?????????????????????????????????????????????????????? <label class="text-danger ml-2"> </label></p></a>
            </div>
           <?php }else{
                while($row = mysqli_fetch_array($sqlshowworktodo_q)){
                  $subid = $row["Submit_ID"];
                  if ($row["Turn_in_Status"] == "not turn in" AND $row["Turn_in_Status"] == "passed" ) {
                    // code...?????????????????????
                  }else if ($row["Turn_in_Status"] == "waiting for turn in" OR $row["Turn_in_Status"] == "not passed") {
                    $coun++;
                    $ShownameAssigment = "SELECT Name FROM assignment
                    WHERE Assignment_ID =".$row["Assignment_ID"]."";
                    $ShownameAssigment_q = mysqli_query($connect,$ShownameAssigment);
                    $ShownameAssigment_result = mysqli_fetch_array($ShownameAssigment_q);
                    ?>
                    <a href="TurnInCode.php?Assignment_ID=<?php echo $row["Assignment_ID"]?>" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"><?php echo $coun; ?>. <?php echo $ShownameAssigment_result["Name"] ?> <label class="text-danger ml-2 float-right " style="padding-right: 10px;"> <?php echo $row["Turn_in_Status"] ?></label></p></a>
                    <?php 
                  }else if($row["Turn_in_Status"] == "waiting for inspection"){
                    $coun++;
                    $ShownameAssigment = "SELECT Name FROM assignment
                    WHERE Assignment_ID =".$row["Assignment_ID"]."";
                    $ShownameAssigment_q = mysqli_query($connect,$ShownameAssigment);
                    $ShownameAssigment_result = mysqli_fetch_array($ShownameAssigment_q);
                    ?>
                    <a href="TurnInCode.php?Assignment_ID=<?php echo $row["Assignment_ID"]?>" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"><?php echo $coun; ?>. <?php echo $ShownameAssigment_result["Name"] ?>  <label class="text-warning ml-2 float-right" style="padding-right:10px;"> <?php echo "( waiting for inspect )" ?></label></p></a>
                    <?php 
                  }
                }
              }
          ?>
          <a href="Assignment.php"><p class="text-end pr-2" style="color: #3D367B;">???????????????????????????</p></a>
        </div>
          
          </div><!-- /.col -->   
          <div class="col-6 mt-3">    
            <h4 class="p-2 fw-med text-center ml-3" style="width: 12rem; border-radius: 5px; background-color: pink;">??????????????????????????????????????????</h4>
          <div class="to-do-list-room m-3 p-2 pl-3" style="background-color:#D8D7E5; border-radius: 5px;">
          <?php 
          $sqlshowcourse = "SELECT course.Course_ID, course_role.Role, course_role.User_ID
          FROM course
          INNER JOIN course_role ON course.Course_ID = course_role.Course_ID AND course_role.User_ID = ".$_SESSION["User_ID"]."";
          $counq = 0;
          $sqlshowcourse_q = mysqli_query($connect,$sqlshowcourse);
          if(mysqli_num_rows($sqlshowcourse_q) == NULL || mysqli_num_rows($sqlshowcourse_q)==0){ ?>
            <div class="col-sm-12 col-md-12 col-lg-12">  
              <a style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"> ????????????????????????????????????????????????????????? <label class="text-danger ml-2"> </label></p></a>
            </div>
           <?php }else{
          while($row = mysqli_fetch_array($sqlshowcourse_q)){

            if ($row["Role"] == "Owner" OR $row["Role"] == "Teacher" OR $row["Role"] == "TA") {
              //echo "waiting for inspect";
                $sqlshowworktodoforteach = "SELECT * FROM submition 
                WHERE Course_ID = ".$row["Course_ID"]." AND Turn_in_Status = 'waiting for inspection' ";
                $sqlshowworktodoforteach_q = mysqli_query($connect,$sqlshowworktodoforteach);
                while($rowq = mysqli_fetch_array($sqlshowworktodoforteach_q)){
                  $subid = $rowq["Submit_ID"];
                  $counq++;
                  $sqlshowuserandasss = "SELECT *
                  FROM assignment
                  WHERE Assignment_ID = ".$rowq["Assignment_ID"]."";
                  $sqlshowuserandasss_q = mysqli_query($connect,$sqlshowuserandasss);
                  $showuserandasss = mysqli_fetch_array($sqlshowuserandasss_q);

                  $sqlshowuser = "SELECT *
                  FROM user
                  WHERE User_ID = ".$rowq["User_ID"]."";
                  $sqlshowuser_q = mysqli_query($connect,$sqlshowuser);
                  $showuser = mysqli_fetch_array($sqlshowuser_q);

                  ?>
                  <a href="SubmitedAssignment.php?Submit_ID=<?php echo $subid?>&Assignment_ID=<?php echo $rowq["Assignment_ID"]?>" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"><?php echo $counq ?>.<?php echo $showuserandasss["Name"] ?> ?????????????????? <?php echo $showuser["Firstname"]; echo " ".$showuser["Surname"]  ?><label class="text-warning ml-2"> <?php echo "( waiting for inspect )" ?></label></p></a>
                  <?php 
              }
            }
          }
        }
          ?>
          
          
          <a href="Assignment.php"><p class="text-end pr-2 " style="color: #3D367B;">???????????????????????????</p></a>
        </div>
          </div>
        </div><!-- /.row -->

        <!--start card-->
  

        <div class="row mb-2">
          <div class="col mt-2"  >

          
            <h4 class="p-2 fw-med text-center ml-3" style="width: 10rem; border-radius: 5px; background-color: pink;">??????????????????????????????</h4>
  

          </div><!-- /.col -->         
        </div><!-- /.row -->
        <div class="row m-3 p-4" style="background-color: #D8D7E5; border-radius: 10px;">
          <?php include "Show_course_Home.php"; ?>      
        </div>
  

        </div>
    </div><!-- /.container-fluid -->

    </div><!-- /container-->
    </div> <!-- /content-header-->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
