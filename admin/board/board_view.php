<style>
#board_box {
    max-width: 800px;
    margin: 0 auto;
}

.title {
    border-bottom: 2px solid #333;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

#view_content {
    margin-bottom: 20px;
}

.info {
    display: block;
    margin-bottom: 10px;
}

.col1,
.col2 {
    margin-right: 20px;
}

.buttons {
    margin-top: 20px;
}

.list-btn {
    background-color: #3498db; /* Blue */
    color: white;
}

.modify-btn {
    background-color: #2ecc71; /* Green */
    color: white;
}

.delete-btn {
    background-color: #333; /* Black */
    color: white;
}

.write-btn {
    background-color: #e74c3c; /* Red */
    color: white;
}
</style>

<section>
    <div id="board_box">
        <h3 class="title">게시판 > 내용 보기</h3>

        <?php
        $num = $_GET["num"];
        $con = mysqli_connect("localhost", "root", "", "sms_db");
        $sql = "SELECT * FROM board WHERE num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $id = $row["id"];
        $regist_day = $row["regist_day"];
        $subject = $row["subject"];
        $content = $row["content"];
        $hit = $row["hit"];

        $content = nl2br(htmlspecialchars($content));

        $new_hit = $hit + 1;
        $sql = "UPDATE board SET hit = $new_hit WHERE num = $num";
        mysqli_query($con, $sql);
        ?>

        <div id="view_content">
            <div class="info">
                <span class="col1"><b>제목 :</b><?= $subject ?></span>
                <span class="col2"><?= $id ?> | <?= $regist_day ?></span>
            </div>
            <div class="content">
                <?= $content ?>
            </div>
        </div>

        <div class="buttons">
            <button class="btn btn-flat btn-success" onclick="location.href='?page=board'">list</button>

            <button class="btn btn-flat btn-dark" onclick="location.href='?page=board/board_delete&num=<?= $num ?>'">delete</button>

        </div>
    </div>
</section>