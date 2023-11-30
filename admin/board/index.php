<?php?>
<section>
	<div id="board_box">
		<h3> 게시판 > 목록 보기</h3>
		<ul id="board_list">
			<li>
				<span class="col1">번호</span>
				<span class="col2">제목</span>
				<span class="col3">글쓴이</span>
				<span class="col4">등록일</span>
				<span class="col5">조회</span>
			</li>
			<?php

				$page=1;

			$con=mysqli_connect("localhost", "root", "", "sms_db");
			$sql = "select * from board order by num desc";
			$result = mysqli_query($con, $sql);
			$total_record=mysqli_num_rows($result);

			$scale=10;

			if ($total_record % $scale==0)
				$total_page=floor($total_record/$scale);
			else
				$total_page=floor($total_record/$scale) +1;

			$start=($page-1) * $scale;
			$number=$total_record-$start;

			for($i=$start; $i<$start+$scale && $i < $total_record; $i++)
			{
				mysqli_data_seek($result, $i);
				$row=mysqli_fetch_array($result);
				$num=$row["num"];
				$username=$row["username"];
				$subject=$row["subject"];
				$regist_day=$row["regist_day"];
				$hit=$row["hit"];
			
		?>
			<li>
				<span class="col1"><?=$number?></span>
				<span class="col2">
					<a href="board_view.php?num=<?=$num?>">
						<?=$subject?></a></span>
				<span class="col3"><?=$username?></span>
				<span class="col4"><?=$regist_day?></span>
				<span class="col5"><?=$hit?></span>
			</li>
			<?php
				$number--;
			}
			mysqli_close($con);
			?>
		</ul>
		<ul id="page_num">
			<?php

			for($i=1;$i<=$total_page;$i++)
			{
				if($page==$i)
				{
					echo "<li><b>$i</b></li>";
				}
				else{
					echo "<li><a href='board_list.php?mode=$mode&page=$i'>$i</a></li>";
				}
			}
			?>
			<ul>
				<ul class="buttons">

			<?php
				if ($_SESSION['userdata']){
					?>
					<button onclick="location.href='board/board_form.php'">글쓰기</button>
					<?php
						} else {
							?>
							<a href="javascript:alert('로그인 후 사용해 주세요')">
								<button>글쓰기</button>
								<?php }
								?>
		</li></ul></div></section>