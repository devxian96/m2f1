<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<style>
	@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
	div{
		font-family: Tahoma , Jeju Gothic;
	}
	a{text-decoration:none !important;}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<header id="hd" >
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="to_content"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>
    <div id="hd_wrapper">


        <div id="logo" style="width:auto; height:10% !important;">
            <a href="<?php echo G5_URL ?>"><img width="10%" src="<?php echo G5_IMG_URL ?>/Logo_title.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

        <button type="button" id="al_cate_btn"><i class="fa fa-bars"></i><span class="sound_only">전체메뉴 열기</span></button>
        <button type="button" id="user_btn"><i class="fa fa-user"></i><span class="sound_only">사용자메뉴 열기</span></button>

        <div id="gnb" >

            <ul id="gnb_1dul">
            <?php
            $sql = " select *
                        from {$g5['menu_table']}
                        where me_mobile_use = '1'
                          and length(me_code) = '2'
                        order by me_order, me_id ";
            $result = sql_query($sql, false);

            for($i=0; $row=sql_fetch_array($result); $i++) {
            ?>
                <li class="gnb_1dli">
				<?php
				if($i==0){
				?>
				<i class="far fa-check-square" style="color:#FB79A7;"></i><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"  style="color:#FB79A7 !important;"> <?php echo $row['me_name'] ?></a>

                <?php
				}
				if($i==1){
				?>
				　<i class="fas fa-edit" style="color:#FB79A7;"></i><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"  style="color:#FB79A7 !important;"> <?php echo $row['me_name'] ?></a>
				<?php
				}
				if($i==2){
				?>
				　<i class="fas fa-users" style="color:#FB79A7;"></i><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"  style="color:#FB79A7 !important;"> <?php echo $row['me_name'] ?></a>	
				<?php
				}
                    $sql2 = " select *
                                from {$g5['menu_table']}
                                where me_mobile_use = '1'
                                  and length(me_code) = '4'
                                  and substring(me_code, 1, 2) = '{$row['me_code']}'
                                order by me_order, me_id ";
                    $result2 = sql_query($sql2);

                    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                        if($k == 0)
                            echo '<button type="button" class="btn_gnb_op">하위분류</button><ul class="gnb_2dul">'.PHP_EOL;
                    ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da" style="color:#FB79A7 !important;"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    }

                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
                </li>
            <?php
            }

            if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
            <?php } ?>
            </ul>
            <button type="button" id="sch_op_btn"><i class="fa fa-search" aria-hidden="true" style="color:#FB79A7!important;"></i><span class="sound_only">검색열기</span></button>
            <div id="hd_sch">
				<style>
					input::placeholder{
						color:#FB79A7;
					}
				</style>
                <h2>사이트 내 전체검색</h2>
                <form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <input type="text" name="stx" id="sch_stx" placeholder="검색어(필수)" required maxlength="20" >
                <button type="submit" value="검색" id="sch_submit"><i class="fa fa-search" aria-hidden="true" style="color:#FB79A7;important!"></i><span class="sound_only">검색</span></button>
                </form>

                <script>
                function fsearchbox_submit(f)
                {
                    if (f.stx.value.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                    var cnt = 0;
                    for (var i=0; i<f.stx.value.length; i++) {
                        if (f.stx.value.charAt(i) == ' ')
                            cnt++;
                    }

                    if (cnt > 1) {
                        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    return true;
                }
                </script>
                <button type="button" class="btn_close"><i class="fa fa-times-circle"></i></button>
            </div>
        </div>
       
</header>

<script>
$(".btn_gnb_op").click(function(){
    $(this).toggleClass("btn_gnb_cl").next(".gnb_2dul").slideToggle(300);
});

$("#sch_op_btn").click(function(){
    $("#hd_sch").show();
});

$("#hd_sch .btn_close").click(function(){
    $("#hd_sch").hide();
});

$("#al_cate_btn").click(function(){
    $("#gnb").toggle();
});


$("#user_btn").click(function(){
    $("#user_menu").show();
});


</script>

<div id="wrapper">

    <div id="container">
    <?php if (!defined("_INDEX_")) { ?><h2 id="container_title" style="background:#74CED7 !important; color:#fff;" title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></h2><?php } ?>
