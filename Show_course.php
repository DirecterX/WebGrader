<style>
      a{
            color: #233142;
        }
        a:hover{
            color: #3D367B;
        }
       .card {
          font-family: 'Kanit', sans-serif;
          transition-duration: 0.5s;
      }
      .card:hover{
          color: #233142;
          border: 1px solid;
          border-radius: 30px;
          box-shadow: 0px 15px #3D367B;
          width: 20rem;
          font-family: 'Kanit', sans-serif;
          transition: 0.5s;
      }
      
      .cardborder {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-bottom-width: 20px;

      }
</style>


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
                $show_class_q = mysqli_query($connect,$show_class);
                while($row = mysqli_fetch_array($show_class_q)){
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

                    echo '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-2 pt-3">';
                    $Course_Start_date = $show_course_result['Start_date'];
                    $Course_End_date = $show_course_result['End_date'];
                    $toDay = date('Y-m-d');

                   
                    if($Course_Start_date <= $toDay and $Course_End_date >= $toDay){
                        $course_status = 'Open';
                        $card_Icon ='fas fa-user fa-6x';
                        $text_Color = 'success';
                    
                    }elseif($Course_End_date <= $toDay ){
                        $course_status = "Close";
                        $card_Icon ='fas fa-times-circle fa-6x';
                        $text_Color = 'danger';
                        
                    }else{
                        $card_Icon ='fas fa-history fa-6x';
                        $course_status = 'Wait to open';
                        $text_Color = 'warning';
                       
                    }
      
            ?>
            
                <?php echo '<a href="Course.php?Course_ID='.$Course_ID.'">'; ?><!-- Link Here -->
                <div class="card border border-dark m-2  fw-bolder" style="width: 20rem; border: 1px solid; border-radius: 10px;background-color:#FFFFFF;">
                    <div class="card-body w-100">
                        <h5 class="card-title mb-2">Course : <?php echo $Course_Name ?></h5>
                        <p class="card-text">?????????????????? : <label style="text-decoration: underline;"> <?php echo $course_owener_show ?> </label></p>
                        <p class="card-text mb-2">???????????????????????? / ?????????????????????????????? : <?php echo $Course_Sem."/".$Course_Schoolyear ?></p>
                        <p class="card-text">???????????? : <?php echo "Python"?></p>
                        <p class="card-text">??????????????? : <label class="text-<?php echo $text_Color; ?>"><?php echo $course_status ?></label></p>
                    </div>
                </div>
                </a>
            </div>
            <?php }?>
            <!-- /.col-sm-6 -->

            