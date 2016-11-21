				/*----Change Password----*/
<!DOCTYPE html>
<html>
<?php include 'homex.php';?>
<style type="text/css">


input[type=password],input[type=text]{
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

<h3>Please Enter the Correct Credentials.</h3><br>

<div style="text-align:center;">
  <form method='post' action="cpass.php">

    <label for="voter_id">Your Voter_Id</label>
    <input type="text" id="voter_id" name="voter_id"><br>

    <label for="oldpass">Old Password</label>
    <input type="password" id="oldpass" name="oldpass"><br>


    <label for="password">New Password</label>
    <input type="password" id="password" name="password"><br>

    <label for="cpassword">Confirm Password</label>
    <input type="password" id="cpassword" name="cpassword"><br>


   
<input type="submit" name="submit" value="Submit">
</form>
<?php


// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}


if (isset($_POST['submit']))
{

  $voter_id = $_POST['voter_id'];
  $old_pass = $_POST['oldpass'];
  $new_pass = $_POST['password'];
  $c_pass = $_POST['cpassword'];

 
      if($new_pass=='')
    {
  
      echo "<script>alert('Please enter your Password')</script>";
          exit();
 
    } 

     if(strcmp($new_pass,$c_pass)!=0)
    {
        echo "<script>alert('Password do not match!')</script>";
         exit();
    }

    else
    {
  
 $check_email = "select * From users where voter_id='$voter_id' AND user_password='$old_pass'";
 $result_email = mysqli_query($conn, $check_email) or die (mysqli_error($conn));
 
  if (mysqli_num_rows($result_email) > 0)
  {
  
  $insertquery = "update users set user_password = '$new_pass' where voter_id= '$voter_id' AND user_password='$old_pass'";
  if (mysqli_query($conn, $insertquery))
   {
      echo "<script>alert('Password Changed Sucessfully!')</script>";
      echo "<script>window.open('home.php','_self')</script>";
   } 
  else
   {
       
       echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
   }

   }
 else
   {
       echo "<script>alert('Enter Correct Credentials!')</script>";
       
   }

 }


}
  

?>
    
  
    
  
</div>

</body>
</html>