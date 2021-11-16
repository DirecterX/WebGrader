<?php
    include('config.php');

    

    $testcase_count = 1;
    $testcase_count2 = 1;
    $hiddencase_count = 1;
    $hiddencase_showcount = 1;

    $user_id = $_SESSION['User_ID'];
    $assignment_id = $_GET['Assignment_ID'];

    ################################ GET COURSE ID #############################s
    $course_id_sql = "SELECT Course_ID FROM assignment WHERE Assignment_ID ='$assignment_id'";
    $course_id_query = mysqli_query($connect,$course_id_sql);
    $course_id_rows = mysqli_fetch_array($course_id_query);

    $course_id = $course_id_rows['Course_ID'];

    ############################# GET ROLE ############################################
    $select_role_sql = "SELECT Role FROM course_role WHERE User_ID ='$user_id' AND Course_ID ='$course_id'";
    $select_role_query = mysqli_query($connect,$select_role_sql);
    $select_role_rows = mysqli_fetch_array($select_role_query);

    $role = $select_role_rows['Role'];
    if($role == "student"){
        
    }else{
        header("Location: home.php");
    }

    ####################### select score to check if exist or not #######################################
    $select_score_sql = "SELECT Submit_ID , Score_Gain , Student_Comment , Instructor_Comment , Turn_in_Code , Turn_in_Status , Attempt_count FROM submition WHERE Assignment_ID ='$assignment_id' AND User_ID ='$user_id'";
    $select_score_query = mysqli_query($connect,$select_score_sql);

    if(mysqli_num_rows($select_score_query) == 0){
        $insert_score_sql = "INSERT INTO submition (Course_ID,Assignment_ID,User_ID)
                             VALUES('$course_id','$assignment_id','$user_id')";
        $insert_score_query = mysqli_query($connect,$insert_score_sql); 
        $select_score_query = mysqli_query($connect,$select_score_sql);
        $select_score_rows = mysqli_fetch_array($select_score_query);                    
    }else{
        $select_score_rows = mysqli_fetch_array($select_score_query);
    }
    $submit_id = $select_score_rows['Submit_ID'];
    ####################### GET ASSIGNMENT INFORMATION BY Assignment_ID ################################
    $assignment_select = "SELECT * FROM assignment WHERE Assignment_ID ='$assignment_id'";
    $assignment_select_query = mysqli_query($connect,$assignment_select);
    $assignment_rows = mysqli_fetch_array($assignment_select_query);

    $today = date("Y-m-d"); 
    $dayendass = $assignment_rows['End_date'];
    if($today > $assignment_rows['End_date']){
        //header("Location: home.php");
    }

    ############################# GET testcase of assignment ################################
    $testcase_select = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id' AND testcase.Is_hidden = 0 
                        ORDER BY testcase.Number ASC";
    $testcase_select_query = mysqli_query($connect,$testcase_select);
    
    ############################# GET hidden testcase of assignment ################################
    $hiddencase_select = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id' AND testcase.Is_hidden = 1 
                        ORDER BY testcase.Number ASC";
    $hiddencase_select_query = mysqli_query($connect,$hiddencase_select); 
    
    ############################# GET non-hidden testcase of that assignment to attach to form ################################
    $testcase_select2 = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id' AND testcase.Is_hidden = 0
                        ORDER BY testcase.Number ASC";
    $testcase_select_query2 = mysqli_query($connect,$testcase_select2);  

    ############################# GET hidden testcase of that assignment to attach to form ################################
    $testcase_select3 = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id' AND testcase.Is_hidden = 1
                        ORDER BY testcase.Number ASC";
    $testcase_select_query3 = mysqli_query($connect,$testcase_select3);  

    ######################### get output that user execute #####################################
    $select_exec_sql = "SELECT Actual_result , Is_correct FROM exec_output WHERE Submit_ID ='$submit_id' AND User_ID ='$user_id' ORDER BY Testcase_ID ASC";
    $select_exec_query = mysqli_query($connect,$select_exec_sql); 
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
                
                <h1 class="badge bg-warning"><?=$assignment_rows['Name']; ?></h1> <!-- Assignment Name-->
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
                                <h2 class="badge bg-warning" style="font-size:120%;"><?=$assignment_rows['Name']; ?></h2> <!-- Assignment Name-->
                            </div>
                            <div class="col-6 text-right">
                                <label style="font-size:120%;"><i class="fa fa-<?php if(mysqli_num_rows($select_score_query) == 0){echo "search";}else{if($select_score_rows['Turn_in_Status']=="passed"){echo "check";}else{echo "times";}}?>"></i></label>
                                <label style="font-size:120%; color:#<?php if(mysqli_num_rows($select_score_query) == 0){echo "FF2020";}else{if($select_score_rows['Turn_in_Status']=="passed"){echo "52DF46";}else{echo "FFB82A";}}?>" ><?php if(mysqli_num_rows($select_score_query) == 0){echo "waiting for turn in";}else{echo $select_score_rows['Turn_in_Status'];}?></label>  <!-- Assignment Status -->
                                <label style="font-size:120%;">Point <?php if(mysqli_num_rows($select_score_query) == 0){echo "0";}else{echo $select_score_rows['Score_Gain'];}?> / <?=$assignment_rows['Score']?></label> <!-- Assignment Score -->
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="form-group">

                                <textarea  class="form-control h-100" id="Assignment_Note" style="margin-top: 10px;" rows="11"><?=$assignment_rows['Detail']?></textarea>

                                </div>
                            </div> 
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="Comment_Teacher">Comment form Teacher</label>
                                    <textarea  class="form-control" id="Assignment_Note" rows="3"><?php if(mysqli_num_rows($select_score_query) == 0){}else{echo $select_score_rows['Instructor_Comment'];}?></textarea>
                                    <label for="Comment">Comment</label>
                                    <form action="#">
                                        <textarea  class="form-control" id="Assignment_Note" rows="3"><?php if(mysqli_num_rows($select_score_query) == 0){}else{echo $select_score_rows['Student_Comment'];}?></textarea>
                                        <?php
                                        if ($today > $dayendass OR $select_score_rows['Turn_in_Status'] == 'not turn in' OR $select_score_rows['Turn_in_Status'] == 'passed') {
                                        
                                    }else{ 
                                        ?>
                                        <input type="submit" id="submit" name="submit" class="btn btn-warning h-50" style="float:right;margin-top: 5px;" value="Send Comment">
                                    <?php } ?>
                                    </form>
                                </div>                    
                            </div> 
                        </div>
                        <!--  Button For Upload And Submit -->
                        <div class="row" style="margin-bottom:-20px;">
                            <div class="col" style="align-items: right;">
                                <div class="text-right">
                                    <?php 
                                    if ($today > $dayendass OR $select_score_rows['Turn_in_Status'] == 'waiting for inspection' OR $select_score_rows['Turn_in_Status'] == 'not turn in') {
                                        
                                    }else{
                                    ?>
                                    <!-------------------------------- PHP Code For Checking Status to change button Here ---------------------------->
                                    <form action="filter2.php" method="post" id="form_Turnin" name="form_Turnin" enctype="multipart/form-data">
                                        <span id="file-chosen">No file chosen</span>
                                        <input type="file" id="Assignment_File" name="Assignment_File" hidden required accept=".py">
                                        <label for="Assignment_File"  class="btn btn-dark" style="margin-top:10px;">Add File</label>
                                        <input type="submit" id="submit" name="submit" class="btn btn-primary">
                                    <?php } ?>
                                        <!--------- Non-hidden TESTCASE ID Loop --------------->
                                        <?php  
                                            while($testcase_select_rows2 = mysqli_fetch_array($testcase_select_query2)){
                                        ?>
                                            <input type="hidden" name="Testcase<?=$testcase_count2;?>_ID" value="<?=$testcase_select_rows2['Testcase_ID']?>">
                                        <?php  
                                            $testcase_count2++;
                                            }
                                        ?>
                                        <!--------- Hidden TESTCASE ID Loop --------------->
                                        <?php  
                                            while($testcase_select_rows3 = mysqli_fetch_array($testcase_select_query3)){
                                        ?>
                                            <input type="hidden" name="Hiddencase<?=$hiddencase_count;?>_ID" value="<?=$testcase_select_rows3['Testcase_ID']?>">
                                        <?php  
                                            $hiddencase_count++;
                                            }
                                        ?>
                                            <input type="hidden" name="Score" value="<?=$assignment_rows['Score']?>">
                                            <input type="hidden" name="Assignment_ID" value="<?=$assignment_id?>">
                                            <input type="hidden" name="User_ID" value="<?=$user_id?>">
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
                                
                                <label style="font-size:120%; color:#FF2020" >ส่งครั้งที่ <?=$select_score_rows['Attempt_count']; ?></label>  <!-- Assignment ์number attemp -->
                             
                                
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:30px;"> <!-- Text Area for Code ? -->
                            <div class="col">
                                <textarea  class="form-control h-100" id="Assignment_Code" style="margin-top: 10px;" rows="8" disabled="true"><?php if(mysqli_num_rows($select_score_query) == 0){}else{echo $select_score_rows['Turn_in_Code'];}?></textarea>
                                <hr style="border: 2px solid #FECA65">
                            </div>
                        </div>

                        <!------------------------------------- PHP Code Looping Start Here ------------------------------->
                        <?php  
                            while($testcase_select_rows = mysqli_fetch_array($testcase_select_query)){
                                if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){
                                }else{
                                    $select_exec_rows = mysqli_fetch_array($select_exec_query);
                                }
                                       
                        ?>
                        <label for="Testcase<?php echo $testcase_count; ?>_Output_ex" style="margin-top: 10px;">Test Case <?php echo $testcase_count; ?>  </label> <?php if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){}else{if($select_exec_rows['Is_correct']==0){echo '<i class="fas fa-times text-danger float-right mt-2 mr-2" style="font-size: larger;">  Failed</i>';}else{echo '<i class="fas fa-check text-success float-right mt-2">  Passed</i>';}}?>
                        
                        <div class="row" style="font-family: Courier New;">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                              
                                    <textarea  class="form-control h-100 bg-light" id="Testcase<?php echo $testcase_count; ?>_Output_ex" rows="7" placeholder="Example Output" disabled="true"><?=$testcase_select_rows['Expected_Result']?></textarea>                               
                                    <!-- ID Example = Testcase1_Output_ex -->
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea  class="form-control h-100 bg-light" id="Testcase<?php echo $testcase_count; ?>_Output" rows="7" placeholder="Output from student" disabled="true"><?php if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){}else{echo $select_exec_rows['Actual_result'];}?></textarea> 
                                    <!-- ID Example = Testcase1_Output -->
                                </div>                    
                            </div> 
                        </div>
                        <!------------------------------------ PHP Code Looping End ---------------------------------------->
                        <?php  
                            $testcase_count++;
                              }
                        ?>


                        <?php  
                            while($hiddencase_select_rows = mysqli_fetch_array($hiddencase_select_query)){
                                if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){
                                }else{
                                    $select_exec_rows = mysqli_fetch_array($select_exec_query);
                                }
                        ?>

                        <p class="bg-warning rounded-pill rounded-5"><label class="m-2"  for="Testcase<?php echo $testcase_count; ?>_Output_ex" style="margin-top: 10px;">Hidden Case <?php echo $hiddencase_showcount; ?>  </label><?php if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){}else{if($select_exec_rows['Is_correct']==0){echo '<i class="fas fa-times text-danger float-right mt-2 mr-2" style="font-size: larger;">  Failed</i>';}else{echo '<i class="fas fa-check text-success float-right mt-2">  Passed</i>';}}?></p>
                        
                        
                        <!------------------------------------ PHP Code Looping End ---------------------------------------->
                        <?php  
                            $hiddencase_showcount++;
                            $testcase_count++;
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

<script>
    //----------------------Prevent Submit Form Script---------------------------//
var _validFileExtensions = [".py"];

var formsubmit = document.getElementById("form_Turnin");
formsubmit.onsubmit  = function(event) { 
    if(!Validate()){
        alert("Sorry, Please Upload " + _validFileExtensions.join(", ") + " File");
        event.preventDefault();
    }
}

var submit = document.getElementById('submit');
submit.onclick = function() {
    Validate();

}

function ShowMoadal1(){
    
}
//---------------------Check Upload file is .py Script------------------------------//
   
function Validate() {
    var arrInputs = document.getElementById("Assignment_File");
        var oInput = arrInputs;
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    
                    return false;
                }
            }else{
                alert("Please Upload File.");
                return false;
                
            }
        }
    
    return true;
}



</script>

<!-- Upload file button Script -->
<script>
    const actualBtn = document.getElementById('Assignment_File');

    const fileChosen = document.getElementById('file-chosen');

    actualBtn.addEventListener('change', function(){
    
    const fileSize = this.files[0].size / 1024 / 1024;
    if (fileSize > 10) {
        
        alert('File size exceeds 10 MiB');
    }else{
        fileChosen.textContent = this.files[0].name
        document.getElementById('check').disabled = false;
        document.getElementById('submit').disabled = true;       
    }

    })

</script>


</body>
</html>
