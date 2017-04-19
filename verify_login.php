<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO VERIFY YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<?php
include 'template_prepend.php';
session_start();

$query;
//if(isset($_POST["SESS_USER_NAME"])) {
	$query = <<<stmt
	SELECT id FROM users WHERE username=? AND ssn=? AND password=?;
stmt;
	$my_stmt = $dbConnection->prepare($query);

	$p1 = $_POST["username"];
	$p2 = $_POST["ssn"];
    $p3 = $_POST["password"];
    
	$my_stmt->bind_param('sss', $p1, $p2, $p3);
	$my_stmt->execute();
	$my_stmt->store_result();
	$my_stmt->bind_result($id);

	if($my_stmt->num_rows) {
	    session_regenerate_id();
		//$user_database=$result->fetch_assoc();
		//$_SESSION['SESS_MEMBER_ID']=$user_database['id'];
		$_SESSION['SESS_USER_NAME']=$_POST['username'];
		//$_SESSION['username'] = $_POST['username'];
		echo "<p><h3>Your identity has been verified!</h3></p>";
        echo '<div> 
                <form method="POST" action="ballot_page1.php">
                    <input type="submit" class="btn btn-default" value="Continue" id="continue"></input>
                </form>
             </div>';
		$my_stmt->fetch();
		session_write_close();
	} else {
	    $_SESSION['invalid']=true;
        echo "<p><h3>Your credentials do not match our records.</h3></p>";
        echo "<p><h5>Please try again or create a new account...</h5></p>";
        echo '<div> 
                <form method="POST" action="log_in.php">
                    <input type="submit" class="btn btn-default" value="Try Again" id="tryagain"></input>
                </form>
             </div><br>';
        
        echo '<div> 
                <form method="POST" action="create_account.php">
                    <input type="submit" class="btn btn-default" value="Create a New Account" id="create"></input>
                </form>
             </div>';
        session_write_close();
	}
	$my_stmt->close();  
//}
?>

</div>

<?php
	include 'template_append.php';
?>