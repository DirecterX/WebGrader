<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif;
    if($_SESSION["Is_admin"]){
        header("location:Home_admin.php");
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
  <title>Blank Page</title>

  <style>
      .cardlink{
          color:black;
  
      }
      .cardlink:hover{
          color:#FF8540;
      }
      .cardborder{
        border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352 ;
      }
  </style>    

  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "template/navbar.php";?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0"> Notification <i class="fa fa-bell"></i></h1>
          </div><!-- /.col -->         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
        <!-- **********************************\*Use this for generate with PHP******************************************-->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card cardborder" style="background-color:#FFFFFF;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body" >
                
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-check fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Passed" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <h6>- <?php echo "Assignment 1" ?></h6> <!-- Assignment -->
              
              </div>
              </a>
            </div>
            <!-- /.card -->
          <!-- **********************************************************************************************************-->  
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-search fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "waiting for inspect" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 2" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-history fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "waiting for turn in" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 3" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Java Class" ?></b></h5> <!-- Class Name -->
                    
                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-times-circle fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Not Passed" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assignment 2" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Java Class" ?></b></h5> <!-- Class name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-calendar-times fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Not turn in" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 1" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->

        </div>
        <!-- /.row -->


        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0"> My Classroom <i class="fa fa-book"></i></h1>
                    </div><!-- /.col -->         
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <!-- ******************************Use this for generate with PHP*******************************-->
        <?php include "Show_course.php"; ?>
 
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
