<?php
<<<<<<< Updated upstream
ob_start();
session_start();   
	$con = mysqli_connect("localhost","root","","grader");
=======
    include ("../connect.php");
>>>>>>> Stashed changes
	$uid = $_SESSION['User_ID'];
	$pwd = $_SESSION['User_Password'];
    $uname = $_POST['first_name'];
    $usname = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

	if($_POST['pass_new']!=NULL){
        if($_POST['pass_new'] == $_POST['pass_chk']){
            $pass = $_POST['pass_new'];
        }else{
            array_push($errors, "New Password is not same with confirm password");
		    $_SESSION['error'] = "New Password is not same with confirm password";
            header("location:../../WebGrader/Edit_User/EditProfile.php");
        }
    }else{
        $pass = $_POST['pass'];
    }
    
    //echo ("'$uname'");
    //echo ("'$usname'");
    //echo ("'$pass'");
    //echo ("'$email'");
	if(count($errors) == 0){
        if($_POST['pass']==$_SESSION['User_Password']){
            $update="update user set User_Name='".$uname."',User_Surname='".$usname."', User_Password='".$pass."',Email='".$email."' where User_ID='".$uid."'";
            mysqli_query($con,$update) or die(mysqli_error()); 
            
            $sql = "SELECT * FROM user WHERE User_ID = '".$uid."'";
            $sqlq2 = mysqli_query($con,$sql);
            $result = mysqli_fetch_array($sqlq2);
            if (mysqli_num_rows($sqlq2)==1) {
                $_SESSION["User_ID"] = $result["User_ID"];
                $_SESSION["User_Password"] = $result["User_Password"];
                $_SESSION["User_Name"] = $result['User_Name'];
                $_SESSION["User_Surname"] = $result['User_Surname'];
                $_SESSION["Email"] = $result['Email'];
                $_SESSION["User_Status"] = $result['User_Status'];
                $_SESSION["Course_ID"] = $result['Course_ID'];
                header("location:../../WebGrader/Edit_User/EditProfile.php");
            }

<<<<<<< Updated upstream
	
    if($_POST['pass']==$_SESSION['User_Password']){
        $update="update user set User_Name='".$uname."',User_Surname='".$usname."', User_Password='".$pass."',Email='".$email."' where User_ID='".$uid."'";
        mysqli_query($con,$update) or die(mysqli_error()); 
        
        $sql = "SELECT * FROM user WHERE User_ID = '".$uid."'";
	    $sqlq2 = mysqli_query($con,$sql);
	    $result = mysqli_fetch_array($sqlq2);
	    if (mysqli_num_rows($sqlq2)==1) {
            $_SESSION["User_ID"] = $result["User_ID"];
            $_SESSION["User_Password"] = $result["User_Password"];
            $_SESSION["User_Name"] = $result['User_Name'];
            $_SESSION["User_Surname"] = $result['User_Surname'];
            $_SESSION["Email"] = $result['Email'];
            $_SESSION["User_Status"] = $result['User_Status'];
            $_SESSION["Course_ID"] = $result['Course_ID'];

        

            header("location:Edit_User.php");
	    }






        
    

    }else{
        header("location:Edit_User.php?=error");
=======
        }else{
            array_push($errors, "Password is Wrong");
            $_SESSION['error'] = "Password is Wrong";
            header("location:../../WebGrader/Edit_User/EditProfile.php");
        }
    }else{
        array_push($errors, "Password is Wrong");
        $_SESSION['error'] = "Password is Wrong";
        header("location:../../WebGrader/Edit_User/EditProfile.php");
>>>>>>> Stashed changes
    }
?>