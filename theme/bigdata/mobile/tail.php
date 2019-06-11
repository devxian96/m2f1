<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

            
            
    </div>
    <div id="user_menu">
        <button type="button" id="user_close"><span class="sound_only">메뉴닫기</span><i class="fa fa-times"></i></button>
        <div class="menu_wr">

            <?php echo outlogin('theme/basic'); // 외부 로그인 ?>

            <?php echo visit('theme/basic'); // 방문자수 ?>
        </div>

    </div>

    <script>
    $(function () {
        //폰트 크기 조정 위치 지정
        var font_resize_class = get_cookie("ck_font_resize_add_class");
        if( font_resize_class == 'ts_up' ){
            $("#text_size button").removeClass("select");
            $("#size_def").addClass("select");
        } else if (font_resize_class == 'ts_up2') {
            $("#text_size button").removeClass("select");
            $("#size_up").addClass("select");
        }

        $(".hd_opener").on("click", function() {
            var $this = $(this);
            var $hd_layer = $this.next(".hd_div");

            if($hd_layer.is(":visible")) {
                $hd_layer.hide();
                $this.find("span").text("열기");
            } else {
                var $hd_layer2 = $(".hd_div:visible");
                $hd_layer2.prev(".hd_opener").find("span").text("열기");
                $hd_layer2.hide();

                $hd_layer.show();
                $this.find("span").text("닫기");
            }
        });



        $(".hd_closer").on("click", function() {
            var idx = $(".hd_closer").index($(this));
            $(".hd_div:visible").hide();
            $(".hd_opener:eq("+idx+")").find("span").text("열기");
        });
    });

    
$("#user_close").click(function(){
    $("#user_menu").hide();
});
    </script>
</div>


<div id="ft" style="background:#74CED7 !important;">
    <div id="ft_copy"  style="color:#fff !important; font-weight:bold;">
        <div id="ft_company">
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company" style="color:#fff !important; font-weight:bold;">팀원소개　　｜</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy" style="color:#fff !important; font-weight:bold;">　개인정보처리방침　　｜</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision" style="color:#fff !important; font-weight:bold;">서비스이용약관</a>
        </div>
        Copyright &copy; <b>M2F1.</b> All rights reserved.<br>
    </div>
    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
    <?php
    if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
    <a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>
    <?php
    }

    if ($config['cf_analytics']) {
        echo $config['cf_analytics'];
    }
    ?>
</div>



<script>
jQuery(function($) {

    $( document ).ready( function() {

        //상단으로
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });

    });
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>