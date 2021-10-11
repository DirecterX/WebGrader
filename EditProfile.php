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
				<h1 class="mb-2 text-dark">การตั้งค่า</h1>
			</div>

            
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 m-2">
				<div class="form-group">
					<label class="badge bg-warning"> <h4 class="m-2">รหัสนักศึกษา <?php echo "630xxxxx" ?></h4></label>
				</div>

                <div class="form-group">
					<label for="fullName">ชื่อ</label>
					<input type="text" class="form-control" id="fullName" placeholder="<?php echo "ชื่อ" ?> ">
				</div>

        <div class="form-group">
					<label for="fullName">นามสกุล</label>
					<input type="text" class="form-control" id="lastName" placeholder="<?php echo "นามสกุล" ?> ">
				</div>
        

                <div class="form-group">
					<label for="eMail">อีเมล</label>
					<input type="email" class="form-control" id="eMail" placeholder="<?php echo "Name Student@kmitl.ac.th" ?>">
				</div>

        <div class="form-group">
					<label for="changepassword">รหัสผ่านผู้ใช้งาน</label>
<<<<<<< HEAD

					<input type="password" class="form-control mb-3" id="password1" placeholder="กรอกรหัสผ่านเดิม"">
          <input type="password" class="form-control mb-3" id="password2" placeholder="รหัสผ่านใหม่">
          <input type="password" class="form-control " id="password2" placeholder="ยืนยันรหัสผ่านใหม่">
        </div>

=======
					<input type="password" class="form-control mb-3" id="eMail" placeholder="กรอกรหัสผ่านเดิม">
                    <input type="password" class="form-control" id="eMail" placeholder="รหัสผ่านใหม่">
				</div>
>>>>>>> fa52d80e3b3fcaca38673957547d52df8a1e6abf

			</div>	
		</div>
		
     


		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button  onclick="document.location='Home.php'" type="button" id="submit" name="submit" class="btn btn-dark w-25">ยกเลิก</button>
					<button type="button" id="submit" name="submit" class="btn btn-warning w-25" data-toggle="modal" data-target="#exampleModal" >บันทึก</button>
                         
                    <!-- Modal save -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Notification">การแจ้งเตือน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center fs-6 m-3" >
                                <h1>บันทึกข้อมูลเสร็จสิ้น</h1>
                            </div>
                                <div class="modal-footer">
                                    <button  onclick="document.location='Home.php'"type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                        </div>


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
