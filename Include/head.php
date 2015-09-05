<div id="header">
<img src="Images/Banner/Banner.png" />
</div>
<div id="navbar">

<?php
if(isset($_SESSION['userId']))
{
echo("
<table Style='float: right; font-size: 25px;'><tr><td><a href='Logout.php'>Log Out</a></td></tr></table>
");
}
?>


<table style="font-size: 25px">

<col width="100">
<col width="100">
<tr>
<?php

if(!isset($_SESSION['userId']))
{
echo("
<td><a href='index.php'>Log In</a></td>
<td><a href='RegisterForm.php'>Register</a></td>
");
}
else
{
if($_SESSION['usertype'] == "admin")
{
	echo("
	<td><a href='Admin.php'>Admin</a></td>
	");
}
if($_SESSION['usertype'] == "tutor")
{
	echo("
	<td><a href='Tutor.php'>Tutor</a></td>
	");
}
if($_SESSION['usertype'] == "student")
{
	echo("
	<td><a href='Student.php'>Student</a></td>
	");
}

}
?>
</tr>
</table>

</div>