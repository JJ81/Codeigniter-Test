<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 24.
 * Time: 오후 3:46
 */
?>

<!-- TODO 페이지네이션 설정할 것. -->
<div class="container">
    keyword: <?= $_GET['keyword']; ?>
    <a href="#" class="btn btn-default" onclick="window.history.back(-1);return false;">뒤로</a><br />
    <hr />

    <?php foreach($list as $ls) {?>
        <?= $ls->board_id; ?><br />
        <a href="/board/view/<?= $ls->board_id; ?>"><?= $ls->subject; ?></a><br />
        <?= $ls->user_name; ?><br />
        <hr />
    <?php } ?>

    <?php if(empty($list)){ ?>
        <div>검색결과가 없습니다.</div>
    <?php } ?>

</div>

