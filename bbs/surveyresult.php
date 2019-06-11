<?php
include_once('./_common.php');

$result = sql_query("SELECT * FROM Survey WHERE id = ".$_GET['wr']);
$vote=sql_fetch_array($result);
$id = explode( ',', $vote['question'] );


$g5['title'] = "설문 결과 보기";

include_once('./_head.php');
?>
<script src="/js/highcharts.js"></script>
<script src="/js/series-label.js"></script>
<script src="/js/exporting.js"></script>
<!-----
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
		<input id="survey_ptc" type="radio" name="tabs" style="display:none; " OnClick="window.location.href='/bbs/surveyview.php?wr=<?php echo $vote['id'] ?>';" >
		<label for="survey_ptc" style="color:#74CED7; display: inline-block; margin: 0 0 -1px; padding: 15px 25px;">설문하기</label>

		<input id="survey_res" type="radio" name="tabs" style="display:none;" OnClick="window.location.href='/bbs/surveyresult.php?wr=<?php echo $vote['id'] ?>';" checked>
		<label for="survey_res" style="color:#74CED7; display: inline-block; margin: 0 0 -1px; padding: 15px 25px;">결과보기</label>
	</center>
</div>

 <section id="sur_v_info" >
	 <center><br>
		 <span style="font-size:24pt; font-weight:bold; color:#FB79A7;">' <?php echo $vote['subject'] ?> '
		 </span><br>
	 </center><br><br><br><br>
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
			<i class="fas fa-phone-volume"></i><strong> Phone </strong><?php echo $vote['phone'] ?>　
			<i class="far fa-envelope"></i><strong> E-mail </strong><?php echo $vote['email'] ?>
		</p><br><br><br><br>
			
		<p style="float:right; color:#74CED7; font-weight:bold;">
			<script>
				var event = '<?php echo $vote['op_6'] ?>';
				if (event != "")
					document.write("<i class=\"fas fa-gift\"></i>　 "+event+" 　<i class=\"fas fa-gift\"></i>");
			</script>
		</p><br><br>
	</div>
</section>

<script>
	var ans = new Array();
	var way = "<?php echo $vote['op_8'] ?>";
<?php
	for($i=0; $i<count($id); $i++){
		$query=sql_query("SELECT * FROM Survey_data WHERE id = ".$id[$i]);
		$result=sql_fetch_array($query);
?>
	ans[<?= $i?>]=JSON.parse('{"0":<?= $result['data']?>}');
<?php
	}
?>
	
	var count = new Array();
	var obj = '<?php echo $vote['data'] ?>';
	document.write("<span style=\"float:right; margin-right:30px; color:#FB79A7;\"><i class=\"fas fa-male\"></i><i class=\"fas fa-female\" style=\"padding-right:5px;\"></i>설문 참여자 : 총 <strong>"+Number(Object.keys(ans).length)+"</strong>명</span><br>");
	var obj = JSON.parse(obj);
	var max, min;
	for(var j=0; j< Object.keys(ans[0][0][0]).length; j++){
		max = min = 0;
		var strobj = JSON.stringify(obj[j]);
		if (j!=(Object.keys(ans[0][0][0]).length-1))
			document.write("<center><div style=\"width:80%; height:auto; padding-top:40px; padding-bottom:25px; margin-bottom:20px; border-bottom: 1px solid #FB79A7;\">");
		else
			document.write("<center><div style=\"width:80%; height:auto; padding-top:40px; padding-bottom:25px; margin-bottom:20px;\">");
		
		document.write("<font style=\"font-weight:bold; font-size:23px; margin-right:15px;  color:#FB79A7;\">"+(j+1)+". "+obj[j][0]["q"]+"</font><span style=\"color:#BFBFBF;\">("+obj[j][0]["info"]+")</span><br>");
		document.write("<br><div id=”"+j+"” style=”height: 250px;”></div>");
		for(var k=0; k<5; k++){
			if(obj[j][0]["v"+(k+1).toString()]!=""){
				count[k] = 0;
				for(var ins = 0; ins<ans.length; ins++){
					//document.write(ans[ins][0][0][j]);
					if(ans[ins][0][0][j]==k+1)
						count[k] +=1;
					if(count[max]<count[k])
						max=k
					if(count[min]>count[k])
						min=k
				}
				document.write("<span style=\"color:#BFBFBF;\">"+(k+1)+") "+obj[j][0]["v"+(k+1).toString()]+" : <strong>"+count[k]+"</strong>명 &nbsp; &nbsp; &nbsp; &nbsp;</span>");
			}
		}
		document.write("<br><br><br><span style=\"float:left; width:50%;\"><i class=\"fas fa-angle-double-up\" style=\"padding-right:4px;\"></i>최대값 : '<strong>"+obj[j][0]["v"+(max+1).toString()]+"</strong>' - "+count[max]+"명</span>")
		document.write("<span style=\"float:left; width:50%;\"><i class=\"fas fa-angle-double-down\" style=\"padding-right:4px;\"></i>최소값 : '<strong>"+obj[j][0]["v"+(min+1).toString()]+"</strong>' - "+count[min]+"명</span>")
		document.write("<div id=\"result"+j+"\" style=\"min-width: 310px; height: 400px; margin: 0 auto\"></div>")
		document.write("</div></center>");
		
		
		
		Highcharts.chart('result'+j, {
		  title: {
			text: ""
		  },
		  xAxis: {
			categories: [""]
		  },
		  labels: {
			items: [{
			  style: {
				left: '50px',
				top: '18px',
				color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
			  }
			}]
		  },
		  series: [{
			type: 'column',
			name: obj[j][0]["v"+(1).toString()],
			data: [count[0]]
		  }, {
			type: 'column',
			name: obj[j][0]["v"+(2).toString()],
			data: [count[1]]
		  },  {
			type: 'column',
			name: obj[j][0]["v"+(3).toString()],
			data: [count[2]]
		  }, {
			type: 'column',
			name: obj[j][0]["v"+(4).toString()],
			data: [count[3]]
		  }, {
			type: 'column',
			name: obj[j][0]["v"+(5).toString()],
			data: [count[4]]
		  },{
			type: 'pie',
			name: "응답자 수",
			data: [{
			  name: obj[j][0]["v"+(1).toString()],
			  y: count[0],
			  color: Highcharts.getOptions().colors[0] // Jane's color
			}, {
			  name: obj[j][0]["v"+(2).toString()],
			  y: count[1],
			  color: Highcharts.getOptions().colors[1] // Jane's color
			}, {
			  name: obj[j][0]["v"+(3).toString()],
			  y: count[2],
			  color: Highcharts.getOptions().colors[2] // Jane's color
			},{
			  name: obj[j][0]["v"+(4).toString()],
			  y: count[3],
			  color: Highcharts.getOptions().colors[3] // Jane's color
			},{
			  name: obj[j][0]["v"+(5).toString()],
			  y: count[4],
			  color: Highcharts.getOptions().colors[4] // Jane's color
			}],
			center: [100, 80],
			size: 100,
			showInLegend: false,
			dataLabels: {
			  enabled: true
			}
		  }]
		});


		
		
		
		
	}
</script>
<?php
include_once('./_tail.php');
?>