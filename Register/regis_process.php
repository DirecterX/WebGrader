<?php 
include ("../config.php");

 $username = "";

  $email = "";
  
if(isset($_POST['Regisid'])){
   $regisid = $_POST['Regisid'];
    if (isset($_POST['register']) AND $_SESSION['Regis_ID'] == $regisid ) {
     	$username = $_POST['username'];
     	$email = $_POST['email'];
     	$password = $_POST['password'];
       $Firtname = $_POST['Firstname'];
       $Surname = $_POST['Surname'];
       $conpass = $_POST['confirm'];

    

     	$sql_u = "SELECT * FROM user WHERE Username='$username'";
     	$sql_e = "SELECT * FROM user WHERE Email='$email'";
     	$res_u = mysqli_query($connect, $sql_u);
     	$res_e = mysqli_query($connect, $sql_e);

     	if (mysqli_num_rows($res_u) > 0) {
     	  $name_error = "Sorry... username already taken"; 	
       }else if(".$password." != ".$conpass."){
           $confirmpass = "Sorry... Password And Comfirm Password no Match";
     	}else if(mysqli_num_rows($res_e) > 0){
     	  $email_error = "Sorry... email already taken"; 	
     	}else{

              $query = "
              INSERT INTO `user` (`Username`, `Firstname`, `Surname`, `Password`, `Email`) VALUES ('$username','$Firtname' ,'$Surname', '".md5($password)."', '$email')
         	   	  ";
              $results = mysqli_query($connect, $query);
              echo 'สมัครสมาชิกเรียบร้อยแล้ว! จะไปหน้า Login ใน 5 วินาที';
               header('Refresh: 3; URL=/WebGrader/Login/Login.php');
     }
   }
}
   session_destroy();
?>