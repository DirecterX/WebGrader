<?php
    include('config.php');

    if(isset($_POST['Testcase1_Input']) && isset($_POST['Course_ID']) && isset($_POST['Assignment_Name']) && isset($_POST['Assignment_Score']) && isset($_POST['Assignment_Detail']) && isset($_POST['Assignment_End_date'])){
        $testcase1_input = $_POST['Testcase1_Input'];
        $_SESSION['testcase1_input'] = $testcase1_input;

        $assignment_id = $_POST['Assignment_ID'];
        $course_id = $_POST['Course_ID'];

        $assignment_name = $_POST['Assignment_Name'];
        $_SESSION['Assignment_Name'] = $assignment_name;

        $assignment_score = $_POST['Assignment_Score'];
        $_SESSION['AssignmentScore'] = $assignment_score;

        $assignment_detail = $_POST['Assignment_Detail'];
        $_SESSION['Assignment_Detail'] = $assignment_detail;

        $assignment_end_date = $_POST['Assignment_End_date'];
        $_SESSION['Assignment_End_date'] = $assignment_end_date;
    }else{
        header("Location: home.php");
    }
    $testcase_count = 1;

    if(isset($_POST['Testcase2_Input'])){
      $testcase2_input = $_POST['Testcase2_Input'];
      $_SESSION['testcase2_input'] = $testcase2_input;
      $testcase_count += 1;

      if(isset($_POST['Testcase3_Input'])){
        $testcase3_input = $_POST['Testcase3_Input'];
        $_SESSION['testcase3_input'] = $testcase3_input;
        $testcase_count += 1;

        if(isset($_POST['Testcase4_Input'])){
          $testcase4_input = $_POST['Testcase4_Input'];
          $_SESSION['testcase4_input'] = $testcase4_input;
          $testcase_count += 1;

          if(isset($_POST['Testcase5_Input'])){
            $testcase5_input = $_POST['Testcase5_Input'];
            $_SESSION['testcase5_input'] = $testcase5_input;
            $testcase_count += 1;
          }
        }
      }
    }
    
    $hiddencase_count = 0;
    
    if(isset($_POST['HiddenTest1_Input'])){
      $hiddencase1_input = $_POST['HiddenTest1_Input'];
      $_SESSION['hiddencase1_input'] = $hiddencase1_input;
      $hiddencase_count += 1;

      if(isset($_POST['HiddenTest2_Input'])){
        $hiddencase2_input = $_POST['HiddenTest2_Input'];
        $_SESSION['hiddencase2_input'] = $hiddencase2_input;
        $hiddencase_count += 1;

        if(isset($_POST['HiddenTest3_Input'])){
          $hiddencase3_input = $_POST['HiddenTest3_Input'];
          $_SESSION['hiddencase3_input'] = $hiddencase3_input;
          $hiddencase_count += 1;

          if(isset($_POST['HiddenTest4_Input'])){
            $hiddencase4_input = $_POST['HiddenTest4_Input'];
            $_SESSION['hiddencase4_input'] = $hiddencase4_input;
            $hiddencase_count += 1;

            if(isset($_POST['HiddenTest5_Input'])){
              $hiddencase5_input = $_POST['HiddenTest5_Input'];
              $_SESSION['hiddencase5_input'] = $hiddencase5_input;
              $hiddencase_count += 1;
            }
          }
        }
      }
    }

    ################ count for loop in pre add assignment page ########################
    $_SESSION['testcase_count'] = $testcase_count;  
    $_SESSION['hiddencase_count'] = $hiddencase_count;
    echo $_SESSION['hiddencase_count'];

    $target_dir = "temp_file/";
    $filename_id = $_SESSION['User_ID'];
    $file = $filename_id.".py";
    $file = preg_replace('/\s+/', '_', $file);
    $target_file = $target_dir . basename($file);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $uploaded_file = $_FILES["Assignment_File"]["name"];
    $filesize = $_FILES["Assignment_File"]["size"];
    
    ######################################## UPLOAD SECTION #################################################
    // Check if image file is a actual image or fake image
    if(isset($_POST["check"])) {
      if($filesize > 10000000){
        header("Location: home.php");
      }else{
        if($FileType != "py") {
          echo "Sorry, only python files are allowed.";
          $uploadOk = 0;
        }
      if ($uploadOk == 0) {
          header("Location: home.php");
        // if everything is ok, try to upload file
      }else { 
          if (move_uploaded_file($_FILES["Assignment_File"]["tmp_name"],$target_file)) {
            echo "hi";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
    }

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

            $_SESSION['testcase'.$while_count] = $testcase_output;   ########### SESSION OUTPUT FOR PRE SHOWING IN PRE ADD ASSIGNMENT PAGE (EX. $_SESSION['testcase1']) #################
            
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
      

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

            $_SESSION['hiddencase'.$hid] = $testcase_output;   ########### SESSION OUTPUT FOR PRE SHOWING IN PRE ADD ASSIGNMENT PAGE (EX. $_SESSION['testcase1']) #################
            
            fclose($pipes[1]);
            $return_value = proc_close($process);
        }
     

      $hid++;
      $while_count++;
    }
    $_SESSION['pre_edit'] = True;


    unlink("temp_file/".$file."");
    header("location:/WebGrader/Pre_EditAssignment.php?Assignment_ID=".$assignment_id."&Course_ID=".$course_id."");
?>
