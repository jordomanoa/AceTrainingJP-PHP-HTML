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
$sql = "
INSERT INTO course (coursename, credits, ownerId) 
VALUES ('Computer Science','2', '1')
";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));
$sql = "
INSERT INTO course (coursename, credits, ownerId)
VALUES ('Networking','50', '1')
";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

Table Populated successfully!<br><br> 

<a href="Admin.php"> Back to Admin page  </a>

</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>