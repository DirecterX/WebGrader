<?php
include('../connect.php');
if(isset($_SESSION["User_Authority"])):
  if($_SESSION["User_Authority"]=='admin'){
    header("location:../Home_admin.php");
  }
  header("location:../Home.php");
endif

?>

<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title>Login Grader</title>  

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
    <main class="form-signin">
        <form action = "login_process.php" method="POST">
        
        <!-- Image Logo -->
        <img class="mb-2" src="../Pic/Login-Logo.png" alt="" width="100%" height="100%" >
    

        <!-- Login Form Begin -->
        <div class="form-floating" >
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="Username">
        <label for="floatingInput">Username</label>
        </div>
        <br>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Password">
        <label for="floatingPassword">Password</label>
        </div>
        <!-- Login Form End -->

        <!-- Register Text -->
        <div class="h6 mb-3 fw-normal" style="text-align: right;"><a href="">สมัครสมาชิก</a></div>

        <!-- Login Buttom -->
        <button class="w-100 btn btn-lg btn-primary lgn-btn" type="submit" name="login" value="login"><b>เข้าสู่ระบบ</b></button>
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