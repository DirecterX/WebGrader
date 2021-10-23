<?php
    include('config.php');
    $classes = explode(',',$_SESSION['Course_ID']);

    foreach($classes as $class){
        //echo $class."\n"; 
        $sql = "SELECT * FROM course WHERE Course_ID = '".$class."'";
        mysqli_query($connect,$sql) or die(mysqli_error());
        $sqlq2 = mysqli_query($connect,$sql);
        $result = mysqli_fetch_array($sqlq2);
        if (mysqli_num_rows($sqlq2)==1) {
            $course_name = $result["Course_Name"];
            $course_owener = $result["User_ID"];
            $course_status = $result["Course_Status"];
            //echo $course_name."\n".$course_owener."\n".$course_status;    
        }

        $sql = "SELECT * FROM user WHERE User_Username = '".$course_owener."'";
		$sqlq2 = mysqli_query($connect,$sql);
		$result = mysqli_fetch_array($sqlq2);
		if (mysqli_num_rows($sqlq2)==1) {
			$course_owener_show = $result['User_Name'];
            $course_owener_show .= $result['User_Surname'];
		}
        //echo $course_owener_show;
?>

        <div class="col">

            <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card " style=" border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border-bottom-width: 20px;border-bottom-color: #FF8540;">
                <a href="blankpage.php" class ="cardlink"> <!-- Link Here -->
                <div class="card-body">
                
                    <p class="card-text">
                            <div class="row">
                                <div class="col" style="text-align:center;">
                                    <i class="fas fa-user fa-6x"></i>  <!-- Icon -->
                                </div>
                            </div>
                    </p>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4><?php echo $course_name ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo $course_owener_show ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php 
                            if($course_status == 'open'){
                                echo "กำลังเรียนอยู่";
                            }else{
                                echo "ปิดแล้ว";
                            }
                            
                            
                             ?></h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
                </a>
            </div>
            </div>
            <!-- /.card -->
              <?php }?>
        </div>
    