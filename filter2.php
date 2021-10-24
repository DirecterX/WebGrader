<?php
include('config.php');

$assignment_id = $_POST['Assignment_ID'];
$testcase_id = $_POST['Testcase1_ID'];
$user_id = $_POST['User_ID'];

if(isset($_POST['Testcase2_ID'])){
  $testcase2_id = $_POST['Testcase2_ID'];
}
if(isset($_POST['Testcase3_ID'])){
  $testcase3_id = $_POST['Testcase3_ID'];
}
if(isset($_POST['Testcase4_ID'])){
  $testcase4_id = $_POST['Testcase4_ID'];
}
if(isset($_POST['Testcase5_ID'])){
  $testcase5_id = $_POST['Testcase5_ID'];
}

$target_dir = "temp_file/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

######################################## UPLOAD SECTION #################################################
// Check if file type is a actual python or fake python
if(isset($_POST["submit"])) {
    if($FileType != "py") {
        echo "Sorry, only python files are allowed.";
        $uploadOk = 0;
      }
    if ($uploadOk == 0) {
        echo 'upload0';
        header("Location: TurnInCode.php?Assignment_ID=$assignment_id&User_ID=$user_id");
      // if everything is ok, try to upload file
    }else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          echo $_FILES["fileToUpload"]["name"];
        } else {
          echo "Sorry, there was an error uploading your file.";
          header("Location: TurnInCode.php?Assignment_ID=$assignment_id&User_ID=$user_id");
        }
      }
}
######################################## TESTCASE SELECT SECTION #################################################
$testcase_sql = "SELECT testcase.Expected_Result , testcase.Input 
                 FROM testcase
                 INNER JOIN assignment
                 ON assignment.Assignment_ID = testcase.Assignment_ID
                 WHERE assignment.Assignment_ID = '$assignment_id'  #<<<<<<<<<<<<<<< Dynamic Variable fix ใส่ไปอยู่เปลี่ยนไปใช้ตัวแปร
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

    while($rows = mysqli_fetch_array($testcase_query)){
      if ($count == 1){
        ######################################## EXEC SECTION #################################################
        $descriptorspec = array(
          0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
          1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
          2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
          );
          $process = proc_open("python ./temp_file/".$_FILES["fileToUpload"]["name"]."", $descriptorspec, $pipes);

          if (is_resource($process)) {
        
              fwrite($pipes[0], "".$rows['Input']."");
              fclose($pipes[0]);
              
              stream_set_timeout($pipes[1],5);
              $testcase1_output = stream_get_contents($pipes[1],50000);

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
          $process = proc_open("python ./temp_file/".$_FILES["fileToUpload"]["name"]."", $descriptorspec, $pipes);

          if (is_resource($process)) {
        
              fwrite($pipes[0], "".$rows['Input']."");
              fclose($pipes[0]);
              
              stream_set_timeout($pipes[1],5);
              $testcase2_output = stream_get_contents($pipes[1],50000);

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
        $process = proc_open("python ./temp_file/".$_FILES["fileToUpload"]["name"]."", $descriptorspec, $pipes);

        if (is_resource($process)) {
      
            fwrite($pipes[0], "".$rows['Input']."");
            fclose($pipes[0]);
            
            stream_set_timeout($pipes[1],5);
            $testcase3_output = stream_get_contents($pipes[1],50000);

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
      $process = proc_open("python ./temp_file/".$_FILES["fileToUpload"]["name"]."", $descriptorspec, $pipes);

      if (is_resource($process)) {
    
          fwrite($pipes[0], "".$rows['Input']."");
          fclose($pipes[0]);
          
          stream_set_timeout($pipes[1],5);
          $testcase4_output = stream_get_contents($pipes[1],50000);

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
    $process = proc_open("python ./temp_file/".$_FILES["fileToUpload"]["name"]."", $descriptorspec, $pipes);

    if (is_resource($process)) {
  
        fwrite($pipes[0], "".$rows['Input']."");
        fclose($pipes[0]);
        
        stream_set_timeout($pipes[1],5);
        $testcase5_output = stream_get_contents($pipes[1],50000);

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
      $count += 1;
    }
    if($pass == True){
      $status = "waiting for inspection";
    }else{
      $status = "not passed";
    }
    ####################################### GET PLAIN TEXT CODE FROM FILE ###########################################
    $fh = fopen('temp_file/'.$_FILES["fileToUpload"]["name"].'','r');
    $code = '';
    while ($line = fgets($fh)) {
      // <... Do your work with the line ...>
       $code .= $line;
    }
    fclose($fh);
    
}

echo "<pre>".$code."</pre>";

############################################ UPDATE VALUE OF SUBMITION #######################################

$update_submition = $connect->prepare("UPDATE submition SET Turn_in_Code =? , Turn_in_Status =? , Attempt_count =? WHERE Submit_ID = ?");
$update_submition->bind_param("ssii", $code, $status, $attempt_count, $submit_id);
$update_submition->execute();
$update_submition->close();

unlink("temp_file/".$_FILES['fileToUpload']['name']."");

header("Location: TurnInCode.php?Assignment_ID=$assignment_id&User_ID=$user_id");

?>