<?php
include ("connect.php");
$errors = array();

	$uid = $_SESSION['User_ID'];
    $Addclass_ID = $_POST['Addclass_ID'];

	echo $uid;
    echo "<br>".$Addclass_ID."<br>";

    if(empty($Addclass_ID)){
		array_push($errors, "Join code is empty");
		$_SESSION['error'] = "Join code is empty";
        header("location:AddClass.php");
	}

	if(count($errors) == 0){

        $select_course = "SELECT * FROM course WHERE Enroll_Code = '".$Addclass_ID."'";
		$select_course_q = mysqli_query($con,$select_course);
		$select_course_result = mysqli_fetch_array($select_course_q);

		if (mysqli_num_rows($select_course_q)==1) {
            $Class_ID=$select_course_result['Course_ID'];
            $show_course = "SELECT * FROM course_role WHERE User_ID = '".$uid."' and Course_ID = '".$Class_ID."' ";
		    $show_course_q = mysqli_query($con,$show_course);
		    $result = mysqli_fetch_array($show_course_q);
		    if (mysqli_num_rows($show_course_q)>0) {
                array_push($errors, "You are already in this class");
		        $_SESSION['error'] = "You are already in this class";
                header("location:AddClass.php");
            }else{
                //add user with role in user_register_ course
                $add = "INSERT INTO course_role (Course_ID ,User_ID, Role) VALUES ('.$Class_ID.', '.$uid.', 'student')";
		        echo $add;
                mysqli_query($con,$add);
                header("location:Class.php");
            }
		

        }else{
            array_push($errors, "You are already in this class");
            $_SESSION['error'] = "You are already in this class";
            header("location:AddClass.php");
        }

    }else{
            array_push($errors, "Join code is wrong");
		    $_SESSION['error'] = "Join code is wrong";
            header("location:AddClass.php");

        }
        
		
?>