<?php
    $db_host="oniddb.cws.oregonstate.edu";
	$db_user="carrilca-db";
	$db_pass="FyCZ946fgVFJu6ju";
	$db_name="carrilca-db";	
	$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
	if($mysqli->connect_errno){
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	if($result=$mysqli->query("SELECT DATABASE()")){
	    $row=$result->fetch_row();
	    //printf("Default database is %s.\n", $row[0]);
	    $result->close();
	}
	$mysqli->close();
?>