<?php
	include 'template_prepend.php';

    $ssn=$_POST['ssn'];
    $party=$_POST['party'];
  	$username=$_POST['username'];
  	$password=$_POST['password'];
  	$firstName=$_POST['firstName'];
  	$lastName=$_POST['lastName'];
  	$DOB=$_POST['DOB'];
    $userStreet=$_POST['userStreet'];
    $userCity=$_POST['userCity'];
    $userState=$_POST['userState'];
    $userZip=$_POST['userZip'];
    $userPhone=$_POST['userPhone'];

    $mysqli=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName);

    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

  	$mysqli->query("INSERT INTO users(SSN,party,username,password,first_name,last_name,DOB,street,city,state,zip,phone) 
                  VALUES('$ssn','$party','$username','$password','$firstName','$lastName','$DOB','$userStreet','$userCity','$userState','$userZip','$userPhone')");

    echo "<p>Your registration has been successfully completed!!</p>";

?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO ADD YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<div>
<?php 
	if(isset($_POST["ssn"])) {
		
	$query = <<<stmt
	SELECT SSN, username, first_name, last_name, DOB, party, street, city, state, zip, phone, password FROM users WHERE ssn =?;
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
					
            echo '<h2 class="sub-header">Personal Data Entered</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SSN</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Party</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Phone</th>
                            <th>password</th>
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

    <div>
        <form method="POST" action="ballot_page.php">
            <input type="submit" class="btn btn-default" value="Continue" id="ballotPage"></input>
        </form>
    </div>
	</br>

</div>

<?php
	include 'template_append.php';
?>







