<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:Login/Login.php");
    endif
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
  <title>WebGrader | งานของฉัน</title>

  <style>
      .container{
        font-family: 'Kanit', sans-serif;

      }
      .cardlink{
          color:black;
        
  
      }
      .cardlink:hover{
          color:#292928;
      }
      .cardborder {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-bottom-width: 20px;

      }


  </style>    

  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link href='https://css.gg/add-r.css' rel='stylesheet'>
  
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
      <!-------------------------------------------------------------------------------------->
        <div class="row">
          <div class="col-12">         
               
            <div class="row mb-2">
              <div class="col mt-2"  >
                <h4 class="ml-4 p-2 fw-med text-center float-left" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานที่เรียน</h4>
              </div><!-- /.col -->         
            </div><!-- /.row -->
            <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">            
              
              <!--<div class="col-sm-12 col-md-6 col-lg-4">-->
              <?php 
              $sqlshowworktodo = "SELECT * FROM submition
              WHERE User_ID = ".$_SESSION["User_ID"]."
              ";
              $coun = 0;
              $sqlshowworktodo_q = mysqli_query($connect,$sqlshowworktodo);
                    while($row = mysqli_fetch_array($sqlshowworktodo_q)){
                      if ($row["Turn_in_Status"] == "not turn in" AND $row["Turn_in_Status"] == "passed" ) {
                        // code...ไม่แสดง
                      }else if ($row["Turn_in_Status"] == "waiting for turn in") {
                        $coun++;
                        $ShownameAssigment = "SELECT * FROM assignment
                        WHERE Assignment_ID =".$row["Assignment_ID"]."";
                        $ShownameAssigment_q = mysqli_query($connect,$ShownameAssigment);
                        $ShownameAssigment_result = mysqli_fetch_array($ShownameAssigment_q);

                        $showcourseass = "SELECT * FROM course
                        WHERE Course_ID = ".$ShownameAssigment_result["Course_ID"]."";
                        $showcourseass_q = mysqli_query($connect,$showcourseass);
                        $showcourseass_result = mysqli_fetch_array($showcourseass_q);
                        ?>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="card"  style="background-color: #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <a href="TurnInCode.php?Assignment_ID=<?php echo $row["Assignment_ID"]?>" class="text-dark"> <!-- link here -->
                              <div class="card"> 
                                <div class="card-body">                                            
                                  <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;">
                                    <b class="p-3"><?php echo $coun; ?>. <?php echo $showcourseass_result["Name"] ?>  
                                      <label class="text-danger ml-2"> 
                                        <?php echo "( waiting for turn in )" ?>
                                      </label>
                                   </b>
                                  </h5> 
                                        <!-------- Assignment Content -->
                                      <p class="card-text" style="width: 200px;">
                                      <div class="row">
                                        <div class="col" style="text-align:center;">
                                          <h6 class="float-left font-weight-bold ml-2">Course : <?php echo "Python OOP"?> </h6>                
                                        </div>                                    
                                      </div>                                               
                                    </p>                            
                                </div>
                              </div>
                            </a>
                            </div>
                            </div>  
                        <?php 
                      }else if($row["Turn_in_Status"] == "waiting for inspect"){
                        $coun++;
                        $ShownameAssigment = "SELECT Name FROM assignment
                        WHERE Assignment_ID =".$row["Assignment_ID"]."";
                        $ShownameAssigment_q = mysqli_query($connect,$ShownameAssigment);
                        $ShownameAssigment_result = mysqli_fetch_array($ShownameAssigment_q);
                        ?>
                        <a href="SubmitedAssignment.php?Submit_ID=<?php echo $subid?>&Assignment_ID=<?php echo $row["Assignment_ID"]?>" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;"><?php echo $coun; ?>. <?php echo $ShownameAssigment_result["Name"] ?>  <label class="text-success ml-2"> <?php echo "( waiting for inspect )" ?></label></p></a>
                        <?php 
                      }
                    }
              ?>                 
            </div> <!-- /row line 82 -->
          </div><!-- / col line 75 -->
    

          <div class="col-12">         
               
               <div class="row mb-2">
             <div class="col mt-2"  >
               <h4 class="ml-4 p-2 fw-med text-center float-left" style="width: 15rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานตรวจของห้องเรียน</h4>
             </div><!-- /.col -->         
           </div><!-- /.row -->
           <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">
                               
         
           <?php 
          $sqlshowcourse = "SELECT course.Course_ID, course_role.Role, course_role.User_ID
          FROM course
          INNER JOIN course_role ON course.Course_ID = course_role.Course_ID AND course_role.User_ID = ".$_SESSION["User_ID"]."";
          $counq = 0;
          $sqlshowcourse_q = mysqli_query($connect,$sqlshowcourse);
          while($row = mysqli_fetch_array($sqlshowcourse_q)){
            if ($row["Role"] == "Owner" OR $row["Role"] == "Teacher" OR $row["Role"] == "TA") {
              //echo "waiting for inspect";
                $sqlshowworktodoforteach = "SELECT * FROM submition 
                WHERE Course_ID = ".$row["Course_ID"]." AND Turn_in_Status = 'waiting for inspection' ";
                $sqlshowworktodoforteach_q = mysqli_query($connect,$sqlshowworktodoforteach);
                while($rowq = mysqli_fetch_array($sqlshowworktodoforteach_q)){
                  $counq++;
                  $subid = $rowq["Submit_ID"];
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
                  <div class="col-sm-12 col-md-6 col-lg-6">                  
                    <div class="card"  style="background-color:  #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >     
                      <a href="SubmitedAssignment.php?Submit_ID=<?php echo $subid?>&Assignment_ID=<?php echo $rowq["Assignment_ID"]?>" class="text-dark"> <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Link Here --------------------->
                            <div class="card-body">
                                 <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;"><b class="p-3"><?php echo $counq ?>.<?php echo $showuserandasss["Name"] ?> ส่งโดย : <?php echo $showuser["Firstname"]; echo " ".$showuser["Surname"]  ?> </b></h5> 
                                <!-------- Assignment Content -->
                                <p class="card-text" style="width: 200px;">
                                <div class="row">
                                  <div class="col" style="text-align:center;">
                                    <label class="text-warning ml-2"> <?php echo "( waiting for inspect )" ?></label>
                                    <h6 class="float-left font-weight-bold ml-2">Course : <?php echo "Python OOP"?> </h6>
                                  </div>        
                                </div>                                            
                                </p>                               
                            </div>
                      </a>
                    </div>
                  </div>
                  <?php 
              }
            }
          }
          
          ?>
           
   
        
           
             </div>



             <div class="col-12">         
               
               <div class="row mb-2">
             <div class="col mt-2"  >
               <h4 class="ml-4 p-2 fw-med text-center float-left" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานที่เสร็จแล้ว</h4>
             </div><!-- /.col -->         
           </div><!-- /.row -->
           <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">
            <?php 
            $showworkpass = "SELECT * FROM submition
            WHERE Turn_in_Status = 'passed' or Turn_in_Status = 'not turn in' AND User_ID = ".$_SESSION['User_ID']."";
            $showworkpass_q = mysqli_query($connect,$showworkpass);
            while ($row = mysqli_fetch_array($showworkpass_q)) {
              ?>
              <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="card"  style="background-color:  #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <a href="TurnInCode.php?Assignment_ID=<?=$row['Assignment_ID']?>" class="text-dark">
                            <div class="card-body">
                                 <!-- link -->
                                 <?php
                                 $showassname = "SELECT * FROM assignment
                                 WHERE Assignment_ID = ".$row['Assignment_ID']."";
                                 $showassname_q = mysqli_query($connect,$showassname);
                                 $showassname_r = mysqli_fetch_array($showassname_q); 
                                 ?>
                                <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;"><b class="p-3"><?= $showassname_r['Name']?> </b></h5> 

                                <!-------- Assignment Content -->

                                <p class="card-text" style="width: 200px;">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <?php $showcourse = "SELECT * FROM course
                                        WHERE Course_ID = ".$row['Course_ID']." ";
                                        $showcourse_q = mysqli_query($connect,$showcourse);
                                        $showcourse_result = mysqli_fetch_array($showcourse_q);
                                        ?>
                                        <h6 class="float-left font-weight-bold ml-2">Course : <?=$showcourse_result['Name']?> </h6>    
                                                                                       
                                        </div>                                      
                                    </div>
                                    <?                                 
                                    $color; 
                                    $status = $row['Turn_in_Status'];
                                    if($status == "passed"){$color="-success"}else{$color="-danger"}
                                    ?>
                                    <h6 class="float-left font-weight-bold ml-2 ">Status :</h6>    
                                    <h6 class="float-left font-weight-bold ml-2 text<? echo $status;?>> <?=$row['Turn_in_Status'];?></h6>                                           
                                </p>
                                
                            </div>
                            </a>
          </div> 
          </div> 
          <?php
            }
            ?>   
       </div> <!-- div row -->
           
             </div>
          </div>
       </div>
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
