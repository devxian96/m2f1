<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div class="mbskin">
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>

    <form name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

	<br>
    <div class="chk_all" style="margin-left:120px; color:#666666;">
        <input type="checkbox" name="chk_all" id="chk_all">
        <label for="chk_all">전체동의</label>
<br><br>
    </div>
    <section id="fregister_term" style="background:#fff !important; color:#666666; width:870px; margin-left:120px;">
		<h1 style="background:#fff !important; color:#666666;"><strong>회원가입약관</strong></h1>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree" value="1" id="agree11">
            <label for="agree11"> 회원가입약관의 내용에 동의합니다.</label>
        </fieldset>
    </section>
<br><br>
    <section id="fregister_private" style="width:870px; margin-left:120px;">
		<div style="background:#fff !important; color:#666666;">
			<h1><strong>개인정보처리방침안내</strong></h1>
		</div>
        <div class="tbl_head01 tbl_wrap">
            <table>
                <caption>개인정보처리방침안내</caption>
                <thead>
                <tr>
                    <th colspan="2" style="background-color:#bfbfbf !important; color:#ffffff; font-size:20px;">목적</th>
                </tr>
                <tr>
                    <th style="background-color:#bfbfbf !important; color:#ffffff; font-size:20px; width:50%;">항목</th>
                    <th style="background-color:#bfbfbf !important; color:#ffffff; font-size:20px;">보유기간</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<td colspan="2"style="background:#fff !important; color:#262626; font-size:15px; height:40px;">
						<strong>이용자 식별 및 본인여부 확인</strong></td>
                </tr>
                <tr>
                    <td>아이디, 이름, 비밀번호</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                <tr>
                    <td colspan="2"style="background:#fff !important; color:#262626; font-size:15px; height:40px;">
						<strong>고객서비스 이용에 관한 통지, CS대응을 위한 이용자 식별</strong></td>
                </tr>
                <tr>
                    <td>연락처 (이메일, 휴대전화번호)</td>
                    <td>회원 탈퇴 시까지</td>
                </tr>
                </tbody>
            </table>
        </div>
		<br>
        <fieldset class="fregister_agree" style="background:#fff !important; color:#666666 !important;">
            <input type="checkbox" name="agree2" value="1" id="agree21">
			<label for="agree21">개인정보처리방침안내의 내용에 동의합니다.</label>
       </fieldset>
    </section>

<br>
    <div class=" btn_top">
        <input type="submit" class="btn_submit" value="회원가입" style="background:#74CED7 !important; width:100px; height:50px;" >
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }

    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });
    </script>

</div>
