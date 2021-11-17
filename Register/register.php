<?php include('regis_process.php');
?>
<!DOCTYPE html>
<title>Register Grader</title>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
body{
  background-color:#DAD8F1 ;
  font-family: 'Kanit', sans-serif;
}
</style>



<body >

<div class="container mt-5 " style="padding-top:3%;">
<div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-header text-center" style="background-color: #BD92B2;color:#ffffff;"><h4 class="pt-2">{ สมัครสมาชิก }</h4></div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="register.php" id="register_form">
                                <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">ชื่อผู้ใช้งาน</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="กรอกชื่อผู้ใช้งาน" required/>
                                            </div>
                                            <?php if (isset($name_error)): ?>
                                                    <span style="color:red"><?php echo $name_error; ?></span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">รหัสผ่าน</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password" id="password" required placeholder="กรอกรหัสผ่าน" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">ยืนยันรหัสผ่าน</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="confirm" id="confirm" required placeholder="ยืนยันรหัสผ่าน" />
                                            </div>
                                        </div>
                                        <?php if (isset($confirmpass)): ?>
                                                    <span style="color:red"><?php echo $confirmpass; ?></span>
                                            <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">ชื่อ</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="Firstname" id="Firstname" required placeholder="ชื่อ" />
                                            </div>
                                        </div>
                                        <?php if (isset($fname_error)): ?>
                                                    <span style="color:red"><?php echo $fname_error; ?></span>
                                            <?php endif ?>
                                    </div>
                                     <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">นามสกุล</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="Surname" id="Surname" required placeholder="นามสกุล" />
                                            </div>
                                        </div>
                                        <?php if (isset($sname_error)): ?>
                                                    <span style="color:red"><?php echo $sname_error; ?></span>
                                            <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">E-mail</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="email" id="email" required placeholder="กรอกอีเมล" /><input type="text" class="form-control" hidden name="Regisid" id="Regisid" value="<?php echo $Regisid;?>" />
                                            </div>
                                        </div>
                                        <?php if (isset($email_error)): ?>
                                                <span style="color:red"><?php echo $email_error; ?></span>
                                        <?php endif ?>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <button type="submit" name="register" class="btn btn-lg btn-block login-button text-light w-50 mx-auto" style="background-color:#30214B;border-radius: 5px;">ลงทะเบียน</button>
                                    </div>
                                    <div class="login-register" style="text-align: center;">
                                        <label>เป็นสมาชิกแล้ว? </label><a href="../Login/Login.php" style="color:#FD4D82;"> เข้าสู่ระบบ</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>



</body>
</html>


