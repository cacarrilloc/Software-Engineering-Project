<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "UTF-8">
    <title>ballot.php</title>
</head>
<body>
    <div>
        <a href="ballot.php">Ballot</a> | 
        <a href="home.php">Profile</a> | 
        <a href="login.php">Logout</a>
    </div>
    <div>
        <h2>Ballot</h2>
        <?php
            session_start();
            include('db_connect.php');
            include('login_check.php');
            $user=$_SESSION['SESS_USER_NAME'];
            $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
            
            if($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
            
            $ballot_db=$mysqli->query("SELECT * FROM users_ballot WHERE user_id=(SELECT id FROM users WHERE username='$user')");

            if($ballot_db){
                $row_cnt=$ballot_db->num_rows;
            }
            
            if($row_cnt==0){
                echo "<a href='ballot_exec.php'>New Ballot</a><br>";
            }
            else{
                echo "<a href='ballot_update.php'>Update Ballot</a><br>";
            }

            echo "<table>";
            echo "<tr><th>Region</th>";
            echo "<th>Name</th>";
            echo "<th></th></tr>";

            while($ballot_row=mysqli_fetch_array($ballot_db, MYSQLI_BOTH)){
                //oklahoma
                echo "<tr><td>Oklahoma</td>";
                echo "<td>".$ballot_row['oklahoma']."</td></tr>";

                //illinois
                echo "<tr><td>Illinois</td>";
                echo "<td>".$ballot_row['illinois']."</td>";

                //wisconsin
                echo "<tr><td>Wisconsin</td>";
                echo "<td>".$ballot_row['wisconsin']."</td>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>