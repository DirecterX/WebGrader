<?php
    session_start();
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grader";

    $connect = mysqli_connect($hostname,$username,$password);
    $select_db = mysqli_select_db($connect,$dbname);
    $setthai = mysqli_set_charset($connect,"utf8");

    if(!$connect){
        echo"can't connect to db";
    }
?>