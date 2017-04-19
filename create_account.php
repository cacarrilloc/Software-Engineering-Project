<?php
	include 'template_prepend.php';
?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO CREATE AN ACCOUNT:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<div class="giveMePadding">
	<div class="row">
		<div>
			<h1 class="page-header"><strong>CREATE YOUR ACCOUNT</strong></h1>
			<h4>This registration page allow you to create a new account. Please fill up all the fields with the correct information. Please do NOT falsify your identity. You may incur in a federal violation!</h4>
		</div>
	</div>

    <div class="row addNew">
		<a class="btn btn-default center" href="#addUser" role="button" data-toggle="collapse" id="createButton">+ Create Account</a>
		<div id="addUser" class="collapse">
			<form method="POST" action="add_user.php">

			  <fieldset class="form-group">
				<label for="firstName"> First Name: </label>
				<input type="text" class="form-control" name="firstName" id="firstName">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="lastName"> Last Name: </label>
				<input type="text" class="form-control" name="lastName" id="lastName">
			  </fieldset>

              <fieldset class="form-group">
				<label for="ssn"> SSN: </label>
				<input type="text" class="form-control" name="ssn" id="ssn" placeholder="e.g. '366-58-XXXX'">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="DOB"> Date of Birth: </label>
				<input type="date" class="form-control" name="DOB" id="DOB">
			  </fieldset>

              <fieldset class="form-group">
				<label for="party">Political Party: </label>
				<input type="text" class="form-control" name="party" id="party">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userStreet">Street Address: </label>
				<input type="text" class="form-control" name="userStreet" id="userStreet">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userCity">City: </label>
				<input type="text" class="form-control" name="userCity" id="userCity">
			  </fieldset>

			  <fieldset class="form-group">
				<label for="userState">State: </label>
				<input type="text" class="form-control" name="userState" id="userState">
			  </fieldset>

              <fieldset class="form-group">
				<label for="userZip">Zip Code: </label>
				<input type="number" class="form-control" name="userZip" id="userZip">
			  </fieldset>

              <fieldset class="form-group">
				<label for="userPhone">Phone Number: </label>
				<input type="tel" class="form-control" name="userPhone" id="userPhone">
			  </fieldset>

              <fieldset class="form-group">
				<label for="username"> Create Username: </label>
				<input type="text" class="form-control" name="username" id="username">
			  </fieldset>

              <fieldset class="form-group">
				<label for="password"> Create Password: </label>
				<input type="password" class="form-control" name="password" id="password">
			  </fieldset>

			  <input type="submit" class="btn btn-default" value="Create Account" id="adduserButton"></input>
			 </form>
		</div>
    </div>
	</br>

<?php 
	if(isset($_POST["ssn"])) {
		
	$query = <<<stmt
	SELECT SSN, first_name, last_name, DOB, party, street, city, state, zip, phone, username, password FROM users WHERE ssn =?;
stmt;
		$p1 = $_POST["ssn"];
		if (($my_stmt = $dbConnection->prepare($query))) {
					$my_stmt->bind_param('s', $p1);
					$my_stmt->execute();
					//$ab_stmt->bind_result($result);
					
					$result = $my_stmt->get_result();
					$i = 0;
					$colHeaders = array();
					$colData = array();
					while($row = mysqli_fetch_assoc($result)) {
						if($i == 0) {
							foreach($row as $colHeader => $val) {
								$colHeaders[] = $colHeader;
							}
						}
						$colData[] = $row;
						$i++;
					}
					
					echo '<h2 class="sub-header">Your Personal Data:</h2>
	  <div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
					<th>SSN</th>
					<th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Political Party</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Phone</th>
                    <th>Username</th>
			</tr>
		  </thead>
		  <tbody>';
					foreach($colData as $r) {
							echo "<tr>";
							foreach($colHeaders as $colHeader) {
								echo "<td>" . $r[$colHeader] . "</td>";
							}
							echo "</tr>";
					}
					
				echo '</tbody></table></div>';
			
				$my_stmt->close();
		}
	}
?>
	</br></br>

<?php
	include 'template_append.php';
?>