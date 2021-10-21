<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Top navbar</title>
<<<<<<< HEAD

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <!--  ref for Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    

=======
     
    <style>
        
        li.nav-item:hover {
           border-radius: 10px ;
           background:#FEC352;
           transition: 0.5s;
           box-shadow: -5px 5px #FF8540;
       }

   </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    
    
    <!--  link google font kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

   

    
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<<<<<<< HEAD
=======


>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  </head>
<<<<<<< HEAD
  <body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
=======


  <body class="hold-transition layout-top-nav" st>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md  navbar-light font-weight-bold ">
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
    <div class="container">
      

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
<<<<<<< HEAD
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../../WebGrader/Home.php" class="nav-link">Home</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="../../WebGrader/Class.php" class="nav-link">Class</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Assignment</a> <!-- Add link here -->
=======
       
      <!-- Left navbar links -->
        <ul class="navbar-nav ">
          <li class="nav-item ">
            <a href="Home.php" class="nav-link text-dark">H O M E</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="Class.php" class="nav-link text-dark">C L A S S</a> <!-- Add link here -->
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">A S S I G M E N T</a> <!-- Add link here -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
          </li>
          
        </ul>
    
      </div>

<<<<<<< HEAD
=======


>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-plus-square"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">     
            <div class="dropdown-divider"></div>
<<<<<<< HEAD
            <a href="../../WebGrader/AddClass.php" class="dropdown-item"> <!-- Add link here -->
=======
            <a href="#" class="dropdown-item"> <!-- Add link here -->
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
              <i class="fas fa-plus-square mr-2"></i> Add Class             
            </a>
            <div class="dropdown-divider"></div>
            
          </div>
        </li>
        
    
<<<<<<< HEAD
        <!--  User Menu -->   
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?php echo $_SESSION["Username"] ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="../../WebGrader/Class.php" class="dropdown-item"><i class="fas fa-home"></i> My Class </a></li>
              <li><a href="../../WebGrader/Edit_User/EditProfile.php" class="dropdown-item"><i class="fas fa-cog"></i> Setting</a></li>
              <li><a href="../../WebGrader/Classroom/CreateCourse.php" class="dropdown-item"><i class="fas fa-plus-square mr-2"></i> Add new course</a></li>
     
              

              <li class="dropdown-divider"></li>
              <li class="dropdown-item">
                <a href="../../WebGrader/Login/logout_process.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
=======
<!--  User Menu -->   
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Name User</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item"><i class="fas fa-home"></i> My Class </a></li>
              <li><a href="EditProfile.php" class="dropdown-item"><i class="fas fa-cog"></i> Setting</a></li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item">
                <a href="#" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
>>>>>>> b9aa85ae2263625f012190ed3c744a1a620d29c2
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
