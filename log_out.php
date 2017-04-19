<button onclick="myFunction()">Help</button>
<script>
	function myFunction() {
    	alert("WHAT IS NEXT?:\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.");
	}
</script>

<?php
	include 'template_prepend.php';
	session_start();
	session_unset();
    echo "<p><h3>You've successfully logged out!</h3></p>";
    echo '<div><form method="POST" action="log_in.php">
    <input type="submit" class="btn btn-default" value="Continue" id="EXIT"></input></form></div>';
    include 'template_append.php';
?>