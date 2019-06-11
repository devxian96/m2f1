
<?php
include_once('./_common.php');
//echo "DB State";
//	echo $_POST['dday']."/".$_POST['datepicker1']."/".$_POST['datepicker2']."/".$_POST['countset']."/[".$_POST['countlm']."]/".$_POST['open']."/".$_POST['target']."/".$_POST['survey_title']."/".$_POST['survey_file']."/".$_POST['event_title']."/".$_POST['event_file']."/".$_POST['research_basic']."/".$_POST['research_branch']."/".$_POST['research_lm']."/".$_POST['research_math'];

$json = "{";
for($i=0; $i<$_POST['count']; $i++){
	$json = $json.'"'.$i.'":[{"info":"'.$_POST['chk_info'.$i].'","v1":"'.$_POST['value1-'.$i].'","v2":"'.$_POST['value2-'.$i].'","v3":"'.$_POST['value3-'.$i].'","v4":"'.$_POST['value4-'.$i].'","v5":"'.$_POST['value5-'.$i].'","q":"'.$_POST['qua-'.$i].'"}]';
	if($i+1<$_POST['count']){
		$json = $json.',';
	}
}
$json = $json.'}';
$today = date("Y-m-d H:i:s");


//file upload
$uploads_dir = '/workspace/research/data/tmp';
$allowed_ext = array('jpg','jpeg','png','gif');
 
// 변수 정리
$error = $_FILES['survey_file']['error'];
$name = $_FILES['survey_file']['name'];

$ext = array_pop(explode('.', $name));
 


 
// 파일 이동
move_uploaded_file( $_FILES['survey_file']['tmp_name'], "$uploads_dir/$name");

$sql = "Insert into Survey (subject,name,question,data,datetime,company,phone,email,start_survey,end_survey,limit_count,op_1,op_2,op_3,op_4,op_5,op_6,op_7,op_8,op_9,op_10) VALUES('".$_POST['survey_title']."','뚱이','','".$json."','".$today."','M2F1','010-0000-0000','a@a.com','".$_POST['datepicker1']."','".$_POST['datepicker2']."','".$_POST['countlm']."','".$_POST['dday']."','".$_POST['countset']."','".$_POST['open']."','".$_POST['target']."','".$name."','".$_POST['event_title']."','".$_POST['event_file']."','".$_POST['research_type']."','".$_POST['research_math']."','');";

//echo $sql;
sql_query($sql);

$sql = "SELECT id FROM Survey WHERE subject <= '".$_POST['survey_title']."' AND datetime > '".$today."';";
$result = sql_query("SELECT * FROM Survey WHERE subject = '".$_POST['survey_title']."' AND datetime = '".$today."'");
$row=sql_fetch_array($result);
//echo "ID : ".$row['id'];
?>
<div onload="move();"></div>
<script>
	document.location.href="/bbs/surveyview.php?wr="+"<?php echo $row['id'] ?>";
</script>