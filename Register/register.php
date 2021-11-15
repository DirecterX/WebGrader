<?php include('regis_process.php');
?>
<!DOCTYPE html>
<title>Register Grader</title>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
body{
  background-color:#DAD8F1 ;
}
</style>



<body >

<div class="container mt-5" style="padding-top:3%;">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="register.php" id="register_form">
                                <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Username</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Student ID" required/>
                                            </div>
                                            <?php if (isset($name_error)): ?>
                                                    <span style="color:red"><?php echo $name_error; ?></span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password" id="password" required placeholder="Enter your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="confirm" id="confirm" required placeholder="Confirm your Password" />
                                            </div>
                                        </div>
                                        <?php if (isset($confirmpass)): ?>
                                                    <span style="color:red"><?php echo $confirmpass; ?></span>
                                            <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Firstname</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="Firstname" id="Firstname" required placeholder="Enter your Name" />
                                            </div>
                                        </div>
                                        <?php if (isset($fname_error)): ?>
                                                    <span style="color:red"><?php echo $fname_error; ?></span>
                                            <?php endif ?>
                                    </div>
                                     <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Surname</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="Surname" id="Surname" required placeholder="Enter your Name" />
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
                                                <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your Email" /><input type="text" class="form-control" hidden name="Regisid" id="Regisid" value="<?php echo $Regisid;?>" />
                                            </div>
                                        </div>
                                        <?php if (isset($email_error)): ?>
                                                <span style="color:red"><?php echo $email_error; ?></span>
                                        <?php endif ?>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <button type="submit" name="register" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                                    </div>
                                    <div class="login-register">
                                        <a href="../Login/Login.php">Login</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>


</body>
</html>


