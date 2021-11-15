<?php
    include('config.php');

    

    $testcase_count = 1;
    $testcase_count2 = 1;
    $hiddencase_count = 1;
    $hiddencase_showcount = 1;

    $submit_id = $_GET['Submit_ID'];
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
    if($role == "Owner" or $role == "Teacher" or $role == "TA"){
        
    }else{
        header("Location: home.php");
    }


    ####################### GET ASSIGNMENT INFORMATION BY Assignment_ID ################################
    $assignment_select = "SELECT * FROM assignment WHERE Assignment_ID ='$assignment_id'";
    $assignment_select_query = mysqli_query($connect,$assignment_select);
    $assignment_rows = mysqli_fetch_array($assignment_select_query);

    ############################### GET SUBMITION INFO #####################################
    $select_submit_sql = "SELECT * FROM submition WHERE Submit_ID = '$submit_id'";
    $select_submit_query = mysqli_query($connect,$select_submit_sql);
    $select_submit_rows = mysqli_fetch_array($select_submit_query);

    ######################### get output that user execute #####################################
    $select_exec_sql = "SELECT Actual_result , Is_correct FROM exec_output WHERE Submit_ID ='$submit_id' ORDER BY Testcase_ID ASC";
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
  <title>Inspect Assignment</title>

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
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="form-group">

                                <textarea  class="form-control h-100" id="Assignment_Note" style="margin-top: 10px;" rows="11" disabled><?=$assignment_rows['Detail'];?></textarea>

                                </div>
                            </div> 
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="Comment_Teacher">Comment form Teacher</label>
                                    <textarea  class="form-control" id="Assignment_Note" rows="3"></textarea>
                                    <label for="Comment">Comment</label>
                                    <form action="#">
                                        <textarea  class="form-control" id="Assignment_Note" rows="3"></textarea>
                                        <input type="submit" id="submit" name="submit" class="btn btn-warning h-50" style="float:right;margin-top: 5px;" value="Send Comment">
                                    </form>
                                </div>                    
                            </div> 
                        </div>
                        <!--  Button For Upload And Submit -->
                        <div class="row" style="margin-bottom:-20px;">
                            <div class="col" style="align-items: right;">
                                <div class="text-right">
                                    <!-------------------------------- PHP Code For Checking Status to change button Here ---------------------------->
                                    <form action="approvement_query.php" method="post" enctype="multipart/form-data">
                                        <input type="submit"  class="btn btn-danger h-50" id="reject_button" name="reject_button" value="Reject - feedback">
                                        <input type="submit" id="submit" name="submit" class="btn btn-success" value="Grade - feedback">
                                        <input type="button" class="btn btn-info h-50" id="exit_button" name="exit_button"  value="Exit" onclick="window.history.back()">
                                        <!--------- Non-hidden TESTCASE ID Loop --------------->
                                        <input type="hidden" name="Submit_ID" value="<?=$submit_id;?>">
                                        <input type="hidden" name="Assignment_ID" value="<?=$assignment_id;?>">
                                        <input type="hidden" name="Course_ID" value="<?=$course_id;?>">
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
                                <h2 class="badge bg-warning" style="font-size:120%;">Submit Code</h2>
                            </div>
                            <div class="col-6 text-right">
                                
                                <label style="font-size:120%; color:#FF2020" >ส่งครั้งที่ <?=$select_submit_rows['Attempt_count'];?></label>  <!-- Assignment ์number attemp -->
                             
                                
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:30px;"> <!-- Text Area for Code ? -->
                            <div class="col">
                                <textarea  class="form-control h-100" id="Assignment_Code" style="margin-top: 10px;" rows="8" disabled="true"><?=$select_submit_rows['Turn_in_Code'];?></textarea>
                                <hr style="border: 2px solid #FECA65">
                            </div>
                        </div>

                        <!------------------------------------- PHP Code Looping Start Here ------------------------------->
                        <?php  
                            while($select_exec_rows = mysqli_fetch_array($select_exec_query)){
                        ?>
                        <label for="Testcase_Output_ex" style="margin-top: 10px;">Test Case <?=$testcase_count;?>  </label>
                        
                        <div class="row" style="font-family: Courier New;">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea  class="form-control h-100 bg-light" id="Testcase_Output" rows="7" placeholder="Output from student" disabled="true"><?=$select_exec_rows['Actual_result'];?></textarea> 
                                    <!-- ID Example = Testcase1_Output -->
                                </div>                    
                            </div> 
                        </div>
                        <!------------------------------------ PHP Code Looping End ---------------------------------------->
                        <?php  
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
