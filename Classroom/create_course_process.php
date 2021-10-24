<?php
include('../config.php');
if(isset($_POST['save']))
{	 
	$uid = $_SESSION['User_ID'];
	$date = explode("-",$_POST['daterange']);
	$Course_Name = $_POST['Course_Name'];
	$Semester = $_POST['Semester'];
	$Schoolyear = $_POST['Schoolyear'];
	$start_date = date("Y-m-d",strtotime($date[0]));
	$end_date = date("Y-m-d",strtotime($date[1]));

	//echo $Course_Name.'<br>';
	//echo $Semester.'<br>';
	//echo $Schoolyear.'<br>';
	//echo $date[0].'<br>';
	//echo $date[1].'<br>';
	

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
	$sql = "INSERT INTO course (Name,Enroll_Code,Start_date,End_date,Schoolyear,Semester) 
	VALUES ('$Course_Name','$createcode','$start_date','$end_date','$Schoolyear','$Semester')";

	if (mysqli_query($connect, $sql)) {
		echo $Course_Name.'<br>';
		echo $Semester.'<br>';
		echo $Schoolyear.'<br>';
		echo $start_date.'<br>';
		echo $end_date.'<br>';
			
			echo "New record created successfully ! <br><br><br>";
			//header("location:../Class.php");
			$show_course = "SELECT * FROM course WHERE Name = '".$Course_Name."'";
			$show_course_q = mysqli_query($connect,$show_course);
			$result = mysqli_fetch_array($show_course_q);
			$Class_ID = $result['Course_ID'];
			$add = "INSERT INTO course_role (Course_ID, User_ID, Role) VALUES ('.$Class_ID.', '.$uid.', 'Owner')";
			if (mysqli_query($connect, $add)) {
				echo "New record created successfully ! <br><br><br>";
				//header("location:../Class.php");
			} else {
				echo "Error: " . $sql. mysqli_error($connect);
				array_push($errors, "Something wrong try again later");
				$_SESSION['error'] = "Something wrong try again later";
				//header("location:../../Classroom/CreateCourse.php");
			}
		} else {
			echo "Error: " . $sql. mysqli_error($connect);
			array_push($errors, "Something wrong try again later");
			$_SESSION['error'] = "Something wrong try again later";
			//header("location:../../Classroom/CreateCourse.php");




		
		
		}
	mysqli_close($connect);

	}
	?>