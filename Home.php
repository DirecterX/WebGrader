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
            <h1 class="m-0 font-weight-bold"> แจ้งเตือน <i class="fa fa-bell"></i></h1>
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
            <div class="card" style="background-color:#D3FFA9; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body" >
                
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center; font-size:62px;">
                            
                            <i class="fi fi-rr-comment-check"></i> <!-- Icon -->

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

        
          <div class="col-sm-6 col-md-4 col-lg-3 ">
            <div class="card2" >
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

                    <a href="#" class="card-link" styles="color:red;">- <?php echo "Assingment 2" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card2">
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
            <div class="card2" >
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
            <div class="card2">
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
                        <h1 class="m-0 font-weight-bold" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">ห้องเรียนของฉัน <i class="fa fa-book"></i></h1>
                    </div><!-- /.col -->         
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <!-- ******************************Use this for generate with PHP*******************************-->
        <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-3">
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
                            <h4><?php echo "Python class" ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo "Name" ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo "กำลังเรียนอยู่" ?></h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- /.card -->
            <!--***************************************************************************************-->
            </div>
            <!-- /.col-sm-6 -->
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
