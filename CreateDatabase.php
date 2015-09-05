<?php

$conn = mysqli_connect("localhost","root","root") or die(mysqli_error($conn));

$sql = "CREATE DATABASE aceTraining";
mysqli_query($conn,$sql);

$conn = mysqli_connect("localhost","root","root","aceTraining") or die(mysqli_error($conn));

$sql = "CREATE TABLE user (
userId 			int auto_increment,
forename 		varchar(30),
surname 		varchar(30),
email 			varchar(255),
password 		varchar(30),
usertype 		varchar(30),
authorised 		boolean,
PRIMARY KEY 	(userId)
)";

mysqli_query($conn,$sql)  or die(mysqli_error($conn));

$sql = "INSERT INTO user (forename, surname, email, password, usertype, authorised)
VALUES ('Jordan','Pountley','admin@admin.com','password','admin','1')
";

mysqli_query($conn,$sql)  or die(mysqli_error($conn));

?>