<?php
	include 'template_prepend.php';
    //unset($_SESSION['SESS_MEMBER_ID']);
    //unset($_SESSION['SESS_USER_NAME']);
?>

<script>
    function validation() {
        var username=document.forms["login"]["username"].value;
        var password=document.forms["login"]["password"].value;
        var ssn=document.forms["login"]["ssn"].value;
        if(username==null || username==""){
            alert("Please enter your Username");
            return false;
        }
        else if(password==null || password==""){
            alert("Please enter your Password");
            return false;
        }
        else if(ssn==null || ssn==""){
            alert("Please enter your SSN");
            return false;
        }
    }
</script>

<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("INSTRUCTIONS TO LOG INTO THE SYSTEM:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>
	 

<div class="giveMePadding">
	<div class="row">
		<div>
			<h1 class="page-header"><strong>LOG INTO YOUR ACCOUNT</strong></h1>
			<h4>Enter your credentials to have access to your account and start the voting process. You can also modify or update your personal information. Please select one of the options:</h4>
		</div>
	</div>

    <div class="row addNew">
		<a class="btn btn-default center" href="#addUser" role="button" data-toggle="collapse" id="login">+ LOG INTO YOUR ACCOUNT</a>
		<div id="addUser" class="collapse">
			<form method="POST" form name="login" onsubmit="return validation()" action="verify_login.php">
			  <fieldset class="form-group">
				<label for="username"> Enter your Username: </label>
                <input type="text" class="form-control" name="username" id="username_login">
              </fieldset>
              <fieldset class="form-group">
				<label for="password"> Enter your Password: </label>
				<input type="password" class="form-control" name="password" id="password_login">
			  </fieldset>
              <fieldset class="form-group">
				<label for="ssn"> Enter your SSN: </label>
				<input type="text" class="form-control" name="ssn" id="ssn_login">
			  </fieldset>
			  <input type="submit" class="btn btn-default" value="Log In" id="addPatronButton"></input>
			 </form>
		</div>
    </div>
	</br>


    <div class="row addNew">
		<a class="btn btn-default center" href="#updateUser" role="button" data-toggle="collapse" id="update">+ Update Your Info </a>
		<div id="updateUser" class="collapse">
			<form method="POST" action="verify_update.php">

              <fieldset class="form-group">
				<label for="username"> Enter your Username: </label>
                <input type="text" class="form-control" name="username" id="username">
              </fieldset>

              <fieldset class="form-group">
				<label for="password"> Enter your Password: </label>
				<input type="password" class="form-control" name="password" id="password">
			  </fieldset>

              <fieldset class="form-group">
				<label for="ssn"> Enter your SSN: </label>
				<input type="text" class="form-control" name="ssn" id="userSsn">
			  </fieldset>

			  <input type="submit" class="btn btn-default" value="Continue" id="continueButton"></input>
			 </form>
			 
		</div>
    </div>
	<br>
	<br>

<?php
	include 'template_append.php';
?>