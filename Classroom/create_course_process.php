<?php
include('../config.php');
if(isset($_POST['save']))
{	 
	$uid = $_SESSION['User_ID'];
	$n=6;
	function getName($n) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
	  
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
	  
		return $randomString;
	}
	$createcode = getName($n);
	$owner_ID = $_SESSION['User_ID'];
	$Course_Name = $_POST['Course_Name'];
	$sql = "INSERT INTO course (Course_Name,Course_Code,Owner_ID) VALUES ('$Course_Name','$createcode','$owner_ID')";
	if (mysqli_query($connect, $sql)) {
		 
		echo "New record created successfully !";
		//header("location:../Class.php");
		$show_course = "SELECT * FROM course WHERE Course_Name = '".$Course_Name."'";
		$show_course_q = mysqli_query($connect,$show_course);
		$result = mysqli_fetch_array($show_course_q);
		$Class_ID = $result['Course_ID'];
		$add = "INSERT INTO user_in_course (Course_ID, User_ID, Role) VALUES ('.$Class_ID.', '.$uid.', 'teacher')";
		if (mysqli_query($connect, $add)) {
			echo "New record created successfully !";
			header("location:../Class.php");
		} else {
			echo "Error: " . $sql. mysqli_error($connect);
			array_push($errors, "Something wrong try again later");
			$_SESSION['error'] = "Something wrong try again later";
			header("location:../../Classroom/CreateCourse.php");
		}
	} else {
		echo "Error: " . $sql. mysqli_error($connect);
		array_push($errors, "Something wrong try again later");
		$_SESSION['error'] = "Something wrong try again later";
		header("location:../../Classroom/CreateCourse.php");
	}
	mysqli_close($connect);
}
?>