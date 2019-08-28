<?php
include("home.php");
include("add_db.php");
?>
<title>Total Attendance</title>
<div class="panel-heading">
  <h5>
    <a class="btn btn-info pull-bottom" href="c://xampp/htdocs/attendance_sheet/admin_panel.php">logout</a>
  </h5>
  
<div class="panel-body">
<form action="cal.php" method="POST">
<div class="form-group">
<label for="roll">Roll</label>
<input type="text" name="roll" id="roll" class="form-control">
<label for="course_name">Course Name</label>
<input type="text" name="course_name" id="course_name" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="submit" value="submit" class="btn btn-primary">
<input type="reset" name="reset" value="reset" class="btn btn-primary">
<a class="btn btn-info pull-right" href="pdf.php">View PDF</a>

</div> 

<?php
$present=0;
$total_num_class=1;
$query="select * from record";
if(isset($_POST['roll']))
{
  $d=$_POST['roll'];
  $course=$_POST['course_name'];
		if($is_query_run=mysqli_query($con,$query))
		{
			
			
				while($query_execute=mysqli_fetch_assoc($is_query_run))
				{
					//echo $query_execute['attendance_status'].'<br>';
					if($query_execute['roll']==$d && $query_execute['course_name']==$course && $query_execute['attendance_status']=="1")
					{
						 ++$present;
						
					}
					
					if($query_execute['course_name']==$course && $query_execute['roll']==$d)
					{
						++$total_num_class;
					}
					 
				}
			
				
		}
		//$total_num_class=($total_num_class)/6;
	
}
$total_num_class=$total_num_class-1;
echo "Total Number Of Class: ".$total_num_class.'<br>';
echo "Number of present :". $present.'<br>';
$result=($present*100)/$total_num_class;
echo "Persentage of Attendance Mark: ".$result.'%'.'<br>';
if($result>=50)
	echo"Congratulation!!!You are enable to attendant in following Examination".'<br>';
else
   echo"SoRRy !!!You are not enable to attendant in following Examination".'<br>'
?>



<table class="table table-striped">
                           <tr>
                            <th>Roll</th><th>Course Name</th><th>Cycle/Day </th><th>Attendance Status</th> <th>Date</th>
                           </tr>
<?php
$query="select * from record";   
if(isset($_POST['roll']))
{
   	
  $total_num_class=0;
  $d=$_POST['roll'];
  $course=$_POST['course_name'];
  $date=date("Y-m-d H:i:s");
         
		
		if($is_query_run=mysqli_query($con,$query))
		{
	       
			   
						  
            					   
				while($query_execute=mysqli_fetch_assoc($is_query_run))
				{ 
					//echo $query_execute['attendance_status'].'<br>';
				
					if($query_execute['roll']==$d && $query_execute['course_name']==$course)
                    if($query_execute['attendance_status']=="1" || $query_execute['attendance_status']=="0")
					{
						
						
				     mysqli_query($con,"insert into pdf(roll,course_name,cycle,attendance_status,date)
					 values('$query_execute[roll]','$query_execute[course_name]','$query_execute[cycle]','$query_execute[attendance_status]','$date')");
			             ?> 
						<tr>
						<td><?php echo $query_execute['roll']; ?></td>
						<td><?php echo $query_execute['course_name']; ?></td>
						<td><?php echo $query_execute['cycle']; ?></td>
						<td><?php echo $query_execute['attendance_status']; ?></td>
						<td><?php echo $query_execute['date']; ?></td>
						
						</tr>
						
						<?php
					}
					
					
					 
				}
			
			
		}
}?>
</table>
</form>
</div>



