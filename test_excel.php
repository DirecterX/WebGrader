<?php
	include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif;
    $Course_ID = $_GET['Course_ID'];
    $userid = $_SESSION['User_ID'];
	//echo $Course_ID.''.$userid;
	$show_course = mysqli_query($connect,"SELECT * FROM course WHERE Course_ID = '$Course_ID' ");
    $result = mysqli_fetch_array($show_course);
	$Course_Schoolyear = $result['Schoolyear'];
	$Course_Sem = $result['Semester'];
	$Course_name = $result['Name'];
	$file_name = $Course_name."-".$Course_Sem."/".$Course_Schoolyear;
	//echo $file_name;
	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=$file_name.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

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


  <!-- link font google kanit -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
   

</head>
	<body>
		<div class="container">
		<style type="text/css">
                  .tg  {border-collapse:collapse;border-spacing:0;}
                  .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                  .tg .tg-0lax{text-align:left;vertical-align:top}
                  </style>
		<?php
                $showuserbyteacher = mysqli_query($connect,
                "SELECT user.Username , user.Firstname , user.Surname , course_role.Role , user.User_ID , course_role.Course_ID
                FROM user
                INNER JOIN course_role ON course_role.User_ID = user.User_ID
                WHERE (course_role.Role = 'Student' or 'TA') and (course_role.Course_ID = $Course_ID)
                ORDER BY User.User_ID ASC");?>

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

                      </tr>
                        <?php
                        $i++;
                        }
                        ?>
                  </table>
             
		</div>
	</body>
</html>