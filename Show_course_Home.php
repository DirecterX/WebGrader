<style>

.card {
    border: 1px solid;
    border-radius: 20px;
    box-shadow: 0px 15px #3D367B;
    
    font-family: 'Kanit', sans-serif;
    transition-duration: 0.5s;
}
.card:hover{
    color: #233142;
    border: 1px solid;
    border-radius: 30px;
    box-shadow: 0px 15px #FAA3A3;

    font-family: 'Kanit', sans-serif;
    transition: 0.5s;
}

</style>

<div class="row m-2">
        <?php
                $uid = $_SESSION["User_ID"];
                $course_status = 'Wait to open';



                $show_class = "SELECT * 
                FROM course_role 
                INNER JOIN course ON course.Course_ID = course_role.Course_ID
                WHERE course_role.User_ID = '".$uid."'
                ORDER BY 
                course.End_Date DESC,
                course.Start_date ASC,
                course.Name ASC";
                // แสดง Course โดยเรียงจากวันที่ปิดท้ายสุดมาก่อน
                $show_class_q = mysqli_query($connect,$show_class);
                $i = 0;
                while($row = mysqli_fetch_array($show_class_q) AND $i < 4){
                    $i++;
                    $Course_ID = $row["Course_ID"];

                    $show_course = 
                    "SELECT * 
                    FROM course 
                    WHERE Course_ID = '".$Course_ID."'
                    ";
                    $show_course_q = mysqli_query($connect,$show_course);
                    $show_course_result = mysqli_fetch_array($show_course_q);
                    $Course_Name = $show_course_result['Name'];
                    $Course_Schoolyear = $show_course_result['Schoolyear'];
                    $Course_Sem = $show_course_result['Semester'];
                    $course_owener_show =NULL;
                    $show_owner = 
                    "SELECT user.Firstname , user.Surname
                    FROM course_role
                    INNER JOIN user ON user.User_ID = course_role.User_ID
                    WHERE Course_ID = '".$Course_ID."' AND Role = 'Owner'";  
                    $show_owner_q = mysqli_query($connect,$show_owner);
                    $show_owner_result = mysqli_fetch_array($show_owner_q);
                    if (mysqli_num_rows($show_owner_q)>0) {
                        $course_owener_show = $show_owner_result['Firstname']." ".$show_owner_result['Surname'];
                    }

                    echo '<div class="col-sm-6 col-md-4 col-lg-3 mt-2 pt-3">';
                    $Course_Start_date = $show_course_result['Start_date'];
                    $Course_End_date = $show_course_result['End_date'];
                    $toDay = date('Y-m-d');
                    if($Course_Start_date <= $toDay and $Course_End_date >= $toDay){
                        $course_status = 'Open';
                        echo '<div class="card " >';
                    }elseif($Course_End_date <= $toDay ){
                        $course_status = "Close";
                       
                        echo '<div class="card " >';
                    }else{
                        $card_Icon ='fas fa-history fa-6x';
                        $course_status = 'Wait to open';
                        echo '<div class="card ">';
                    }
      
            ?>
            
                <?php echo '<a href="Course.php?Course_ID='.$Course_ID.'" class ="cardlink">'; ?><!-- Link Here -->
             
                <div class="card-body">
            
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h4><?php echo $Course_Name ?></h4>  <!-- Class Name -->
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ผู้สอน : <?php echo $course_owener_show ?></h6>  <!-- Instructor Name -->
                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ภาคเรียน/ปีการศึกษา : <?php echo $Course_Sem."/".$Course_Schoolyear ?> </h6>  <!-- Code lang -->
                        
                        </div>
                    </div>


                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>ภาษา : Python </h6>  <!-- Code lang -->
                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col" style="text-align:left;">
                            <h6>สถานะ : <?php echo $course_status ?> </h6>  <!-- Status class -->
                        
                        </div>
                    </div>
                </div>
                </a>
            </div>
           
            <!-- /.card -->
            <!--***************************************************************************************-->
            </div> 
            <?php }?>
            <!-- /.col-sm-6 -->
            