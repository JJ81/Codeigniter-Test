<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 6:09
 */
?>



<?php foreach ($views as $view) {?>
    <form method="post">
        <input type="hidden" value="<?= $view->id;?>" name="id" />
        할 일: <input type="text" name="content" placeholder="할 일을 입력하세요." value="<?= $view->content ;?>" /><br />
        생성일: <input type="date" name="created_on" value="<?=$view->created_on ;?>" /> <br />
        종료일: <input type="date" name="due_date" value="<?=$view->due_date ;?>" /><br />
        <button type="submit">저장</button>
    </form>
    <hr />
    <a href="/main/lists">목록</a> |
    <a href="/main/delete/<?= $view->id ;?>">삭제</a> |
    <a href="/main/save/<?= $view->id ;?>">저장</a> |
<?php } ?>
