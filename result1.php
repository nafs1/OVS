			/*-----City-Wise_Result----*/
<!doctype html> 
<html>
<?php include 'homex.php';?>
	<head>
		<title>Results</title>
	
<style type="text/css">
	
body {padding:0; margin:0;}

.container {width:90%; background:white; margin:0 auto; padding:10px;}

img {padding:20px; border-radius:100%; border:4px solid white;100
img:hover {background:orange;}

input {margin:30px;}

</style>
	</head>
	
<body> 
	<h3/>

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1>CITY-WISE RESULT</h2></div>

<div class="container">

</div>
<?php 
$conn = mysqli_connect("localhost","root","","users_db");
if (mysqli_connect_errno())
{
 echo "MySQLi Connection was not established: " . mysqli_connect_error();
}

$vote_city = "select * from users where p ='1' AND user_city='City_A'";
 $run_city = mysqli_query($conn, $vote_city) or die (mysqli_error($conn));
	
	if($run_city){
	
	$m= mysqli_num_rows($run_city);
	$query="update city_votes set City_A='$m'";
  if(mysqli_query($conn,$query)){


	 echo"     "; 
	}
	
	}

	$vote_city = "select * from users where p ='1' AND user_city='City_B'";
 $run_city = mysqli_query($conn, $vote_city) or die (mysqli_error($conn));
	
	if($run_city){
	
	$n= mysqli_num_rows($run_city);
	$query="update city_votes set City_B='$n'";
  if(mysqli_query($conn,$query)){


	 echo"     "; 
	}
	
	}


$vote_city = "select * from users where p ='1' AND user_city='City_C'";
 $run_city = mysqli_query($conn, $vote_city) or die (mysqli_error($conn));
	
	if($run_city){
	
	$o= mysqli_num_rows($run_city);
	$query="update city_votes set City_C='$o'";
  if(mysqli_query($conn,$query)){


	 echo"    "; 
	}
	
	}

	$vote_city = "select * from users where p ='1' AND user_city='City_D'";
 $run_city = mysqli_query($conn, $vote_city) or die (mysqli_error($conn));
	
	if($run_city){
	
	$p= mysqli_num_rows($run_city);
	$query="update city_votes set City_D='$p'";
  if(mysqli_query($conn,$query)){


	 echo"      "; 
	}
	
	}

	$count = $m+$n+$o+$p; 
	$per_m = round($m*100/$count) . "%";
	$per_n = round($n*100/$count) . "%";
	$per_o = round($o*100/$count) . "%";
	$per_p = round($p*100/$count) . "%";






?>




<div>
</div>
 
<div style="background-color:#1abc9c;color:white;padding:20px;height:500%;text-align:center;font-size:125%;">

<?php  echo "City-A----->$per_m";?><br>
<?php  echo "City-B----->$per_n";?><br>
<?php  echo "City-C----->$per_o";?><br>
<?php  echo "City-D----->$per_p";?><br>

</div>




</body>
</html>