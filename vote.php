			   /*-----Cast_Vote----*/
<?php
session_start();
?>
<!doctype html> 
<html>
	<head>
		<title>Online Voting System</title>
		<!--<?php include 'homex.php';?>-->
	
<style type="text/css">
	
body {padding:0; margin:0;}

.container,a{width:1000px; background:white; margin:0 auto; padding:10px;}

img {padding:20px; border-radius:100%; border:4px solid white;}

img:hover {background:orange;}

input {margin:30px;}

</style>
	</head>
	
<body> 

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1>Which Party Do You Want to Vote Today?</h2></div>

	<a style="font-size:125%;" href="logout.php">Logout</a>

<div class="container">

<form action="vote.php" method="post" align="center">  
	
	<input type="submit" name="bjp" value="Vote For B.J.P"/> 
	
	<input type="submit" name="congress" value="Vote For CONGRESS"/> 
	
	
	<input type="submit" name="abvp" value="Vote For A.B.V.P"/> 
	

</form>
<?php 
$con = mysqli_connect("localhost","root","","users_db");
echo "WELCOME          " . $_SESSION['voter_id'] . ".<br>";

if(isset($_POST['bjp'])){
	
	$vote_bjp = "update players set bjp=bjp+1";
	
	$run_bjp = mysqli_query($con, $vote_bjp);
	
	if($run_bjp){
	
	echo "<script>alert('Your Vote Has Been Cast to BJP!')</script>";
	echo "<script>window.open('home.php','_self')</script>";
	
	}

}

else if(isset($_POST['congress'])){
	
	$vote_congress = "update players set congress=congress+1";
	
	$run_congress = mysqli_query($con, $vote_congress);
	
	if($run_congress){
	
	echo "<script>alert('Your Vote Has Been Cast to CONGRESS!')</script>";
	echo "<script>window.open('home.php','_self')</script>";
	
	}
}

else if(isset($_POST['abvp'])){
	
	$vote_abvp = "update players set abvp=abvp+1";
	
	$run_abvp = mysqli_query($con, $vote_abvp);
	
	if($run_abvp){
	echo "<script>alert('Your Vote Has Been Cast to ABVP!')</script>";
	echo "<script>window.open('home.php','_self')</script>";
	}
}
?>

</div>

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h3><marquee>If You Are Not Interested In Any Party,CLick Logout</marquee></h3></div>


</body>
</html>