
<?php
include_once('./_common.php');
//echo "DB State";
//	echo $_POST['dday']."/".$_POST['datepicker1']."/".$_POST['datepicker2']."/".$_POST['countset']."/[".$_POST['countlm']."]/".$_POST['open']."/".$_POST['target']."/".$_POST['survey_title']."/".$_POST['survey_file']."/".$_POST['event_title']."/".$_POST['event_file']."/".$_POST['research_basic']."/".$_POST['research_branch']."/".$_POST['research_lm']."/".$_POST['research_math'];
$count = $_POST['count'];
$sql = "[{";
for($i=0; $i<$count; $i++){
	$sql = $sql.'"'.$i.'":'.$_POST['ans'.$i];
	if($i+1<$count)
		$sql = $sql.",";
}
$sql = $sql."}]";
$today = date("Y-m-d H:i:s");
$query = "Insert into Survey_data (mb_id,name,data,datetime) VALUES('test','홍길동','".$sql."','".$today."');";
//echo $query;
sql_query($query);
$result = sql_query("SELECT * FROM Survey_data WHERE name = '홍길동' AND datetime = '".$today."'");
$row=sql_fetch_array($result);

$result = sql_query("SELECT * FROM Survey WHERE id = '".$_POST['id']."'");
$up=sql_fetch_array($result);

if($up['question']==""){
	$sql  = $row['id'];
}else{
	$sql = $up['question'].','.$row['id'];
}

$query = "Update Survey Set question='".$sql."' Where id='".$_POST['id']."'";
sql_query($query);
?>
<div onload="move();"></div>
<script>
	document.location.href="/bbs/surveyresult.php?wr="+"<?php echo $_POST['id'] ?>";
</script>