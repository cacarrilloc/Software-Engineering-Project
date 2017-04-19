<?php
	session_start();
 	include('db_connect.php');
 	$user=$_SESSION['SESS_USER_NAME'];
 	$oklahoma=$_POST['oklahoma'];
 	$illinois=$_POST['illinois'];
 	$wisconsin=$_POST['wisconsin'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
	$mysqli->query("UPDATE users_ballot SET oklahoma='$oklahoma',illinois='$illinois',wisconsin='$wisconsin'");
 	header("location: ballot.php");
?>