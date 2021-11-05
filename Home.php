<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:Login/Login.php");
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
  <title>WebGrader | หน้าหลัก</title>

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
          <h4 class="p-2 fw-med text-center" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานที่ต้องทำ</h4>

          <div class="to-do-list  m-3 p-2 pl-3" style="background-color: #D8D7E5; border-radius: 5px;">
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">1.<?php echo" Assigment 1"?> <label class="text-success ml-2"> <?php echo "( Passed )" ?>  </p>  
        </a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">2.<?php echo" Assigment 2"?> <label class="text-danger ml-2"> <?php echo "( Failed )" ?></label></p></a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">3.<?php echo" Assigment 3"?> <label class="text-success ml-2"> <?php echo "( waiting for inspect )" ?></label></p></a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">4.<?php echo" Assigment 4"?> <label class="text-danger ml-2"> <?php echo "( waiting for turn in )" ?></label></p></a>
          <a href="###"><p class="text-end pr-2" style="color: #3D367B;">ดูทั้่งหมด</p></a>
        </div>
          
          </div><!-- /.col -->       
      
          <div class="col-6 mt-3">
          <h4 class="p-2 fw-med text-center" style="width: 12rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานที่ต้องตรวจ</h4>
          <div class="to-do-list-room m-3 p-2 pl-3" style="background-color:#D8D7E5; border-radius: 5px;">
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">1.<?php echo" Assigment 1"?> <label class="text-success ml-2"> <?php echo "( Passed )" ?></label></p></a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">2.<?php echo" Assigment 2"?> <label class="text-danger ml-2"> <?php echo "( Failed )" ?></label></p></a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">3.<?php echo" Assigment 3"?> <label class="text-success ml-2"> <?php echo "( waiting for inspect )" ?></label></p></a>
          <a href="###" style="color: #3D367B;"><p class="pl-3 pt-2 mr-2 border-5 rounded-1 " style="box-shadow: 0.5px 5px;background-color: #FFFFFF;">4.<?php echo" Assigment 4"?> <label class="text-danger ml-2"> <?php echo "( waiting for turn in )" ?></label></p></a>
          <a href="###"><p class="text-end pr-2" style="color: #3D367B;">ดูทั้่งหมด</p></a>
        </div>
          </div>
        </div><!-- /.row -->

        <!--start card-->
  

        <div class="row mb-2">
          <div class="col mt-2"  >

          
            <h4 class="p-2 fw-med text-center" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">คอร์สเรียน</h4>
  

          </div><!-- /.col -->         
        </div><!-- /.row -->
        <div class="row m-3 p-4" style="background-color: #D8D7E5;">

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
