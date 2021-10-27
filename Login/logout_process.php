<?php
	session_start();
	session_destroy();
	unset($_SESSION);
	unset($_POST);
	unset($_REQUEST);
	header("location:/WebGrader/Login/Login.php")
?>