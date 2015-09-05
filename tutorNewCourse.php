<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	
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
<?php
include ("include/checkTutor.php");
if (isset($_POST['coursename']))
{
	addCourseToDatabase();
}	
else
{
	showForm();
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
		function showForm()
		{
		echo ("
		<form name='Add Course' method='post' action='tutorNewCourse.php'>
		<table>
		<tr>
		<td>
		Course Name:
		</td>
		<td>
		<input type='text' name='coursename' /> <br />
		<tr>
		<td>
		Credits:
		</td>
		<td>
		<input type='number' name='credits' /> <br />
		</td>
		</tr>
		</table>
					<input type='submit' onClick='submit' />
		</form>
		");
		}
		
		function addCourseToDatabase()
		{
			$cn = $_POST['coursename'];
			$ow = $_SESSION['userId'];
			$cc	= $_POST['credits'];
			
			$conn = mysqli_connect('localhost','root','root','aceTraining');
			$sql = "INSERT INTO course (coursename, ownerId, credits)
					VALUES ('$cn', '$ow', '$cc')";
					
			mysqli_query($conn, $sql)or die(mysqli_error($conn));
			
			echo("
			Table Populated successfully!<br><br>
			<a href='Tutor.php'> Back to Tutor page  </a>
			");
		}
			
			
			
?>
	
