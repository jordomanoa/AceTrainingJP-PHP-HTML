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
To enrol on a course <a href="StudentEnrolCourse.php"> Click Here  </a><br><br>
To view Resources <a href="StudentResource.php"> Click Here  </a><br><br>



</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>