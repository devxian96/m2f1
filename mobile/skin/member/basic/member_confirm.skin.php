<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div id="mb_confirm" class="mbskin">
	<a href="<?php echo G5_URL ?>"><img width="10%" src="<?php echo G5_IMG_URL ?>/Logo_title.png" alt="<?php echo $config['cf_title']; ?>"></a><br><br><br><br>
    <h1 style="color:#FB79A7;"><strong><?php echo $g5['title'] ?></strong></h1>

    <p>
        <strong>비밀번호를 한번 더 입력해주세요.</strong>
        <?php if ($url == 'member_leave.php') { ?>
        비밀번호를 입력하시면 회원탈퇴가 완료됩니다.
        <?php }else{ ?>
        회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다.
        <?php }  ?>
    </p>

    <form name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post">
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="w" value="u">

    <fieldset style="text-align:center;">
        
        <span id="mb_confirm_id">회원아이디 &nbsp;&nbsp;<?php echo $member['mb_id'] ?></span>
        <input type="password" name="mb_password" id="mb_confirm_pw" placeholder="비밀번호(필수)" required class="frm_input" style="margin: 0 auto; text-align:center; width:300px;" size="15" maxLength="20"><br>
        <input type="submit" style="margin: 0 auto; text-align:center; width:100px; background:#74CED7 !important; color:#FFFFFF; "value="확인" id="btn_submit" class="btn_submit">
    </fieldset>

    </form>

</div>

<script>
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
