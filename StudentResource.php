<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	include ("include/checkStudent.php");
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

echo("
<table id='listtable'>
<tr>
<td><h4>Resource Name</h4></td><td><h4>Course</h4></td><td><h4>Available From</h4></td><td><h4>Available Until</h4></td><td><h4>Download</h4></td>
</tr>
");

$conn = mysqli_connect('localhost','root','root','aceTraining');
$sql1 = "SELECT * from studenttaking WHERE userId = '$_SESSION[userId]' AND authorised = '1'";
$result1 = mysqli_query($conn, $sql1);
while($studenttakingrow=mysqli_fetch_array($result1))
	{	
		$sql2 = "SELECT * FROM courseusingresource WHERE courseId = '$studenttakingrow[courseId]'";
		$result2 = mysqli_query($conn, $sql2);
		while($resourceoncourserow=mysqli_fetch_array($result2))
			{
				$sql3="SELECT * FROM resource WHERE ResourceId = '$resourceoncourserow[resourceId]'";
				$result3 = mysqli_query($conn, $sql3);
				$record3 = mysqli_fetch_array($result3);
				$sql4 = "SELECT * FROM course WHERE courseId = '$studenttakingrow[courseId]'";
				$result4 = mysqli_query($conn, $sql4);
				$record4 = mysqli_fetch_array($result4);
				echo("<tr><td>$record3[name]</td><td>$record4[coursename]</td><td>$record3[dateAvailable]</td><td>$record3[dateEnd]</td><td><a alt='Download Resource' href='$record3[fileLocation]' download> Download </a></td></tr>");
			}
	}

echo("
</table>
");
	
?>




</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>