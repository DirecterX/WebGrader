<<<<<<< HEAD
<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif
?>
=======
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blank Page</title>

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

<body class="hold-transition layout-top-nav " >
<div class="wrapper">

  <!-- Navbar -->
  <div class="sticky-top"> <?php include "template/navbar.php"; ?></div>
  <!-- /.navbar -->

    <div class="content">
      <div class="container">
       <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="container">
        
        <!--start card-->

        <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
          <div class="col mt-2" >
    
            <h1 class="m-0 fw-bolder">ห้องเรียนของฉัน<i class="fa fa-book ml-2"></i></i></h1>

          </div><!-- /.col -->         
        </div><!-- /.row -->
         
        <div class="row m-2">
<<<<<<< HEAD
        <?php
                $uid = $_SESSION["User_ID"];
                $course_status = 'Wait to open';
                $show_class = "SELECT * FROM course_role WHERE User_ID = '".$uid."' ORDER BY Role DESC";
                $show_class_q = mysqli_query($connect,$show_class);
                while($row = mysqli_fetch_array($show_class_q)){
                    $Course_ID = $row["Course_ID"];

                    $show_course = 
                    "SELECT * 
                    FROM course 
                    WHERE Course_ID = '".$Course_ID."'";
                    $show_course_q = mysqli_query($connect,$show_course);
                    $show_course_result = mysqli_fetch_array($show_course_q);
                    $Course_Name = $show_course_result['Name'];
                    $Course_Schoolyear = $show_course_result['Schoolyear'];
                    $Course_Sem = $show_course_result['Semester'];

                    $show_owner = 
                    "SELECT user.Firstname , user.Surname
                    FROM course_role
                    INNER JOIN user ON user.User_ID = course_role.User_ID
                    WHERE Course_ID = '".$Course_ID."' AND Role = 'Owner'";  
                    $show_owner_q = mysqli_query($connect,$show_owner);
                    $show_owner_result = mysqli_fetch_array($show_owner_q);
                    if (mysqli_num_rows($show_owner_q)>0) {
                        $course_owener_show = $show_owner_result['Firstname']." ".$show_owner_result['Surname'];
                    }

                    echo '<div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">';
                    $Course_Start_date = $show_course_result['Start_date'];
                    $Course_End_date = $show_course_result['End_date'];
                    $toDay = date('Y-m-d');
                    $toDay; 
                    if($Course_Start_date <= $toDay and $Course_End_date >= $toDay){
                        $course_status = 'Open';
                        echo '<div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FF8540;">';
                    }elseif($Course_End_date <= $toDay ){
                        $course_status = "Close";
                        echo '<div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #A3A3A3;">';
                    }else{
                        //wait to open
                        echo '<div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FF8B73;">';
                    }
      
            ?>
            
                <?php echo '<a href="Course.php?Course_ID='.$Course_ID.'" class ="cardlink">'; ?><!-- Link Here -->
=======

            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
                <div class="card-body">
                
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-user fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:left;">
<<<<<<< HEAD
                            <h4><?php echo $Course_Name ?></h4>  <!-- Class Name -->
=======
                            <h4><?php echo "Python class" ?></h4>  <!-- Class Name -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
<<<<<<< HEAD
                            <h6>ผู้สอน : <?php echo $course_owener_show ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ภาคเรียน/ปีการศึกษา : <?php echo $Course_Sem."/".$Course_Schoolyear ?> </h6>  <!-- Code lang -->
                        
                        </div>
                    </div>


                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ภาษา : Python </h6>  <!-- Code lang -->
                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo $course_status ?> </h6>  <!-- Status class -->
=======
                            <h6>ผู้สอน : <?php echo "Name" ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo "กำลังเรียนอยู่" ?></h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- /.card -->
            <!--***************************************************************************************-->
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card" style="filter: grayscale(100%);border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">
            <div class="card-body ">
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-user fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4><?php echo "Java class" ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo "Name" ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo "เรียนจบแล้ว" ?></h6>  <!-- Status class -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
                        
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
                </a>
            </div>
           
            <!-- /.card -->
            <!--***************************************************************************************-->
            </div> 
            <?php }?>
            <!-- /.col-sm-6 -->







=======
            </div>
            <!-- /.card -->     
            </div>
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2

            <!-- addclass -->
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352;">
            <a href="AddClass.php" id="add_class"> 
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
                            <h4>เพิ่มห้องเรียน</h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    
        
                </div>
            </a>
            </div>
            <!-- /.card -->     
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
