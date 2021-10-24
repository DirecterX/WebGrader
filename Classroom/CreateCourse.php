<!DOCTYPE html>
<?php
    include('../config.php');
    if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
    endif;
    $userid = $_SESSION['User_ID'];

?>
<?php $years = range(strftime("%Y", time()), strftime("%Y", date(9634894360))); 



?>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebGrader | สร้างห้องเรียน</title>

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
  
     
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />   
  
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
  <div class="sticky-top"> <?php include "../template/navbar.php"; ?></div>
  <!-- /.navbar -->

    <div class="content">
      <div class="container">
       <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container mt-5">
     
<div class="row">

<div class="col-md-12 col-sm-12 col-12">
<div class="card h-100">
  <div class="card-body border border-dark">
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h1 class="m-0 fw-bolder">สร้างห้องเรียน<i class="fa fa-book ml-2"></i></h1>      
      </div>



<form method="POST" action="create_course_process.php">
    Course Name : <input type="text" name="Course_Name">
    <br><br>

    <label for="sem">Semester : </label>
      <select id="sem" name="Semester">
        <option value="1">1</option>
        <option value="2">2</option>
      </select>

    <br><br>
    <label for="Schoolyear">Schoolyear : </label>
    <select id = "Schoolyear" name="Schoolyear">
      <option>Select Year</option>
      <?php foreach($years as $year) : ?>
          <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
    </select>
    <br><br>





    Course Open and End Date : <input type="text" name="daterange" value="<?php 
 //Error Select year open and end 
    echo date();
  ?>" />
        <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('Y-m-d') + ' to ' + end.format('Y-m-d'));
          });
        });
        </script>
    <br><br>

    <button type="submit" id="save" name="save" value="submit" class="btn btn-warning w-25 float-right ml-2 " data-toggle="modal" data-target="#exampleModal">สร้างห้องเรียน</button> 

  </form>
     
            
       
    </div>        
    </div>
  </div>
</div>
</div>
</div>
       </div>

         </form>

      </div>
          
          <?php include('../error.php'); ?>
        <?php if(isset($_SESSION['error'])) :?>
          <div style="color:red">
            <h5>
              <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              ?>
            </h5>
          </div>
        <?php endif ?>
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