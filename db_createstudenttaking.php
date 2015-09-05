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

$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));
$sql = "
	CREATE TABLE studentTaking (
	tableId			INT AUTO_INCREMENT,
	courseId 		INT NOT NULL,
	userId 			INT NOT NULL,
	dateRegistered 	DATE NOT NULL,
	authorised		BOOLEAN,
	FOREIGN KEY (courseId) REFERENCES course(courseId)
	ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (userId) REFERENCES user(userId)
	ON UPDATE CASCADE ON DELETE RESTRICT,
	PRIMARY KEY (tableId)
)
";

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