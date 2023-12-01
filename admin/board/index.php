<section>
	<div id="board_box">
		<h3>게시판 > 목록 보기</h3>
		<table class="table table-bordered table-stripped">
			<colgroup>
				<col width="5%">
				<col width="20%">
				<col width="15%">
				<col width="15%">
				<col width="5%">
			</colgroup>
			<thead>
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>글쓴이</th>
					<th>등록일</th>
					<th>조회</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$page = 1;

				$con = mysqli_connect("localhost", "root", "", "sms_db");
				$sql = "select * from board order by num desc";
				$result = mysqli_query($con, $sql);
				$total_record = mysqli_num_rows($result);

				$scale = 10;

				if ($total_record % $scale == 0)
					$total_page = floor($total_record / $scale);
				else
					$total_page = floor($total_record / $scale) + 1;

				$start = ($page - 1) * $scale;
				$number = $total_record - $start;

				for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
					mysqli_data_seek($result, $i);
					$row = mysqli_fetch_array($result);
					$num = $row["num"];
					$id = $row["id"];
					$subject = $row["subject"];
					$regist_day = $row["regist_day"];
					$hit = $row["hit"];
				?>
					<tr>
						<td><?= $number ?></td>
						<td><a href="<?php echo base_url . '/admin?page=board/board_view&num='.$num ?>"><?= $subject ?></a></td>
						<td><?= $id ?></td>
						<td><?= $regist_day ?></td>
						<td><?= $hit ?></td>
					</tr>
				<?php
					$number--;
				}
				mysqli_close($con);
				?>
			</tbody>
		</table>
		<ul class="buttons">
<a href="<?php echo base_url ?>admin/?page=board/board_form" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  글쓰기</a>
		</ul>
	</div>
</section>
