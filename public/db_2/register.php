<?php
    session_start();
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_USER_NAME']);
?>

<script>
    function validation() {
        var ssn=document.forms["register"]["ssn"].value;
        var username=document.forms["register"]["username"].value;
        var password=document.forms["register"]["password"].value;
        var firstname=document.forms["register"]["firstname"].value;
        var lastname=document.forms["register"]["lastname"].value;
        var dob=document.forms["register"]["dob"].value;
        var party=document.forms["register"]["party"].value;
        var street=document.forms["register"]["street"].value;
        var city=document.forms["register"]["city"].value;
        var state=document.forms["register"]["state"].value;
        var zip=document.forms["register"]["zip"].value;
        var phone=document.forms["register"]["phone"].value;
        if(ssn==null || ssn==""){
            alert("Please enter your SSN");
            return false;
        }
        else if(username==null || username==""){
            alert("Please enter your Username");
            return false;
        }
        else if(password==null || password==""){
            alert("Please enter your Password");
            return false;
        }
        else if(firstname==null || firstname==""){
            alert("Please enter your First Name");
            return false;
        }
        else if(lastname==null || lastname==""){
            alert("Please enter your Last Name");
            return false;
        }
        else if(dob==null || dob==""){
            alert("Please enter your DOB");
            return false;
        }
        else if(party==null || party==""){
            alert("Please enter your Political Party");
            return false;
        }
        else if(street==null || street==""){
            alert("Please enter your Street");
            return false;
        }
        else if(city==null || city==""){
            alert("Please enter your City");
            return false;
        }
        else if(state==null || state==""){
            alert("Please enter your State");
            return false;
        }
        else if(zip==null || zip==""){
            alert("Please enter your Zip");
            return false;
        }
        else if(phone==null || phone==""){
            alert("Please enter your Phone");
            return false;
        }
    }
</script>

<!DOCTYPE HTML>
<html>
<body>
    <h2>Registration</h2>
    <form name="register" action="register_exec.php" onsubmit="return validation()" method="post">
        <input class="login" type="text" name="ssn" placeholder="SSN"><br>
        <input class="login" type="text" name="username" placeholder="Username"><br>
        <input class="login" type="password" name="password" placeholder="Password"><br>
        <input class="login" type="text" name="firstname" placeholder="First Name"><br>
        <input class="login" type="text" name="lastname" placeholder="Last Name"><br>
        <input class="login" type="date" name="dob" placeholder="DOB"><br>
        <input class="login" type="text" name="party" placeholder="Political Party"><br>
        <input class="login" type="text" name="street" placeholder="Street"><br>
        <input class="login" type="text" name="city" placeholder="City"><br>
        <input class="login" type="text" name="state" placeholder="State"><br>
        <input class="login" type="text" name="zip" placeholder="Zip"><br>
        <input class="login" type="text" name="phone" placeholder="Phone"><br>
        <?php
            if(isset($_SESSION['unique_username'])){
                echo "<script>alert('Username already exists')</script>";
            }
            unset($_SESSION['unique_username']);
        ?>
        <input class="login" type="submit" value="Submit"> 
        <a class="login" href="http://web.engr.oregonstate.edu/~santokis/cs361/election/login.php">Return to Login</a>
    </form>
</body>
</html>