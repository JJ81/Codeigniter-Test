<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 8:20
 */
?>
<hr />
<h1>댓글 게시판</h1>
<?php foreach ($list as $ls){ ?>
    id: <?= $ls->board_id ;?><br />
    username: <?= $ls->user_name ;?><br />
    user_id: <?= $ls->user_id ;?><br />
    subject: <a href="/board/view/<?= $ls->board_id ;?>"><?= $ls->subject ;?></a><br />
    contents: <?= $ls->contents ;?><br />
    hits: <?= $ls->hits ;?><br />
    reg_date: <?= $ls->reg_date ;?><br /><br />
<?php } ?>

<a href="/board/write">글쓰기</a>
<br />

<?php echo $pagination; ?>

<hr />