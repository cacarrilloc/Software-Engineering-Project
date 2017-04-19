<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO VERIFY YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<?php
    include 'template_prepend.php';
    include 'log_in_check.php';
	include 'db_connect.php';
	$user=$_SESSION['SESS_USER_NAME'];
	//echo "<p>".$_SESSION['president']."</p>";
	//echo "<p>".$_SESSION['senator']."</p>";
	//echo "<p>".$_SESSION['representative']."</p>";
	$pres=$_SESSION['president'];
	$sen=$_SESSION['senator'];
	$rep=$_SESSION['representative'];
	$mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
?>
 <!DOCTYPE html PUBLIC "//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Electronic Vote System</title>
</head>
<body>
<div class="giveMePadding">
    <div class="row">
    
    <?php
    //start session
    $success=0;
    //get correct city from db
    if(!($stmt = $mysqli->prepare("SELECT city FROM users WHERE username=?"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s", $user)))
    {
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($usercity)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){
        
    }
    $stmt->close();
    
    $genCities=$_SESSION['guesscities'];
    $ballot_db=$mysqli->query("SELECT * FROM userBallot WHERE id=(SELECT id FROM users WHERE username='$user')");
    if($ballot_db){
        $row_cnt=$ballot_db->num_rows;
    }
    //echo "<p>".$row_cnt."</p>";
    
    //check generated city array to see if user's city was listed
    if (in_array($usercity, $genCities))
    {
        $success=1;
    }
    //if city was in list
    if ($success==1)
    {
        if ($usercity==$_POST['usercity'])
        {
            if($row_cnt==0){
                $mysqli->query("INSERT INTO userBallot(id,oklahoma,illinois,wisconsin) 
		        VALUES((SELECT id FROM users WHERE username='$user'),'$pres','$sen','$rep')");
            
                echo "<h1 class=\"page-header\"><strong>Successful authentication!</strong></h1>";
                
                /*
                <h4><p>Your identity has been authenticated!</p><p>Please review your ballot selection below: </p></h4><br>";
        
                while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                    echo "<p><strong>President:</strong>".$ballot_row['oklahoma']."</p><br>";
                    echo "<p><strong>Senate:</strong>".$ballot_row['illinois']."</p><br>";
                    echo "<p><strong>Representative:</strong>".$ballot_row['wisconsin']."</p><br>";
                }
                */
                
                echo "<form method=\"POST\" action=\"ballot_view.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"View Your Ballot\" id=\"View Ballot\"></input></form>
                <form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Edit Your Ballot\" id=\"Edit Ballot\"></input></form>
                <form method=\"POST\" action=\"submit_ballot.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Submit Your Ballot\" id=\"Submit Ballot\"></input></form>";
            }
            else{
                $mysqli->query("UPDATE userBallot SET oklahoma='$pres',illinois='$sen',wisconsin='$rep' WHERE id=(SELECT id FROM users WHERE username='$user')");
                
                echo "<h1 class=\"page-header\"><strong>Successful authentication!</strong></h1>";
                
                /*
                <h4><p>Your identity has been authenticated!</p><p>Please review your ballot selection below: </p></h4><br>";
        
                while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                    echo "<p><strong>President:</strong>".$ballot_row['oklahoma']."</p><br>";
                    echo "<p><strong>Senate:</strong>".$ballot_row['illinois']."</p><br>";
                    echo "<p><strong>Representative:</strong>".$ballot_row['wisconsin']."</p><br>";
                }
                */
                
                echo "<form method=\"POST\" action=\"ballot_view.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"View Your Ballot\" id=\"View Ballot\"></input></form>
                <form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Edit Your Ballot\" id=\"Edit Ballot\"></input></form>
                <form method=\"POST\" action=\"submit_ballot.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Submit Your Ballot\" id=\"Submit Ballot\"></input></form>";
            }
        }
        else 
        {
            echo "<h1 class=\"page-header\"><strong>Authentication failed!</strong></h1></h4><form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Go Back to Ballot\" id=\"log-in\"></input></form>";
        }
    }
    //city was not in the list displayed
    else 
    {
        //check if user selected none of the above
        if ($_POST['usercity']=="none")
        {
            if($row_cnt==0){
                $mysqli->query("INSERT INTO userBallot(id,oklahoma,illinois,wisconsin) 
		        VALUES((SELECT id FROM users WHERE username='$user'),'$pres','$sen','$rep')");
            
                echo "<h1 class=\"page-header\"><strong>Successful authentication!</strong></h1>";
                
                /*
                <h4><p>Your identity has been authenticated!</p><p>Please review your ballot selection below: </p></h4><br>";
        
                while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                    echo "<p><strong>President:</strong>".$ballot_row['oklahoma']."</p><br>";
                    echo "<p><strong>Senate:</strong>".$ballot_row['illinois']."</p><br>";
                    echo "<p><strong>Representative:</strong>".$ballot_row['wisconsin']."</p><br>";
                }
                */
                
                echo "<form method=\"POST\" action=\"ballot_view.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"View Your Ballot\" id=\"View Ballot\"></input></form>
                <form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Edit Your Ballot\" id=\"Edit Ballot\"></input></form>
                <form method=\"POST\" action=\"submit_ballot.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Submit Your Ballot\" id=\"Submit Ballot\"></input></form>";
            }
            else{
                $mysqli->query("UPDATE userBallot SET oklahoma='$pres',illinois='$sen',wisconsin='$rep' WHERE id=(SELECT id FROM users WHERE username='$user')");
                
                echo "<h1 class=\"page-header\"><strong>Successful authentication!</strong></h1>";
                
                /*
                <h4><p>Your identity has been authenticated!</p><p>Please review your ballot selection below: </p></h4><br>";
        
                while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                    echo "<p><strong>President:</strong>".$ballot_row['oklahoma']."</p><br>";
                    echo "<p><strong>Senate:</strong>".$ballot_row['illinois']."</p><br>";
                    echo "<p><strong>Representative:</strong>".$ballot_row['wisconsin']."</p><br>";
                }
                */
                
                echo "<form method=\"POST\" action=\"ballot_view.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"View Your Ballot\" id=\"View Ballot\"></input></form>
                <form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Edit Your Ballot\" id=\"Edit Ballot\"></input></form>
                <form method=\"POST\" action=\"submit_ballot.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Submit Your Ballot\" id=\"Submit Ballot\"></input></form>";
            }
                
        }
        //user didn't select none of the above, so they picked the wrong answer
        else 
        {
            echo "<h1 class=\"page-header\"><strong>Authentication failed!</strong></h1></h4><form method=\"POST\" action=\"ballot_page.php\"><input type=\"submit\" class=\"btn btn-default\" value=\"Go Back to Ballot\" id=\"log-in\"></input></form>";
        }
    }
    //no longer need array of cities; erase variable from session
    unset($_SESSION['guesscities']);
    
    ?>
    </div>
</div>
<?php
	include 'template_append.php';
?>
</body>
</html>