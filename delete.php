			/*-----Delete_Voters----*/
<?php
// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
 $delete_id=$_GET['del'];
$query="delete from users where user_name='$delete_id' ";
if(mysqli_query($conn,$query)){
echo
"<script>window.open('view_users.php?deleted=user has been deleted!!!','_self')</script>";
}
?>