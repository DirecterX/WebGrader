<!DOCTYPE html>
<?php
    include('../config.php');
     if(!isset($_SESSION['Username'])):
     header("location:/WebGrader/Login/Login.php");
    endif;
    $userid = $_SESSION['User_ID'];
    $checkcourserole = mysqli_query($connect,"SELECT Role FROM course_role WHERE User_ID = '$userid' ");
    //echo $checkcourserole["Role"];
    $result = mysqli_fetch_assoc($checkcourserole);
    $role = $result["Role"];

    $years = range(strftime("%Y", time()), strftime("%Y", date(9634894360))); 
    



?>
<html>
<head>
  
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
  <div class="sticky-top"> <?php include "../template/navbar.php"; ?></div>
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
        <h1 class="mb-2 text-dark">การเพิ่มห้องเรียน</h1>
      </div>


	<form method="POST" action="create_course_process.php">
		Course:<br><input type="text" name="Course_Name">
    <br><br>

    <label for="sem">Semester:</label>
      <select id="sem" name="Semester">
        <option value="1">1</option>
        <option value="2">2</option>
      </select>

    <br><br>
    <label for="Schoolyear">Schoolyear:</label>
    <select id = "Schoolyear" name="Schoolyear">
      <option>Select Year</option>
      <?php foreach($years as $year) : ?>
          <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
    </select>
    <br><br>
     <input type="text" name="daterange" value="<?php echo date();?>" />
        <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('Y-m-d') + ' to ' + end.format('Y-m-d'));
          });
        });
        </script>
    <br><br>

   

    <button type="submit" id="save" name="save" class="btn btn-warning w-25" >เพิ่มห้องเรียน</button> 

	</form>



	<?php include('../error.php'); ?>
        <?php if(isset($_SESSION['error'])) :?>
          <div style="color:red">
            <h3>
              <br>
              <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              ?>
            </h3>
          </div>
        <?php endif ?>
  </body>
</html>