<?php
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 8:20
 */
?>
<div class="container">
    <h1>댓글 게시판</h1>
    <div class="search clearfix">
        <form class="navbar-form navbar-left search-form" role="search" method="get" action="/board/search">
            <div class="form-group">
                <input type="text" class="form-control search-word" name="keyword" placeholder="Subject / Contents">
            </div>
            <button type="submit" class="btn btn-default search-btn"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
    <hr />

    <?php foreach ($list as $ls){ ?>
        id: <?= $ls->board_id ;?><br />
        username: <?= $ls->user_name ;?><br />
        user_id: <?= $ls->user_id ;?><br />
        subject: <a href="/board/view/<?= $ls->board_id ;?>"><?= $ls->subject ;?></a><br />
        contents: <?= $ls->contents ;?><br />
        hits: <?= $ls->hits ;?><br />
        reg_date: <?= $ls->reg_date ;?><br /><br />
    <?php } ?>

    <a href="/board/write" class="btn btn-primary">글쓰기</a>
    <br />


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
</div>

<script>
    var
    search_btn = $('.search-btn')
    ,search_word = $('.search-word');

    search_btn.bind('click', function (e) {
        e.preventDefault();
        if(search_word.val() === ''){
            // 부트스트랩 모달로 변경할 것.
            alert('검색어를 입력하세요.');
            return;
        }else{
            $('.search-form').submit();
        }
    });

    search_word.keydown(function (e) {
        if(e.keyCode === 13)
            search_btn.trigger('click');
    });
</script>