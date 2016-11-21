			/*----Vote_Count_Page----*/
<!doctype html> 
<html>
	<head>
		<title>Online Voting System</title>
	<?php include 'home.php';?>
<style type="text/css">
	
body {padding:0; margin:0;}

.container {width:1000px; background:blue; margin:0 auto; padding:10px;}

img {padding:20px; border-radius:100%; border:4px solid white;}

img:hover {background:orange;}

input {margin:30px;}

</style>
	</head>
	
<body> 

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1>Which Party Do You Want to Vote Today?</h2></div>

<div class="container">

<form action="voting.php" method="post" align="center">  
	
	<input type="submit" name="bjp" value="Vote For B.J.P"/> 
	
	<input type="submit" name="congress" value="Vote For CONGRESS"/> 
	
	
	<input type="submit" name="abvp" value="Vote For A.B.V.P"/> 
	

</form>
<a href="home.php">go to home page</a>
<?php 
$con = mysqli_connect("localhost","root","","users_db");


if(isset($_POST['bjp'])){
	
	$vote_bjp = "update players set bjp=bjp+1";
	
	$run_bjp = mysqli_query($con, $vote_bjp);
	
	if($run_bjp){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to B.J.P!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	
	
	}

}

if(isset($_POST['congress'])){
	
	$vote_congress = "update players set congress=congress+1";
	
	$run_congress = mysqli_query($con, $vote_congress);
	
	if($run_congress){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to CONGRESS!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	
	}
}

if(isset($_POST['abvp'])){
	
	$vote_abvp = "update players set abvp=abvp+1";
	
	$run_abvp = mysqli_query($con, $vote_abvp);
	
	if($run_abvp){
	echo "<h2 align='center'>Your Vote Has Been Cast to A.B.V.P!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	}
}

if(isset($_GET['results'])){

	$get_votes = "select * from players";
	
	$run_votes = mysqli_query($con, $get_votes); 
	
	$row_votes = mysqli_fetch_array($run_votes); 
	
	$bjp = $row_votes['bjp'];
	$congress = $row_votes['congress'];
	$abvp = $row_votes['abvp']; 
	
	$count = $bjp+$congress+$abvp; 
	
	$per_bjp = round($bjp*100/$count) . "%";
	$per_congress = round($congress*100/$count) . "%";
	$per_abvp = round($abvp*100/$count) . "%";
	
	echo "
	<div style='background:orange; padding:10px; text-align:center;'>
		 
		<center>
		<h2>Results So Far:</h2>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>B.J.P:</b> $bjp ($per_bjp)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>CONGRESS:</b> $congress ($per_congress)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>A.B.V.P:</b> $abvp ($per_abvp)
		
		</p>
		</center>
	
	</div>
	
	
	";

}

?>

</div>

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1>Created by: Prakash Ranjan</h1></div>


</body>
</html>