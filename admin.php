			     /*-------Admin_Login----*/
<html>
<head>
<title>Login</title>
<?php include 'homex.php';?>
<style type="text/css">
body
{
background :url(n.jpg);
background-repeat:no repeat;
background-size:100%;
}

</style>



<body>
<div>
	<h1></h1>
<form method='post' action='admin.php'>
<table width='500' border='20' align='center'>
<tr>
<td align='center' colspan='5' ><h1>Admin Login</h1></td>
</tr>
<tr>
<td bgcolor='' align='center'> Admin Name:</td>
<td><input type='text' name='name'/>
</td>
</tr>
<tr>
<td align='center'>Admin password:</td>
<td><input type='password' name='pass'/>
</td>
</tr>
<tr>
<td colspan='5' align='center'><input type='submit' name='admin_login' value='Login'/></td>
</tr>
</table>
</form>

</div>
</style>
</head>

</html>
<?php
// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
if (isset($_POST['admin_login'])){
 
  $admin_name=$_POST['name'];
  $admin_pass = $_POST['pass'];
 $check_email = "select * From admin where admin_pass='$admin_pass' AND admin_name='$admin_name'";
 $result_email = mysqli_query($conn, $check_email) or die (mysqli_error($conn));
if(mysqli_num_rows($result_email)>0){

echo "<script>window.open('admin_login1.php','_self')</script>";
}
else
{
echo "<script>alert('Either Admin_Name or Admin_Password is incorrect!')</script>";
}
 }
?>