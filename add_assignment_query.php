<?php
    include('config.php');

    if(isset($_POST['Testcase1_Input']) && isset($_POST['Course_ID']) && isset($_POST['Assignment_Name']) && isset($_POST['Assignment_Score']) && isset($_POST['Assignment_Detail']) && isset($_POST['Assignment_End_date'])){
        $testcase1_input = $_POST['Testcase1_Input'];
        $course_id = $_POST['Course_ID'];
        $assignment_name = $_POST['Assignment_Name'];
        $assignment_score = $_POST['Assignment_Score'];
        $assignment_detail = $_POST['Assignment_Detail'];
        $assignment_end_date = $_POST['Assignment_End_date'];
    }else{
        header("Location: show_assignment.php");
    }
    $testcase_count = 1;

    if(isset($_POST['Testcase2_Input'])){
      $testcase2_input = $_POST['Testcase2_Input'];
      $testcase_count += 1;

      if(isset($_POST['Testcase3_Input'])){
        $testcase3_input = $_POST['Testcase3_Input'];
        $testcase_count += 1;

        if(isset($_POST['Testcase4_Input'])){
          $testcase4_input = $_POST['Testcase4_Input'];
          $testcase_count += 1;

          if(isset($_POST['Testcase5_Input'])){
            $testcase5_input = $_POST['Testcase5_Input'];
            $testcase_count += 1;
          }
        }
      }
    }
    
    $hiddencase_count = 0;
    
    if(isset($_POST['HiddenTest1_Input'])){
      $hiddencase1_input = $_POST['HiddenTest1_Input'];
      $hiddencase_count += 1;

      if(isset($_POST['HiddenTest2_Input'])){
        $hiddencase2_input = $_POST['HiddenTest2_Input'];
        $hiddencase_count += 1;

        if(isset($_POST['HiddenTest3_Input'])){
          $hiddencase3_input = $_POST['HiddenTest4_Input'];
          $hiddencase_count += 1;

          if(isset($_POST['HiddenTest4_Input'])){
            $hiddencase4_input = $_POST['HiddenTest4_Input'];
            $hiddencase_count += 1;

            if(isset($_POST['HiddenTest5_Input'])){
              $hiddencase5_input = $_POST['HiddenTest5_Input'];
              $hiddencase_count += 1;
            }
          }
        }
      }
    }
    
    $target_dir = "temp_file/";
    $filename_username = $_SESSION["Username"];
    $file = $name_id.".py";
    $target_file = $target_dir . basename($filename_username);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

    ######################################## UPLOAD SECTION #################################################
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        if($FileType != "py") {
            echo "Sorry, only python files are allowed.";
            $uploadOk = 0;
          }
        if ($uploadOk == 0) {
            header("Location: test2.php");
          // if everything is ok, try to upload file
        }else {
            if (move_uploaded_file($_FILES["Assignment_File"]["tmp_name"], $target_file)) {
              echo $target_file;
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
    }
    ############################################## INSERT ASSIGNMENT ##################################################
    $insert_assignment = $connect->prepare("INSERT INTO assignment (Course_ID,Name,Score,Detail,End_date) VALUES(?,?,?,?,?)");
    $insert_assignment->bind_param("isiss", $course_id, $assignment_name, $assignment_score, $assignment_detail, $assignment_end_date);
    $insert_assignment->execute();
    $insert_assignment->close();

    $last_insert_id = $connect->insert_id;

    $while_count = 1;
    $not_hidden = 0;
    ###################### NON HIDDEN TESTCASE WHILE LOOP ###########################
    while($while_count != $testcase_count+1){

      ######################################## EXECUTE TO GET INGNORE INPUT CLI VALUE #################################################
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
      ######################################## EXECUTE SECTION #################################################
      $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
        );
        $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

        if (is_resource($process)) {
      
            fwrite($pipes[0], "".${"testcase".$while_count."_input"}."");
            fclose($pipes[0]);
            
            stream_set_timeout($pipes[1],5);
            $testcase_output = stream_get_contents($pipes[1],50000);
            $testcase_output = substr($testcase_output,$cli_length);
            
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
      ###################################################### INSERT TESTCASE SECTION #######################################################
      ${"insert_testcase".$while_count} = $connect->prepare("INSERT INTO testcase (Assignment_ID,Number,Expected_Result,Input,Is_hidden) VALUES(?,?,?,?,?)");
      ${"insert_testcase".$while_count}->bind_param("iissi", $last_insert_id, $while_count, $testcase_output, ${"testcase".$while_count."_input"}, $not_hidden);
      ${"insert_testcase".$while_count}->execute();
      ${"insert_testcase".$while_count}->close();

      $while_count++;
    }

    $hidden_count = $testcase_count + $hiddencase_count;
    $hidden = 1; #### HIDDEN STATUS
    $hid = 1;

    while($while_count != $hidden_count+1){
      ######################################## EXECUTE TO GET INGNORE INPUT CLI VALUE #################################################
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
      ######################################## EXECUTE SECTION #################################################
      $descriptorspec = array(
        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
        2 => array("file", "./error-output.txt", "a") // stderr is a file to write to
        );
        $process = proc_open("python ./temp_file/".$file."", $descriptorspec, $pipes);

        if (is_resource($process)) {
      
            fwrite($pipes[0], "".${"hiddencase".$hid."_input"}."");
            fclose($pipes[0]);
            
            stream_set_timeout($pipes[1],5);
            $testcase_output = stream_get_contents($pipes[1],50000);
            $testcase_output = substr($testcase_output,$cli_length);
            
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
        ###################################################### INSERT HIDDEN TESTCASE SECTION #######################################################
      ${"insert_testcase".$while_count} = $connect->prepare("INSERT INTO testcase (Assignment_ID,Number,Expected_Result,Input,Is_hidden) VALUES(?,?,?,?,?)");
      ${"insert_testcase".$while_count}->bind_param("iissi", $last_insert_id, $while_count, $testcase_output, ${"hiddencase".$hid."_input"}, $hidden);
      ${"insert_testcase".$while_count}->execute();
      ${"insert_testcase".$while_count}->close();

      $hid++;
      $while_count++;
    }

    unlink("temp_file/".$file."");
?>