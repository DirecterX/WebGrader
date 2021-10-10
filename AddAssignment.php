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
                        <div class="row">
                            
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                    <label for="Assignment_Name">ชื่องาน</label>
                                    <input type="text" class="form-control" id="Assignment_Name" placeholder="<?php echo "ชื่องาน" ?> ">
                                    <textarea  class="form-control" id="Assignment_Note" rows="5" style="margin-top: 20px;"placeholder="<?php echo "อธิบายรายละเอียดของงาน" ?> "></textarea>
                                </div>

                                

                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="Assignment_Point">คะแนน</label>
                                                <input type="text" class="form-control" id="Assignment_Point" placeholder="<?php echo "กรอกคะแนน" ?> ">
                                                <label for="Assignment_DueDate">กำหนดส่ง</label>
                                                <input type="date" class="form-control" id="Assignment_Point" placeholder="<?php echo "กรอกคะแนน" ?> ">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button  onclick="document.location='Home.php'" type="button" id="submit" name="submit" class="btn btn-dark w-25">ยกเลิก</button>
					                    <button type="button" id="submit" name="submit" class="btn btn-warning w-25" data-toggle="modal" data-target="#exampleModal" >บันทึก</button>           

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group" id="TestCase_Form">
                                        <label class="badge bg-warning" for="Test1_input">TestCase1</label>
                                        
                                    <div class="row" id="Testcase1">
                                        <div class="col-md-6 col-sm-12">    
                                            <textarea  class="form-control" id="Testcase1_input" rows="5" style="margin-top: 20px;"placeholder="<?php echo "Input" ?> "></textarea>
                                        </div>
                                        <div class="col-md-6 col-sm-12">    
                                            <textarea  class="form-control" id="Testcase1_Output" rows="5" style="margin-top: 20px;"placeholder="<?php echo "Output" ?> "></textarea>
                                        </div>
                                    </div>

                                </div>             

                            </div>

                        </div>
                        <!-- Add Button -->
                        <div class="row">
                            <div class="col">
                                <div class="text-right">
                                    <button onclick="CreateTastCase()" type="button" id="AddTestCase" name="AddTestCase" class="btn btn-warning" style="border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;">+</button>
                                </div>
                            </div>
                        </div>



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

<script>
    var count = 2;
function CreateTastCase() {
   
    if(count <=5){
        //Create Label 
        var CreateLabel = document.createElement("label");
        CreateLabel.setAttribute("for","Testcase"+ count +"_input");
        CreateLabel.setAttribute("class","badge bg-warning");
        CreateLabel.setAttribute("style","margin-top:10px;");
        CreateLabel.innerHTML="TestCase"+count;
        
        // Create Row
        var CreateRow = document.createElement("div");
            CreateRow.setAttribute("class","row");
            CreateRow.setAttribute("id","Testcase"+count);
        // Create Column
        var CreateCol1 = document.createElement("div");
            CreateCol1.setAttribute("class","col-md-6 col-sm-12");
        // Create TestCase Input    
        var CreateTestInput = document.createElement("textarea");
            CreateTestInput.setAttribute("class","form-control");
            CreateTestInput.setAttribute("id","Testcase"+count+"_Input");
            CreateTestInput.setAttribute("Name","Testcase"+count+"_Input");
            CreateTestInput.setAttribute("rows","5");
            CreateTestInput.setAttribute("placeholder","Input");

        // Create Column
        var CreateCol2 = document.createElement("div");
            CreateCol2.setAttribute("class","col-md-6 col-sm-12");
        // Create TestCase Output    
        var CreateTestOutput = document.createElement("textarea");
            CreateTestOutput.setAttribute("class","form-control");
            CreateTestOutput.setAttribute("id","Testcase"+count+"_Output");
            CreateTestOutput.setAttribute("id","Testcase"+count+"_Output");
            CreateTestOutput.setAttribute("rows","5");
            CreateTestOutput.setAttribute("placeholder","Output");


        ++count;
        // Append Column To Row
        CreateRow.appendChild(CreateCol1);
        CreateRow.appendChild(CreateCol2);  
        // Append Textarea To Col
        CreateCol1.appendChild(CreateTestInput);  
        CreateCol2.appendChild(CreateTestOutput);  
      
        document.getElementById("TestCase_Form").appendChild(CreateLabel);
        document.getElementById("TestCase_Form").appendChild(CreateRow);
        
    }
  

  
}
</script>

</body>
</html>
