<?php
include("home.php");
include("add_db.php");
?>
<html>
<head>
<title>Login For Attendance</title>
<link rel="stylesheet" href="admin_panel.css"/>
</head>
<body>
<div id="form">
<form method="post" >
   <table >
     <tr>
	    <td>USER</td>
		<td>
		    <select name="type">
		       <option value="-1">User Type</option>
			   <option value="admin">admin</option>
			   <option value="user">user</option>
			</select>
		</td>
     </tr>
	 <tr>
	     <td>USER NAME</td>
		 <td><input type="text" name="username" placeholder="username" ></input></td>
	 </tr>
	 <tr>
	     <td>PASSWORD</td>
		 <td><input type="password" name="password" placeholder="password" ></input></td>
	 </tr>
	 <tr>
	     <td>&nbsp;</td>
		 <td><input type="submit" name="submit" value="login" id="btn"></input></td>
	 </tr>
    </table>
</form>
</body>
</div>
</html>
<?php
/*$connection=mysqli_fetch_array($con,"select *from record");
if(!$connection)
{
	echo "databse not found".mysqli_error();
}*/
if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from login where username='$username' and password='$password' and type='$type'" ;
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
     	{
		    if($row['username']==$username && $row['password']==$password && $row['type']=='admin')
			{
				header("Location: index.php");
			}
			if($row['username']==$username && $row['password']==$password && $row['type']=='user')
			{
				header("Location: user/cal.php");
			}
	    }
	
}
?>