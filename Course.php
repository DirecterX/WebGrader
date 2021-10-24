<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
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
    
            <h1 class="m-0 fw-bolder">ห้องเรียน : <?php echo $Course_Name; ?><i class="fa fa-book ml-2"></i></i></h1>

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
                <p>
                  <?php echo '<a href="test_excel.php?Course_ID='.$Course_ID.'" class="btn btn-primary" > Export->Excel </a>'; ?>
                  <?php 
                  echo '<a href="Course_Info.php?Course_ID='.$Course_ID.'" class="btn btn-warning" >';
                  if ($role=="Owner"){
                    echo 'Edit </a>';
                  }else{
                    echo 'Info </a>';
                  }
                  
                  
                  
                  
                   ?>
                </p>
                <?php
                $showuserbyteacher = mysqli_query($connect,
                "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                FROM user
                INNER JOIN course_role ON course_role.User_ID = user.User_ID
                WHERE (course_role.Role = 'Student' or course_role.Role = 'TA') and (course_role.Course_ID = $Course_ID)
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
                      <form action="editpeople/edit_people_process.php"method = "POST" >
                      <tr>
                        <td class="tg-0lax"><?php echo $Suid; ?></td>
                        <td class="tg-0lax"><?php echo $row["Course_ID"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Username"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Firstname"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Surname"]; ?></td>
                        <td class="tg-0lax">  
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
                              ?><td class="tg-0lax"><?php echo $score_row["Score_Gain"]; ?></td><?php
                            }else{
                          ?><td class="tg-0lax"> 0 </td>
                          <?php
                          }  
                          }
                          ?>
                        <td class="tg-0lax"><input type="submit" value="update"></td>
                        <td class="tg-0lax"><a href="kick_people_process.php" onclick="return confirm('Are you sure to kick tihs user?')"> <input type="submit" value="kick"></td>
                      </form>
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
                          <?php $i++; } ?>
                    </table>
                    <?php
                      }                   
                  else if ($role == "student"){
                    //echo "test";
                  }?>

<br>


 <?php
                $showuserbyteacher = mysqli_query($connect,
                "SELECT *
                FROM assignment
                WHERE Course_ID = ".$Course_ID."
                ORDER BY Assignment_ID ASC");?>

                <?php if ($role == "Teacher" || $role == "Owner"){?>
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
                        <td class="tg-0lax"><?php echo $row["Assignment_ID"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Course_ID"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Name"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Score"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["Detail"]; ?></td>
                        <td class="tg-0lax"><?php echo $row["End_date"]; ?></td>
                        
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
                             
                          }
                          ?>
                        <td class="tg-0lax"><a href="Assignment_Info.php?Assignment_ID=<?php echo $row["Assignment_ID"]; ?>">ดูข้อมูล</a></td>
                        <td class="tg-0lax"><a href="#" onclick="return confirm('Are you sure to kick tihs user?')">ลบ</a></td>
                      </tr>
                        <?php
                        }
                        ?>
                  </table>
                  <a href="AddAssignment.php?Course_ID=<?php echo $Course_ID; ?>">เพิ่มงาน</a>
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
            
                $showuserbyteacher = mysqli_query($connect,
                "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                FROM user
                INNER JOIN course_role ON course_role.User_ID = user.User_ID
                WHERE (course_role.Role = 'Student' or 'TA') and (course_role.Course_ID = $Course_ID)
                ORDER BY User.User_ID ASC");?>

                    <table class="tg">
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
                        <?php
                        ?>
                  </table>
                  <?php
                    
                  
                  ?>



<br>


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