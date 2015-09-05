<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	include ("Include/checkAdmin.php");
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

$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));
$sql = "CREATE TABLE courseusingresource (
courseId 		int,
resourceId		int,
FOREIGN KEY (courseId) REFERENCES course(courseId) 
ON UPDATE CASCADE ON DELETE RESTRICT,
FOREIGN KEY (resourceId) REFERENCES resource(ResourceId) 
ON UPDATE CASCADE ON DELETE RESTRICT
)";

mysqli_query($conn, $sql)or die(mysqli_error($conn));


?>


Table Created successfully!<br><br> 

<a href="Admin.php"> Back to Admin page  </a>

</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>