<section>
<div id="board_box">
<h3 class="title">
게시판 > 내용 보기
</h3>
<?php
	$num=$_GET["num"];
	$page=$_GET["page"];

	$con=mysqli_connect("localhost", "root", "", "sms_db");
	$sql="select * from board where num=$num";
	$result=mysqli_query($con, $sql);

	$row=mysqli_fetch_array($result);
	$username=$row["username"];
	$regist_day=$row["regist_day"];
	$subject=$row["subject"];
	$content=$row["content"];
	$hit=$row["hit"];

	$content=str_replace(" ", "&nbsp;", $content);
	$content=str_replace("\n", "<br>", $content);

	$new_hit=$hit+1;
	$sql="update board set hit=$new_hit where num=$num";
	mysqli_query($con, $sql);
?>
	<ul id="view_content">
		<li>
			<span class="col1"><b>제목 :</b><?=$subject?></span>
			<span class="col2"><?=$name?> | <?=$regist_day?></span>
		</li>
		<li>
			<?=$content?>
		</li>
	</ul>
	<ul class="buttons">
		<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
		<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>$page=<?=$page?>'">수정</button></li>
		<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
		<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
	</ul>
</div></section>