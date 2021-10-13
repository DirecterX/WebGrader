<?php
    include('connect.php');
    if(!isset($_SESSION['User_Username'])):
     header("location:../../WebGrader/Login/Login.php");
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
  <title>Class</title>

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


      /*card 2 Notification*/ 
    .card2 {
     background-color:#EDEDED; 
     border:0.5px solid black; 
     border-top-left-radius: 15px;
     border-top-right-radius: 15px;
     border-bottom-left-radius: 15px;
     border-bottom-right-radius: 15px;
              }
    
    .col {
        padding-top: 2%;
    }
    
  </style>    

  
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
  <?php include "template/navbar.php"; ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
          <div class="col" >
            <h1 class="m-0 font-weight-bold"> ห้องเรียนของฉัน <i class="fa fa-bell"></i></h1>
          </div><!-- /.col -->         
        </div><!-- /.row -->
<<<<<<< Updated upstream
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
    
          <div class="col-sm-6 col-md-4 col-lg-3">
=======
         
        <div class="row m-2">
        <?php
                $classes = explode(',',$_SESSION['Course_ID']);

                foreach($classes as $class){
                    //echo $class."\n"; 
                    $sql = "SELECT * FROM course WHERE Course_ID = '".$class."'";
                    mysqli_query($con,$sql) or die(mysqli_error());
                    $sqlq2 = mysqli_query($con,$sql);
                    $result = mysqli_fetch_array($sqlq2);
                    if (mysqli_num_rows($sqlq2)==1) {
                        $course_name = $result["Course_Name"];
                        $course_owener = $result["User_ID"];
                        $course_status = $result["Course_Status"];
                        //echo $course_name."\n".$course_owener."\n".$course_status;    
                    }

                    $sql = "SELECT * FROM user WHERE User_Username = '".$course_owener."'";
                    $sqlq2 = mysqli_query($con,$sql);
                    $result = mysqli_fetch_array($sqlq2);
                    if (mysqli_num_rows($sqlq2)==1) {
                        $course_owener_show = $result['User_Name'].$result['User_Surname'];

                    }
                    //echo $course_owener_show;
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
>>>>>>> Stashed changes
            <div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body">
                
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-user fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4><?php echo $course_name ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo $course_owener ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php 
                            if($course_status == 'open'){
                                echo "กำลังเรียนอยู่";
                            }else{
                                echo "ปิดแล้ว";
                            }
                             ?></h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
                </a>
            </div>
<<<<<<< Updated upstream
      </div>



      <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="filter: grayscale(100%);border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">

            
            <div class="card-body">
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-user fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4><?php echo "Java class" ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo "Name" ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo "เรียนจบแล้ว" ?></h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->     
            </div>
=======
           
            <!-- /.card -->
            <!--***************************************************************************************-->
            </div> 
            <?php }?>
            <!-- /.col-sm-6 -->
            
>>>>>>> Stashed changes


            <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #363D36;">

            
            <div class="card-body">
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-plus fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:center;">
                        <a href="#" style="color: #292929" ><h4>เพิ่มห้องเรียน</h4> </a>
                        
                        </div>
                    </div>
                    
                  
                    </div>
                </div>
            </div>
            <!-- /.card -->     
            </div>

       
        
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
