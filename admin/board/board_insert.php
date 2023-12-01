<meta charset="utf-8">
<?php
	$subject=$_POST["subject"];
	$content=$_POST["content"];
	$id = $_SESSION['userdata']['username'];
	$subject=htmlspecialchars($subject, ENT_QUOTES);
	$content=htmlspecialchars($content, ENT_QUOTES);
	$hit=0;
	$regist_day=date("Y-m-d (H:i)");

	$con=mysqli_connect("localhost", "root", "", "sms_db");

	$sql="insert into board (id, subject, content, regist_day, hit) ";
	$sql.= "values('$id', '$subject', '$content', '$regist_day', '$hit')";
	mysqli_query($con, $sql);

	mysqli_close($con);

	echo"
	<script>
        location.href ='?page=board';
		</script>
	";
?>