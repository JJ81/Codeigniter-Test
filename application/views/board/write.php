<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 24.
 * Time: 오전 11:42
 */
?>

<div class="container">

    <?php
    if(!empty($view)){
    foreach ($view as $v){ ?>
    <form method="post">
        <fieldset class="form-group">
            <label for="subject">글제목</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="글제목을 입력하세요." value="<?= $v->subject ;?>" />
        </fieldset>

        <fieldset class="form-group">
            <label for="contents">내용</label>
            <textarea class="form-control" id="contents" name="contents" rows="5" placeholder="글 내용을 입력하세요."><?= $v->contents ;?></textarea>
        </fieldset>

        <button type="submit" class="btn btn-primary">저장</button>
        <a href="/board/view/<?=$v->board_id ;?>" class="btn btn-default">취소</a>
        <input type="hidden" name="board_id" value="<?= $v->board_id; ?>" />
        <input type="hidden" name="user_id" value="<?= $v->user_id; ?>" />
    </form>
    <?php }}else{ ?>
        <form method="post">
            <fieldset class="form-group">
                <label for="subject">글제목</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="글제목을 입력하세요." />
            </fieldset>

            <fieldset class="form-group">
                <label for="contents">내용</label>
                <textarea class="form-control" id="contents" name="contents" rows="5" placeholder="글 내용을 입력하세요."></textarea>
            </fieldset>

            <button type="submit" class="btn btn-primary">저장</button>
            <a href="/board/lists/1" class="btn btn-default">취소</a>
        </form>
    <?php } ?>
</div>
