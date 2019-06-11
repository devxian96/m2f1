<?php
include_once('./_common.php');

// 세션을 지웁니다.
set_session("ss_mb_reg", "");

$g5['title'] = '설문제작';
include_once('./_head.php');

?>
<!-- 오픈소스 라이브러리 시작 -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.33.0/codemirror.css"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/github.min.css"></link>
<input id="name" name="name" type="hidden" value="<?php echo $name ?>"></input>
<input id="count" name="count" type="hidden" value=""></input>

<script>
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });

    $(function() {
        $("#datepicker1").datepicker();
		$("#datepicker2").datepicker();
    });

</script>
<!-- 오픈소스 라이브러리 끝 -->

	<style>
		@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
		input::placeholder{
			color:#BFBFBF;
		}
		input:focus {
			outline:none;
		}
		div{
		
		font-family: Tahoma , Jeju Gothic;
	}
	</style>

<!-- 설정 시작 -->
<form action="/bbs/surveyupdate.php" method="post" enctype="multipart/form-data">
	<div class="container mt-3" style="height:200px; ">
	  <h3 style="color:#FB79A7;"><i class="fas fa-user-cog" style="color:#FB79A7;"></i>  설정</h3>
	  <br>

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="tab" href="#home" style="background:#fff !important; color:#FB79A7 !important;">최근설문</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#menu1" style="background:#fff !important; color:#FB79A7 !important;">기간설정</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#menu2" style="background:#fff !important; color:#FB79A7 !important;">공개설정</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#menu3" style="background:#fff !important; color:#FB79A7 !important;">타겟설정</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" href="#menu4" style="background:#fff !important; color:#FB79A7 !important;">기타설정</a>
		</li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content" style="color:#000;">
		<div id="home" class="container tab-pane active"><br>
			<div style="width:30% !important; float:left !important;"><!-- 분류설정 -->
				<div id="kind" class="dd-container" style="width: 100%;"><div class="dd-select" style="width: 100%; background: rgb(238, 238, 238);"><input class="dd-selected-value" type="hidden"><a class="dd-selected"></a><span class="dd-pointer dd-pointer-down"></span></div></div>
			</div>
			<script type="text/javascript">
				var ddData = [
					{
						text: "일반",
						value: 1,
						selected: true,
						description: "다목적 설문조사입니다.",
						imageSrc: "/img/normal.png"
					},
					{
						text: "연구용",
						value: 2,
						selected: false,
						description: "연구와 자료수집을 위한 설문조사입니다.",
						imageSrc: "/img/research.png"
					},
					{
						text: "상업용",
						value: 3,
						selected: false,
						description: "마케팅 및 상품조사를 위한 설문조사입니다.",
						imageSrc: "/img/money.png"
					},
					{
						text: "대학교",
						value: 4,
						selected: false,
						description: "교수님 강의평가를 위한 설문조사입니다.",
						imageSrc: "/img/university.png"
					}
				];

				$('#kind').ddslick({
					data: ddData,
					width: 300,
					imagePosition: "left",
					selectText: "어떤 설문조사를 원하시나요?",
					onSelected: function (data) {
						console.log(data);
					}
				});
			</script>
			<div style="width:50% !important; float:left !important;">
				<center>저장된 템플릿이 없습니다.</center>
			</div>

		</div>
		<div id="menu1" class="container tab-pane"><br><br><!-- 기간설정 -->
			<div style="width:50% !important; float:left !important;">
				<div style="float:left;">
					<i class="far fa-calendar-alt"></i>
					기간설정
				</div><br><br>
				<div style="padding-left:-10px; float:left;">
					기간월일 :　 <input type="text" id="datepicker1" name="datepicker1" size=12 style="border:2px solid #BFBFBF; text-indent:1em;"> ~ <input type="text" id="datepicker2" name="datepicker2" size=12 style="border:2px solid #BFBFBF; text-indent:1em;">
				</div>
			</div>
			<div style="width:30% !important; float:left !important;">
				<div style="float:left;">
					<i class="fas fa-male"></i>
					<i class="fas fa-female" style="margin-left: -4px;"></i>
					참여횟수제한
				</div>
				<div style="padding-left:30px; float:left;">
					<input type="text" name="countlm" value="0" size=10 style="border:2px solid #BFBFBF; text-indent:1em;">
				</div>
			</div>
		</div>
		<div id="menu2" class="container tab-pane"><br><br><!-- 공개설정 -->
			<input type="radio" name="open" value="all">　전체공개　　
			<input type="radio" name="open" value="member">　회원공개　　
			<input type="radio" name="open" value="select">　선택공개　　
			<input type="radio" name="open" value="none">　비공개　　
		</div>
		<div id="menu3" class="container tab-pane"><br><br><!-- 타겟설정 -->
			<input type="radio" name="target" value="all">　전체공개　　
			<input type="radio" name="target" value="member">　회원공개　　
			<input type="radio" name="target" value="select">　선택공개　　
			<input type="radio" name="target" value="none">　비공개　　
		</div>
		<div id="menu4" class="container tab-pane"><br><!-- 기타설정 -->
			<div style="width:50% !important; float:left !important;">
			<i class="fas fa-user-cog"></i>　설문 제목 :　<input type="text" name="survey_title" style="border:2px solid #BFBFBF; text-indent:1em;"><br><br>
			<input name="survey_file" type="file" style="margin-left : 22px;">
			</div>
			<div >
			<i class="fas fa-cogs"></i>　이벤트 설정 :　<input type="text" name="event_title" style="border:2px solid #BFBFBF; text-indent:1em; width:250px;"><br><br>
			<br><br>
			</div>
			<br>
			<input type="radio" name="research_type" value="basic">　기본분석　　
			<input type="radio" name="research_type" value="categori">　분류분석　　
			<input type="radio" name="research_type" value="guess">　추론(학습)분석　　
			<input type="radio" name="research_type" value="statistics">　통계학적 기타 분석　　
		</div>
	  </div>
	</div>
	<!-- 설정 끝 -->

	<div class="container mt-3"><br><br>
		<h3 style="color:#FB79A7; margin-bottom:-50px;"><i class="fas fa-list-ol" style="color:#FB79A7; padding-top:5%;"></i>  내용</h3>
		<div id="list">
			<div id="contents0" style="width:100%; float:left; padding-top: 20px;">
			</div>
			<input id="count" name="count" type="hidden" value=""></input>
		</div>
		<script>
			var count = 0;
			window.onload = function () {
				add();
			}
			
			function add(){
				document.getElementById('contents'+count).innerHTML += '<br><h3 style="padding-left:100px; color:#FB79A7!important; padding-top:20px;">'+(count+1)+'번 문항</h3><div style="padding-left: 50px;"><div style="width:5%; float: left; margin-top:100px;"><button onclick="add()" style="width:82%; height:25px; margin-left:1px; border:2px solid white;"><img src="<?php echo G5_IMG_URL ?>/plus.png" alt="" style="width:42px; height:30px; margin-left:-1px; margin-top:-3px;"></button><button style="width:82%; height:25px; margin-left:1px; margin-top:10px; border:2px solid white;" onclick="$(\'#contents'+count+'\').remove();"><img src="<?php echo G5_IMG_URL ?>/minus.png" alt="" style="width:42px; height:30px; margin-left:-1px; margin-top:-3px;"></button></div><div  style="width:50%; float: left;"><input type="text" name="qua-'+count+'" style="width:95%; height:250px; margin-top:15px; border:2px solid #BFBFBF;"></input></div><div style="width:45%; float:left; margin-top:-34px; margin-left:-20px;"><center><input type="radio" name="chk_info'+count+'" value="객관식" style="width:20px;" checked="checked">객관식　</input><input type="radio" name="chk_info'+count+'" value="주관식" style="width:20px;">주관식</input><div style="width:90%; float:left; margin:15px; height:40px;"><input name="value1-'+count+'" type="text" style="border:none; border-bottom:2px solid #BFBFBF; width:95%; margin-top:5px; margin-left:20px; height:40px; text-indent:3em;" placeholder="　①번 답변 항목입니다."><input name="value2-'+count+'" type="text" style="border:none; border-bottom:2px solid #BFBFBF; width:95%; margin-top:15px; margin-left:20px; height:40px; text-indent:3em;" placeholder="　②번 답변 항목입니다."><input name="value3-'+count+'" type="text" style="border:none; border-bottom:2px solid #BFBFBF; width:95%; margin-top:15px; margin-left:20px; height:40px; text-indent:3em;" placeholder="　③번 답변 항목입니다."><input name="value4-'+count+'" type="text" style="border:none; border-bottom:2px solid #BFBFBF; width:95%; margin-top:15px; margin-left:20px; height:40px; text-indent:3em;" placeholder="　④번 답변 항목입니다."><input name="value5-'+count+'" type="text" style="border:none; border-bottom:2px solid #BFBFBF; width:95%; margin-top:15px; margin-left:20px; height:40px; text-indent:3em;" placeholder="　⑤번 답변 항목입니다."></div></center></div></div>';
				count+=1;
				document.getElementById('list').innerHTML += '<div id="contents'+count+'" style="width:100%; float:left;"></div>';
				document.getElementById('count').value = count;
			}
			function chk(id){
				var tmp = $('[name='+id+']').is(':checked');
				document.getElementById(id).value=tmp ;
			}
		</script>
	</div>
	<center style="padding-top:50px;">
		<a href="/">
			<button type="button" style="width:80px; height:40px; margin-left:180px; margin-top:35px; font-weight:bold; color:#FFFFFF!important; background-color:#74CED7; border:none; border-radius: 20px / 20px;">
				취소
			</button>
		</a>
		<button type="submit" style="width:100px; margin-left:20px; margin-top:35px; height:40px; font-weight:bold; color:#FFFFFF!important; background-color:#74CED7; border:none; border-radius: 20px / 20px;">
			작성완료
		</button>
	</center>
</form>


<?php
include_once('./_tail.php');
?>
