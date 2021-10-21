<?php
ob_start();
session_start();
$con = mysqli_connect("localhost","root","","grader");
if($con){}else{echo "not Connect";}
mysqli_query($con,"set names utf8");
?>