<!DOCTYPE html>

<?php
	include 'db_connect.php';
	date_default_timezone_set('America/Los_Angeles');
	ini_set('session.save_path', getcwd().'/tmp');
	session_start();
	if(isset($_SESSION['SESS_USER_NAME']))
	{
		$user=$_SESSION['SESS_USER_NAME'];
	}
	else $user="none";
?>

<!--http://getbootstrap.com/examples/dashboard/ -->
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Electronic Vote System</title>
		
		<!-- Latest compiled and minified CSS for Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Custom css file -->
		<link rel="stylesheet" href="public/css/style.css">
	</head>
	
	
	<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Electronic Vote System</a>
        </div>
      
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul id="menus" class="nav nav-sidebar">
            <li><a href="index.php"><h5>Home</h5></a></li>
            <?php
              $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
            
              if($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
              }
              
              $ballot_db=$mysqli->query("SELECT * FROM userBallot WHERE id=(SELECT id FROM users WHERE username='$user')");

              if($ballot_db){
                $row_cnt=$ballot_db->num_rows;
              }
              
              if (!isset($_SESSION['SESS_USER_NAME'])){
                echo "<li><a href=\"log_in.php\"><h5>Log In</h5></a></li>";
                echo "<li><a href=\"create_account.php\"><h5>Create Account</h5></a></li>";
              }
              else{
                if($row_cnt==0){
                  echo "<li><a href=\"ballot_page.php\"><h5>New Ballot</h5></a></li>";
                }
                else{
                  echo "<li><a href=\"ballot_view.php\"><h5>View Ballot</h5></a></li>";
                  echo "<li><a href=\"ballot_page.php\"><h5>Update Ballot</h5></a></li>";
                }
                echo "<li><a href=\"log_out.php\"><h5>Log Out</h5><h5>(".$user.")</h5></a></li>";
              }
            ?>
            
          </ul>
        </div>
        
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
