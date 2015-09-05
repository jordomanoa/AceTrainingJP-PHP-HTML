<?php
if(session_status() == PHP_SESSION_NONE) {
	session_start();
	session_destroy();
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

Access has been restricted and you have been logged out. If you believe you should have access to this page, please contact an administrator.

</div>
</body>
<footer>
<?php
include("Include/footer.php");
?>
</footer>
</html>


