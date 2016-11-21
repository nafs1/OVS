			    /*----Voter_Details-----*/
<html>
<head>
<title>View Users</title>
</head>
<center><h1>All The Users Information</h1></center>
<table width='800' align='center' border='20'>
<tr bgcolor='yellow'>
<th>p</th>
<th>voter id</th>
<th>user name</th>
<th>user password</th>
<th>user age</th>
<th>user sex</th>
<th>user city</th>
<th>user Mob</th>
<th>delete user</th>
</tr>

<a style="float:right;font-size:125%" href="admin.php">Logout</a>

<?php
// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
 $query = "select * From users";
 $run = mysqli_query($conn, $query) or die (mysqli_error($conn));
while($row=mysqli_fetch_array($run)){
$p=$row[0];
$voter_id=$row[1];
$users_name=$row[2];
$users_pass=$row[3];
$users_age=$row[4];
$users_sex=$row[5];

$users_city=$row[6];
$users_mob=$row[7];


?>
<tr align='center'>
<td><?php echo $p; ?></td>
<td><?php echo $voter_id; ?></td>
<td><?php echo $users_name; ?></td>
<td><?php echo $users_pass; ?></td>
<td><?php echo $users_age; ?></td>
<td><?php echo $users_sex; ?></td>

<td><?php echo $users_city; ?></td>
<td><?php echo $users_mob; ?></td>
<td><a href='delete.php?del=<?php echo $users_name;?>'>Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>