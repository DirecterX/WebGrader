<?php
    include('config.php');
    if(($_SESSION['Username'])==NULL):
      header("location:/WebGrader/Login/Login.php");
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
  <title>WebGrader ADMIN</title>
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
<body class="hold-transition layout-top-nav">
  <script>
function confirmation(){
    var result = confirm("Are you sure to Edit?");
    return result;
}
</script>

<div class="wrapper">

  <!-- Navbar -->
  <?php include "template/navbaradmin.php"; ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0"> แก้ไขข้อมูล User</h1>
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
              
              
              <table class="tg" align="center">
              <thead>
                <tr>
                  <th class="tg-0lax">No.</th>
                  <th class="tg-0lax">User Name</th>
                  <th class="tg-0lax">Name</th>
                  <th class="tg-0lax">Surname</th>
                  <th class="tg-0lax">Email</th>          
                  <th class="tg-0lax">Is_admin</th>
                  <th class="tg-0lax">แก้ไข</th>
                  <th class="tg-0lax">ลบข้อมูล</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $show_users = "SELECT Username , Firstname ,Surname ,User_ID ,Email, Is_admin 
                FROM user
                ORDER BY Is_admin DESC, User.User_ID ASC";
                $show_users_q = mysqli_query($connect,$show_users);
                $i=0;
                while($row = mysqli_fetch_array($show_users_q)){
                  $i++;
                ?>
                <tr>
                <td class="tg-0lax"><?php echo $i?></td>
                  <td class="tg-0lax"><?php echo $row['Username'] ?></td>
                  <td class="tg-0lax"><?php echo $row['Firstname'] ?></td>
                  <td class="tg-0lax"><?php echo $row['Surname'] ?></td>
                  <td class="tg-0lax"><?php echo $row['Email'] ?></td>
                  <td class="tg-0lax"><?php 
                  if($row['Is_admin']== 1 ){
                    echo "ผู้ดูแลระบบ";
                  }else{
                    echo "ผู้ใช้ทั่วไป";
                  }?></td>
                  
                  <td class="tg-0lax">Edit</td>
                  <th class="tg-0lax">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 m-2">
      <form action="course_info_process.php?Course_ID=<?=$Course_ID?>" method="POST"  onsubmit="return confirmation()"> <!-- ใส่ตรงนี้ -->  
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
           
            <!-- ทำ confirm delete --!>
          <!-- popupมั่นใจไหมว่าจะลบ --><button  type="button" name="del_course" class="btn btn-danger w-10" data-toggle="modal" data-target="#del_course">ลบ</button>
          
                    
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

      </div>
                  </th>
                    
                  </td>
                </tr>
                <?php }?> 
              </tbody>
              </table>
              
              <!-- moal del course -->
            <div class="modal fade" id="del_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">แจ้งเตือนการลบผู้ใช้ออกจากระบบ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <h5>คุณแน่ใจจะลบ User คนนี้ออกจากระบบ</h5>
                <h7>ข้อมูลของ User คนนี้จะหายไปหมดจากระบบ เช่น ห้องเรียน, งานที่ส่ง, คะแนน</h7>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="document.location='del_course_process.php?Course_ID=<?=$Course_ID?>'" type="button" class="btn btn-danger">ลบ</button>
                </div>
              </div>
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


</body>
</html>
