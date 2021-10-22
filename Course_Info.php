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
        $Enroll_Code = $show_course_result['Enroll_Code'];
        $Course_Schoolyear = $show_course_result['Schoolyear'];
        $Course_Sem = $show_course_result['Semester'];
        $Start_date = $show_course_result['Start_date'];
        $End_date = $show_course_result['End_date'];

    $years = range(strftime("%Y", time()), strftime("%Y", date(9634894360))); 


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
  <title>Edit Profile</title>

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
  
     
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />   
  
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

<body class="hold-transition layout-top-nav " >
<script>
function confirmation(){
    var result = confirm("Are you sure to Edit?");
    return result;
}
</script>


<div class="wrapper">

  <!-- Navbar -->
  <div class="sticky-top"> <?php include "template/navbar.php"; ?></div>
  <!-- /.navbar -->

    <div class="content">
      <div class="container">
       <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container mt-5">
     
<div class="row">

<div class="col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body border border-dark">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h1 class="mb-2 text-dark">การตั้งค่าห้องเรียน</h1>
			</div>



      <?php
                 $uid = $_SESSION["User_ID"];
                 $show_user_info = "SELECT * FROM user WHERE User_ID='".$uid."' ";
                 $show_user_info_q = mysqli_query($connect,$show_user_info);
                 $result = mysqli_fetch_array($show_user_info_q);
                 if (mysqli_num_rows($show_user_info_q)!=0) {
                    $u_Name = $result["Firstname"];
                    $u_Sname = $result["Surname"];
                    $u_Email = $result["Email"]; 
                 }else{ 
                    
                 }
                  
      ?>

            
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 m-2">
			<form action="#" method="POST"  onsubmit="return confirmation()"> <!-- ใส่ตรงนี้ -->	
      <div class="form-group" >
					<label class="badge bg-warning"> <h4 class="m-2"> ห้องเรียน <?php echo $Course_Name ?></h4></label>
				</div>

                <div class="form-group">
					<label>Enroll_Code</label>
					<label><h1><?php echo $Enroll_Code; ?></h1></label>
				</div>

                <div class="form-group">
					<label for="Course_name">ชื่อ Course </label>
					<input type="text" class="form-control" id="Course_name" name="Course_name" value="<?php echo $Course_Name; ?>">
				</div>

                <div class="form-group">
					<label for="Semester">ภาคเรียน</label>
					<select class="form-control" id="Semester" name="Semester">
                        <option value="<?php echo $Course_Sem; ?>"><?php echo $Course_Sem; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
				</div>
        

                <div class="form-group">
                <label for="Schoolyear">ปีการศึกษา</label>
                    <select class="form-control" id = "Schoolyear" name="Schoolyear" >
                        <option value="<?php echo $Course_Schoolyear; ?>"><?php echo $Course_Schoolyear; ?></option>
                        <?php foreach($years as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php endforeach; ?>
                    </select>
				</div>

                <div class="form-group">
					<label for="Start_date">วันเปิด Course</label>
					<input type="date" class="form-control" 
                    id="Start_date" 
                    name="Start_date" 
                    value="<?php echo $Start_date; ?>">
 
             
				</div>

                <div class="form-group">
					<label for="End_date">วันปิด Course</label>
					<input type="date" class="form-control" 
                    id="End_date" 
                    name="End_date" 
                    value="<?php echo $End_date; ?>">
				</div>

               

			

			</div>	
		</div>
		<?php include('error.php'); ?>
        <?php if(isset($_SESSION['error'])) :?>
          <div style="color:red">
            <h5>
              <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              ?>
            </h5>
          </div>
        <?php endif ?>
     


		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="text-left">
               
		
					<button  onclick="document.location='../Home.php'" type="button" id="submit" name="submit" class="btn btn-danger w-10">ลบ</button>
					<button type="submit" id="submit" name="submit" class="btn btn-info w-10" data-toggle="modal" data-target="#exampleModal">ปิด Course</button> 
          
    
				</div>



				<div class="text-right">
					<button  onclick="document.location='../Home.php'" type="button" id="submit" name="submit" class="btn btn-dark w-25">ยกเลิก</button>
					<button type="submit" id="submit" name="submit" class="btn btn-warning w-25" data-toggle="modal" data-target="#exampleModal">บันทึก</button> 
          
                    
				</div>
			</div>
      
                                
                      
		</div>
	</div>
</div>
</div>
</div>


       </div>


         </form>
      


      </div>
      


    </div><!-- /.container-fluid -->

      </div><!-- /container-->
    </div> <!-- /content-header-->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
