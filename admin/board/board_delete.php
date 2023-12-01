<?php
	$num=$_GET["num"];


	$con=mysqli_connect("localhost", "root", "", "sms_db");
	$sql="select * from board where num=$num";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	$sql="delete from board where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);

	echo"
	<script>
	location.href='?page=board';
	</script>
	";
?>