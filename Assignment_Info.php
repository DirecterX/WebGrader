<?php
    include('config.php');
    $testcase_count = 1;
    $testcase_count2 = 1;

    $course_id = 1;
    $user_id = $_SESSION['User_ID'];
    $assignment_id = $_GET['Assignment_ID'];

    ####################### select score to check if exist or not #######################################
    $select_score_sql = "SELECT Submit_ID , Score_Gain , Student_Comment , Instructor_Comment , Turn_in_Code , Turn_in_Status , Attempt_count FROM submition WHERE Assignment_ID ='$assignment_id' AND User_ID ='$user_id'";
    $select_score_query = mysqli_query($connect,$select_score_sql);

    if(mysqli_num_rows($select_score_query) == 0){
        $insert_score_sql = "INSERT INTO submition (Assignment_ID,User_ID)
                             VALUES('$assignment_id','$user_id')";
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

    ############################# GET testcase of that assignment ################################
    $testcase_select = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id'  #<<<<<<<<<<<<<<< Dynamic Variable fix ใส่ไปอยู่เปลี่ยนไปใช้ตัวแปร
                        ORDER BY testcase.Number ASC";
    $testcase_select_query = mysqli_query($connect,$testcase_select);        
    
    ############################# GET testcase of that assignment to attach to form ################################
    $testcase_select2 = "SELECT testcase.Testcase_ID , testcase.Expected_Result , testcase.Input 
                        FROM testcase
                        INNER JOIN assignment
                        ON assignment.Assignment_ID = testcase.Assignment_ID
                        WHERE assignment.Assignment_ID = '$assignment_id'  #<<<<<<<<<<<<<<< Dynamic Variable fix ใส่ไปอยู่เปลี่ยนไปใช้ตัวแปร
                        ORDER BY testcase.Number ASC";
    $testcase_select_query2 = mysqli_query($connect,$testcase_select2);  

    ######################### get output that user execute #####################################
    $select_exec_sql = "SELECT Actual_result FROM exec_output WHERE Submit_ID ='$submit_id' AND User_ID ='$user_id' ORDER BY Testcase_ID ASC";
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
                
                <h1 class="badge bg-warning"> Assignment Name : <?=$assignment_rows['Name']; ?></h1> <!-- Assignment Name-->
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
                                <h2 class="badge bg-warning" style="font-size:120%;"> ชื่องาน : <?=$assignment_rows['Name']; ?></h2> <!-- Assignment Name-->
                            </div>
                            <div class="col-6 text-right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="form-group">

                                <textarea  class="form-control h-100" id="Assignment_Note"  style="margin-top: 10px;" rows="11"><?=$assignment_rows['Detail']?></textarea>

                                </div>
                            </div> 
                             
                        </div>
                        <!--  Button For Upload And Submit -->
                        <div class="row" style="margin-bottom:-20px;">
                            <div class="col" style="align-items: right;">
                                <div class="text-right">
                                    <!-------------------------------- PHP Code For Checking Status to change button Here ---------------------------->
                                    <form action="filter2.php" method="post" enctype="multipart/form-data">
                                        <!-- ยังไม่ได้ทำ -->
                                        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="แก้ไข"></input>
                                        <td class="tg-0lax"><a href="Assignment_Delete.php?Assignment_ID=<?php echo $assignment_id;?> ">ลบ</a></td>
                                        <?php  
                                            while($testcase_select_rows2 = mysqli_fetch_array($testcase_select_query2)){
                                        ?>
                                            <input type="hidden" name="Testcase<?=$testcase_count2;?>_ID" value="<?=$testcase_select_rows2['Testcase_ID']?>">
                                        <?php  
                                            $testcase_count2++;
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
                        
                        
                        <!------------------------------------- PHP Code Looping Start Here ------------------------------->
                        <?php  
                            while($testcase_select_rows = mysqli_fetch_array($testcase_select_query)){
                                if(!$select_exec_query || mysqli_num_rows($select_exec_query) == 0){
                                }else{
                                    $select_exec_rows = mysqli_fetch_array($select_exec_query);
                                }
                                       
                        ?>
                        <label for="Testcase<?php echo $testcase_count; ?>_Output_ex" style="margin-top: 10px;">Test Case<?php echo $testcase_count; ?></label> 
                        <div class="row" style="font-family: Courier New;">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    
                                    <textarea  class="form-control h-100" id="Testcase<?php echo $testcase_count; ?>_Output" rows="7" value="<?=$testcase_select_rows['Input'] ?>"><?=$testcase_select_rows['Input'] ?></textarea> 
                                    <!-- ID Example = Testcase1_Output -->
                                </div>                    
                            </div> 
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    
                                    <textarea  class="form-control h-100" id="Testcase<?php echo $testcase_count; ?>_Output_ex" rows="7" placeholder="Example Output" disabled="true"><?=$testcase_select_rows['Expected_Result']?></textarea>                               
                                    <!-- ID Example = Testcase1_Output_ex -->
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
