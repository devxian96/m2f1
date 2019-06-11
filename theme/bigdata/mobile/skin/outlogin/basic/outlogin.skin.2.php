<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 후 외부로그인 시작 -->
<aside id="ol_after" class="ol">
   
    <h2>나의 회원정보</h2>
    <div id="ol_after_hd" style="background:#74CED7 !important;">
        <span class="profile_img">
            <?php echo get_member_profile_img($member['mb_id']); ?>
            
        </span>
        <strong><?php echo $nick ?>님</strong>
        <div id="ol_after_btn">
            <?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL ?>" class="btn_admin" style="background:#FB79A7 !important;">관리자</a><?php } ?>
            <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout" style="color:#FB79A7 !important;">로그아웃</a>
        </div>
    </div>



    <ul id="ol_after_private">
        <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" title="정보수정" style="color:#FB79A7 !important;"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#FB79A7 !important;"></i> 정보수정</a></li>
        <li class="hd_nb1"><a href="<?php echo G5_BBS_URL ?>/qalist.php" id="snb_qa" style="color:#FB79A7 !important;"><i class="fa fa-comments" aria-hidden="true" style="color:#FB79A7 !important;"></i>1:1문의</a></li>
        <li class="hd_nb2"><a href="<?php echo G5_BBS_URL ?>/faq.php" id="snb_faq" style="color:#FB79A7 !important;"><i class="fa fa-question-circle" aria-hidden="true" style="color:#FB79A7 !important;"></i>FAQ</a></li>
        <li class="hd_nb4"><a href="<?php echo G5_BBS_URL ?>/new.php" id="snb_new" style="color:#FB79A7 !important;"><i class="fa fa-history" aria-hidden="true" style="color:#FB79A7 !important;"></i>새글</a></li>
        
    </ul>

</aside>

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- 로그인 후 외부로그인 끝 -->
