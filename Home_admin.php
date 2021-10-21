<?php
    include('connect.php');
    if(!isset($_SESSION['User_Username'])):
     header("location:../../WebGrader/Login/Login.php");
    endif
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
  <title>Blank Page</title>

  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
            <h1 class="m-0"> Header Content</h1>
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
            <style type="text/css">
              .tg  {border-collapse:collapse;border-spacing:0;}
              .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                overflow:hidden;padding:10px 5px;word-break:normal;}
              .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
              .tg .tg-0lax{text-align:left;vertical-align:top}
              </style>
              
              
              <table class="tg">
              <thead>
                <tr>
                  <th class="tg-0lax">No.</th>
                  <th class="tg-0lax">User Name</th>
                  <th class="tg-0lax">Name</th>
                  <th class="tg-0lax">Surname</th>
                  <th class="tg-0lax">Email</th>
                  <th class="tg-0lax">Status</th>
                  <th class="tg-0lax">Edit</th>
                  <th class="tg-0lax">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $show_users = "SELECT * FROM user ";
                $show_users_q = mysqli_query($con,$show_users);
                $i=0;
                while($row = mysqli_fetch_array($show_users_q)){
                  $i++;
                ?>
                <tr>
                <td class="tg-0lax"><?php echo $i?></td>
                  <td class="tg-0lax"><?php echo $row['User_Username'] ?></td>
                  <td class="tg-0lax"><?php echo $row['User_Name'] ?></td>
                  <td class="tg-0lax"><?php echo $row['User_Surname'] ?></td>
                  <td class="tg-0lax"><?php echo $row['Email'] ?></td>
                  <td class="tg-0lax"><?php echo $row["User_Authority"] ?></td>
                  <td class="tg-0lax">Edit</td>
                  <th class="tg-0lax">Delete</th>
                    
                  </td>
                </tr>
                <?php }?> 
              </tbody>
              </table>
              
                
























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
