<?php
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
	}
?>