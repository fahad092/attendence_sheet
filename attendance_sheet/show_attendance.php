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
	<a class="btn btn-info pull-right" href="view_all.php">Back</a>
	</h4>

 <div class="panel panel-body">
 <table class="table table-striped">
 <tr>
      <th>#serial Number</th><th>Course Name</th><th>Cycle/Day</th><th>Student Name</th><th>Roll Number</th><th>Attendance Status</th>
 </tr>
 <?php 
 $result=mysqli_query($con,"select * from record where cycle='$_POST[cycle]'");
 $serialnumber=0;
 $counter=0;
 while($row=mysqli_fetch_array($result))
 { 
    $serialnumber++
?>
<tr>
    <td> <?php echo $serialnumber; ?> </td>
	<td> <?php echo $row['course_name']; ?> </td>
	<td> <?php echo $row['cycle']; ?> </td>
    <td> <?php echo $row['name']; ?> </td>
    <td> <?php echo $row['roll']; ?> </td>
    <td>
       <input type="checkbox" name="attendance_status[<?php echo $counter; ?>]"
       <?php if($row['attendance_status']=="1")
		 echo "checked=checked";
	   ?> value="Present">Present</input>
	   <input type="checkbox" name="attendance_status[<?php echo $counter; ?>]"
       <?php if($row['attendance_status']=="0")
		 echo "checked=checked";
	   ?> value="Absent">Absent</input>
    </td>
</tr>
 
 <?php
 $counter++;
 } ?>

 </table>
 </div>
