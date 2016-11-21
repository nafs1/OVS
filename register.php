			/*-----Voter_Registration-----*/
<!DOCTYPE html>
<html>
<!--<?php include 'homex.php';?>-->

<style type="text/css">

input[type=text],input[type=number],input[type=password],select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

a{float:right;}

input[type=submit] {
    width: 45%;
    float: right;
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
input[type=reset] {
    width: 45%;
    float: left;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=reset]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<h3>Enter the Details Of Voter.</h3>
<a href="admin_login1.php">Logout_Admin</a>

<div>
  <form method='post' action="register.php">

    <label for="voter_id">Voter_Id</label>
    <input type="text" id="voter_id" name="voter_id">

    <label for="user_name">Name</label>
    <input type="text" id="user_name" name="user_name">

    <label for="user_password">Password</label>
    <input type="password" id="user_password" name="user_password">

    <label for="user_age">Age</label>
    <input type="number" id="user_age" name="user_age">

    <label for="user_sex">Sex</label>
    <select id="user_sex" name="user_sex">
      <option value="M">Male</option>
      <option value="F">Female</option>
    </select>

   <label for="user_city">City</label>
    <select id="user_city" name="user_city">
      <option value="City_A">City_A</option>
      <option value="City_B">City_B</option>
      <option value="City_C">City_C</option>
      <option value="City_D">City_D</option>
    </select>
  
    <label for="user_mob">Mob:</label>
    <input type="number" id="user_mob" name="user_mob">

    
<input type="submit" name="submit" value="Submit">
    
    <input type="reset" value="Reset">
  
    
  </form>
</div>
</body>



<?php

// Create connection
$conn = mysqli_connect("localhost","root","","users_db");

// Check connection
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}

if (isset($_POST['submit'])){
   $voter_id = $_POST['voter_id'];
  $user_name = $_POST['user_name'];
   $user_password = $_POST['user_password'];
   $user_age = $_POST['user_age'];
  $user_sex = $_POST['user_sex'];
  $user_city = $_POST['user_city'];
   $user_mob = $_POST['user_mob'];




   //echo "$voter_id $user_name $user_password  $user_age $user_sex $user_city $user_mob ";
 

 
 if($user_password==''||$voter_id==''){
  
 echo "<script>alert('Please Enter All The Fields')</script>";
 exit();
 
 } 
  
 
 
 $check_pass = "select * From users where voter_id='$voter_id'";
 $result_pass = mysqli_query($conn, $check_pass) or die (mysqli_error($conn));
 
  if (mysqli_num_rows($result_pass) > 0){
  
  
  echo "<script>alert('Voter_Id $voter_id already exists in our database,plz try another one!')</script>";
  
  exit();
  }
  
  
  //INSERTING DATA TO DATABASE
  $insertquery = "INSERT INTO users (voter_id,user_name,user_password,user_age,user_sex,user_city,user_mob) 
  VALUES ('$voter_id','$user_name','$user_password','$user_age','$user_sex','$user_city','$user_mob')";

  if (mysqli_query($conn, $insertquery)) {
      echo "<script>window.open('admin_login1.php','_self')</script>";
  } else {
       echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
  }
  
}

?>

</html>