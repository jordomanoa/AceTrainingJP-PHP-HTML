<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	}
	include ("include/checkTutor.php");
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
To view Users <a href="tutorShowUsers.php"> Click Here  </a><br><br>
To Add a Course <a href="tutorNewCourse.php"> Click Here  </a><br><br>
To Enrol a Student <a href="TutorEnrolCourse.php"> Click Here  </a><br><br>
To Add a Resource <a href="TutorAddResource.php"> Click Here  </a><br><br>


</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>