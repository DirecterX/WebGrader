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
      <div class="row mb-2" ">
          <div class="col mt-2">
    
            <h1 class="m-0 fw-bolder">สร้างห้องเรียน<i class="fa fa-book ml-2"></i></h1>

          </div><!-- /.col -->         
        </div>



<form method="POST" action="create_course_process.php">
  <div class="form-group">
    <div class="row">
      <div class="col-sm-12 col-md-6">
            <label class="text "> Course Name : </label>
              <input type="text" class="form-control" name="Course_Name">
              <br>
              <label for="sem">Semester : </label>
                <select id="sem" class="form-control" name="Semester">
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <br>
              <label for="Schoolyear">Schoolyear : </label>
              <select id = "Schoolyear" class="form-control" name="Schoolyear">
                <option value="0">Select Year</option>
                <?php foreach($years as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
              </select>  
              <br>         
              <label for="start_date">Course Open date:</label>
                <input type="date" id="start_date" class="form-control" value="" name="start_date"min="2020-01-01" max="2120-12-31">          
              <label for="end_date">Course End date:</label>
                <input type="date" id="end_date" class="form-control"  value="" name="end_date"min="2020-01-01" max="2120-12-31">
      </div>
    </div>

              <button type="submit" id="save" name="save" value="submit" class="btn w-25 float-right ml-2 " data-toggle="modal" data-target="#exampleModal" style="background-color: pink;">สร้างห้องเรียน</button> 
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