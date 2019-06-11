<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<!-- 게시판 목록 시작 -->

<?php if ($is_category) { ?>
<nav id="bo_cate">
    <h2><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> 카테고리</h2>
    <ul id="bo_cate_ul">
        <?php echo $category_option ?>
    </ul>
</nav>
<?php } ?>

<div id="bo_list_total">
    <span>전체 <?php echo number_format($total_count) ?>건</span>
    <?php echo $page ?> 페이지
</div>
<div id="bo_list">


    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
 
    <?php if ($rss_href || $write_href) { ?>
    <ul class="btn_bo_user">
        <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss"></i><span class="sound_only">RSS</span></a></li><?php } ?>
        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle"></i><span class="sound_only">관리자</span></a></li><?php } ?>
        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn">글쓰기</a></li><?php } ?>

        <?php if ($is_checkbox) { ?>
        <li><button type="button" class="edit_op_btn view_op_btn_list"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트수정</span></button>
            <ul class="btn_edit btn_list_op">
                <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o"></i>선택삭제</button></li>
                <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o"></i>선택복사</button></li>
                <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows"></i>선택이동</button></li>
            </ul>
        </li>
        <?php } ?>
    </ul>

    <?php } ?>
    <?php if ($is_checkbox) { ?>
    <script>
    $(function(){
        $(".view_op_btn_list").click(function(){
            $(this).next(".btn_list_op").toggle();
        });
        $(document).mouseup(function (e) {
            var container = $(".btn_list_op");
            if (!container.is(e.target) && container.has(e.target).length === 0){
            container.css("display","none");
            }	
        });
    });
    </script>
    <?php } ?>

    <div class="list_02">
        <?php if ($is_checkbox) { ?>
        <div>
            <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            <label for="chkall"><span class="sound_only">현재 페이지 게시물 </span>전체선택</label>
        </div>
        <?php } ?>
        <ul>
            <?php
            for ($i=0; $i<count($list); $i++) {
            ?>
            <li class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
 

                <div class="bo_subject">
                    <?php if ($is_checkbox) { ?>
                    <span class="bo_chk">
                        <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                        <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                    </span><?php } ?>
                    <?php echo $list[$i]['icon_reply']; ?>
                    <?php if ($list[$i]['is_notice']) { ?><strong class="notice_icon"><i class="fa fa-microphone"></i><span class="sound_only">공지</span></strong><?php } ?> 

                    <?php
                    if ($is_category && $list[$i]['ca_name']) {
                    ?>
                    <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                    <?php } ?>

                    <a href="<?php echo $list[$i]['href'] ?>" class="bo_subject">
                        
                        <?php echo $list[$i]['subject'] ?>
                        <?php
                        // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                        if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                        if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                        if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                        if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                        if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

                        ?>
                    </a>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?> 

                </div>
                <div class="bo_info">
                    <span class="sound_only">작성자</span><?php echo $list[$i]['name'] ?>
                    <span class="bo_date"><i class="fa fa-clock-o"></i> <?php echo $list[$i]['datetime2'] ?></span>
                    <?php if ($is_good) { ?><span class="bo_good"><i class="fa fa-heart-o"></i> <?php echo $list[$i]['wr_good'] ?></span><?php } ?>
                
                </div>
                
            </li><?php } ?>
            <?php if (count($list) == 0) { echo '<li class="empty_table">게시물이 없습니다.</li>'; } ?>
        </ul>
    </div>

     
    <?php if ($rss_href || $write_href) { ?>
    <ul class="btn_bo_user">
        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn">글쓰기</a></li><?php } ?>
        <?php if ($list_href || $is_checkbox || $write_href) { ?>
        <li><button type="button" class="edit_op_btn view_op_btn_list"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트수정</span></button>
                <ul class="btn_edit btn_list_op">
                <?php if ($is_checkbox) { ?>
                <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o"></i>선택삭제</button></li>
                <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o"></i>선택복사</button></li>
                <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows"></i>선택이동</button></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>
    </form>
    
    <fieldset id="bo_sch">
        <legend>게시물 검색</legend>

        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
            <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
        </select>
        <input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" required id="stx" class="sch_input" size="15" maxlength="20">
        <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search"></i> <span class="sound_only">검색</span></button>
        </form>
    </fieldset>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages; ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- 게시판 목록 끝 -->
