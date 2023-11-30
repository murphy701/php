<?php
	require_once '../config.php';
	require_once 'inc/header.php';

	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	$password = md5($password);

	$con = mysqli_connect("localhost", "root", "", "sms_db");

	$sql = "insert into users(firstname, lastname, username, password, type)";
	$sql .= "values('$firstname', '$lastname', '$username', '$password', 2)";

	mysqli_query($con, $sql);
	mysqli_close($con);

	echo"
	<script>
	location.href='login.php';
	</scipt>
	";
?>