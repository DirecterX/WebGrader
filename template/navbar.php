<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Top navbar</title>
     
    <style>
        
        li.nav-item:hover {
          color: #3D367B;
           border-radius: 5px 15px 5px 5px ;
           background:#F4F4F4;
           transition: 0.5s;
           box-shadow: -5px 5px #3D367B;
       }

   </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    
    
    <!--  link google font kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

   

    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  </head>


  <body class="hold-transition layout-top-nav" st>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md font-weight-bold " style="background-color: #D5E3FE;">
    <div class="container">
      

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       
      <!-- Left navbar links -->
        <ul class="navbar-nav " >
          <li class="nav-item " >
            <a href="/WebGrader/Home.php" class="nav-link" style="color: #3D367B;">H O M E</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="/WebGrader/Class.php" class="nav-link "style="color: #3D367B;">C O U R S E</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="/WebGrader/Assignment.php" class="nav-link "style="color: #3D367B;">A S S I G N M E N T</a> <!-- Add link here -->
          </li>
          
        </ul>
    
      </div>



      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto" >
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown" >
          <a class="nav-link" data-toggle="dropdown" href="#" style="color: #3D367B;">
          <i class="fas fa-plus"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">     
            <div class="dropdown-divider"></div>
            <a href="/WebGrader/AddClass.php" class="dropdown-item" style="color: #3D367B;"> <!-- Add link here -->
              <i class="fas fa-plus-square mr-2"></i> Join Class             
            </a>
            <div class="dropdown-divider"></div>
            <a href="/WebGrader/Classroom/CreateCourse.php" class="dropdown-item" style="color: #3D367B;"> <!-- Add link here -->
              <i class="fas fa-plus-square mr-2"></i> Add new course             
            </a>
          </div>
        </li>
        
    
<!--  User Menu -->   
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color: #3D367B;"><?php echo $_SESSION["Username"]; ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/WebGrader/Class.php" class="dropdown-item"><i class="fas fa-home" style="color: #3D367B;"></i> My Class </a></li>
              <li><a href="/WebGrader/Edit_User/EditProfile.php" class="dropdown-item" style="color: #3D367B;"><i class="fas fa-cog"></i> Setting</a></li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item">
                <a href="/WebGrader/Login/logout_process.php" class="dropdown-item" style="color: #3D367B;" ><i class="fas fa-sign-out-alt"></i> Logout</a>
              </li>         
            </ul>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  

 


  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
