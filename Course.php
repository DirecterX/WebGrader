<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif;
    $Course_ID = $_GET['Course_ID'];
    $userid = $_SESSION['User_ID'];
    $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' ");
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
            <h1 class="m-0"> <?php echo $Course_Sem."/".$Course_Schoolyear ?> </h1>
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
                <h1 class="m-0"> <?php echo $Course_Name; ?> </i></h1>
                <style type="text/css">
                  .tg  {border-collapse:collapse;border-spacing:0;}
                  .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg .tg-0lax{text-align:left;vertical-align:top}
                  </style>
                <p>
                  <?php echo '<a href="test_excel.php?Course_ID='.$Course_ID.'" class="btn btn-primary" > Export->Excel </a>'; ?>
                </p>
                <?php
                $showuserbyteacher = mysqli_query($connect,
                "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                FROM user
                INNER JOIN course_role ON course_role.User_ID = user.User_ID
                WHERE (course_role.Role = 'Student' or 'TA') and (course_role.Course_ID = $Course_ID)
                ORDER BY User.User_ID ASC");?>

                <?php if ($role == "Teacher" || $role == "Owner"){?>
                    <table class="tg">
                      <tr>
                        <td class="tg-0lax">User_ID</td>
                        <td class="tg-0lax">Course_ID</td>
                        <td class="tg-0lax">Username</td>
                        <td class="tg-0lax">firstname</td>
                        <td class="tg-0lax">surname</td>
                        <td class="tg-0lax">Role</td>
                      
                      
                         <!-- add col assignment loop // assignment.name submit.score inner assignment and submit where User_ID and course_ID-->
                        <?php
             
                        $show_assingment = mysqli_query($connect,
                        "SELECT Name
                        FROM assignment
                        WHERE Course_ID = '$Course_ID'
                        ORDER BY Assignment_ID ASC"); 
                        while($col = mysqli_fetch_array($show_assingment)) {?>
                          <td class="tg-0lax"> <?php echo $col["Name"]; ?></td>
                        <?php

                        }
                        ?>

                        <td class="tg-0lax">Update</td>
                        <td class="tg-0lax">Kick</td>
                      </tr>
                      <?php
                        $i=0;
                        while($row = mysqli_fetch_array($showuserbyteacher)) { 
                          $Suid = $row["User_ID"]; 
                      ?>
                      
                      <tr>
                        <td class="tg-0lax"><?php echo $Suid; ?></td>
                        <td class="tg-0lax"><?php echo $row["Course_ID"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Username"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Firstname"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Surname"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Role"]; ?></td>
                        
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
                              ?><td class="tg-0lax"><?php echo $score_row["Score_Gain"]; ?></td><?php
                            }else{
                          ?><td class="tg-0lax"> 0 </td>
                          <?php
                          }  
                          }
                          ?>
                        <td class="tg-0lax"><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                        <td class="tg-0lax"><a href="update-process.php?id=<?php echo $row["id"]; ?>">Kick</a></td>
                      </tr>
                        <?php
                        $i++;
                        }
                        ?>
                  </table>
                  <?php
                    
                  }
                  else if ($role == "TA"){ ?>
                  <table class="tg">
                      <tr>
                        <td class="tg-0lax">Username</td>
                        <td class="tg-0lax">firstname</td>
                        <td class="tg-0lax">surname</td>
                        <td class="tg-0lax">Role</td> 
                      </tr>
                          <?php
                          $i=0;
                          while($row = mysqli_fetch_array($showuserbyteacher)) {
                          ?>  
                        <tr>
                          <td class="tg-0lax"><?php echo $row["Username"]; ?></td>
                          <td class="tg-0lax"><?php echo $row["Firstname"]; ?></td>
                          <td class="tg-0lax"><?php echo $row["Surname"]; ?></td>
                          <td class="tg-0lax"><?php echo $row["Role"]; ?></td>
                        </tr>
                          <?php $i++; ?>
                    </table>
                    <?php
                      }
                    }
                  else if ($role == "student"){
                    //echo "test";
                  }?>




<br>
<div class="row">
        <!-- **********************************\*Use this for generate with PHP******************************************-->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card cardborder" style="background-color:#FFFFFF;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body" >
                
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-check fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Passed" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <h6>- <?php echo "Assignment 1" ?></h6> <!-- Assignment -->
              
              </div>
              </a>
            </div>
            <!-- /.card -->
          <!-- **********************************************************************************************************-->  
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-search fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "waiting for inspect" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 2" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-history fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "waiting for turn in" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 3" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Java Class" ?></b></h5> <!-- Class Name -->
                    
                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-times-circle fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Not Passed" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assignment 2" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo "Java Class" ?></b></h5> <!-- Class name -->

                    <p class="card-text">
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-calendar-times fa-6x"></i>  <!-- Icon -->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;">
                                <h5><?php echo "Not turn in" ?></h5>  <!-- Status -->
                            
                            </div>
                        </div>               
                    </p>

                    <a href="#" class="card-link">- <?php echo "Assingment 1" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <?php if ($role == "Teacher" || $role == "Owner"){?>          
          <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">
            <a href="#" id="add_class"> 
                <div class="card-body">
                    <p class="card-text">
                            <div class="row">
                                <div class="col style="text-align:center;">
                                <h1><i class="gg-add-r"></i></h1>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                 <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4>เพิ่ม Assignment</h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    
        
                </div>
            </a>
            </div>
            <!-- /.card -->     
          </div>
          <?php } ?>

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

</body>
</html>