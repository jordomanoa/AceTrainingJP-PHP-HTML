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


</head>
<body>
<div id="content">

<?php
if (isset ($_POST['resourceName']))
	{
		uploadFileandProcess();
	}
else
	{
		getResource();
	}
?>

<?php
function getResource()
{

echo("
<form enctype='multipart/form-data' action='$_SERVER[PHP_SELF]' method='POST'>


<table>
<tr>
<td>
Choose a Resource to upload:
</td>
<td>
<input type = 'file' name='uploadedfile' />
</td>
</tr>
<tr>
<td>
Resource Name:
</td>
<td>
<input type = 'text' name='resourceName' />
</td>
</tr>
<tr>
<td>
Resource Available from:
</td>
<td>
<input name='s_dd' type='text' size='2' /> / <input name='s_mm' type='text' size='2' /> / <input name='s_yyyy' type='text' size='4' />(dd/mm/yyyy)
</td>
</tr>
<tr>
<td>
Resource Available until:
</td>
<td>
<input name='f_dd' type='text' size='2' /> / <input name='f_mm' type='text' size='2' /> / <input name='f_yyyy' type='text' size='4' /> (dd/mm/yyyy)
</td>
</tr>
<tr>
<td>
For Courses:
</td>
<td>
");

$conn = mysqli_connect("localhost","root","root","aceTraining");
$sql1 = "SELECT * from course WHERE ownerId = '$_SESSION[userId]'";
$result1 = mysqli_query($conn, $sql1);
while($row=mysqli_fetch_array($result1))
{
	echo("<input type='checkbox' name='checkbox[]' value='$row[courseId]'> $row[coursename] <br>");
}

echo("
</td>
</tr>
</table>
<input type = 'submit'  value = 'Upload File'/> 


</form>
");
}

?>

<?php
function uploadFileandProcess()
{

$target_path = basename($_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
   {
   echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been
   uploaded";

   $conn = mysql_connect("localhost","root","root","acetraining");
   mysql_select_db("aceTraining",$conn);
	
   $name = $_POST['resourceName'];
   $dateAvailable = $_POST['s_yyyy'] . "-" . $_POST['s_mm'] . "-" . $_POST['s_dd']; 
   $dateEnd = $_POST['f_yyyy'] . "-" . $_POST['f_mm'] . "-" . $_POST['f_dd']; 
   $ownerId = $_SESSION['userId'];
   $fileLocation = basename($_FILES['uploadedfile']['name']);
   
  
   $conn = mysqli_connect('localhost','root','root','aceTraining');
   $sql = ("INSERT INTO resource (name, dateAvailable, 
   dateEnd, ownerId, fileLocation) 
   VALUES ('$name', '$dateAvailable', '$dateEnd', '$_SESSION[userId]', '$fileLocation')");

   mysqli_query($conn, $sql)or die(mysqli_error($conn));
			
			echo("
			successfully!<br><br>
			<a href='Tutor.php'> Back to Tutor page  </a>
			");
			
   }
   
   
$conn = mysqli_connect("localhost","root","root","acetraining");	
$sql1 = "SELECT * from resource WHERE name = '$_POST[resourceName]'";
$result1 = mysqli_query($conn, $sql1);
$record1 = mysqli_fetch_array($result1);
foreach($_POST['checkbox'] as $courseId)
	{
		$sql2 = "INSERT INTO courseusingresource (courseId, resourceId) VALUES ('$courseId', '$record1[ResourceId]')";
		mysqli_query($conn, $sql2);
	}  
   
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