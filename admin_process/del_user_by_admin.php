<?php
    include ("../config.php");
	$uid = $_SESSION['User_ID'];
    $userid = $_POST['User_ID'];

    if ($uid == "Admin") {
        $del_course = "DELETE FROM user WHERE User_ID = '$userid'";
        mysqli_query($connect,$del_course) or die(mysqli_error());
            
        $del_course_role="DELETE FROM course_role WHERE User_ID = '$userid'";
        mysqli_query($connect,$del_course_role) or die(mysqli_error());


        $del_course_submit="DELETE FROM submition WHERE User_ID = '$userid'";
        mysqli_query($connect,$del_course_submit) or die(mysqli_error());
        header("location:/WebGrader/Home_admin.php");
      }
    }else{
        echo "คุณไม่ใช่ Admin"
    }

   
?>