<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn In Assignment - Assignment</title>

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
      .addfile-btn {
        background-color: indigo;
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 1rem;
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
        <div class="row mb-2">
            <div class="col mt-2" >
                
                <h1 class="badge bg-warning"><?php echo "Assignment1"; ?></h1> <!-- Assignment Name-->
                <hr style="border: 2px solid #FECA65">

          </div><!-- /.col -->         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
              
      <!-- Coding Here -->
        <div class="row"> <!-- Top Assignment -->
            <div class="col">
                <div class="card h-100" >
                    <div class="card-body border border-dark cardborder" style="background-color:#EDEDED;">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="badge bg-warning" style="font-size:120%;"><?php echo "Assignment1"; ?></h2> <!-- Assignment Name-->
                            </div>
                            <div class="col-6 text-right">
                                <label style="font-size:120%;"><i class="fa fa-check"></i></label>
                                <label style="font-size:120%; color:#52DF46" ><?php echo " Assignment Status"; ?></label>  <!-- Assignment Status -->
                                <label style="font-size:120%;">Point <?php echo "0/1";?></label> <!-- Assignment Score -->
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="form-group">

                                <textarea  class="form-control h-100" id="Assignment_Note" style="margin-top: 10px;" rows="11"></textarea>

                                </div>
                            </div> 
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="Comment_Teacher">Comment form Teacher</label>
                                    <textarea  class="form-control" id="Assignment_Note" rows="3"></textarea>
                                    <label for="Comment">Comment</label>
                                    <textarea  class="form-control" id="Assignment_Note" rows="3"></textarea>
                                    <button type="button" id="submit" name="submit" class="btn btn-warning h-50" style="float:right;margin-top: 5px;">Send Comment</button>  
                                </div>                    
                            </div> 
                        </div>

                        <div class="row" style="margin-bottom:-20px;">
                            <div class="col" style="align-items: right;">
                                <div class="text-right">
                                    <form action="#">
                                        <span id="file-chosen">No file chosen</span>
                                        <input type="file" id="Assignment_File" name="Assignment_File" hidden>
                                        <label for="Assignment_File"  class="btn btn-dark" style="margin-top:10px;">Add File</label>
                                        <input type="submit" id="submit" name="submit" class="btn btn-primary">
                                    </form>
                                <!--
                                    <button type="file" id="submit" name="submit" class="btn btn-dark" style="margin-right:10px;">Add File</button>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary" >Submit</button>           
                                -->
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                 


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->  

        <div class="row" style="margin-top:10px;"> <!--*********************** Output ***********************-->
            <div class="col">
                <div class="card h-100" >
                    <div class="card-body border border-dark cardborder" style="background-color:#EDEDED;">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="badge bg-warning" style="font-size:120%;">My Code</h2>
                            </div>
                            <div class="col-6 text-right">
                                
                                <label style="font-size:120%; color:#FF2020" >ส่งครั้งที่ <?php echo "1"; ?></label>  <!-- Assignment ์number attemp -->
                                
                                
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:30px;"> <!-- Text Area for Code ? -->
                            <div class="col">
                                <textarea  class="form-control h-100" id="Assignment_Code" style="margin-top: 10px;" rows="8"></textarea>
                                <hr style="border: 2px solid #FECA65">
                            </div>
                        </div>

                        <!------------------------------------- PHP Code Looping Start Here ------------------------------->
                        <?php  
                            for ($i = 1; $i <= 2; $i++) {                             
                        ?>
                        <label for="Testcase<?php echo $i; ?>_Output_ex" style="margin-top: 10px;">Test Case<?php echo $i; ?></label> 
                        <div class="row" >
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    
                                    <textarea  class="form-control h-100" id="Testcase<?php echo $i; ?>_Output_ex" rows="7" placeholder="Example Output"></textarea>                               
                                    <!-- ID Example = Testcase1_Output_ex -->
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea  class="form-control h-100" id="Testcase<?php echo $i; ?>_Output" rows="7" placeholder="Output from student"></textarea> 
                                    <!-- ID Example = Testcase1_Output -->
                                </div>                    
                            </div> 
                        </div>
                        <!------------------------------------ PHP Code Looping End ---------------------------------------->
                        <?php  
                              }
                        ?>
                       

                        
                    </div> 
                </div>
                 


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

<!-- Upload file button Script -->
<script>
    const actualBtn = document.getElementById('Assignment_File');

    const fileChosen = document.getElementById('file-chosen');

    actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
    })
</script>

</body>
</html>
