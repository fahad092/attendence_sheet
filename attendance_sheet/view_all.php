<?php
include("home.php");
include("add_db.php");
?>
<title>View Attendance</title>
<!--old portion-->
<div class="panel panle-default">
  <div class="panel panel-heading">
    <h4>
    <a class="btn btn-success" href="add.php">Add student</a>
	<a class="btn btn-info pull-right" href="index.php">Back</a>
	</h4>

		
 <div class="panel panel-body">

 <table class="table table-striped">
 <tr>
      <th>#Serial Number</th>  <th>Cycle/Day</th> <th>Show Attendance</th>
 </tr>
 <?php 
 $result=mysqli_query($con,"select distinct cycle from record");
 $serialnumber=0;
 while($row=mysqli_fetch_array($result))
 { 
    $serialnumber++;
?>
<tr>
    <td> <?php echo $serialnumber; ?> </td>
    <td> <?php echo $row['cycle']; ?>  </td>
	<td>
	<form action="show_attendance.php" method="post">
	<input type="hidden" value="<?php echo $row['cycle'] ?>" name="cycle">
	<input type="submit" value="Show Attendance" class="btn btn-primary">
	
	</td>
    
</tr>
 
 <?php
 } ?>

 </table>
 </form>
 </div>
