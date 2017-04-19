<?php
    session_start();  
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_USER_NAME']);
?>

<script>
    function validation() {
        var username=document.forms["login"]["username"].value;
        var password=document.forms["login"]["password"].value;
        if(username==null || username==""){
            alert("Please enter your Username");
            return false;
        }
        else if(password==null || password==""){
            alert("Please enter your Password");
            return false;
        }
    }
</script>

<!DOCTYPE HTML>
<html>
<body>
    <form name="login" action="login_exec.php" onsubmit="return validation()" method="post">
    <input class="login" name="username" type="text" placeholder="Username"><br>
    <input class="login" name="password" type="password" placeholder="Password"><br><br>
    <?php
        if(isset($_SESSION['invalid'])){
            echo "<script>alert('Invalid username/password')</script>";
        }
        unset($_SESSION['invalid']);
    ?>
    <input class="login" type="submit" value="Login"> 
    <a class="login" href="register.php">Register</a>
    </form>
</body>
</html>