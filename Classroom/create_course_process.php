<?php
include('../config.php');
if(isset($_POST['save']))
{	 
	$errors = [];
	$uid = $_SESSION['User_ID'];
	$Course_Name = $_POST['Course_Name'];
	$Semester = $_POST['Semester'];
	$Schoolyear = $_POST['Schoolyear'];
	$start_date = date("Y-m-d",strtotime($_POST['start_date']));
	$end_date = date("Y-m-d",strtotime($_POST['end_date']));

	echo $Course_Name.'<br>';
	echo $Semester.'<br>';
	echo $Schoolyear.'<br>';

	function getName($n) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
		return $randomString;
	}

	if($Course_Name == NULL){
		array_push($errors, "Course name can not be null");
		$_SESSION['error'] = "Course name can not be null";
		header("location:/WebGrader/Classroom/CreateCourse.php");
	}elseif($Schoolyear == 0){
		array_push($errors, "Schoolyear can not be null");
		$_SESSION['error'] = "Schoolyear can not be null";
		header("location:/WebGrader/Classroom/CreateCourse.php");
	}elseif($start_date == "1970-01-01"){
		array_push($errors, "Course start date can not be null");
		$_SESSION['error'] = "Course start date can not be null";
		header("location:/WebGrader/Classroom/CreateCourse.php");
	}elseif($end_date == "1970-01-01"){
		array_push($errors, "Course end date can not be null");
		$_SESSION['error'] = "Course end date can not be null";
		header("location:/WebGrader/Classroom/CreateCourse.php");
	}elseif($end_date<$start_date){
		array_push($errors, "Course end date can not date before start date");
		$_SESSION['error'] = "Course end date can not date before start datenull";
		header("location:/WebGrader/Classroom/CreateCourse.php");
	}else{
		$n=6;

		


		$createcode = getName($n);
		$sql = "INSERT INTO course (Name,Enroll_Code,Start_date,End_date,Schoolyear,Semester) 
		VALUES ('$Course_Name','$createcode','$start_date','$end_date','$Schoolyear','$Semester')";

		if (mysqli_query($connect, $sql)) {
			//echo $Course_Name.'<br>';
			//echo $Semester.'<br>';
			//echo $Schoolyear.'<br>';
			//echo $start_date.'<br>';
			//echo $end_date.'<br>';
				
				echo "New course created successfully ! <br><br><br>";

				$show_course = "SELECT * FROM course WHERE Name = '".$Course_Name."'";
				$show_course_q = mysqli_query($connect,$show_course);
				$result = mysqli_fetch_array($show_course_q);
				$Class_ID = $result['Course_ID'];
				$add = "INSERT INTO course_role (Course_ID, User_ID, Role) VALUES ('.$Class_ID.', '.$uid.', 'Owner')";
				if (mysqli_query($connect, $add)) {
					echo "New course role created successfully ! <br><br><br>";
					//header("location:/WebGrader/Class.php");
				} else {
					echo "Error: " . $sql. mysqli_error($connect);
					array_push($errors, "Something wrong try again later");
					$_SESSION['error'] = "Something wrong try again later";
					//header("location:/WebGrader/Classroom/CreateCourse.php");
				}
			} else {
				echo "Error: " . $sql. mysqli_error($connect);
				array_push($errors, "Something wrong try again later");
				$_SESSION['error'] = "Something wrong try again later";
				//header("location:/WebGrader/Classroom/CreateCourse.php");




			
			
			}

		
			mysqli_close($connect);
			header("location:/WebGrader/Classroom/CreateCourse.php");
	}

	
}
?>