<?php
    include 'template_prepend.php';
    include 'log_in_check.php';
	include 'db_connect.php';
	$user=$_SESSION['SESS_USER_NAME'];
	$mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
    $ballot_db=$mysqli->query("SELECT * FROM userBallot WHERE id=(SELECT id FROM users WHERE username='$user')");
?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO SUBMIT YOUR BALLOT:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

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
        echo "<h1 class=\"page-header\"><strong>Your Ballot</strong><br>";
        if(!$ballot_db){
        echo "<h4>You have not submitted any ballots!</h4>";
        }
        else
        {
            while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                echo "<h4><strong>Oklahoma U.S. Senator:</strong>".$ballot_row['oklahoma']."</h4><br>";
                echo "<h4><strong>Illinois U.S. Senator:</strong>".$ballot_row['illinois']."</h4><br>";
                echo "<h4><strong>Wisconsin U.S. Senator:</strong>".$ballot_row['wisconsin']."</h4><br>";
            }
        }
        ?>
    </div>
</div>
<?php
	include 'template_append.php';
?>
</body>
</html>