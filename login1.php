			    /*-----Voter_Login----*/
 <?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>

<?php include 'homex.php';?>
<style type="text/css">
body
{
background :url(n.jpg);
background-repeat:no repeat;
background-size:100%;
}
h3{

text-align: center;

}



input[type=text],input[type=password]{
    float:center;
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 35%;
    font-size:120%;
    float:center;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}


div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<h3>Please Enter the Correct Credentials.</h3>

<div style="text-align:center;width:100%;">
  <form method='post' action="login1.php">

    <label for="voter_id">Voter_Id</label>
    <input type="text" id="voter_id" name="voter_id"><br>


    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br>


   
<input type="submit" name="submit" value="Login">
  
    
  </form>
  <a style="float:left;color:blue;font-size:125%;;" href="cpass.php">Change Password</a>

</div>

<?php
// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
if (isset($_POST['submit'])){
 
  $voter_id= $_POST['voter_id'];
  $user_password = $_POST['password'];
 $check_email = "select * From users where user_password='$user_password' AND voter_id='$voter_id'";
 $result_email = mysqli_query($conn, $check_email) or die (mysqli_error($conn));
 if(mysqli_num_rows($result_email)>0)
 {
    
    $get_p = "select p from users where user_password ='$user_password' AND voter_id='$voter_id'";
    
    $run_p = mysqli_query($conn, $get_p); 
    
    $row_p = mysqli_fetch_array($run_p); 
    
    $temp = $row_p['p'];
    echo "$temp";
    $_SESSION['voter_id'] = $voter_id;
    if($temp==0)
    {
        $p = "update users set p=p+1 where user_password ='$user_password' AND voter_id='$voter_id'";
        $result_p = mysqli_query($conn, $p) or die (mysqli_error($conn));
        if($result_p)
        {
            echo "<script>window.open('vote.php','_self')</script>";
    
    
        }

    }
    else
    {
        echo "<script>alert('You Have Already Voted!')</script>";
         echo "<script>window.open('home.php','_self')</script>";
        
    }
    
}
else
{
echo "<script>alert('Either Voter_Id or Password is incorrect!')</script>";
}
 }
?>

</body>
</style>
</head>
</html>

