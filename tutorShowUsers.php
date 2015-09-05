<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	include ("Include/checkTutor.php");
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="Include/Css.css">
<?php
	include ("include/head.php");
?>
</head>	
<body>
<div id="content">
		<a href="Tutor.php">Back to Tutor page</a><br><br> 
		<?php
		$conn = mysqli_connect("localhost", "root", "root", "aceTraining");
		$sql = "SELECT * FROM user WHERE usertype = 'student'";
		$result = mysqli_query($conn, $sql);
		while ($currentLine = mysqli_fetch_array($result))
			{
				echo("
						<table>
						<tr><td>User ID</td><td>$currentLine[userId]</td></tr>
						<tr><td>Forename</td><td>$currentLine[forename]</td></tr>
						<tr><td>Surname</td><td>$currentLine[surname]</td></tr>
						<tr><td>Email</td><td>$currentLine[email]</td></tr>
						</table>
						<br><br> 
				");
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

		
 
	
