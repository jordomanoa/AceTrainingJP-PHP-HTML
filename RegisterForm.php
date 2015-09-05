<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="Include/Css.css">
<?php
include("Include/head.php");
?>

<script>
	  
//Is key pressed a letter
function isLetterKey(e) 
		{
			var k;
			document.all ? k = e.keyCode : k = e.which;
			return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8);
		}	  
	  
//Validates Form
function validateForm()
{

var x=document.forms["RegisterForm"]["forename"].value.length;
if (x<3)
 {
	alert ("Forename must be more than 2 characters.");
	return false;
 }
 
var x=document.forms["RegisterForm"]["surname"].value.length;
if (x<3)
 {
	alert ("Surname must be more than 2 characters.");
	return false;
 }
 
var x=document.forms["RegisterForm"]["email"].value;
var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var result = re.test(x);
if(result)
{

}
else
{
	alert ("Please enter a valid email Address.");
	return false;
}
 
var x=document.forms["RegisterForm"]["email"].value.length;
if (x>255)
 {
	alert ("Please enter a valid email Address.");
	return false;
 }
 
var x=document.forms["RegisterForm"]["password"].value.length;
if (x<6)
 {
	alert ("Password to short.");
	return false;
 }
 
var x=document.forms["RegisterForm"]["password"].value.length;
if (x>30)
 {
	alert ("Password to long.");
	return false;
 }
 
var x=document.forms["RegisterForm"]["usertype"].value;
if (x=='select')
 {
	alert ("Please select a user type.");
	return false;
 }

}

</script>

</head>
<body>
<div id="content">

<?php
if(isset($_SESSION['userId']))
{
	if($_SESSION['usertype'] == "admin")
			{
				header('Location: Admin.php');
			}
			else if($_SESSION['usertype'] == "tutor")
			{
				header('Location: Tutor.php');
			}
			else if($_SESSION['usertype'] == "student")
			{
				header('Location: Student.php');
			}	
}
?>

<?php
if (isset($_POST['forename']))
{
doRegister();
}
else
{
showRegister();
}
?>

</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>




<?php

function showRegister()
{
echo("
Please Log In to your account.
<form id ='RegisterForm' name='RegisterForm' method='post' action='RegisterForm.php' onsubmit='return validateForm();'>

	<table>
	<tr>
	<td>
	forename:
	</td>
	<td>
	<input type = 'text' name='forename' id ='forename' onkeypress='return isLetterKey(event)' />
	</td>
	</tr>
	<tr>
	<td>
	surname:
	</td>
	<td>
	<input type = 'text' name='surname' id ='surname' onkeypress='return isLetterKey(event)' />
	</td>
	</tr>
	<tr>
	<td>
	email:
	</td>
	<td>
	<input type = 'text' name='email' id ='email'/>
	</td>
	</tr>
	<tr>
	<td>
	password:
	</td>
	<td>
	<input type = 'password' name='password' id ='password'/>
	</td>
	</tr>
	<tr>
	<td>
	user type:
	</td>
	<td>
	<select name='usertype' id='usertype' Style='width: 155px'>
	<option value='select'>-Select a user type-</option>
	<option value='student'>Student</option>
	<option value='tutor'>Tutor</option>
	
	</select>
	</td>
	</tr>
	
	</table>
	<input type = 'submit' name='Register' id = 'loginbutton'value = 'Register'/> 
	

</form>
");
}


function doRegister()
{

$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));

$sql ="
INSERT INTO user (forename, surname, email, password, usertype, authorised)
VALUES ('$_POST[forename]','$_POST[surname]','$_POST[email]','$_POST[password]','$_POST[usertype]','1')
";

mysqli_query($conn,$sql)  or die(mysqli_error($conn));

header('Location: index.php');
	
}

?>