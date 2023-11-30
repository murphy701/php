<meta charset="utf-8">
<?php
	$subject=$_POST["subject"];
	$content=$_POST["content"];

	$subject=htmlspecialchars($subject, ENT_QUOTES);
	$content=htmlspecialchars($content, ENT_QUOTES);

	$regist_day=date("Y-m-d (H:i)");

	$con=mysqli_connect("localhost", "root", "", "sms_db");

	$sql="insert into board (username, subject, content, regist_day, hit) ";
	$sql.= "values('$username', '$subject', '$content', '$regist_day', '$hit')";
	mysqli_query($con, $sql);

	mysqli_close($con);

	echo"
	<script>
		loaction.href='index.php';
		</script>
	";
?>