<!DOCTYPE html>
<?php $years = range(strftime("%Y", time()), strftime("%Y", date(9634894360))); 



?>
<html>
<head>
  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

  <body>
	<form method="POST" action="create_course_process.php">
		Course:<br><input type="text" name="Course_Name">
    <br><br>

    <label for="sem">Semester:</label>
      <select id="sem" name="Semester">
        <option value="1">1</option>
        <option value="2">2</option>
      </select>

    <br><br>
    <label for="Schoolyear">Schoolyear:</label>
    <select id = "Schoolyear" name="Schoolyear">
      <option>Select Year</option>
      <?php foreach($years as $year) : ?>
          <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
      <?php endforeach; ?>
    </select>
    <br><br>






    <input type="text" name="daterange" value="<?php echo date();?>" />
        <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('Y-m-d') + ' to ' + end.format('Y-m-d'));
          });
        });
        </script>
		<br><br>

    
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