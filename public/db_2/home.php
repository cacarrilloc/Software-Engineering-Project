<?php
    session_start();
    include('db_connect.php');
    include('login_check.php');
    $id=$_SESSION['SESS_MEMBER_ID'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $user_db=$mysqli->query("SELECT * FROM users WHERE id='$id'");
    while($user_row=mysqli_fetch_array($user_db,MYSQLI_BOTH)){
        $user_username=$user_row['username'];
        $user_firstname=$user_row['first_name'];
        $user_lastname=$user_row['last_name'];
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "UTF-8">
    <title>home.php</title>
</head>
<body>
    <div class="links">
        <a href="ballot.php">Ballot</a> | 
        <a href="home.php">Profile</a> | 
        <a href="login.php">Logout</a>
    </div>
    <div class="container">
        <h2>Profile</h2>
        <div><b>Username: </b><?php echo $user_username?></div><br>
        <div><b>Firstname: </b><?php echo $user_firstname?></div><br>
        <div><b>Lastname: </b><?php echo $user_lastname?></div><br>
    </div>
</body>
</html>