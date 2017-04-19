
<?php
    session_start();
 	include('db_connect.php');
 	$username=$_POST['username'];
	$password=$_POST['password'];
	$mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
	if($mysqli->connect_errno){
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	if($result=$mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'")){
	    //printf("Select returned %d rows.\n", $result->num_rows);
	    $row_cnt=$result->num_rows;
	}
	if($result){
		if($row_cnt>0){
			session_regenerate_id();
			$user_database=$result->fetch_assoc();
			$_SESSION['SESS_MEMBER_ID']=$user_database['id'];
			$_SESSION['SESS_USER_NAME']=$user_database['username'];
			session_write_close();
			header("location: ballot.php");
			exit();
		}
        else{
        	$_SESSION['invalid']=true;
			session_write_close();
			header("location: login.php");
			exit();
		}
	}
	header("location: login.php");
?>