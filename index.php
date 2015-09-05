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
if (isset ($_POST['emaillogin']))
	{
		doLogin();
	}
else
	{
		showLogin();
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

function doLogin()
{
	$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));
	$ea = $_POST['emaillogin'];
	$pw = $_POST['passwordlogin'];
	$sql = "SELECT * FROM user WHERE (email ='$ea' AND password = '$pw')";
	$result = mysqli_query($conn,$sql);
	$resultline = mysqli_fetch_array($result);
	if($resultline['userId']=="")
		{
			echo("Login Failed <br><br>");
			showLogin();
		}
	else
		{
			$_SESSION['userId'] = $resultline['userId'];
			$_SESSION['usertype'] = $resultline['usertype'];
			
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
		
}

function showLogin()
{

echo("
Please Log In to your account.
<form id ='FormLogin' name='FormLogin' method='post' action='index.php'>

<table>
<tr>
<td>
Email:
</td>
<td>
<input type = 'text' name='emaillogin' id ='emaillogin'/>
</td>
</tr>
<tr>
<td>
Password:
</td>
<td>
<input type = 'password' name='passwordlogin' id ='passwordlogin'/>
</td>
</tr>
</table>
<input type = 'submit' name='loginbutton' id = 'loginbutton' value = 'Log In'/> 


</form>
");


}

?>