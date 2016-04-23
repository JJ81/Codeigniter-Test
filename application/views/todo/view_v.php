<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 5:58
 */
?>

<?php
    foreach ($views as $view){
?>
    id: <?= $view->id ;?><br />
    content: <?= $view->content ;?><br />
    created: <?= $view->created_on; ?><br />
    due date:<?= $view->due_date; ?>

    <hr />

    <a href="/main/lists">목록</a> |
    <a href="/main/delete/<?= $view->id ;?>">삭제</a> |
    <a href="/main/modify/<?= $view->id ;?>">수정</a> |
    <a href="/main/write">쓰기</a>
<?php } ?>

