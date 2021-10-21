<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="create_course_process.php">
		Course:<br>
		<input type="text" name="Course_Name">
		<br>
        <input type="submit" name="save" value="submit">
	</form>

	<?php include('../error.php'); ?>
        <?php if(isset($_SESSION['error'])) :?>
          <div style="color:red">
            <h3>
              <br>
              <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
              ?>
            </h3>
          </div>
        <?php endif ?>
  </body>
</html>