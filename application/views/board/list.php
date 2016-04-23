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

current page : <?= $current_page ;?><br />
total page: <?= $total_page ;?><br />

<!-- TODO 이 페이지네이션만 템플릿화하거나 혹은 CI에서 기본으로 제공하는 방법을 알아볼 것 -->
<nav>
    <ul class="pagination pagination-lg">
        <li class="page-item">
            <a class="page-link" href="/board/lists/<?= $prev; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($i=1; $i <= $total_page; $i++) : ?>
            <li class="page-item <?php if($i == $current_page){ echo 'active'; }?> "  ><a class="page-link" href="/board/lists/<?= $i ;?>"><?= $i ;?></a></li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link" href="/board/lists/<?= $next; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<hr />