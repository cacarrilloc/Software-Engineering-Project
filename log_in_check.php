<?php
    if(!isset($_SESSION['SESS_USER_NAME']) || (trim($_SESSION['SESS_USER_NAME']) == '')){
        header("location: log_in.php");
		exit();
    }
?>