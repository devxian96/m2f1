<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>
<style>
	input:checked + label{
		color:#BFBFBF;
	}
</style>
<aside id="ol_before" class="ol">
    <h2>회원로그인</h2>
    <!-- 로그인 전 외부로그인 시작 -->
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
        <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
        <div class="id_wr">
            <input type="text" name="mb_id" id="ol_id" required maxlength="20" class="login_input">
            <label for="ol_id" class="id_lb" style="color:#bfbfbf !important;">회원아이디<strong class="sound_only"> 필수</strong></label>
        </div>
        <div class="id_wr">
            <input type="password" id="ol_pw" name="mb_password" required  maxlength="20" class="login_input">
            <label for="ol_pw" class="pw_lb"  style="color:#bfbfbf !important;">비밀번호<strong class="sound_only"> 필수</strong></label>
        </div>
        <div id="ol_svc">
            <input type="checkbox" id="auto_login" name="auto_login" value="1">
            <label for="auto_login" id="auto_login_label" style="color:#FB79A7 !important;"><span class="agree_ck"></span>자동로그인</label>

        </div>
        <input type="submit" id="ol_submit" value="로그인" class="btn_submit" style="background:#74CED7 !important;">

    </fieldset>
    <script>
        $(function() {
            $('#ol_id').focus(function() {
                $('.id_lb').addClass('lb_focus');
            });
            $('#ol_pw').focus(function() {
                $('.pw_lb').addClass('lb_focus');
            });
            
        });
  
    </script>
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_outlogin.skin.1.php');
    ?>
    <div class="ol_before_btn">
        <a href="<?php echo G5_BBS_URL ?>/register.php" style="color:#FB79A7 !important;"><b>회원가입</b></a>
        <a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost" style="color:#FB79A7 !important;">정보찾기</a>
    </div>
    </form>
</aside>

<script>
<?php if (!G5_IS_MOBILE) { ?>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',104);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');
$omi.focus(function() {
    $omi_label.css('visibility','hidden');
});
$omp.focus(function() {
    $omp_label.css('visibility','hidden');
});
$omi.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
});
$omp.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
});
<?php } ?>

$("#auto_login").click(function(){
    if (this.checked) {
        this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
    }
});

function fhead_submit(f)
{
    return true;
}


$("#auto_login_label").click(function(){
    $(".agree_ck").toggleClass("click_on");
});
</script>
<!-- 로그인 전 외부로그인 끝 -->
