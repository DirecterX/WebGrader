<?php
<<<<<<< Updated upstream
ob_start();
session_start();   
	$con = mysqli_connect("localhost","root","","grader");
	$uid = $_POST['User_ID'];
	$pwd = $_POST['User_Pass'];
	$sql = "SELECT * FROM user WHERE User_Username = '".$uid."' and User_Password = '".$pwd."'";
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

        header("location:../Home.php");
	}else{
		header("location:Login.php");
        session_destroy();
=======
include ("../connect.php");
$errors = array();
	if (isset($_POST['login'])){
		$uid = $_POST['User_ID'];
		$pwd = $_POST['User_Pass'];
	}

	if(empty($uid) || empty($pwd)){
		array_push($errors, "Username or Password is empty");
		$_SESSION['error'] = "Username or Password is empty";
	}



	if(count($errors) == 0){
		$sql = "SELECT * FROM user WHERE User_Username = '".$uid."' and User_Password = '".$pwd."'";
		$sqlq2 = mysqli_query($con,$sql);
		$result = mysqli_fetch_array($sqlq2);
		if (mysqli_num_rows($sqlq2)==1) {
			$_SESSION["User_ID"] = $result["User_ID"];
			$_SESSION["User_Password"] = $result["User_Password"];
			$_SESSION["User_Username"] = $result["User_Username"];
			$_SESSION["User_Name"] = $result['User_Name'];
			$_SESSION["User_Surname"] = $result['User_Surname'];
			$_SESSION["Email"] = $result['Email'];
			$_SESSION["User_Status"] = $result['User_Status'];
			$_SESSION["Course_ID"] = $result['Course_ID'];
			$_SESSION['success'] = "You are now login";
			header("location:../Home.php");
		}else{
			array_push($errors, "Username or Password is wrong");
			$_SESSION['error'] = "Username or Password is wrong";
			header("location:Login.php");

		}
	}else{
		array_push($errors, "Username or Password is empty");
		$_SESSION['error'] = "Username or Password is empty";
		header("location:Login.php");
>>>>>>> Stashed changes
	}

	
	






	
?>