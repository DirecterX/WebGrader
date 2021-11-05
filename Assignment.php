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

              
              <div class="card"  style="background-color: #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                  <a href="###" class="text-dark">
                   <div class="card-body">
                                    <!-- link -->
                    <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;"><b class="p-3">test</b></h5> 

                                  <!-------- Assignment Content -->
                        <p class="card-text" style="width: 200px;">
                        <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h6 class="float-left font-weight-bold ml-2">Course : <?php echo "Python OOP"?> </h6>
                
                                        </div>

                                        
                                    </div>
                                                
                                  </p>
                                  
                              </div>
                              </a>
            </div> 

   
  </div>


              
              </div>
        
          </div>


          <div class="col-12">         
               
               <div class="row mb-2">
             <div class="col mt-2"  >
               <h4 class="ml-4 p-2 fw-med text-center float-left" style="width: 15rem; border: 1px solid; border-radius: 20px; background-color: pink;">งานตรวจในห้องเรียน</h4>
             </div><!-- /.col -->         
           </div><!-- /.row -->
           <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">
      
           <div class="card"  style="background-color:  #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <a href="###" class="text-dark">
                            <div class="card-body">
                                 <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;"><b class="p-3">test</b></h5> 

                                <!-------- Assignment Content -->

                                <p class="card-text" style="width: 200px;">
                                <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h6 class="float-left font-weight-bold ml-2">Course : <?php echo "Python OOP"?> </h6>
                
                                        </div>

                                        
                                    </div>
                                             
                                </p>
                                
                            </div>
                            </a>
          </div> 
   
        
       </div>
           
             </div>



             <div class="col-12">         
               
               <div class="row mb-2">
             <div class="col mt-2"  >
               <h4 class="ml-4 p-2 fw-med text-center float-left" style="width: 10rem; border: 1px solid; border-radius: 20px; background-color: pink;">งารที่เสร็จแล้ว</h4>
             </div><!-- /.col -->         
           </div><!-- /.row -->
           <div class="row m-3 p-4" style="background-color: #D8D7E5;border-radius:10px ;">
      
            
           <div class="card"  style="background-color:  #FFFFFF; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <a href="###" class="text-dark">
                            <div class="card-body">
                                 <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFBFBF; border-radius: 0px 20px 0px 0px;"><b class="p-3"><?php echo "Name"?></b></h5> 

                                <!-------- Assignment Content -->

                                <p class="card-text" style="width: 200px;">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h6 class="float-left font-weight-bold ml-2">Course : <?php echo "Python OOP"?> </h6>
                
                                        </div>

                                        
                                    </div>
                                             
                                </p>
                                
                            </div>
                            </a>
          </div> 
   
        
       </div>
           
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
