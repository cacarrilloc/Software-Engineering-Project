<?php
	session_start();
 	include('db_connect.php');
 	$user=$_SESSION['SESS_USER_NAME'];
 	$oklahoma=$_POST['oklahoma'];
 	$illinois=$_POST['illinois'];
 	$wisconsin=$_POST['wisconsin'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
	$mysqli->query("INSERT INTO users_ballot(user_id,oklahoma,illinois,wisconsin) 
		VALUES((SELECT id FROM users WHERE username='$user'),'$oklahoma','$illinois','$wisconsin')");
 	header("location: ballot.php");
?>