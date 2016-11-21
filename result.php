			   /*-----Result_Page-----*/
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
<h1>RESULTS ARE OUT</h2></div>

<div class="container">

<form action="result.php" method="post" align="center">  
	
	<input type="submit" name="result" value="CLICK HERE TO SEE THE RESULT" style="float:left;"/> 
	
</form>
<form action="result1.php" method="post" align="center">  
	
	<input type="submit" name="result" value="CLICK HERE TO SEE THE CITY-WISE RESULT" style="float:right;"/> 
	
</form>
<h/>
<?php 
$con = mysqli_connect("localhost","root","","users_db");



if(isset($_POST['result'])){

	$get_votes = "select * from players";
	
	$run_votes = mysqli_query($con, $get_votes); 
	
	$row_votes = mysqli_fetch_array($run_votes); 
	
	$bjp = $row_votes['bjp'];
	$congress = $row_votes['congress'];
	$abvp = $row_votes['abvp']; 
	
	$count = $bjp+$congress+$abvp; 
	$max=max($bjp,$congress,$abvp);
	$per_bjp = round($bjp*100/$count) . "%";
	$per_congress = round($congress*100/$count) . "%";
	$per_abvp = round($abvp*100/$count) . "%";


	if($max==$bjp)
		$win='bjp';
			//echo "bjp has won the Election";
		else if($max==$congress)
			$win='congress';

			//echo "congress has won the Election";
		else
			$win='abvp';
		//echo "abvp has won the Election";

	
	
	echo "
	<div style='background:orange; padding:10px; text-align:center;'>
		 
		<center>
		<h2>Results So Far:</h2>

		<h3>$win has won the Election</h3>

		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>B.J.P:</b> $bjp ($per_bjp)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>CONGRESS:</b> $congress ($per_congress)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>A.B.V.P:</b> $abvp ($per_abvp)
		
		</p>


		<p style='background:#1abc9c; color:white; padding:10px; width:500px;'>

		
		</center>


	
	</div>

	
	";

	


	

}

?>

</div>

<div style="background-color:#1abc9c;color:white;padding:20px;height:500%;">

</div>


</body>
</html>