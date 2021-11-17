<?php
include('../config.php');
if(isset($_SESSION["User_Authority"])):
  if($_SESSION["User_Authority"]=='admin'){
    header("location:/WebGrader/Home_admin.php");
  }
  header("location:/WebGrader/Home.php");
endif;
if(isset($_SESSION['Username']) AND isset($_SESSION["User_ID"])):
    header("location:/WebGrader/Home.php");
    endif;

?>

<!doctype html>
<html lang="th">
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title>WebGrader | เข้าสู่ระบบ</title>  

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

   
  </head>
  <body class="text-center b" style="font-family: 'Kanit', sans-serif;background-color: #EEEEEE;">
    
    <main class="form-signin">
        <form action = "/WebGrader/Login/login_process.php" method="POST">
        
        <!-- Image Logo -->
        <img class="mb-2 "  src="../Pic/Login-Logo2.png" alt="" width="100%" height="100%" >
    

        <!-- Login Form Begin -->
        <div class="form-floating" >
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="Username" required>
        <label for="floatingInput">ชื่อผู้ใช้งาน</label>
        </div>
        <br>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Password" required>
        <label for="floatingPassword">รหัสผ่าน</label>
        </div>
        <!-- Login Form End -->

        <!-- Register Text -->
        <div class="h6 mb-3 fw-normal" style="text-align: right;"><a href="../Register/register.php" style="color: #FD4D82;">สมัครสมาชิก</a></div>

        <!-- Login Buttom -->
        <button class="w-100 btn btn-lg  lgn-btn" style="background-color: #252244;color: #D8D7E5;"  type="submit" name="login" value="login"><b>เข้าสู่ระบบ</b></button>
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
        </form>
        
    </main>
  
  </body>
</html>