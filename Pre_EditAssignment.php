<!DOCTYPE html>
<?php 
 include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
    endif;
    $Course_ID = $_GET['Course_ID'];
    $userid = $_SESSION['User_ID'];
    
    $assignment_id = $_GET['Assignment_ID'];

    ############################# GET COURSE ID #########################
    $select_course_id_sql = "SELECT Course_ID FROM assignment WHERE Assignment_ID ='$assignment_id'";
    $select_course_id_query = mysqli_query($connect,$select_course_id_sql);
    $select_course_id_rows = mysqli_fetch_array($select_course_id_query);

    $course_id = $select_course_id_rows['Course_ID'];

    ############################# GET ROLE ############################################
    $select_role_sql = "SELECT Role FROM course_role WHERE User_ID ='$userid' AND Course_ID ='$course_id'";
    $select_role_query = mysqli_query($connect,$select_role_sql);
    $select_role_rows = mysqli_fetch_array($select_role_query);

    $role = $select_role_rows['Role'];

    if($role != "Owner"){
        header("Location: home.php");
    }

    if(!isset($_SESSION['pre_edit'])){
        header("Location: home.php");
    }else{

    }
    $testcase_count = 1;
    $hiddencase_count = 1;

?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Assignment</title>

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
                    <form action="edit_assignment_query.php" method="post"  name="AssignmentForm" id="AssignmentForm" enctype="multipart/form-data"> <!-- Open Form Here -->
                        <div class="row">
                            
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                               
                                    <label for="Assignment_Name">?????????????????????</label> <label class="text-danger"> *</label>
                                    <input type="text" class="form-control" id="Assignment_Name"  required placeholder="<?php echo "?????????????????????" ?> " name="Assignment_Name" maxlength="100" value="<?=$_SESSION['Assignment_Name'];?>">
                                    <label for="Assignment_Note" class="mt-2">?????????????????????????????????</label><label class="text-danger">  *</label>
                                    <textarea  class="form-control" id="Assignment_Note" rows="5" style="margin-top: 2px;"placeholder="<?php echo "??????????????????????????????????????????????????????????????????" ?> " name="Assignment_Detail" required maxlength="1700"><?=$_SESSION['Assignment_Detail'];?></textarea>
                                </div>
                                
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label for="Assignment_Point">???????????????</label><label class="text-danger">  *</label>
                                                <input type="number" class="form-control" id="Assignment_Point" required placeholder="<?php echo "???????????????????????????" ?> " name="Assignment_Score" required maxlength="10" value="<?=$_SESSION['AssignmentScore'];?>">
                                                <label for="Assignment_DueDate" class="mt-2">????????????????????????</label><label class="text-danger">  *</label>
                                                <input type="date" class="form-control" id="Assignment_End_date"  required placeholder="<?php echo "???????????????????????????" ?> " name="Assignment_End_date" required maxlength="10" value="<?=$_SESSION['Assignment_End_date'];?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:-15px;">

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button  onclick="window.history.back()" type="button" id="cancel" name="cancel" class="btn btn-dark ">??????????????????</button>
					                    <input type="submit" id="submit" name="submit" class="btn btn-warning" value="??????????????????">           

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group" id="TestCase_Form">
                                    <?php
                                        while($testcase_count <= $_SESSION['testcase_count']){
                                    ?>
                                        <label class="badge bg-warning" for="Test1_input">TestCase <?=$testcase_count;?></label>
                                        
                                        <div class="row" id="Testcase1" style="font-family: Courier New;">
                                            <div class="col-md-12 col-sm-12 col-lg-6">    
                                                <textarea  class="form-control" required id="Testcase<?=$testcase_count;?>_input" name="Testcase<?=$testcase_count;?>_Input" rows="5" style="margin-top: 5px;"placeholder="<?php echo "Input" ?> " maxlength="270" disabled><?=$_SESSION['testcase'.$testcase_count.'_input'];?></textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-6">    
                                                <textarea  class="form-control" required id="Testcase<?=$testcase_count;?>_output" name="Testcase<?=$testcase_count;?>_Output" rows="5" style="margin-top: 5px;"placeholder="<?php echo "Output" ?> " maxlength="270" disabled><?=$_SESSION['testcase'.$testcase_count];?></textarea>
                                            </div>
                                        </div>
                                    <?php  
                                        $testcase_count++;
                                        } 
                                    ?>
                                    <?php
                                        while($hiddencase_count <= $_SESSION['hiddencase_count']){
                                    ?>
                                        <label class="badge bg-light" for="Hiddencase1_Input" style="margin-top:10px;">HiddenCase <?=$hiddencase_count;?></label>
                                        <div class="row" id="Hiddencase1" style="font-family: Courier New;">
                                            <div class="col-md-12 col-sm-12 col-lg-6">    
                                                <textarea  class="form-control" required id="Hiddencase<?=$hiddencase_count;?>_input" name="Hiddencase<?=$hiddencase_count;?>_Input" rows="5" style="margin-top: 5px;"placeholder="<?php echo "Input" ?> " maxlength="270" disabled><?=$_SESSION['hiddencase'.$hiddencase_count.'_input'];?></textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-6">    
                                                <textarea  class="form-control" required id="Hiddencase<?=$hiddencase_count;?>_output" name="Hiddencase<?=$hiddencase_count;?>_Output" rows="5" style="margin-top: 5px;"placeholder="<?php echo "Output" ?> " maxlength="270" disabled><?=$_SESSION['hiddencase'.$hiddencase_count];?></textarea>
                                            </div>
                                        </div>
                                    <?php
                                        $hiddencase_count++;
                                        }
                                    ?>
                                </div>             

                            </div>

                        </div>
                        <!-- Add Button -->
                        <div class="row">
                            <div class="col">
                                

                            </div>
                            
                        </div>
                    



                    </div>
                </div>
                    



            </div>
            <!-- /.col -->
        </div>
        <input type="hidden" name="Course_ID" value="<?=$_GET['Course_ID']?>">
        <input type="hidden" name="Assignment_ID" value="<?=$_GET['Assignment_ID']?>">
        </form><!-- End Form Here -->
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

<script>

//------------------Lock Past Date Script-----------------------------------//
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    //alert(maxDate);
    $('#Assignment_End_date').attr('min', maxDate);
});


    var count = 2;
    var count2 = 2;
function CreateTastCase() {
   
    if(count <=5){
        //Create Label 
        var CreateLabel = document.createElement("label");
        CreateLabel.setAttribute("for","Testcase"+ count +"_input");
        CreateLabel.setAttribute("class","badge bg-warning");
        CreateLabel.setAttribute("style","margin-top:10px;");
        CreateLabel.innerHTML="TestCase "+count;
        
        // Create Row
        var CreateRow = document.createElement("div");
            CreateRow.setAttribute("class","row");
            CreateRow.setAttribute("id","Testcase"+count);
            CreateRow.setAttribute("style","font-family: Courier New");         
        // Create Column
        var CreateCol1 = document.createElement("div");
            CreateCol1.setAttribute("class","col-md-12 col-sm-12 col-lg-6");
        var CreateCol2 = document.createElement("div");
            CreateCol2.setAttribute("class","col-md-12 col-sm-12 col-lg-6");
        // Create TestCase Input    
        var CreateTestInput = document.createElement("textarea");
            CreateTestInput.setAttribute("class","form-control");
            CreateTestInput.setAttribute("id","Testcase"+count+"_Input");
            CreateTestInput.setAttribute("Name","Testcase"+count+"_Input");
            CreateTestInput.setAttribute("rows","5");
            CreateTestInput.setAttribute("placeholder","Input");
            CreateTestInput.setAttribute("required","");
            CreateTestInput.setAttribute("maxlength","270");

            
            
        // Create TestCase Output    
        var CreateTestOutput = document.createElement("textarea");
            CreateTestOutput.setAttribute("class","form-control");
            CreateTestOutput.setAttribute("id","Testcase"+count+"_Output");
            CreateTestOutput.setAttribute("Name","Testcase"+count+"_Output");
            CreateTestOutput.setAttribute("rows","5");
            CreateTestOutput.setAttribute("placeholder","Output");
            CreateTestOutput.setAttribute("required","");
            CreateTestOutput.setAttribute("maxlength","270");
            CreateTestOutput.setAttribute("disabled","");


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

function CreateHidden() {
   
   if(count2 <=5){
       //Create Label 
       var CreateLabel = document.createElement("label");
       CreateLabel.setAttribute("for","HiddenTest"+ count2 +"_input");
       CreateLabel.setAttribute("class","badge bg-light");
       CreateLabel.setAttribute("style","margin-top:10px;");
       CreateLabel.innerHTML="Hidden Test "+ count2;
       
       // Create Row
       var CreateRow = document.createElement("div");
           CreateRow.setAttribute("class","row");
           CreateRow.setAttribute("id","HiddenTest"+count2);
           CreateRow.setAttribute("style","font-family: Courier New"); 
       // Create Column
       var CreateCol1 = document.createElement("div");
           CreateCol1.setAttribute("class","col-md-12 col-sm-12 col-lg-6");
        var CreateCol2 = document.createElement("div");
           CreateCol2.setAttribute("class","col-md-12 col-sm-12 col-lg-6");
       // Create HiddenCase Input    
       var CreateTestInput = document.createElement("textarea");
           CreateTestInput.setAttribute("class","form-control");
           CreateTestInput.setAttribute("id","HiddenTest"+count2+"_Input");
           CreateTestInput.setAttribute("Name","HiddenTest"+count2+"_Input");
           CreateTestInput.setAttribute("rows","5");
           CreateTestInput.setAttribute("placeholder","Input");
           CreateTestInput.setAttribute("required","");
           CreateTestInput.setAttribute("maxlength","270");
        // Create HiddenCase Output    
       var CreateTestOutput = document.createElement("textarea");
        CreateTestOutput.setAttribute("class","form-control");
        CreateTestOutput.setAttribute("id","HiddenTest"+count2+"_Output");
        CreateTestOutput.setAttribute("Name","HiddenTest"+count2+"_Output");
        CreateTestOutput.setAttribute("rows","5");
        CreateTestOutput.setAttribute("placeholder","Output");
        CreateTestOutput.setAttribute("required","");
        CreateTestOutput.setAttribute("disabled","");
        CreateTestOutput.setAttribute("maxlength","270");


       ++count2;
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

//----------------------Prevent Submit Form Script---------------------------//
var _validFileExtensions = [".py"];

var formsubmit = document.getElementById("AssignmentForm");
formsubmit.onsubmit  = function(event) { 
    if(!Validate()){
        alert("Sorry, Please Upload " + _validFileExtensions.join(", ") + " File");
        event.preventDefault();
    }else{
        $("#exampleModal").modal('show');
      // May add some delay here
    }
}

var submit = document.getElementById('submit');
submit.onclick = function() {
    Validate();

}

function ShowMoadal1(){
    
}



</script>

</body>
</html>
