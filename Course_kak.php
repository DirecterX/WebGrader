<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
    endif;
    $Course_ID = $_GET['Course_ID'];
    $userid = $_SESSION['User_ID'];
    $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' AND Course_ID = '$Course_ID' ");
    //echo $checkcourserole["Role"];
    $result = mysqli_fetch_assoc($checkcourserole);
    $role = $result["Role"];


    $show_course = 
        "SELECT * 
        FROM course 
        WHERE Course_ID = '".$Course_ID."'";
        $show_course_q = mysqli_query($connect,$show_course);
        $show_course_result = mysqli_fetch_array($show_course_q);
        $Course_Name = $show_course_result['Name'];
        $Course_Schoolyear = $show_course_result['Schoolyear'];
        $Course_Sem = $show_course_result['Semester'];



?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<title>WebGrader | ห้องเรียน</title>
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
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "template/navbar.php"; ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0"> <?php echo $Course_Sem."/".$Course_Schoolyear ?> </h2>
          </div><!-- /.col -->         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
      <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
          <div class="col mt-2" >
    
            <h1 class="m-0 fw-bolder">ห้องเรียน : <?php echo $Course_Name; ?><i class="fa fa-book ml-2"> <?php 
                  echo '<a href="Course_Info.php?Course_ID='.$Course_ID.'" class="btn btn-warning" >';
                  if ($role=="Owner"){
                    echo 'Edit Info</a>';
                  }else{
                    echo 'Info </a>';
                  }                                                 
                   ?></i> </h1>


          </div><!-- /.col -->         
        </div><!-- /.row -->
              
      <!-- Coding Here -->
        <div class="row">
            <div class="col">
                <style type="text/css">
                  .tg  {border-collapse:collapse;border-spacing:0;}
                  .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg .tg-0lax{text-align:left;vertical-align:top}
                  </style>

              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#TabClass" data-toggle="tab">CLASS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#TabPeople" data-toggle="tab">PEOPLE</a></li>
                    <li class="nav-item"><a class="nav-link" href="#TabAssignment" data-toggle="tab">ASSIGNMENT</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <!---------------------------------------------- Tab Class --------------------------------------------------->
                    <div class="active tab-pane" id="TabClass">          
                      
                        
                        <?php
                          $ShowAssignment = mysqli_query($connect,"SELECT * FROM assignment WHERE Course_ID = ".$Course_ID." ORDER BY Assignment_ID ASC");
                          if ($role == "Teacher" || $role == "Owner"){
                        ?>
                        
                        <div class="row">
                        <div class="col-12">
                          <div class="dropdown" > <!-- Create Assignment Button -->
                            <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown"><i class="fa fa-plus"></i> Create</button>
                            <div class="dropdown-menu dropdown-menu-left">
                              <a href="AddAssignment.php?Course_ID=<?php echo $Course_ID; ?>" class="dropdown-item">  <i class="fa fa-file"></i> Assignment</a>
                            </div>
                          </div>

                          
                        </div>
                      </div>
                      <div class="row" style="margin-top:10px;">  

                        <?php        
                            while($row = mysqli_fetch_array($ShowAssignment)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <!--------------------- Card Assignment --------------------------------------->
                          <div class="card bg-light"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <a href="Assignment_Info.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>" class="text-dark">
                            <div class="card-body">
                                 <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3"><?php echo $row["Name"]; ?></b></h5> 
                                <!-------- Dropdown Manage Assignment -->
                                <div class="dropdown" style="float: right;">
                                          <a data-toggle="dropdown" href="#" class="text-dark">
                                            <i class="fa fa-ellipsis-h"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right">                                               
                                            <a href="#" class="dropdown-item" > <!--------------------- Add link here--------------------- -->
                                              <i class="fa fa-edit"></i> Edit             
                                            </a>                                        
                                            <a href="#" class="dropdown-item" onclick="return confirm('Are you sure to Delete tihs Assignment?')"> <!-- Delete Assignment -->
                                              <i class="fa fa-trash"></i> Delete             
                                            </a>
                                            </div>
                                </div>
                                <!-------- Assignment Content -->
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h6 class="float-left font-weight-bold">Due : <?php echo $row["End_date"]; ?> </h6>
           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                          <!--<label class=" float-left text-success font-weight-light">
                                            <i class="fas fa-check" style="color:black;"></i> <?php echo "Passed"?>                                      
                                          </label>-->                                       
                                        </div>
                                    </div>               
                                </p>
                                
                            </div>
                            </a>
                          </div> 
                        </div><!-- /col --> 
                          <!---------------------End Card Assignment ---------------------------------------->                               
                          <?php
                              }
                            }else if ($role == "TA"){   //-------------------TA--------------------------//
                          ?> 
                          <div class="row" style="margin-top:10px;"> 
                          <?php    
                              while($row = mysqli_fetch_array($ShowAssignment)) {
                          ?>
                          <div class="col-3">  
                          <!--------------------- Card Assignment --------------------------------------->
                          <div class="card bg-light"  style="border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                            <div class="card-body">
                                <a href="Assignment_Info.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>" class="text-dark"> <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3"><?php echo $row["Name"]; ?></b></h5> 

                                <p class="card-text">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h6 class="float-left font-weight-bold">Due : <?php echo $row["End_date"]; ?> </h6>                                      
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
                          <!---------------------End Card Assignment ---------------------------------------->                                          
                          </div><!-- /col -->           
                                    <?php
                                      }
                                    }
                                    ?>
                                
                                   
                      </div><!-- /row -->
                     
                    </div><!-- /Tab Class -->         
                    <!------------------------------------------------Tab People ------------------------------------------------->
                    <div class="tab-pane" id="TabPeople">
                      
                      <?php
                      $showuserbyteacher = mysqli_query($connect,
                      "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                      FROM user
                      INNER JOIN course_role ON course_role.User_ID = user.User_ID
                      WHERE (course_role.Role = 'Student' or course_role.Role = 'TA') and (course_role.Course_ID = $Course_ID)
                      ORDER BY User.User_ID ASC");?>

                        <?php if ($role == "Teacher" || $role == "Owner"){?>
                          <!-----------------------------Button Export Excel And Edit----------------------->
                      <p>
                      <?php echo '<a href="test_excel.php?Course_ID='.$Course_ID.'" class="btn btn-primary" > Export Student Data to Excel </a>'; ?></p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>                            
                              <th>Username</th>
                              <th>Full Name</th>
                              <th>Role</th>
                              <!-- add col assignment loop // assignment.name submit.score inner assignment and submit where User_ID and course_ID-->
                              <?php                  
                              $show_assingment = mysqli_query($connect,"SELECT Name FROM assignment WHERE Course_ID = '$Course_ID' ORDER BY Assignment_ID ASC"); 
                              while($col = mysqli_fetch_array($show_assingment)) { ?>
                                <th> <?php echo $col["Name"]; ?></th>
                              <?php } ?>
                              <th>Update</th>
                              <th>Kick</th>
                            </tr>
                          </thead>
                          <tbody>    
                            <?php
                              $i=0;
                              while($row = mysqli_fetch_array($showuserbyteacher)) { 
                                $Suid = $row["User_ID"]; 
                            ?>
                            <form action="editpeople/edit_people_process.php"method = "POST" >
                            <tr>                       
                              <td><?php echo $row["Username"]; ?></td>
                              <td><?php echo $row["Firstname"]." ".$row["Surname"]; ?></td>
                              
                              <td>  
                                <input type = "text" id = "User_ID" name = "User_ID" value = "<?php echo $row["User_ID"]; ?> " hidden >
                                <input type = "text" id = "Course_ID" name = "Course_ID" value = "<?php echo $row["Course_ID"]; ?>" hidden >
                                <select name="Role" id="Role">
                                  <option value="student"<?php if( $row["Role"] == "student"){echo " selected";} ?>>student</option>
                                  <option value="TA"<?php if( $row["Role"] == "TA"){echo " selected";} ?>>TA</option>
                                  <option value="Teacher"<?php if( $row["Role"] == "Teacher"){echo " selected";} ?>>Teacher</option>
                                </select>
                              </td>
                              
                              <?php
                              //echo $count_assignment
                                $show_score_gain = FALSE; 
                                $show_assingment = mysqli_query($connect,
                                "SELECT *
                                FROM assignment
                                WHERE Course_ID = '$Course_ID'
                                ORDER BY Assignment_ID ASC");
                                while($assingment_result = mysqli_fetch_array($show_assingment)){
                                  $assignment_ID = $assingment_result['Assignment_ID'];
                                  $show_score = mysqli_query($connect,
                                  "SELECT * 
                                  FROM submition
                                  WHERE Course_ID = '$Course_ID' and User_ID = '$Suid' and Assignment_ID = '$assignment_ID'
                                  ORDER BY Assignment_ID ASC");
                                  $score_row = mysqli_fetch_array($show_score);
                                  if(mysqli_num_rows($show_score)>0){
                                    ?><td><?php echo $score_row["Score_Gain"]; ?></td><?php
                                  }else{
                                ?><td> 0 </td>
                                <?php
                                }  
                                }
                                ?>
                              <td><input type="submit" value="update"></td>
                              <td><a href="kick_people_process.php" onclick="return confirm('Are you sure to kick tihs user?')"> <input type="submit" value="kick"></td>
                            </form>
                            </tr>
                              <?php
                              $i++;
                              }
                              ?>
                          </tbody>
                        </table>
                        <?php
                          
                        }
                        else if ($role == "TA"){ ?>
                        <table class="table table-bordered">
                          <thead>
                            <tr> 
                              <th>Username</th>
                              <th>Full Name</th>
                              <th>Role</th>                                                    
                            </tr>
                          </thead>
                          <tbody>  
                                <?php
                                $i=0;
                                while($row = mysqli_fetch_array($showuserbyteacher)) {
                                ?>  
                              <tr>
                                <td><?php echo $row["Username"]; ?></td>
                                <td><?php echo $row["Firstname"]." ".$row["Surname"]; ?></td>                              
                                <td><?php echo $row["Role"]; ?></td>                    
                              </tr>
                                <?php $i++; } ?>
                          <tbody>
                        </table>
                          <?php
                          }                   
                        else if ($role == "student"){
                          $showuserbyteacher = mysqli_query($connect,
                          "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                          FROM user
                          INNER JOIN course_role ON course_role.User_ID = user.User_ID
                          WHERE (course_role.Role = 'Student') and (course_role.Course_ID = $Course_ID)
                          ORDER BY User.User_ID ASC");?>
                          
                              <table class="table table-bordered">
                                <tr>
                                  <td class="tg-0lax">Username</td>
                                  <td class="tg-0lax">firstname</td>
                                  <td class="tg-0lax">surname</td>
                                  <td class="tg-0lax">Role</td>
                                
                                  

                                <?php
                                  $i=0;
                                  while($row = mysqli_fetch_array($showuserbyteacher)) { 
                                ?>
                                
                                <tr>
                                  <td class="tg-0lax"><?php echo $row["Username"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Firstname"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Surname"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Role"]; ?></td>
                                  
                                  <?php
                                    }  
                                  ?>
                            </table>
                    </div><!-- /Tab People --> 

                    <!------------------------------------------------ Tab Assignment ---------------------------------------------->
                    <div class="tab-pane" id="TabAssignment">    
                      <div class="row">
                        <!----------------------PHP CODE Query and START LOOP HERE ----------------------------------------------------------------->
                        
                        <!---------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-12">
                          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                              <div class="card-body">
                                <a href="TurnInCode.php" class="text-dark"> <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment <?php echo " 1 " ?></b></h5> 
                                  <label class=" float-right font-weight-light" style="margin-left:5px;">
                                     Point <?php echo "1" ?> / <?php echo "1" ?> <!-- Score -->                                      
                                  </label>
                                  <label class=" float-right text-success font-weight-light">
                                    <i class="fas fa-check" style="color:black;"></i> <?php echo "Passed"?>  <!-- Status -->                                     
                                  </label>
                                  
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h5 class="float-left font-weight-bold">By <?php echo "6301xxxx" ?> <?php echo "Full name" ?> </h5> 
                                        <!--  Userinfo who turn in assignment -->

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col" style="text-align:right;">
                                          <a href="#" id="Reject_btn" name="Reject_btn" class="btn btn-danger w-15">Reject-Feedback</a>
                                          <a href="#" id="Approve_btn" name="Approve_btn" class="btn btn-info w-15">Grade-Feedback</a>
                                          <a href="#" id="ViewCode_btn" name="ViewCode_btn" class="btn btn-warning w-15">View Code</a>                                                                               
                                        </div>
                                    </div>               
                                </p>
                                </a>
                              </div>
                          </div>


                        </div>
                        <!-----------------------------PHP End Loop here ----------------------------------------------------------->
                        <?php
                        $assignment_Sumit = "SELECT * 
                        FROM submition
                        INNER JOIN assignment ON assignment.Assignment_ID = submition.Assignment_ID 
                        WHERE submition.Course_ID = $Course_ID";
                        $assignment_Sumitq = mysqli_query($connect,$assignment_Sumit);
                        while ($row = mysqli_fetch_array($assignment_Sumitq)) {
                          
                          ?>
                          <div class="col-12">
                          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                              <div class="card-body">
                                <a href="TurnInCode.php" class="text-dark"> <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment : <?php echo $row['Name']; ?></b></h5> 
                                  <label class=" float-right font-weight-light" style="margin-left:5px;">
                                     Point <?php echo $row['Score_Gain']; ?> / <?php echo "1" ?> <!-- Score -->                                      
                                  </label>
                                  <label class=" float-right text-danger font-weight-light">
                                    <i class="fa fa-search" style="color:black;"></i> <?php echo $row['Turn_in_Status'];?>  <!-- Status -->                                     
                                  </label>
                                  
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <?php 
                                        $showstudentnameinsubmition = "SELECT DISTINCT * FROM user WHERE User_ID = ".$row['User_ID']." ";
                                        $showstudentnameinsubmitionq = mysqli_query($connect,$showstudentnameinsubmition);
                                        while ($row = mysqli_fetch_array($showstudentnameinsubmitionq)) { ?>
                                        
                                        <h5 class="float-left font-weight-bold">By 
                                          <?php echo $row['Username'];?> | <?php echo $row['Firstname'];?>  <?php echo $row['Surname']; ?> </h5> 
                                        <!--  Userinfo who turn in assignment -->
                                        
                                        <?php
                                      }
                                        ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="text-align:right;">
                                          <a href="#" id="Reject_btn" name="Reject_btn" class="btn btn-danger w-15">Reject-Feedback</a>
                                          <a href="#" id="Approve_btn" name="Approve_btn" class="btn btn-info w-15">Grade-Feedback</a>
                                          <a href="#" id="ViewCode_btn" name="ViewCode_btn" class="btn btn-warning w-15">View Code</a>                                                                               
                                        </div>
                                    </div>               
                                </p>
                                </a>
                              </div>
                          </div>
                        </div>
                          <?php
                        }
                        ?>
                        <!----------------------------Dummy mockup Deleteable-------------------------------------------------------->
                        <div class="col-12">
                          <div class="card bg-light w-100"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
                              <div class="card-body">
                                <a href="TurnInCode.php" class="text-dark"> <!-- link -->
                                <h5 class="card-title" style="font-size:larger;background-color:#FFD56B; border-radius: 0px 20px 0px 0px;"><b class="p-3">Assignment <?php echo " 1 " ?></b></h5> 
                                  <label class=" float-right font-weight-light" style="margin-left:5px;">
                                     Point <?php echo "1" ?> / <?php echo "1" ?> <!-- Score -->                                      
                                  </label>
                                  <label class=" float-right text-danger font-weight-light">
                                    <i class="fa fa-search" style="color:black;"></i> <?php echo "Wait for inspect"?>  <!-- Status -->                                     
                                  </label>
                                  
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col" style="text-align:center;">
                                        <h5 class="float-left font-weight-bold">By <?php echo "6301xxxx" ?> <?php echo "Full name" ?> </h5> <!--  Userinfo who turn in assignment -->

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" style="text-align:right;">
                                          <a href="#" id="Reject_btn" name="Reject_btn" class="btn btn-danger w-15">Reject-Feedback</a>
                                          <a href="#" id="Approve_btn" name="Approve_btn" class="btn btn-info w-15">Grade-Feedback</a>
                                          <a href="#" id="ViewCode_btn" name="ViewCode_btn" class="btn btn-warning w-15">View Code</a>                                                                               
                                        </div>
                                    </div>               
                                </p>
                                </a>
                              </div>
                          </div>
                        </div>
                        <!--------------------------------------End dummy mockup-------------------------------------------------------->
                      </div>
                    

                      <?php
                          $showuserbyteacher = mysqli_query($connect,
                          "SELECT *
                          FROM assignment
                          WHERE Course_ID = ".$Course_ID."
                          ORDER BY Assignment_ID ASC");?>

                          <?php if ($role == "Teacher" || $role == "Owner"){?>
                              <table class="tg">
                                <tr>
                                  <td class="tg-0lax">Name</td>
                                  <td class="tg-0lax">Score</td>
                                  <td class="tg-0lax">Detail</td>
                                  <td class="tg-0lax">End_date</td>
                                
                                
                                  <!-- add col assignment loop // assignment.name submit.score inner assignment and submit where User_ID and course_ID-->
                                  <?php
                      
                                  $show_assingment = mysqli_query($connect,
                                  "SELECT Name
                                  FROM assignment
                                  WHERE Course_ID = '$Course_ID'
                                  ORDER BY Assignment_ID ASC"); 
                                  while($col = mysqli_fetch_array($show_assingment)) {?>
                                  <?php

                                  }
                                  ?>

                                  <td class="tg-0lax">Info</td>
                                  <td class="tg-0lax">Delete</td>
                                </tr>
                                <?php
                                  $i=0;
                                  while($row = mysqli_fetch_array($showuserbyteacher)) { 
                                ?>
                                
                                <tr>
                                  <td class="tg-0lax"><?php echo $row["Name"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Score"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Detail"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["End_date"]; ?></td>
                                  
                                  <?php
                                   
                                    ?>
                                  <td class="tg-0lax"><a href="Assignment_Info.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>">ดูข้อมูล</a></td>
                                  <td class="tg-0lax"><a href="Assignment_Delete.php?Assignment_ID=<?php echo $row["Assignment_ID"];?> ">ลบ</a></td>
                                </tr>
                                  <?php
                                  }
                                  ?>
                            </table>
                            
                            <?php                           
                              }
                              else if ($role == "TA"){ 
                            ?>
                                                                         
                          <?php
                          $showuserbyteacher = mysqli_query($connect,
                          "SELECT *
                          FROM assignment
                          WHERE Course_ID = ".$Course_ID."
                          ORDER BY Assignment_ID ASC");?>
                        
                              <table class="tg">
                                <tr>
                                  <td class="tg-0lax">Name</td>
                                  <td class="tg-0lax">Score</td>
                                  <td class="tg-0lax">Detail</td>
                                  <td class="tg-0lax">End_date</td>
                                
                                
                                  <!-- add col assignment loop // assignment.name submit.score inner assignment and submit where User_ID and course_ID-->
                                  <?php
                      
                                  $show_assingment = mysqli_query($connect,
                                  "SELECT Name
                                  FROM assignment
                                  WHERE Course_ID = '$Course_ID'
                                  ORDER BY Assignment_ID ASC"); 
                                  while($col = mysqli_fetch_array($show_assingment)) {?>
                                  <?php

                                  }
                                  ?>

                                  <td class="tg-0lax">Info</td>
                                </tr>
                                <?php
                                  $i=0;
                                  while($row = mysqli_fetch_array($showuserbyteacher)) { 
                                ?>
                                
                                <tr>
                                  <td class="tg-0lax"><?php echo $row["Name"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Score"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["Detail"]; ?></td>
                                  <td class="tg-0lax"><?php echo $row["End_date"]; ?></td>
                                  
                                  <td class="tg-0lax"><a href="Assignment_Info.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>">ดูข้อมูล</a></td>
                                </tr>
                                  <?php
                                  }
                                  ?>
                            </table>
                          </div>
                              <?php
                                
                              }
                            else if ($role == "student"){
                      
                          ?>
                            <?php
                            }
                            
                            ?>

                        <?php
                          $showuserbyteacher = mysqli_query($connect,
                          "SELECT *
                          FROM assignment
                          WHERE Course_ID = ".$Course_ID."
                          ORDER BY Assignment_ID ASC");?>

                              <table class="tg">
                                  <tr>
                                    <td class="tg-0lax">Assigment_ID</td>
                                    <td class="tg-0lax">Course_ID</td>
                                    <td class="tg-0lax">Name</td>
                                    <td class="tg-0lax">Score</td>
                                    <td class="tg-0lax">Detail</td>
                                    <td class="tg-0lax">End_date</td>
                                  
                                  
                                    <!-- add col assignment loop // assignment.name submit.score inner assignment and submit where User_ID and course_ID-->
                                    <?php
                        
                                    $show_assingment = mysqli_query($connect,
                                    "SELECT Name
                                    FROM assignment
                                    WHERE Course_ID = '$Course_ID'
                                    ORDER BY Assignment_ID ASC"); 
                                  
                                    ?>
                                    <td class="tg-0lax">Update</td>
                                  </tr>
                                  <?php
                                    while($row = mysqli_fetch_array($showuserbyteacher)) { 
                                  ?>
                                  
                                  <tr>
                                    <td class="tg-0lax"><?php echo $row["Assignment_ID"]; ?></td>
                                    <td class="tg-0lax"><?php echo $row["Course_ID"]; ?></td>
                                    <td class="tg-0lax"><?php echo $row["Name"]; ?></td>
                                    <td class="tg-0lax"><?php echo $row["Score"]; ?></td>
                                    <td class="tg-0lax"><?php echo $row["Detail"]; ?></td>
                                    <td class="tg-0lax"><?php echo $row["End_date"]; ?></td>
                                    <td class="tg-0lax"><a href="TurnInCode.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>">ดูงาน</a></td>
                                  </tr>
                                    <?php
                                      }                                  
                                    }
                                    ?>
                                </table>    
                   
                   
                    </div><!-- /Tab Assignment --> 
                </div><!-- Tab-->
                </div><!-- Card Body -->
              </div><!--  Card -->        


                


                  
                  
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