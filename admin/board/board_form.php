<script>
    function checkInput() {
        var subject = document.board_form.subject.value;
        var content = document.board_form.content.value;

        if (!subject) {
            alert("제목을 입력하세요");
            document.board_form.subject.focus();
            return;
        }

        if (!content) {
            alert("내용을 입력하세요");
            document.board_form.content.focus();
            return;
        }
        document.board_form.submit();
    }
</script>

<style>
    #board_box {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    #board_title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    #board_form {
        list-style: none;
        padding: 0;
    }

    #board_form li {
        margin-bottom: 15px;
    }

    .col1 {
        display: inline-block;
        width: 100px;
        font-weight: bold;
        color: #555;
    }

    .col2 {
        display: inline-block;
        vertical-align: top;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .buttons {
        text-align: center;
    }

    .buttons button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        margin-right: 10px;
        transition: background-color 0.3s;
    }

    .buttons button:hover {
        background-color: #2980b9;
    }
</style>

<section>
    <div id="board_box">
        <?php $id = $_SESSION['userdata']['username']; ?>
        <h3 id="board_title">게시판 글쓰기</h3>

        <form name="board_form" method="post" action="<?php echo base_url ?>admin/?page=board/board_insert" enctype="multipart/form-data">
            <ul id="board_form">
                <li>
                    <span class="col1">이름 :</span>
                    <span class="col2" name="id"><?= $id ?></span>
                </li>
                <li>
                    <span class="col1">제목 :</span>
                    <span class="col2">
                        <input name="subject" type="text">
                    </span>
                </li>
                <li id="text_area">
                    <span class="col1">내용 :</span>
                    <span class="col2">
                        <textarea name="content"></textarea>
                    </span>
                </li>
            </ul>

            <ul class="buttons">
                <button type="button" onclick="checkInput()">완료</button>
                <button type="button" onclick="location.href='?page=board'">목록</button>
            </ul>
        </form>
    </div>
</section>
