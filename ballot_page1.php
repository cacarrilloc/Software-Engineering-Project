<?php
	include 'template_prepend.php';
	include('log_in_check.php');
	include 'db_connect.php';
	$user=$_SESSION['SESS_USER_NAME'];
?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO SUBMIT YOUR BALLOT:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<div class="giveMePadding">
	<div class="row">
		<div>
			<h1 class="page-header"><strong>CHOOSE YOUR CANDIDATES FOR 2020 ELECTIONS</strong></h1>
			<h4>Select an option for each electoral position. Each option represents a different candidate from your political party EXCEPT for the presidential candidates, which are from different political parties. Thank you for participating in our democracy!!</h4>
		</div>
	</div>
</div>
<br><br>
<?php
    //pull data where 
    if(!($stmt = $mysqli->prepare("SELECT tlimit, tlength, duties FROM offices WHERE name LIKE '%U.S. Senator%'"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($tlimit, $tlength, $duties)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){
        
    }
    $stmt->close();
    $tasks=explode("%", $duties);
    if (!$tlimit)
    {
        $tlimit = "Unlimited";
    }

?>

<script>
    function popSenInfo() {
        alert("U.S. Senator Information \nTerm Length: <?php echo $tlength; ?> years \nTerm Limit: <?php echo $tlimit; ?> terms\nDuties: <?php foreach ($tasks as $task) { echo "- " . $task . "\\n"; } ?>");
    }
</script>
<div class="giveMePadding">
	<div class="row">
        <form method="POST" action="ver.php">
            <fieldset>
                <a><p onclick="popSenInfo()"><b> Oklahoma U.S. Senator: </b></p></a>
                <label>
                    <input type="radio" name="president" id="president" value="James Inhofe"/>James Inhofe
                </label><a href="https://projectb-jnic1989.c9users.io/inhofe" target="_blank">(more info)</a><br><br>
                <label>
                    <input type="radio" name="president" id="president" value="Don Nickles"/>Don Nickles
                </label><a href="https://projectb-jnic1989.c9users.io/nickles" target="_blank">(more info)</a><br><br>
            </fieldset> <br>

             <fieldset>
                <a><p onclick="popSenInfo()"><b> Illinois U.S. Senator: </b></p></a>
                <label>
                    <input type="radio" name="senator" id="senator" value="Richard Durbin" />Richard Durbin
                </label><a href="https://projectb-jnic1989.c9users.io/durbin" target="_blank">(more info)</a><br><br>
                <label>
                    <input type="radio" name="senator" id="senator" value="Peter Fitzgerald" />Peter Fitzgerald
                </label><a href="https://projectb-jnic1989.c9users.io/fitzgerald" target="_blank">(more info)</a><br><br>
            </fieldset> <br>

             <fieldset>
                <a><p onclick="popSenInfo()"><b> Wisconsin U.S. Senator: </b></p></a>
                <label>
                    <input type="radio" name="representative" id="representative" value="Herbert Kohl" />Herbert Kohl
                </label><a href="https://projectb-jnic1989.c9users.io/kohl" target="_blank">(more info)</a><br><br>
                <label>
                    <input type="radio" name="representative" id="representative" value="Russell Feingold" />Russell Feingold
                </label><a href="https://projectb-jnic1989.c9users.io/feingold" target="_blank">(more info)</a><br><br>
            </fieldset> <br>

            <input type="submit" class="btn btn-default" value="Submit Candidates" id="candidatesButton"></input>
        </form>
        <br>
        <form method="POST" action="index.php">
            <input type="submit" class="btn btn-default" value="Exit" id="exitPage"></input>
        </form>

    </div>
</div>
</br>


<?php
	include 'template_append.php';
?>