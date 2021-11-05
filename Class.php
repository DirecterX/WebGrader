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
  <title>WebGrader | ห้องเรียนของฉัน</title>

  <style>
      .container{
        font-family: 'Kanit', sans-serif;

      }
      .card {
          font-family: 'Kanit', sans-serif;
          transition-duration: 0.5s;
      }
      .card:hover{
          color: #233142;
          border: 1px solid;
          border-radius: 30px;
          box-shadow: 0px 15px #3D367B;
          width: 20rem;
          font-family: 'Kanit', sans-serif;
          transition: 0.5s;
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
        
        <!--start card-->
        <div class="row mb-2">
          <div class="col mt-2"  >
            <h4 class="p-2 fw-med text-center float-left" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">คอร์สเรียน</h4>
            <div class="addbtnclass">
            <a href="###"><p class="p-2 mr-3 fw-medium text-center float-right" style="color:#3D367B;box-shadow: -5px 5px #FAA3A3;width: 10rem; border: 1px solid; border-radius: 20px; background-color:#F4F4F4;"> <i class="fas fa-plus-square mr-2"></i>สร้างคอร์สเรียน</p></a>
            <a href="###"><p class="p-2 mr-3 fw-medium text-center float-right " style="color:#3D367B;box-shadow: -5px 5px #FAA3A3;width: 10rem; border: 1px solid; border-radius: 20px; background-color:#F4F4F4;"><i class="fas fa-users mr-2"></i>เข้าคอร์สเรียน</p></a>
            </div>
          </div><!-- /.col -->         
        </div><!-- /.row -->
        <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">

        <div class="card border border-dark m-2 mt-3 fw-bolder" style="width: 20rem; border: 1px solid; border-radius: 20px;background-color:#FFFFFF;">
        <div class="card-body">
            <h5 class="card-title mb-2">Course : <?php echo "Python-OOP" ?></h5>
            <p class="card-text">ผู้สอน : <label style="text-decoration: underline;"> <?php echo "Kanut" ?> </label</p>
            <p class="card-text mb-2">ภาคเรียน / ปีการศึกษา : <?php echo " 1 / 2021" ?></p>
            <p class="card-text">ภาษา : <?php echo "Python"?></p>
            <p class="card-text">สถานะ : <label class="text-success"><?php echo "Open"?></label></p>
        </div>
        </div>

        <div class="card border border-dark m-2 mt-3 fw-bolder" style="width: 20rem; border: 1px solid; border-radius: 20px;background-color:#FFFFFF;">
        <div class="card-body">
            <h5 class="card-title mb-2">Course : <?php echo "Python-OOP" ?></h5>
            <p class="card-text">ผู้สอน : <label style="text-decoration: underline;"> <?php echo "Kanut" ?> </label</p>
            <p class="card-text mb-2">ภาคเรียน / ปีการศึกษา : <?php echo " 1 / 2021" ?></p>
            <p class="card-text">ภาษา : <?php echo "Python"?></p>
            <p class="card-text">สถานะ : <label class="text-secondary"><?php echo "Close"?></label></p>
        </div>
        </div>


        <div class="card border border-dark m-2 mt-3 fw-bolder" style="width: 20rem; border: 1px solid; border-radius: 20px;background-color:#FFFFFF;">
        <div class="card-body">
            <h5 class="card-title mb-2">Course : <?php echo "Python-OOP" ?></h5>
            <p class="card-text">ผู้สอน : <label style="text-decoration: underline;"> <?php echo "Kanut" ?> </label</p>
            <p class="card-text mb-2">ภาคเรียน / ปีการศึกษา : <?php echo " 1 / 2021" ?></p>
            <p class="card-text">ภาษา : <?php echo "Python"?></p>
            <p class="card-text">สถานะ : <label class="text-secondary"><?php echo "Close"?></label></p>
        </div>
        </div>

        <div class="card border border-dark m-2 mt-3 fw-bolder" style="width: 20rem; border: 1px solid; border-radius: 20px;background-color:#FFFFFF;">
        <div class="card-body">
            <h5 class="card-title mb-2">Course : <?php echo "Python-OOP" ?></h5>
            <p class="card-text">ผู้สอน : <label style="text-decoration: underline;"> <?php echo "Kanut" ?> </label</p>
            <p class="card-text mb-2">ภาคเรียน / ปีการศึกษา : <?php echo " 1 / 2021" ?></p>
            <p class="card-text">ภาษา : <?php echo "Python"?></p>
            <p class="card-text">สถานะ : <label class="text-secondary"><?php echo "Close"?></label></p>
        </div>
        </div>
  






        </div>
    </div><!-- /.container-fluid -->



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
