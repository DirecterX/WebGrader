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
        
  


        <div class="row mb-2 float-left">
             <div class="col-6">                
        <!--start card-->
                 <div class="card " style="width: 14rem;border: 0.5px solid #292928; border-radius:15px;">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo"Python class"?></h1>
                        <div class="badge  h-50 w-100 mt-2" style="background-color:#FFD56B;border: 0.5px solid #292928; border-radius:10px;">
                        <label class="mt-3" style="font-size:15px;">ผู้สอน <?php echo"Name Ajarn"?></php>
                        <p class="pt-2">สถานะ <?php echo"กำลังเรียน"?></p>
                        </label>
                        </div>
                    </div>
                    </div>  
             </div>
                    
        </div>

        <div class="row">
            <div class="col-sm-5 col-md-5 col-lg-4 ml-2">
                   
            <span class="badge bg-warning text-dark" style="font-size: 150%;">A s s i g n m e n t</span>
           
            </div>
               
        </div>
        
        <div class="row mt-2">   

        <div class="col-sm-6 col-md-5 col-lg-3 m-2" >
          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                <div class="card-body">
                    <a href="#" class="text-dark">
                    <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment <?php echo " 1 " ?></b></h5> <!-- Class name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            <h5 class="float-left font-weight-bold">Point <?php echo "1" ?> / <?php echo "1" ?> </h5>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            <label class=" float-left text-success font-weight-light">
                                <i class="fas fa-check" style="color:black;"></i> <?php echo "Passed"?>
                            
                            </label>
                            
                            </div>
                        </div>               
                    </p>
                    </a>
                </div>
            </div>
            <!-- /.card 5 -->     
          </div>

          <div class="col-sm-6 col-md-5 col-lg-3 m-2" >
          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                <div class="card-body">
                    <a href="#" class="text-dark">
                    <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment <?php echo " 1.2 " ?></b></h5> <!-- Class name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            <h5 class="float-left font-weight-bold">Point <?php echo "0" ?> / <?php echo "1" ?> </h5>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            
                            <label class=" float-left text-dark font-weight-light">
                            <i class="fas fa-search"  style="color:black;"></i> <?php echo "Waiting for Inspect"?>
                            </label>
                            
                            </div>
                        </div>               
                    </p>
                    </a>
                </div>
            </div>
            <!-- /.card 5 -->     
          </div>

          <div class="col-sm-6 col-md-5 col-lg-3 m-2" >
          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                <div class="card-body">
                    <a href="#" class="text-dark">
                    <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment <?php echo " 3 " ?></b></h5> <!-- Assign name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            <h5 class="float-left font-weight-bold">Point <?php echo "0" ?> / <?php echo "1" ?> </h5>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                            
                            <label class=" float-left text-danger font-weight-light">
                            <i class="far fa-clock "  style="color:black;"></i> <?php echo "Waiting for turn in"?>
                            </label>
                            
                            </div>
                        </div>               
                    </p>
                    </a>
                </div>
            </div>
            <!-- /.card 5 -->     
          </div>


          


         </div>
        
       



</div>


</div>
          </div>


          


            




            



          </div><!-- /.col -->
        </div><!-- /.row -->
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
