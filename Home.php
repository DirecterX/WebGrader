<<<<<<< HEAD
<?php
    include('config.php');
    if(!isset($_SESSION['Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif;
    if($_SESSION["Is_admin"]){
        header("location:Home_admin.php");
    }

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
<<<<<<< HEAD
      .cardlink{
          color:black;
  
      }
      .cardlink:hover{
          color:#FF8540;
      }
      .cardborder{
        border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FEC352 ;
      }
=======
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


>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
  </style>    

  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<<<<<<< HEAD
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "template/navbar.php";?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0"> Notification <i class="fa fa-bell"></i></h1>
          </div><!-- /.col -->         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
        <!-- **********************************\*Use this for generate with PHP******************************************-->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card cardborder" style="background-color:#FFFFFF;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
=======
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  
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
        <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
          <div class="col mt-3" >
            <h1 class="m-0 fw-bolder">แจ้งเตือน<i class="far fa-bell ml-2"></i></h1>
          </div><!-- /.col -->         
        </div><!-- /.row -->

        <!--start card-->
    
      <div class="row m-2">

      
      <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card" style="background-color:#D3FFA9; border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body" >
                
                    <h5 class="card-title"><b><?php echo "Python Class" ?></b></h5> <!-- Class Name -->

                    <p class="card-text">
                        <div class="row">
<<<<<<< HEAD
                            <div class="col" style="text-align:center;">
                                <i class="fas fa-check fa-6x"></i>  <!-- Icon -->
=======
                            <div class="col" style="text-align:center; font-size:62px;">
                            
                            <i class="fi fi-rr-comment-check"></i> <!-- Icon -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2

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
<<<<<<< HEAD
            <!-- /.card -->
          <!-- **********************************************************************************************************-->  
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
=======
            
        </div> <!--end 1st card -->

       
        <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card bg-light" style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
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

<<<<<<< HEAD
                    <a href="#" class="card-link">- <?php echo "Assingment 2" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
=======
                    <a href="#" class="card-link text-cyan" ">- <?php echo "Assingment 2" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div> <!--end second card-->

          
          <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
            <div class="card bg-light"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
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

<<<<<<< HEAD
                    <a href="#" class="card-link">- <?php echo "Assingment 3" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
=======
                    <a href="#" class="card-link text-cyan">- <?php echo "Assingment 3" ?></a> <!-- Assignment -->
                </div>
            </div>
            <!-- /.card -->     
          </div><!--end third card-->


          <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
          <div class="card bg-light"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
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

<<<<<<< HEAD
                    <a href="#" class="card-link">- <?php echo "Assignment 2" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
=======
                    <a href="#" class="card-link text-cyan">- <?php echo "Assignment 2" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card 4 -->     
          </div>


          <div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">
          <div class="card bg-light"  style=" border:0.5px solid black; border-top-left-radius: 15px;border-top-right-radius: 15px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;" >
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
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

<<<<<<< HEAD
                    <a href="#" class="card-link">- <?php echo "Assingment 1" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card -->     
          </div>
          <!-- /.col-sm-6 -->

        </div>
        <!-- /.row -->


        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0"> My Classroom <i class="fa fa-book"></i></h1>
                    </div><!-- /.col -->         
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <!-- ******************************Use this for generate with PHP*******************************-->
        

        <div class="row m-2">
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
            
            
            <?php echo '<a href="Course.php?Course_ID='.$Course_ID.'" class ="cardlink">'; ?> <!-- Link Here -->
=======
                    <a href="#" class="card-link text-cyan">- <?php echo "Assingment 1" ?></a> <!-- Assingment -->
                </div>
            </div>
            <!-- /.card 5 -->     
          </div>



        </div>

        <div class="row mb-2" style="text-decoration: underline; text-decoration-color: #FF8540;-webkit-text-decoration-color:#FF8540;text-decoration-thickness: 4px;">
          <div class="col mt-2" >
    
            <h1 class="m-0 fw-bolder">ห้องเรียนของฉัน<i class="fa fa-book ml-2"></i></i></h1>

          </div><!-- /.col -->         
        </div><!-- /.row -->
         
        <div class="row m-2">

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
            </div>
        </div>
   
            
        
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

=======
            </div>
            <!-- /.card -->     
            </div>


</div><!-- /.container-fluid -->

      </div><!-- /container-->
    </div> <!-- /content-header-->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
