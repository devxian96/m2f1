<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div id="bo_list">
    <?php if ($category_option) { ?>
    <!-- 카테고리 시작 { -->
    <nav id="bo_cate">
        <h2><?php echo $qaconfig['qa_title'] ?> 카테고리</h2>
        <ul id="bo_cate_ul" style="color:#FB79A7 !important;">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <!-- } 카테고리 끝 -->
    <?php } ?>

    <?php if ($admin_href || $write_href) { ?>
    <ul class="btn_top top" style="margin-top:-50px; margin-bottom:-50px;">
        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin" style="background:#fff !important; color:#FB79A7 !important; padding-right:30px;"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;관리자</a></li><?php } ?>
        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02" style="background:#fff !important; color:#FB79A7 !important; padding-right:30px;"><i class="fas fa-pencil-alt"></i> 문의등록</a></li><?php } ?>
    </ul>
    <?php } ?>

     <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total" class="sound_only">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>


    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fqalist" id="fqalist" action="./qadelete.php" onsubmit="return fqalist_submit(this);" method="post">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="sca" value="<?php echo $sca; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">

    <?php if ($is_checkbox) { ?>
    <div id="list_chk">
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
        <label for="chkall">게시물 전체선택</label>
    </div>
    <?php } ?>

    <div class="list_01">
        <ul>
            <?php
            for ($i=0; $i<count($list); $i++) {
            ?>
            <li class="bo_li<?php if ($is_checkbox) echo ' bo_adm'; ?>">
                <?php if ($is_checkbox) { ?>
                <div class="li_chk">
                    <label for="chk_qa_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject']; ?></label>
                    <input type="checkbox" name="chk_qa_id[]" value="<?php echo $list[$i]['qa_id'] ?>" id="chk_qa_id_<?php echo $i ?>">
                </div>
                <?php } ?>
                <div class="li_title">
                    <strong><?php echo $list[$i]['category']; ?></strong>
                    <a href="<?php echo $list[$i]['view_href']; ?>" class="li_sbj">
                        <?php echo $list[$i]['subject']; ?><span> <?php echo $list[$i]['icon_file']; ?></span>
                    </a>
                </div>
                <div class="li_info">
                    <span><?php echo $list[$i]['name']; ?></span>
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $list[$i]['date']; ?></span>
                    
                    <div class="li_stat <?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>"><?php echo ($list[$i]['qa_status'] ? '<i class="fa fa-check-circle" aria-hidden="true"></i> 답변완료' : '<i class="fa fa-times-circle" aria-hidden="true"></i> 답변대기'); ?></div>

                </div>
            sfddddddd</li>
            <?php
            }
            ?>

            <?php if ($i == 0) { echo '<li class="empty_list">게시물이 없습니다.</li>'; } ?>
        </ul>
    </div>

    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm" style="float:right;">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" style="background:#74CED7 !important; color:#FFFFFF; border-color:#74CED7 !important; height:35px; margin-top:-9px;"></li>
        </ul>
        <?php } ?>

        
    </div>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $list_pages;  ?>

<!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch" style="margin-top:6px;">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="50" maxlength="15" style="margin-top:-20px;">
    <input type="submit" value="검색" class="btn_submit" style="background:#74CED7 !important; color:#FFFFFF; border-color:#74CED7 !important; margin-top:-22px; width:54px;">
    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fqalist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]")
            f.elements[i].checked = sw;
    }
}

function fqalist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다"))
            return false;
    }

    return true;
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->