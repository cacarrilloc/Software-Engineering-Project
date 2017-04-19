<?php
	include 'template_prepend.php';
	
?>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO UPDATE YOUR INFORMATION:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<div>
<?php
$query;
if(isset($_POST["ssn"])) {
	$query = <<<stmt
	SELECT id FROM users WHERE SSN=?;
stmt;
	$my_stmt = $dbConnection->prepare($query);
	$p1 = $_POST["ssn"];
    
	$my_stmt->bind_param('s', $p1);
	$my_stmt->execute();
	$my_stmt->store_result();
	$my_stmt->bind_result($id);

	if($my_stmt->num_rows) {

        $p2 = "";
		if(isset($_POST["firstName"])) {
			$p2 = $_POST["firstName"];
		}
        $p3 = "";
		if(isset($_POST["lastName"])) {
			$p3 = $_POST["lastName"];
		}
        $p4 = "";
		if(isset($_POST["DOB"])) {
			$p4 = $_POST["DOB"];
		}
		$p5 = "";
		if(isset($_POST["party"])) {
			$p5 = $_POST["party"];
		}
        $p6 = "";
		if(isset($_POST["userStreet"])) {
			$p6 = $_POST["userStreet"];
		}
        $p7 = "";
		if(isset($_POST["userCity"])) {
			$p7 = $_POST["userCity"];
		}
        $p8 = "";
		if(isset($_POST["userState"])) {
			$p8 = $_POST["userState"];
		}
        $p9 = "";
		if(isset($_POST["userZip"])) {
			$p9 = $_POST["userZip"];
		}
        $p10 = "";
		if(isset($_POST["userPhone"])) {
			$p10 = $_POST["userPhone"];
		}
        $p11 = "";
		if(isset($_POST["username"])) {
			$p11 = $_POST["username"];
		}
        $p12 = "";
		if(isset($_POST["password"])) {
			$p12 = $_POST["password"];
		}
       
		$query = <<<stmt
		UPDATE users SET first_name=?, last_name=?, DOB=?, party=?, street=?, city=?, state=?, zip=?, phone=?, username=?, password=? WHERE SSN=?;
stmt;
		$my_stmt = $dbConnection->prepare($query);
		$my_stmt->bind_param('ssssssssssss', $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p1);
		$my_stmt->execute();
		echo "<p>Your information has been successfully updated!</p>";
	
	} else {
		echo "<p> We could not find your credential in our database</p>";
	}

	$my_stmt->close();
}

?>


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
					
            echo '<h2 class="sub-header">Updated Data Entered</h2>
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
            <input type="submit" class="btn btn-default" value="Go to Website" id="ballotPage"></input>
        </form>
    </div>
	</br>

    <div>
        <form method="POST" action="index.php">
            <input type="submit" class="btn btn-default" value="Exit" id="exitPage"></input>
        </form>
    </div>
	</br>


</div>

<?php
	include 'template_append.php';
?>