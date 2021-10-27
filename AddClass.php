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
  <title>WebGrader | เข้าห้องเรียน</title>

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
<body class="hold-transition layout-top-nav">
<div class="wrapper ">

  <!-- Navbar -->
  <div class="sticky-top"> <?php include "template/navbar.php"; ?></div>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
            <div class="col mt-2" >
                
                <h1 class="m-0 fw-bolder">Join Course<i class="fa fa-book ml-2"></i></i></h1>

          </div><!-- /.col -->         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
              
      <!-- Coding Here -->
        <div class="row">
            <div class="col">
            <form action="add_class_process.php" method="POST">
                <div class="card h-100 w-50 " >
                    <div class="card-body border border-dark cardborder" style="background-color:#EDEDED;">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-plus fa-3x"></i> 
                            </div> 
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="AddClassroom">เข้าห้องเรียน</label>
                                    <input type="text" class="form-control" id="Addclass_ID" name="Addclass_ID" placeholder="<?php echo "ใส่รหัสห้องเรียน" ?> ">
                                </div>                    
                            </div> 
                        </div>

                        <div class="row ">
                            <div class="col" style="align-items: center;">
                                <div class="text-center">
                                    <button type="button" id="submit" name="submit" class="btn btn-dark w-25" style="margin-right:10px;">ยกเลิก</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-warning w-25" >ยืนยัน</button>           
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php include('error.php'); ?>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->  
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
