<?php
  	session_start();
 	  include('db_connect.php');
  	$ssn=$_POST['ssn'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $party=$_POST['party'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $phone=$_POST['phone'];
    $mysqli=new mysqli($db_host,$db_user,$db_pass,$db_name);
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if($result_username = $mysqli->query("SELECT * FROM users WHERE username='$username'")){
      //printf("Select returned %d rows.\n", $result->num_rows);
      $row_cnt = $result_username->num_rows;
    }
    if($result_username){
        if($row_cnt>0){
            $_SESSION['unique_username']=true;
            session_write_close();
            header("location: register.php");
            exit();
        }
    }
  	$mysqli->query("INSERT INTO users(SSN,username,password,first_name,last_name,DOB,party,street,city,state,zip,phone)
        VALUES('$ssn','$username','$password','$firstname','$lastname','$dob','$party','$street','$city','$state','$zip','$phone')");
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.location='/~santokis/cs361/election/login.php'</script>";
?>