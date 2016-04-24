<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 24.
 * Time: 오전 8:22
 */

?>
    <div class="container">

    <?php foreach ($views as $view){ ?>
        <?= $view->board_id; ?><br />
        <?= $view->user_id; ?><br />
        <?= $view->user_name; ?><br />
        <?= $view->subject; ?><br />
        <?= $view->contents; ?><br />
        <?= $view->hits; ?><br />
        <?= $view->reg_date; ?><br />
    <?php } ?>
    <hr />

    <a href="/board/lists/1" class="btn btn-default">목록</a>
    <a href="/board/modify/<?= $id; ?>" class="btn btn-warning">수정</a>
    <a href="/board/delete/<?= $id; ?>" class="delete-btn btn btn-danger" data-uri="/board/delete/<?= $id; ?>">삭제</a>
    <a href="/board/write" class="btn btn-success">글쓰기</a>


    <!-- 임시로 사용, AMD로 세팅할 예정 -->
    <script>
        $('.delete-btn').bind('click', function (e) {
            e.preventDefault();
            var res = window.confirm('정말로 삭제하시겠습니까?');
            if(res){
                window.location.href = $(this).attr('data-uri');
            }
        });
    </script>
</div>