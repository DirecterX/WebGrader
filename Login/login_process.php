<?php
include ("../config.php");
$errors = array();
	if (isset($_POST['login'])){
		$uname = $_POST['Username'];
		$pwd = $_POST['Password'];
	}

	if(empty($uname) || empty($pwd)){
		array_push($errors, "Username or Password is empty");
		$_SESSION['error'] = "Username or Password is empty";
	}
	if(count($errors) == 0){

		$sql = "SELECT * FROM user WHERE Username = '".$uname."' and Password = '".$pwd."'";
		$sqlq2 = mysqli_query($connect,$sql);
		$result = mysqli_fetch_array($sqlq2);
		if (mysqli_num_rows($sqlq2)==1) {
			echo $result["User_ID"];
			$_SESSION["User_ID"] = $result["User_ID"];
			$_SESSION["Username"] = $result["Username"];
			$_SESSION["Is_admin"] = $result["Is_admin"];

			if($_SESSION["Is_admin"]){
				header("location:../Home_admin.php");
			}else{
				header("location:../Home.php");
			}

			
		}else{
			array_push($errors, "Username or Password is wrong");
			$_SESSION['error'] = "Username or Password is wrong";
			header("location:Login.php");

		}
	}else{
		array_push($errors, "Username or Password is empty");
		$_SESSION['error'] = "Username or Password is empty";
		header("location:Login.php");
	}
?>