<?php
    ob_start();
    session_start();
    if($_SESSION==NULL){
        header("location:../WebGrader/Login/Login.php");
    }
?>

<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="edit_user_process.php">
		First name:<br>
		<input type="text" name="first_name" value="<?php echo $_SESSION['User_Name'];?>">
		<br>
		Last name:<br>
		<input type="text" name="last_name" value="<?php echo $_SESSION['User_Surname'];?>">
		<br>
		Password:<br>
		<input type="password" name="pass" >
		<br>
        New Password:<br>
		<input type="password" name="pass_new">
		<br>
        Enter New Password again:<br>
		<input type="password" name="pass_chk">
		<br>
		Email:<br>
		<input type="email" name="email" value="<?php echo $_SESSION['Email'];?>">
		<br><br>
		<input type="submit" name="save" value="submit">
	</form>
  </body>
</html>