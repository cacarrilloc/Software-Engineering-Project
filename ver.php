<?php
    //set db creds
    include 'template_prepend.php';
	include 'log_in_check.php';
	include 'db_connect.php';
    $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);
?>
<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO VERIFY YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
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
        <h1 class="page-header"><strong>VERIFY YOUR INFORMATION</strong></h1>
        <h4>Please select the city in which you are currently residing for purposes of verifying your identity.</h4>
    </div>
    
    <?php
      
    $_SESSION['president'] = $_POST['president'];
    $_SESSION['senator'] = $_POST['senator'];
    $_SESSION['representative'] = $_POST['representative'];
    
    //create array of cities from user tables, scramble them up and ask user to select city they live in
    $cities = array();
    $numCities=5;
    if(!($stmt = $mysqli->prepare("SELECT DISTINCT city FROM users"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($city)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){
        array_push($cities, $city);
    }
    $stmt->close();
    $rand_cities = array_rand($cities, $numCities);
    for ($i=0; $i<$numCities; $i++)
    {
        $rand_cities[$i]=$cities[$rand_cities[$i]];
    }
    
    $_SESSION['guesscities']=$rand_cities;
    //if username is not set for session, set to a user account; will change to error message after testing is completed
    /*
    if (!isset($_SESSION['username']))
    {
        $_SESSION['username']="SaraSmith";
    }
    */
    ?>
    <form method="post" action="ver_exec.php">
        <fieldset class="form-group">
        <?php
        for ($i=0; $i<$numCities; $i++)
        {
            echo "<input type='radio' name='usercity' value=" . $rand_cities[$i] . "> " . $rand_cities[$i] . "<br>";
        }
        ?>
        <input type="radio" name="usercity" value="none"> None of the above
        </fieldset>
        <input type="submit" class="btn btn-default" name="submitcity" value="Submit Authentication">
    </form>
</div>
<?php
	include 'template_append.php';
?>
</body>
</html>