<?php
include("home.php");
include("add_db.php");
$flag=0;
if (isset($_POST['submit']))
{
	$result=mysqli_query($con,"insert into attendance(name,roll)values('$_POST[name]','$_POST[roll]')");
	if($result)
	{
		$flag=1;
	}
}
?>
 <title>Add Student</title>

<div class="panel panel-default">
<?php if($flag) { ?>
<div class="alter alter-success">
<strong>!success</strong> attendance data successfully inserted;
</div>
<?php } ?>
 <div class="panel-heading">
  <h5>
    <a class="btn btn-success" href="add.php">Add student</a>
    <a class="btn btn-info pull-right" href="index.php">Back</a>
  </h5>
  
 </div>
 </div>


<div class="panel-body">
<form action="add.php" method="POST">

<div class="form-group">
<label for="name">Student Name</label>
<input type="text" name="name" id="name" class="form-control">
</div>

<div class="form-group">
<label for="roll">Roll</label>
<input type="text" name="roll" id="roll" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="submit" value="submit" class="btn btn-primary">
<input type="reset" name="reset" value="reset" class="btn btn-primary">
</div>
</form>
</div>

