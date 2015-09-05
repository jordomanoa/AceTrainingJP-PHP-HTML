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
$sql = "CREATE TABLE Resource (
ResourceId 		int auto_increment,
name 			varchar(30),
dateAvailable	date,
dateEnd			date,
ownerId 		int,
fileLocation	varchar(100),
FOREIGN KEY (ownerId) REFERENCES user(userId) 
ON UPDATE CASCADE ON DELETE RESTRICT,
PRIMARY KEY 	(ResourceId)
)";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

Table Created successfully! <br><br> 

<a href="Admin.php"> Back to Admin page  </a>

</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>