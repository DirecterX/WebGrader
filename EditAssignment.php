<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Assignment</title>

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
<div class="wrapper">

  <!-- Navbar -->
  <div class="sticky-top"> <?php include "template/navbar.php"; ?></div>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        
      <div class="row mb-2">
          <div class="col">
            <h1 class="m-0"> Assignment</h1>
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

                <div class="card h-100">
                    <div class="card-body border border-dark">
                    <form action="#"> <!-- Open Form Here -->
                        <div class="row">
                            
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                               
                                    <label for="Assignment_Name">ชื่องาน</label>
                                    <input type="text" class="form-control" id="Assignment_Name" placeholder="<?php echo "ชื่องาน" ?> " value="<?php echo "ชื่องาน" ?>">
                                    <textarea  class="form-control" id="Assignment_Note" rows="5" style="margin-top: 20px;"placeholder="<?php echo "อธิบายรายละเอียดของงาน" ?> "><?php echo "รายละเอียดงาน" ?></textarea>
                                </div>

                                

                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="Assignment_Point">คะแนน</label>
                                                <input type="text" class="form-control" id="Assignment_Point" placeholder="<?php echo "กรอกคะแนน" ?> " value="<?php echo "1" ?>">
                                                <label for="Assignment_DueDate">กำหนดส่ง</label>
                                                <input type="date" class="form-control" id="Assignment_Point" value="<?php echo "2021-10-22" ?>"> <!-- Format Date = yyyy-mm-dd -->

                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:-15px;">
                                    <div class="col">
                                        <label for="Assignment_File"  class="btn btn-dark" style="margin-top:10px;">Add File</label>
                                        <input type="file" id="Assignment_File" name="Assignment_File" hidden>
                                        <span id="file-chosen"><?php echo "File Name" ?></span> <!--- File Name -->
                                               
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button  onclick="document.location='Home.php'" type="button" id="submit" name="submit" class="btn btn-dark ">ยกเลิก</button>
					                    <input type="submit" id="submit" name="submit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" value="บันทึก">           

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------------------  PHP CODE Looping Check Number of TestCase Here ---------------------------------->
                        <?php  
                            for ($i = 1; $i <= 2; $i++) {                             
                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="form-group" id="TestCase_Form">
                                        <label class="badge bg-warning" for="Test<?php echo $i ; ?>_input">TestCase<?php echo $i ; ?></label>
                                        
                                    <div class="row" id="Testcase1">
                                        <div class="col-md-6 col-sm-12">    
                                            <textarea  class="form-control" id="Testcase<?php echo $i; ?>_Input" rows="5" style="margin-top: 20px;"placeholder="<?php echo "Input" ?>"><?php echo "Input TestCase".$i; ?></textarea>
                                            <!--  ExampleID = Testcase1_Input -->
                                        </div>
                                        <div class="col-md-6 col-sm-12">    
                                            <textarea  class="form-control" id="Testcase<?php echo $i ; ?>_Output" rows="5" style="margin-top: 20px;"placeholder="<?php echo "Output" ?>" disabled><?php echo "Output TestCase".$i; ?></textarea>
                                            <!--  ExampleID = Testcase1_Output -->
                                        </div>
                                    </div>
                                </div>             
                            </div>
                        </div>
                        <?php  
                              }
                        ?>
                        <!---------------------------------------------------------------------------------------------------------------------->
                    
                        
                    



                    </div>
                </div>
                    



            </div>
            <!-- /.col -->
        </div>
                            </form><!-- End Form Here -->
        <!-- /.row -->  
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Notification">การแจ้งเตือน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center fs-6 m-3" >
                <h1>บันทึกข้อมูลเสร็จสิ้น</h1>
            </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
