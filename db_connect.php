<?php

	//Turn on error reporting
	//error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	//should be added to config file with gitignore attribute
	$dbHost = 'oniddb.cws.oregonstate.edu';
	$dbName = 'creamers-db';
	$dbUserName = 'creamers-db';
	$dbPassword = 'Pwn0YzERXgADlt9O';

	$dbConnection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);
	/*$dbHost = getenv('IP');
    $dbUserName = getenv('C9_USER');
    $dbPassword = "";
    $dbName = "c9";
    $dbPort = 3306;

    // Create connection
    $dbConnection=new mysqli($dbHost,$dbUserName,$dbPassword,$dbName,$dbPort);*/
    //$dbConnection = new mysqli($servername, $username, $password, $database, $dbport);
	if($dbConnection->connect_errno){
		echo "Connection error " . $dbConnection->connect_errno . " " . $dbConnection->connect_error;
	} 
	/*
	else {
		echo "Connection to Database established!";
	}
	*/
?>