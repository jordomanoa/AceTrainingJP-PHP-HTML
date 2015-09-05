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

if (isset($_POST['course']))
{
	addUserToDatabase();
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
		$conn = mysqli_connect('localhost','root','root','aceTraining');
		$sql = "SELECT courseId, coursename FROM course";
		if ($resource = mysqli_query($conn,$sql))
		
		echo ("
		<form name='enrol' method='post' action='StudentEnrolCourse.php'>");
		while ($currentCourse = mysqli_fetch_array($resource))
		{
		echo ("<input type='checkbox' name='course[]' value='$currentCourse[courseId]' />
		$currentCourse[coursename] <br />");
		}
		
		echo("<input type='submit' onclick='submit' />
		</form>
		");
		}
		
		function addUserToDatabase()
		{
		
			echo("You have enrolled onto the following courses: <br><br>");
			
			foreach($_POST['course'] as $courseId)
			{
				$cid = $courseId;
				$sid = $_SESSION['userId'];
				$date = date('Y-m-d');
				
				$conn = mysqli_connect('localhost','root','root','aceTraining');
				$sql = "INSERT INTO studentTaking (courseId, userId, dateRegistered, authorised)
						VALUES ('$cid', '$sid', '$date', '0')";
				mysqli_query($conn, $sql);
				
				$sql2 = "SELECT * from course WHERE courseId = '$cid'";
				$result2 = mysqli_query($conn, $sql2);
				$record2 = mysqli_fetch_array($result2);
				
				
				echo("$record2[coursename] <br>");
				
			}
			
			echo("<br><br><a href='Student.php'> Back to Student page  </a>");
			
		}
			
			
			
	
	?>
	
	
 
	
