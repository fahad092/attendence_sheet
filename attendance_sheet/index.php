<?php
include("home.php");
include("add_db.php");
$flag=0;
$update=0;
if(isset($_POST['submit']))
{
		foreach($_POST['attendance_status'] as $id=>$attendance_status)
		{
			    $course_name=$_POST['course_name'];
			    $cycle=$_POST['cycle'];
				$name=$_POST['name'][$id];
				$roll=$_POST['roll'][$id];
				$date=date("Y-m-d H:i:s");
				$result=mysqli_query($con,"insert into record(course_name,cycle,name,roll,attendance_status,date)values('$course_name','$cycle','$name','$roll','$attendance_status','$date')");
				if($result)
				{
					$flag=1;
				}
				
		}	
			
}

?>
<title>Attendance Sheet</title>
<!--old portion-->
<div class="panel panle-default">
  <div class="panel panel-heading">
    <h4>
    <a class="btn btn-success" href="add.php">Add student</a>
	<a class="btn btn-info pull-right" href="view_all.php">View all</a>
	<a class="btn btn-info pull-bottom" href="cal.php">Check</a>
	<a class="btn btn-info pull-bottom" href="logout.php">logout</a>
	</h4>
	<?php if($flag){ ?>
	<div class="alert alert-success">
	Attendance date insert successful
	</div>
	<?php } ?>
	
	

<h3><div class="well text-center">Date: <?php echo date("d-m-Y"); ?> </div></h3>	

 <div class="panel panel-body">
 <form action="index.php" method="post">
 <table class="table table-striped">
 
 <div class="form-group">
 <label for="cycle">Course Name</label>
<input type="text" name="course_name" id="course_name" class="form-control">

<label for="cycle">Cycle/Day</label>
<input type="text" name="cycle" id="cycle" class="form-control">
</div>

 <tr>
      <th>#serial Number</th><th>Student Name</th><th>Roll Number</th><th>Attendance Status</th>
 </tr>
 <?php $result=mysqli_query($con,"select * from attendance");
 $serialnumber=0;
 $counter=0;
 while($row=mysqli_fetch_array($result))
 { 
    $serialnumber++
?>
<tr>
    <td> <?php echo $serialnumber; ?> </td>
    <td> <?php echo $row['name']; ?> 
	<input type="hidden" value="<?php echo $row['name']; ?>" name="name[]">
	</td>
    <td> <?php echo $row['roll']; ?>
	<input type="hidden" value="<?php echo $row['roll']; ?>" name="roll[]">

	</td>
    <td>
       <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="1">Present</input>
	   <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="0">Absent</input> 
    </td>
</tr>
 
 <?php
 $counter++;
 } ?>

 </table>
 <input type="submit" name="submit" value="submit" class="btn btn-primary"></input>
 <input type="reset" name="reset" value="reset" class="btn btn-primary">
 </form>
 </div>
