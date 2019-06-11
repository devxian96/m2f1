<?php
include_once('./_common.php');

$result = sql_query("SELECT * FROM Survey WHERE id = ".$_GET['wr']);
$vote=sql_fetch_array($result);

$g5['title'] = "설문하기";

include_once('./_head.php');
?>

<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<!----
<p>
글 ID : <?php echo $vote['id'] ?><br>
작성자 : <?php echo $vote['name'] ?><br>
작성자 연락처 : <?php echo $vote['phone'] ?><br>
작성자 이메일 : <?php echo $vote['email'] ?><br>
답변 DB ID : <?php echo $vote['question'] ?><br>
글 작성일 : <?php echo $vote['datetime'] ?><br>
글 제목 : <?php echo $vote['subject'] ?><br>
글 대표 이미지 : <?php echo $vote['op_5'] ?><br>
이벤트 제목 : <?php echo $vote['op_6'] ?><br>
이벤트 대표 이미지 : <?php echo $vote['op_7'] ?><br>
기간 : <?php echo $vote['op_1'] ?><br>
기간설정 : <?php echo $vote['start_survey'] ?> ~ <?php echo $vote['end_survey'] ?><br>
참여횟수 설정 : <?php echo $vote['op_2'] ?><br>
참여횟수 인원 : <?php echo $vote['limit_count'] ?><br>
글 공개설정 : <?php echo $vote['op_3'] ?><br>
투표 참여자 제한 설정 : <?php echo $vote['op_4'] ?><br>
분석 방법 : <?php echo $vote['op_8'] ?><br>
작성자 소속 : <?php echo $vote['company'] ?><br>
문항 : <?php echo $vote['data'] ?><br>
</p>
----->

<style>
	@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
	div{
		
		font-family: Tahoma , Jeju Gothic;
	}
	
	.survey_tabs{
		padding-bottom: 30px;
		background:#FFF;
	}
	
	input:checked + label{
		color:#FB79A7!important;
		border-bottom: 2px solid #FB79A7;
	}
</style>

<div class="survey_tabs">
	<center>
		<input id="survey_ptc" type="radio" name="tabs" style="display:none; " OnClick="window.location.href='/bbs/surveyview.php?wr=<?php echo $vote['id'] ?>';" checked>
		<label for="survey_ptc" style="color:#74CED7; display: inline-block; margin: 0 0 -1px; padding: 15px 25px;">설문하기</label>

		<input id="survey_res" type="radio" name="tabs" style="display:none;" OnClick="window.location.href='/bbs/surveyresult.php?wr=<?php echo $vote['id'] ?>';">
		<label for="survey_res" style="color:#74CED7; display: inline-block; margin: 0 0 -1px; padding: 15px 25px;">결과보기</label>
	</center>
</div>


<article id="sur_v" style="width:<?php echo $width; ?>">
	<center>
    <header>
        <h2 id="sur_v_title">
            <?php if ($category_name) { ?>
            <span class="sur_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span> 
            <?php } ?>
            <span class="sur_v_tit">
            <?php
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></span>
        </h2>
    </header>

    <section id="sur_v_info" ><br>
		<span style="font-size:24pt; font-weight:bold; color:#FB79A7;">' <?php echo $vote['subject'] ?> '</span>
		<br><br><br><br>
		<div style="margin-right:30px; color:#BFBFBF;">		
				<img src="<?php
					if($vote['op_5'] == "")
						$img = "/img/noimage.png";
					else
						$img = "/data/tmp/".$vote['op_5'];
					echo $img;
						  ?>" width="200px" height="200px" style="float:left; margin-left:60px; margin-top:-35px;">
			<p style="float:right;">
				<strong><i class="fas fa-user-edit"></i>  <?php echo $vote['name'] ?>　</strong>
				<i class="fa fa-clock-o" aria-hidden="true" ></i>  <?php echo $vote['datetime'] ?>
			</p><br><br>
			<p style="float:right; margin-top:-10px;">
				<i class="far fa-envelope"></i><strong> E-mail </strong><?php echo $vote['email'] ?>
			</p><br><br><br>	
			<p style="float:right;">
				 	<i class="fas fa-user-lock" ></i><strong>　'<?php echo $vote['op_3'] ?>'</strong> 공개　　
					<i class="fas fa-users"></i><strong>　'<?php echo $vote['op_4'] ?>'</strong> 참여
					(<strong> '<?php echo $vote['limit_count'] ?>' </strong> 명 까지)
			</p><br><br>
			<p style="float:right; margin-top:-10px;"><i class="fa fa-clock-o" aria-hidden="true"></i>
				<strong>  참여 가능 기간　</strong>
				<script>
					var today =  new Date('<?php echo $vote['start_survey']; ?>');
					if ((today.getMonth()+1)<10)
						var month = '0'+(today.getMonth()+1);
					else
						var month = (today.getMonth()+1);
					if((today.getDate())<10)
						var date = '0'+(today.getDate());
					else
						var date = today.getDate();
					var schedule = today.getFullYear()+'-'+ month +'-'+date;
					document.write(schedule);
				</script> ~
				<script>
					var today =  new Date('<?php echo $vote['end_survey']; ?>');
					if ((today.getMonth()+1)<10)
						var month = '0'+(today.getMonth()+1);
					else
						var month = (today.getMonth()+1);
					if((today.getDate())<10)
						var date = '0'+(today.getDate());
					else
						var date = today.getDate();
					var schedule = today.getFullYear()+'-'+ month +'-'+date;
					document.write(schedule);
				</script>
			</p><br><br>
			<p style="float:right; color:#74CED7; font-weight:bold;">
				<script>
				var event = '<?php echo $vote['op_6'] ?>';
				if (event != "")
					document.write("<i class=\"fas fa-gift\"></i>　 "+event+" 　<i class=\"fas fa-gift\"></i>");
				</script>
			</p><br>
			
		</div>
    </section>


    <section id="sur_v_atc" style="color:#FB79A7;">
		<br>
		<form action="/bbs/surveydataupdate.php" method="post">
			<script>
				var count;
				var obj = '<?php echo $vote['data'] ?>';
				var obj = JSON.parse(obj);
				for(var i=0; i<Object.keys(obj).length; i++){
					var strobj = JSON.stringify(obj[i]);
					//document.write(strobj);
					//document.write("<br>");
					if (i!=(Object.keys(obj).length-1))
						document.write("<center><div style=\"width:80%; height:auto; padding-top:35px; padding-bottom:25px; margin-bottom:20px; border-bottom: 1px solid #FB79A7;\">");
					else
						document.write("<center><div style=\"width:80%; height:auto; padding-top:35px; padding-bottom:25px; margin-bottom:20px;\">");
					
					document.write("<font style=\"font-weight:bold; font-size:23px; margin-right:15px;\">"+(i+1)+". "+obj[i][0]["q"]+"</font><span style=\"color:#BFBFBF!important; font-weight:bold;\">("+obj[i][0]["info"]+")<br><br>");
					count = 1;
					for(var j=0; j<5; j++){
						if(obj[i][0]["v"+(j+1).toString()]!=""){
							document.write("<input type=\"radio\" name=\"ans"+i.toString()+"\" value=\""+count+"\" \">&nbsp;&nbsp;"+obj[i][0]["v"+(j+1).toString()]+"</input>&nbsp; &nbsp; &nbsp; &nbsp;");
							count+=1
						}

					}
					document.write("</span></div>");
				}
				document.write("<input type=\"hidden\" name=\"count\" value=\""+i+"\">");
			</script>
			<input type="hidden" name="id" value="<?php echo $vote['id'] ?>">
			<button type="submit" style="width:100px; margin-top:50px; height:40px; font-weight:bold; color:#FFFFFF!important; background-color:#74CED7; border:none; border-radius: 20px / 20px;">
			작성완료
			</button>
		</form>
    </section>

<?php
include_once('./_tail.php');
?>