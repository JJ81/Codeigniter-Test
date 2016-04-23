<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 4:59
 */

?>

<!Doctype html>
<html>
<head>

</head>
<body>

    <?php
        foreach ($list as $lt)
        {
    ?>
        <?= $lt->id; ?><br />
        <a href="/main/view/<?= $lt->id; ?>"><?= $lt->content; ?></a><br />
        <?= $lt->created_on; ?><br />
<!--        <time datetime="--><?//= mdate('%Y-%M-%j', human_to_unix($lt->due_date)); ?><!--"></time><br /> 에러가 빈번함-->
<!--            mdate: --><?//= mdate("%Y-%M-%j", human_to_unix($lt->due_date)); ?>
            <?= $lt->due_date ; ?> <br />
        <br />

    <?php } ?>
    <hr />
    페이징 필요함..
    <hr />
    <a href="/main/write">쓰기</a>

</body>
</html>