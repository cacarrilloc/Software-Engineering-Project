<?php
	session_start();
 	include('db_connect.php');
 	$user=$_SESSION['SESS_USER_NAME'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "UTF-8">
    <title>ballot_exec.php</title>
</head>
<body>
    <div class="links">
        <a href="ballot.php">Ballot</a> | 
        <a href="home.php">Profile</a> | 
        <a href="login.php">Logout</a>
    </div>
    <div class="container">
		<form name="ballot" action="details_exec.php" onsubmit="return validation()" method="post">
        <fieldset>
            <p><b> Oklahoma Senate: </b></p>
                <label>
                    <input type="radio" name="oklahoma" id="president" value="James Inhofe"/>James Inhofe
                </label><a href="https://projectb-jnic1989.c9users.io/inhofe">(more info)</a><br><br>
                <label>
                    <input type="radio" name="oklahoma" id="president" value="Don Nickles"/>Don Nickles
                </label><a href="https://projectb-jnic1989.c9users.io/nickles">(more info)</a><br><br>
        </fieldset> <br>

        <fieldset>
            <p><b> Illinois Senate: </b></p>
                <label>
                    <input type="radio" name="illinois" id="senator" value="Richard Durbin"/>Richard Durbin
                </label><a href="https://projectb-jnic1989.c9users.io/durbin">(more info)</a><br><br>
                <label>
                    <input type="radio" name="illinois" id="senator" value="Peter Fitzgerald"/>Peter Fitzgerald
                </label><a href="https://projectb-jnic1989.c9users.io/fitzgerald">(more info)</a><br><br>
        </fieldset> <br>

        <fieldset>
            <p><b> Wisconsin Senate: </b></p>
                <label>
                    <input type="radio" name="wisconsin" id="representative" value="Herbert Kohl"/>Herbert Kohl
                </label><a href="https://projectb-jnic1989.c9users.io/kohl">(more info)</a><br><br>
                <label>
                    <input type="radio" name="wisconsin" id="representative" value="Russell Feingold"/>Russell Feingold
                </label><a href="https://projectb-jnic1989.c9users.io/feingold">(more info)</a><br><br>
        </fieldset> <br>
    	<input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>