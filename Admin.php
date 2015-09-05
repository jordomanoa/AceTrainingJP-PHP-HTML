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


To create a table for Courses<a href="db_createcourse.php"> Click Here  </a><br><br>
To create a table for Resource<a href="db_createresources.php"> Click Here  </a><br><br>
To create a table for course using resource<a href="db_courseusingresource.php"> Click Here  </a><br><br>
To create a student taking table<a href="db_createstudenttaking.php"> Click Here  </a><br><br>
To View Tutors <a href="AdminShowUsers.php"> Click Here </a><br><br>
To View Students <a href="AdminShowUsersStudents.php"> Click Here </a>



</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>