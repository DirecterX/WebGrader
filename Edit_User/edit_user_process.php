<?php
    include ("../config.php");
	$uid = $_SESSION['User_ID'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $errors = [];


    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname)){
        array_push($errors, "Your name can not contain special characters");
		$_SESSION['error'] = "Your name can not contain special characters";
        header("location:../../WebGrader/Edit_User/EditProfile.php");
    }

    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $sname)){
        array_push($errors, "Your Surname can not contain special characters");
		$_SESSION['error'] = "Your Surname can not contain special characters";
        header("location:../../WebGrader/Edit_User/EditProfile.php");
    }


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

        $show_user_info = "SELECT Password FROM user WHERE User_ID='".$uid."' ";
        $show_user_info_q = mysqli_query($connect,$show_user_info);
        $result = mysqli_fetch_array($show_user_info_q);
        if (mysqli_num_rows($show_user_info_q)!=0) {
            $pwd = $result["Password"];
        }else{      
        }

        if($_POST['pass']==$pwd){
            $update="update user set Firstname ='".$fname."', Surname='".$sname."', Password='".$pass."',Email='".$email."' where User_ID='".$uid."'";
            mysqli_query($connect,$update) or die(mysqli_error()); 
            
            $sql = "SELECT * FROM user WHERE User_ID = '".$uid."'";
            $sqlq2 = mysqli_query($connect,$sql);
            $result = mysqli_fetch_array($sqlq2);
            if (mysqli_num_rows($sqlq2)==1) {
                $_SESSION["User_ID"] = $result["User_ID"];
                $_SESSION["Username"] = $result["Username"];
                $_SESSION["Is_admin"] = $result["Is_admin"];
                header("location:../../WebGrader/Edit_User/EditProfile.php");
            }

        }else{
            array_push($errors, "Password is Wrong");
            $_SESSION['error'] = "Password is Wrong";
            header("location:../../WebGrader/Edit_User/EditProfile.php");
        }
    }
?>