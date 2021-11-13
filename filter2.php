<?php
include('config.php');

$assignment_id = $_POST['Assignment_ID'];
$testcase_id = $_POST['Testcase1_ID'];
$user_id = $_POST['User_ID'];

if(isset($_POST['Testcase2_ID'])){
  $testcase2_id = $_POST['Testcase2_ID'];

  if(isset($_POST['Testcase3_ID'])){
    $testcase3_id = $_POST['Testcase3_ID'];

    if(isset($_POST['Testcase4_ID'])){
      $testcase4_id = $_POST['Testcase4_ID'];

      if(isset($_POST['Testcase5_ID'])){
        $testcase5_id = $_POST['Testcase5_ID'];
      }
    }
  }
}

if(isset($_POST['Hiddencase1_ID'])){
  $hiddencase1_id = $_POST['Hiddencase1_ID'];

  if(isset($_POST['Hiddencase2_ID'])){
    $hiddencase2_id = $_POST['Hiddencase2_ID'];

    if(isset($_POST['Hiddencase3_ID'])){
      $hiddencase3_id = $_POST['Hiddencase3_ID'];

      if(isset($_POST['Hiddencase4_ID'])){
        $hiddencase4_id = $_POST['Hiddencase4_ID'];

        if(isset($_POST['Hiddencase5_ID'])){
          $hiddencase5_id = $_POST['Hiddencase5_ID'];
        }
      }
    }
  }
}
    $uploaded_file = $_FILES["Assignment_File"]["name"];
    $filesize = $_FILES["Assignment_File"]["size"];

    ######################################## UPLOAD SECTION #################################################
    if(isset($_POST["submit"])) {
      if($filesize > 10000000){ ######### CHECK FILE SIZE ##############
        header("Location: TurnInCode.php?Assignment_ID=$assignment_id");
      }else{
        $uploaded_file = $_FILES["fileToUpload"]["name"];
      $FileType = strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if($FileType != "py"){
        $uploadOk = 0;
      }else{
        
        $target_dir = "temp_file/";
        $filename_username = "63015161";
        $file = $filename_username.".py";
        $target_file = $target_dir . basename($file);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      }
      if($uploadOk == 0){
        header("Location: test3.php");
      }else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "i can";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      }
      
    }
######################################## TESTCASE SELECT SECTION #################################################
$testcase_sql = "SELECT testcase.Expected_Result , testcase.Input 
                 FROM testcase
                 INNER JOIN assignment
                 ON assignment.Assignment_ID = testcase.Assignment_ID
                 WHERE assignment.Assignment_ID = '$assignment_id'
                 ORDER BY testcase.Number ASC";  
$testcase_query = mysqli_query($connect,$testcase_sql);

if(mysqli_num_rows($testcase_query) >= 1){
    $count = 1;
    $pass = False;

    ############################## GET Attempt count and submit id ################################
    $select_submit_sql = "SELECT Submit_ID , Attempt_count FROM submition WHERE Assignment_ID ='$assignment_id' AND User_ID ='$user_id'";
    $select_submit_query = mysqli_query($connect,$select_submit_sql);
    $select_submit_rows = mysqli_fetch_array($select_submit_query);

    $submit_id = $select_submit_rows['Submit_ID'];
    $attempt_count = $select_submit_rows['Attempt_count'] + 1;

    ######################################## EXECUTE TO GET IGNORE INPUT CLI VALUE #################################################
    $descriptorspec = array(
      0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
      1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
      2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
      );
      $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

      if (is_resource($process)) {
    
          fclose($pipes[0]);
          
          stream_set_timeout($pipes[1],5);
          $testcase_output = stream_get_contents($pipes[1],50000);
          $cli_length = strlen($testcase_output);
          
          fclose($pipes[1]);
          $return_value = proc_close($process);
      }

    while($rows = mysqli_fetch_array($testcase_query)){
      if ($count == 1){
        ######################################## EXEC SECTION #################################################
        $descriptorspec = array(
          0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
          1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
          2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
          );
          $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

          if (is_resource($process)) {
        
              fwrite($pipes[0], "".$rows['Input']."");
              fclose($pipes[0]);
              
              stream_set_timeout($pipes[1],5);
              $testcase1_output = stream_get_contents($pipes[1],50000);
              $testcase1_output = substr($testcase1_output,$cli_length);

              $testcase1_db = $rows['Expected_Result'];      ######## result from db ##########

              $testcase1_result = strcmp($testcase1_output, $testcase1_db);  ######## matching check ###########
              
              if($testcase1_result == 0){  ########### 0 is match  else not match ############
                $pass = True;
                $is_correct1 = 1;
              }else{
                $pass = False;
                $is_correct1 = 0;
              }
              
              fclose($pipes[1]);
              $return_value = proc_close($process);
          } 
          ############################# CHECK IF THERE's OUTPUT OR NOT #################################
          $select_output1 = "SELECT Exec_output_ID FROM exec_output WHERE Testcase_ID ='$testcase_id' AND User_ID ='$user_id'";
          $select_output1_query = mysqli_query($connect,$select_output1);

          ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
          if(mysqli_num_rows($select_output1_query) == 1){  
            $update_output1 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
            $update_output1->bind_param("siiii", $testcase1_output, $attempt_count, $is_correct1, $testcase_id, $user_id);
            $update_output1->execute();
            $update_output1->close();

            #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
          }else if(mysqli_num_rows($select_output1_query) == 0){ 
            $insert_output1 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
            $insert_output1->bind_param("iiisii", $submit_id, $testcase_id, $user_id, $testcase1_output, $attempt_count, $is_correct1);
            $insert_output1->execute();
            $insert_output1->close();
          }
      }
      else if($count == 2){
          ######################################## EXEC SECTION #################################################
        $descriptorspec = array(
          0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
          1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
          2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
          );
          $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

          if (is_resource($process)) {
        
              fwrite($pipes[0], "".$rows['Input']."");
              fclose($pipes[0]);
              
              stream_set_timeout($pipes[1],5);
              $testcase2_output = stream_get_contents($pipes[1],50000);
              $testcase2_output = substr($testcase2_output,$cli_length);

              $testcase2_db = $rows['Expected_Result'];      ######## result from db ##########

              $testcase2_result = strcmp($testcase2_output, $testcase2_db);  ######## matching check ###########

              if($testcase2_result == 0){  ########### 0 is match  else not match ############
                $is_correct2 = 1;
                if($pass == False){
                    $pass = False;
                }else{
                    $pass = True;
                }
              }else{
                $is_correct2 = 0;
                $pass = False;
              }
              
              fclose($pipes[1]);
              $return_value = proc_close($process);
          }
          ############################# CHECK IF THERE's OUTPUT OR NOT #################################
          $select_output2 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase2_id' AND User_ID ='$user_id'";
          $select_output2_query = mysqli_query($connect,$select_output2);

          ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
          if(mysqli_num_rows($select_output2_query) == 1){  
            $update_output2 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
            $update_output2->bind_param("siiii", $testcase2_output, $attempt_count, $is_correct2, $testcase2_id, $user_id);
            $update_output2->execute();
            $update_output2->close();

            #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
          }else if(mysqli_num_rows($select_output2_query) == 0){ 
            $insert_output2 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
            $insert_output2->bind_param("iiisii", $submit_id, $testcase2_id, $user_id, $testcase2_output, $attempt_count, $is_correct2);
            $insert_output2->execute();
            $insert_output2->close();
          }
      }
      else if($count == 3){
        ######################################## EXEC SECTION #################################################
      $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
        );
        $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

        if (is_resource($process)) {
      
            fwrite($pipes[0], "".$rows['Input']."");
            fclose($pipes[0]);
            
            stream_set_timeout($pipes[1],5);
            $testcase3_output = stream_get_contents($pipes[1],50000);
            $testcase3_output = substr($testcase3_output,$cli_length);

            $testcase3_db = $rows['Expected_Result'];      ######## result from db ##########

            $testcase3_result = strcmp($testcase3_output, $testcase3_db);  ######## matching check ###########

            if($testcase3_result == 0){  ########### 0 is match  else not match ############
              $is_correct3 = 1;
                if($pass == False){
                    $pass = False;
                }else{
                    $pass = True;
                }
            }else{
              $is_correct3 = 0;
              $pass = False;
            }
            
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
        ############################# CHECK IF THERE's OUTPUT OR NOT #################################
        $select_output3 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase3_id' AND User_ID ='$user_id'";
        $select_output3_query = mysqli_query($connect,$select_output3);

        ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
        if(mysqli_num_rows($select_output3_query) == 1){  
          $update_output3 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
          $update_output3->bind_param("siiii", $testcase3_output, $attempt_count, $is_correct3, $testcase3_id, $user_id);
          $update_output3->execute();
          $update_output3->close();

          #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
        }else if(mysqli_num_rows($select_output3_query) == 0){ 
          $insert_output3 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
          $insert_output3->bind_param("iiisii", $submit_id, $testcase3_id, $user_id, $testcase3_output, $attempt_count, $is_correct3);
          $insert_output3->execute();
          $insert_output3->close();
        }
    }
    else if($count == 4){
      ######################################## EXEC SECTION #################################################
    $descriptorspec = array(
      0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
      1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
      2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
      );
      $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

      if (is_resource($process)) {
    
          fwrite($pipes[0], "".$rows['Input']."");
          fclose($pipes[0]);
          
          stream_set_timeout($pipes[1],5);
          $testcase4_output = stream_get_contents($pipes[1],50000);
          $testcase4_output = substr($testcase4_output,$cli_length);

          $testcase4_db = $rows['Expected_Result'];      ######## result from db ##########

          $testcase4_result = strcmp($testcase4_output, $testcase4_db);  ######## matching check ###########

          if($testcase4_result == 0){  ########### 0 is match  else not match ############
            $is_correct4 = 1;
            if($pass == False){
                $pass = False;
            }else{
                $pass = True;
            }
          }else{
            $is_correct4 = 0;
            $pass = False;
          }
          
          fclose($pipes[1]);
          $return_value = proc_close($process);
      }
      ############################# CHECK IF THERE's OUTPUT OR NOT #################################
      $select_output4 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase4_id' AND User_ID ='$user_id'";
      $select_output4_query = mysqli_query($connect,$select_output4);

      ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
      if(mysqli_num_rows($select_output4_query) == 1){  
        $update_output4 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
        $update_output4->bind_param("siiii", $testcase4_output, $attempt_count, $is_correct4, $testcase4_id, $user_id);
        $update_output4->execute();
        $update_output4->close();

        #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
      }else if(mysqli_num_rows($select_output4_query) == 0){ 
        $insert_output4 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
        $insert_output4->bind_param("iiisii", $submit_id, $testcase4_id, $user_id, $testcase4_output, $attempt_count, $is_correct4);
        $insert_output4->execute();
        $insert_output4->close();
      }
  }
  else if($count == 5){
    ######################################## EXEC SECTION #################################################
  $descriptorspec = array(
    0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
    1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
    2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
    );
    $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

    if (is_resource($process)) {
  
        fwrite($pipes[0], "".$rows['Input']."");
        fclose($pipes[0]);
        
        stream_set_timeout($pipes[1],5);
        $testcase5_output = stream_get_contents($pipes[1],50000);
        $testcase5_output = substr($testcase5_output,$cli_length);

        $testcase5_db = $rows['Expected_Result'];      ######## result from db ##########

        $testcase5_result = strcmp($testcase5_output, $testcase5_db);  ######## matching check ###########

        if($testcase5_result == 0){  ########### 0 is match  else not match ############
          $is_correct5 = 1;
            if($pass == False){
                $pass = False;
            }else{
                $pass = True;
            }
        }else{
          $is_correct5 = 0;
          $pass = False;
        }
        
        fclose($pipes[1]);
        $return_value = proc_close($process);
    }
    ############################# CHECK IF THERE's OUTPUT OR NOT #################################
    $select_output5 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase5_id' AND User_ID ='$user_id'";
    $select_output5_query = mysqli_query($connect,$select_output5);

    ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
    if(mysqli_num_rows($select_output5_query) == 1){  
      $update_output5 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
      $update_output5->bind_param("siiii", $testcase5_output, $attempt_count, $is_correct5, $testcase5_id, $user_id);
      $update_output5->execute();
      $update_output5->close();

      #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
    }else if(mysqli_num_rows($select_output5_query) == 0){ 
      $insert_output5 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
      $insert_output5->bind_param("iiisii", $submit_id, $testcase5_id, $user_id, $testcase5_output, $attempt_count, $is_correct5);
      $insert_output5->execute();
      $insert_output5->close();
    }
}
else if($count == 6){
  ######################################## EXEC SECTION #################################################
$descriptorspec = array(
  0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
  1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
  );
  $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

  if (is_resource($process)) {

      fwrite($pipes[0], "".$rows['Input']."");
      fclose($pipes[0]);
      
      stream_set_timeout($pipes[1],5);
      $testcase6_output = stream_get_contents($pipes[1],50000);
      $testcase6_output = substr($testcase6_output,$cli_length);

      $testcase6_db = $rows['Expected_Result'];      ######## result from db ##########

      $testcase6_result = strcmp($testcase6_output, $testcase6_db);  ######## matching check ###########

      if($testcase6_result == 0){  ########### 0 is match  else not match ############
        $is_correct6 = 1;
          if($pass == False){
              $pass = False;
          }else{
              $pass = True;
          }
      }else{
        $is_correct6 = 0;
        $pass = False;
      }
      
      fclose($pipes[1]);
      $return_value = proc_close($process);
  }
  ############################# CHECK IF THERE's OUTPUT OR NOT #################################
  $select_output6 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase6_id' AND User_ID ='$user_id'";
  $select_output6_query = mysqli_query($connect,$select_output6);

  ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
  if(mysqli_num_rows($select_output6_query) == 1){  
    $update_output6 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
    $update_output6->bind_param("siiii", $testcase6_output, $attempt_count, $is_correct6, $testcase6_id, $user_id);
    $update_output6->execute();
    $update_output6->close();

    #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
  }else if(mysqli_num_rows($select_output6_query) == 0){ 
    $insert_output6 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
    $insert_output6->bind_param("iiisii", $submit_id, $testcase6_id, $user_id, $testcase6_output, $attempt_count, $is_correct6);
    $insert_output6->execute();
    $insert_output6->close();
  }
}
else if($count == 7){
  ######################################## EXEC SECTION #################################################
$descriptorspec = array(
  0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
  1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
  );
  $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

  if (is_resource($process)) {

      fwrite($pipes[0], "".$rows['Input']."");
      fclose($pipes[0]);
      
      stream_set_timeout($pipes[1],5);
      $testcase7_output = stream_get_contents($pipes[1],50000);
      $testcase7_output = substr($testcase7_output,$cli_length);

      $testcase7_db = $rows['Expected_Result'];      ######## result from db ##########

      $testcase7_result = strcmp($testcase7_output, $testcase7_db);  ######## matching check ###########

      if($testcase7_result == 0){  ########### 0 is match  else not match ############
        $is_correct7 = 1;
          if($pass == False){
              $pass = False;
          }else{
              $pass = True;
          }
      }else{
        $is_correct7 = 0;
        $pass = False;
      }
      
      fclose($pipes[1]);
      $return_value = proc_close($process);
  }
  ############################# CHECK IF THERE's OUTPUT OR NOT #################################
  $select_output7 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase7_id' AND User_ID ='$user_id'";
  $select_output7_query = mysqli_query($connect,$select_output7);

  ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
  if(mysqli_num_rows($select_output7_query) == 1){  
    $update_output7 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
    $update_output7->bind_param("siiii", $testcase7_output, $attempt_count, $is_correct7, $testcase7_id, $user_id);
    $update_output7->execute();
    $update_output7->close();

    #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
  }else if(mysqli_num_rows($select_output7_query) == 0){ 
    $insert_output7 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
    $insert_output7->bind_param("iiisii", $submit_id, $testcase7_id, $user_id, $testcase7_output, $attempt_count, $is_correct7);
    $insert_output7->execute();
    $insert_output7->close();
  }
}
else if($count == 8){
  ######################################## EXEC SECTION #################################################
$descriptorspec = array(
  0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
  1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
  );
  $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

  if (is_resource($process)) {

      fwrite($pipes[0], "".$rows['Input']."");
      fclose($pipes[0]);
      
      stream_set_timeout($pipes[1],5);
      $testcase8_output = stream_get_contents($pipes[1],50000);
      $testcase8_output = substr($testcase8_output,$cli_length);

      $testcase8_db = $rows['Expected_Result'];      ######## result from db ##########

      $testcase8_result = strcmp($testcase8_output, $testcase8_db);  ######## matching check ###########

      if($testcase8_result == 0){  ########### 0 is match  else not match ############
        $is_correct8 = 1;
          if($pass == False){
              $pass = False;
          }else{
              $pass = True;
          }
      }else{
        $is_correct8 = 0;
        $pass = False;
      }
      
      fclose($pipes[1]);
      $return_value = proc_close($process);
  }
  ############################# CHECK IF THERE's OUTPUT OR NOT #################################
  $select_output8 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase8_id' AND User_ID ='$user_id'";
  $select_output8_query = mysqli_query($connect,$select_output8);

  ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
  if(mysqli_num_rows($select_output8_query) == 1){  
    $update_output8 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
    $update_output8->bind_param("siiii", $testcase8_output, $attempt_count, $is_correct8, $testcase8_id, $user_id);
    $update_output8->execute();
    $update_output8->close();

    #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
  }else if(mysqli_num_rows($select_output8_query) == 0){ 
    $insert_output8 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
    $insert_output8->bind_param("iiisii", $submit_id, $testcase8_id, $user_id, $testcase8_output, $attempt_count, $is_correct8);
    $insert_output8->execute();
    $insert_output8->close();
  }
}
else if($count == 9){
  ######################################## EXEC SECTION #################################################
$descriptorspec = array(
  0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
  1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
  );
  $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

  if (is_resource($process)) {

      fwrite($pipes[0], "".$rows['Input']."");
      fclose($pipes[0]);
      
      stream_set_timeout($pipes[1],5);
      $testcase9_output = stream_get_contents($pipes[1],50000);
      $testcase9_output = substr($testcase9_output,$cli_length);

      $testcase9_db = $rows['Expected_Result'];      ######## result from db ##########

      $testcase9_result = strcmp($testcase9_output, $testcase9_db);  ######## matching check ###########

      if($testcase9_result == 0){  ########### 0 is match  else not match ############
        $is_correct9 = 1;
          if($pass == False){
              $pass = False;
          }else{
              $pass = True;
          }
      }else{
        $is_correct9 = 0;
        $pass = False;
      }
      
      fclose($pipes[1]);
      $return_value = proc_close($process);
  }
  ############################# CHECK IF THERE's OUTPUT OR NOT #################################
  $select_output9 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase9_id' AND User_ID ='$user_id'";
  $select_output9_query = mysqli_query($connect,$select_output9);

  ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
  if(mysqli_num_rows($select_output9_query) == 1){  
    $update_output9 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
    $update_output9->bind_param("siiii", $testcase9_output, $attempt_count, $is_correct9, $testcase9_id, $user_id);
    $update_output9->execute();
    $update_output9->close();

    #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
  }else if(mysqli_num_rows($select_output9_query) == 0){ 
    $insert_output9 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
    $insert_output9->bind_param("iiisii", $submit_id, $testcase9_id, $user_id, $testcase9_output, $attempt_count, $is_correct9);
    $insert_output9->execute();
    $insert_output9->close();
  }
}
else if($count == 10){
  ######################################## EXEC SECTION #################################################
$descriptorspec = array(
  0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
  1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
  );
  $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

  if (is_resource($process)) {

      fwrite($pipes[0], "".$rows['Input']."");
      fclose($pipes[0]);
      
      stream_set_timeout($pipes[1],5);
      $testcase10_output = stream_get_contents($pipes[1],50000);
      $testcase10_output = substr($testcase10_output,$cli_length);

      $testcase10_db = $rows['Expected_Result'];      ######## result from db ##########

      $testcase10_result = strcmp($testcase10_output, $testcase10_db);  ######## matching check ###########

      if($testcase10_result == 0){  ########### 0 is match  else not match ############
        $is_correct10 = 1;
          if($pass == False){
              $pass = False;
          }else{
              $pass = True;
          }
      }else{
        $is_correct10 = 0;
        $pass = False;
      }
      
      fclose($pipes[1]);
      $return_value = proc_close($process);
  }
  ############################# CHECK IF THERE's OUTPUT OR NOT #################################
  $select_output10 = "SELECT Testcase_ID FROM exec_output WHERE Testcase_ID ='$testcase10_id' AND User_ID ='$user_id'";
  $select_output10_query = mysqli_query($connect,$select_output10);

  ################ CHECK IF AVAILABLE UPDATE INSTEAD ###############
  if(mysqli_num_rows($select_output10_query) == 1){  
    $update_output10 = $connect->prepare("UPDATE exec_output SET Actual_result=? , Attempt_count =? , Is_correct =? WHERE Testcase_ID =? AND User_ID =?");
    $update_output10->bind_param("siiii", $testcase10_output, $attempt_count, $is_correct10, $testcase10_id, $user_id);
    $update_output10->execute();
    $update_output10->close();

    #################### NOT AVAILABLE INSERT THE NEW ONE ##############################
  }else if(mysqli_num_rows($select_output10_query) == 0){ 
    $insert_output10 = $connect->prepare("INSERT INTO exec_output (Submit_ID,Testcase_ID,User_ID,Actual_result,Attempt_count,Is_correct) VALUES(?,?,?,?,?,?)");
    $insert_output10->bind_param("iiisii", $submit_id, $testcase10_id, $user_id, $testcase10_output, $attempt_count, $is_correct10);
    $insert_output10->execute();
    $insert_output10->close();
  }
}
      $count += 1;
    } ##################### END OF WHILE LOOP HERE #############################
    if($pass == True){
      $status = "waiting for inspection";
    }else{
      $status = "not passed";
    }
    ####################################### GET PLAIN TEXT CODE FROM FILE ###########################################
    $fh = fopen('temp_file/'.$file.'','r');
    $code = '';
    while ($line = fgets($fh)) {
      // <... Do your work with the line ...>
       $code .= $line;
    }
    fclose($fh);
    
}



############################################ UPDATE VALUE OF SUBMITION #######################################

$update_submition = $connect->prepare("UPDATE submition SET Turn_in_Code =? , Turn_in_Status =? , Attempt_count =? WHERE Submit_ID = ?");
$update_submition->bind_param("ssii", $code, $status, $attempt_count, $submit_id);
$update_submition->execute();
$update_submition->close();

unlink("temp_file/".$file."");

header("Location: TurnInCode.php?Assignment_ID=$assignment_id");

?>