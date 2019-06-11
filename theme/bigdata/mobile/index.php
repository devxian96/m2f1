<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');

$result = sql_query("SELECT * FROM Survey WHERE id = ".$_GET['wr']);
$vote=sql_fetch_array($result);


?>

<div class="l_10 s_10">
<!-- 최신글 공지 { -->
<?php
// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
echo latest('theme/notice', 'notice', 4, 33);
?>
<!-- }   최신글공지  -->
</div>

<style>
	a{
		color:#BFBFBF;
	}
	a:hover{
		color:#74CED7;
	}
</style>


<div class="l_3 s_10" style="width:100%; height:auto;">
	<div class="main_bt" style="float:right; color:#BFBFBF!important;">
	<center>
		<a href="/bbs/surveylist.php">
			<img src ="<?php echo G5_IMG_URL ?>/sur_check.png" style="width:30%; hegit:auto; margin-right:10%;">
		</a>
	
		<a href="/bbs/surveycreate.php">
			<img src ="<?php echo G5_IMG_URL ?>/sur_create.png" style="width:39%; hegit:auto;">
		</a><br><br>
		<a href="/bbs/surveylist.php" style=" margin-right:13%; font-size:20pt;">
			'<strong>설문하기</strong>'로 바로 이동 !
		</a>
	
		<a href="/bbs/surveycreate.php" style=" margin-right:7%; font-size:20pt;">
			'<strong>설문제작</strong>'으로 바로 이동 !
		</a>
	</center>
</div>
    <?php echo poll('theme/basic'); // 설문조사 ?>
</div>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>