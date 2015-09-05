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
<?php

if (isset($_POST['checkbox']))
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
		$sql = "SELECT * from course WHERE ownerId = '$_SESSION[userId]'";
		$result = mysqli_query($conn, $sql);
		echo("<form name='enrolform' method='post' action='TutorEnrolCourse.php'>");
		echo("<table id='listtable'><tr><td><h4>User Name</h4></td><td><h4>Course Name</h4></td><td><h4>Enrol</h4></td></tr>");
		while($courserow = mysqli_fetch_array($result))
			{
				$sql2 = "SELECT * from studentTaking WHERE courseId = '$courserow[courseId]' AND authorised = '0'";
				$result2 = mysqli_query($conn, $sql2);
				
				while($studenttakingrow = mysqli_fetch_array($result2))
					{
					
						$sql3 = "SELECT * from user WHERE userId = '$studenttakingrow[userId]'";
						$result3 = mysqli_query($conn, $sql3);
						$studentname = mysqli_fetch_array($result3);
						$sql4 = "SELECT * from course WHERE courseId = '$studenttakingrow[courseId]'";
						$result4 = mysqli_query($conn, $sql4);
						$coursename = mysqli_fetch_array($result4);
						
						echo("<tr><td>$studentname[forename] $studentname[surname]</td><td>$coursename[coursename]</td><td><input type='checkbox' name='checkbox[]' value='$studenttakingrow[tableId]'></td></tr>");
						
						
					}
				
			}
		echo("<tr><td colspan='3' float='right'><input type='submit' value='Submit'><td></tr>");
		echo("</table>");
		echo("</form>");
		
	}
		
function addUserToDatabase()
		{
		
			echo("You have enrolled the following students: <br><br>");
			
			foreach($_POST['checkbox'] as $tableId)
			{
			
				$conn = mysqli_connect('localhost','root','root','aceTraining');
				$sql = "UPDATE studentTaking SET authorised = 1 WHERE tableId = '$tableId'";
				mysqli_query($conn, $sql);
				
				$sql1 = "SELECT * from studentTaking WHERE tableId = '$tableId'";
				$result1 = mysqli_query($conn, $sql1);
				$record1 = mysqli_fetch_array($result1);
				
				$sql2 = "SELECT * from user WHERE userId = '$record1[userId]'";
				$result2 = mysqli_query($conn, $sql2);
				$record2 = mysqli_fetch_array($result2);
				
				$sql3 = "SELECT * from course WHERE courseId = '$record1[courseId]'";
				$result3 = mysqli_query($conn, $sql3);
				$record3 = mysqli_fetch_array($result3);
				
				echo("$record2[forename] $record2[surname] enrolled onto $record3[coursename] <br>");
			
			}
			
			echo("<br><br><a href='Tutor.php'> Back to Tutor page  </a>");
			
		}
			
			
			
	
?>
	
	
 
	
