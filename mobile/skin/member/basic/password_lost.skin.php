<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div id="find_info" class="new_win">
    <h1 id="win_title" style="background:#74CED7 !important; color:#ffffff; text-align:center;">아이디/비밀번호 찾기</h1>
    <div class="new_win_con">
        <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
        <fieldset id="info_fs">
            <p style="text-align:center;"><br>
                회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br>
                해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
            </p><br>
			<div style="text-align:center; color:#74CED7;"><strong>이메일 주소　</strong><input type="email" id="mb_email" name="mb_email" placeholder="aaa @ ac.kr" required class="frm_input email" style="width:230px!important; text-align:center;"></div>
        </fieldset>
		
		
<center><br>
        <?php echo captcha_html(); ?>
</center>
			

        <div class="win_btn">
            <input type="submit" style="background:#74CED7 !important; color:#ffffff; font-size:15px; width:100px; height:40px; border-radius: 3px 3px 3px 3px; " class="btn_submit" value="정보찾기">
            <button type="button" style="background:#74CED7 !important; color:#ffffff; " onclick="window.close();" class="btn_close">창닫기</button>
        </div>
        </form>
    </div>
</div>

<script>
function fpasswordlost_submit(f)
{
    <?php echo chk_captcha_js(); ?>

    return true;
}

$(function() {
    var sw = screen.width;
    var sh = screen.height;
    var cw = document.body.clientWidth;
    var ch = document.body.clientHeight;
    var top  = sh / 2 - ch / 2 - 100;
    var left = sw / 2 - cw / 2;
    moveTo(left, top);
});
</script>
