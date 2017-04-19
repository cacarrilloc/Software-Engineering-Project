<?php
	include 'template_prepend.php';
	/*7/28 Stephanie: Added query and PHP to populate fields with default user information*/
	session_start();
	$user=$_SESSION['SESS_USER_NAME'];
	   $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName,$dbPort);
    if($mysqli->connect_errno) {
        echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    //this is for testing; before releasing, need to change to throw error instead of defaulting to Sara Smith user
	if(!($stmt = $mysqli->prepare("SELECT SSN, first_name, last_name, DOB, party, street, city, state, zip, phone, password FROM users WHERE username=?"))){
    	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
    }
    if(!($stmt->bind_param("s", $user)))
    {
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
    
    if(!$stmt->execute()){
    	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($ssn, $fName, $lName, $DOB, $party, $street, $city, $state, $zip, $phone, $password)){
    	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    while($stmt->fetch()){
        
    }
    $stmt->close();
?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO UPDATE YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<div class="giveMePadding">
	<div class="row">
		<div>
			<h1 class="page-header"><strong>UPDATE YOUR PERSONAL INFORMATION</strong></h1>
			<h4>Enter the information you want to update into the corresponding fields. Then click on the "Update Info" button. Please do NOT falsify your identity. You may incur in a federal violation!</h4>
		</div>
	</div>

    <div class="row addNew">
			<form method="POST" action="update_user.php">
            
			  <fieldset class="form-group">
				<label for="firstName">Update First Name: </label>
				<input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $fName ?>">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="lastName">Update Last Name: </label>
				<input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $lName ?>">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="DOB">Update Date of Birth: </label>
				<input type="date" class="form-control" name="DOB" id="DOB" value="<?php echo $DOB ?>">
			  </fieldset>

              <fieldset class="form-group">
				<label for="party">Update Political Party: </label>
				<input type="text" class="form-control" name="party" id="party" value="<?php echo $party ?>">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userStreet">Update Street Address: </label>
				<input type="text" class="form-control" name="userStreet" id="userStreet" value="<?php echo $street ?>">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userCity">Update City: </label>
				<input type="text" class="form-control" name="userCity" id="userCity" value="<?php echo $city ?>">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userState">Update State: </label>
				<input type="text" class="form-control" name="userState" id="userState" value="<?php echo $state ?>">
			  </fieldset>

              <fieldset class="form-group">
				<label for="userZip">Update Zip Code: </label>
				<input type="number" class="form-control" name="userZip" id="userZip" value="<?php echo $zip ?>">
			  </fieldset>

              <fieldset class="form-group">
				<label for="userPhone">Update Phone Number: </label>
				<input type="tel" class="form-control" name="userPhone" id="userPhone" value="<?php echo $phone ?>">
			  </fieldset>

              <fieldset class="form-group">
				<label for="username"> Update Username: </label>
				<input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username'] ?>">
			  </fieldset>

              <fieldset class="form-group">
				<label for="password"> Update Password: </label>
				<input type="password" class="form-control" name="password" id="password" value="<?php echo $password ?>">
			  </fieldset>

			  <input type="submit" class="btn btn-default" value="Update Info" id="updateUserButton"></input>
			 </form>
    </div>
	</br>


<?php
	include 'template_append.php';
?>