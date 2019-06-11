<?php
include_once('./_common.php');

// 세션을 지웁니다.
set_session("ss_mb_reg", "");

$g5['title'] = '설문 리스트';
include_once('./_head.php');

$sql = "select * from Survey ORDER BY id DESC"; 
$result = sql_query($sql); 

?>

<style>
	@import url(http://fonts.googleapis.com/earlyaccess/jejugothic.css);
	div{
		font-family: Tahoma , Jeju Gothic;
	}
	input::placeholder{
		color:#BFBFBF;
	}	
	input:focus{
		outline:none;
	}
	
</style>

<div class="container mt-3"><br><br>
		<h3 style="color:#FB79A7; margin-left:20px;"><i class="far fa-hand-pointer" style="color:#FB79A7;"></i> SELECT SURVEY</h3>
	
	  <input type="text" name="stx" id="sch_stx" placeholder="검색어(필수)" required maxlength="45" style="height:28px; border: 2px solid #FB79A7; margin-left:72%; margin-bottom:20px; margin-top:-15px;" >
  <button type="submit" value="검색" id="sch_submit" style="margin-left:-25px; background-color: white; border: 2px solid white; margin-bottom:20px; margin-top:-15px; "><i class="fa fa-search" style="color:#FB79A7;important! "></i><span class="sound_only">검색</span></button>

	<div style="width:90%; height:auto;">
		<?php
			for ($i=0; $row=sql_fetch_array($result); $i++) {
				 //echo $row;
		?>
		<a href="/bbs/surveyview.php?wr=<?php echo $row['id']; ?>">
			<div style="float:left; width:20%; height:230px; padding:5px; margin:25px; margin-bottom:40px; border: 2px solid #bfbfbf;">
				<img src="<?php
				if($row['op_5'] == "")
					$img = "/img/noimage.png";
				else
					$img = "/data/tmp/".$row['op_5'];
				echo $img;
				?>" width="100%" height="160px">
				<center><div style="font-size:23px; margin-top:2%; color:#BFBFBF;">
					<script>
						var subj  = '<?php echo $row["subject"]; ?>';
						if(subj=="")
							document.write("' No Title '");
						else
							document.write(subj);
					</script>
				</div></center>
				<div style="color:#FB79A7; margin-top:1%!important; font-size:8pt;">
					<span style="float:left;"><strong ><i class="fas fa-user-edit"></i> <?php echo $row['name'] ?>　
						</strong></span>
					<span style="float:right;"><i class="fa fa-clock-o" aria-hidden="true"></i>
						<script>
							var today = new Date('<?php echo $row['datetime']; ?>');
							if ((today.getMonth()+1)<10)
								var month = '0'+(today.getMonth()+1);
							else
								var month = today.getMonth()+1;
							if ((today.getDate()+1)<10)
								var day = '0'+today.getDate();
							else
								var day = today.getDate();
							var date = today.getFullYear()+'-'+ month +'-'+day;
							document.write(date);
						</script>
					</span>
				</div>
			</div>
		</a>
		<?php
			} 
		?>
	</div>
</div>	

<?php

	$data = sql_query("SELECT * FROM Survey ");
	$num = sql_num_rows($data);

	$page = ($_GET['page'])?$_GET['page']:1;
	$list = 4;
	$block = 1;
		
	$pageNum = ceil($num/$list); // 총 페이지
	$blockNum = ceil($pageNum/$block); // 총 블록
	$nowBlock = ceil($page/$block);
		
	$s_page = ($nowBlock * $block) - 2;

	if ($s_page <= 1) {
		$s_page = 1;
	}
	$e_page = $nowBlock*$block;
	if ($pageNum <= $e_page) {
		$e_page = $pageNum;
	}
	
	echo "현재 페이지는".$page."<br/>";
	echo "현재 블록은".$nowBlock."<br/>";

	echo "현재 블록의 시작 페이지는".$s_page."<br/>";
	echo "현재 블록의 끝 페이지는".$e_page."<br/>";

	echo "총 페이지는".$pageNum."<br/>";
	echo "총 블록은".$blockNum."<br/>";

	for ($p=$s_page; $p<=$e_page; $p++) {

?>

	<!----
    <a href="<?=$PHP_SELP?>?page=<?=$p?>"><?=$p?></a>
	--->

<?php
	}
?>


<div style="margin-left:5%; color:#74CED7; font-weight:bold;">
	<center>
		<p>PAGE <?php echo $p-1 ?><br></p>
		
		<a href="<?=$PHP_SELP?>?page=<?=$s_page-1?>" style="color:#74CED7;"><i class="fas fa-step-backward"></i> 이전　　</a>
		<a href="<?=$PHP_SELP?>?page=<?=$e_page+1?>" style="color:#74CED7;">다음 <i class="fas fa-step-forward"></i></a>
	</center>
</div>

<?php
	$s_point = ($page-1) * $list;


	$real_data = sql_query("SELECT * FROM Survey ORDER BY no DESC LIMIT 0,3");

	for ($i=1; $i<=$num; $i++) {
		$fetch = sql_fetch_array($real_data);
?>

    <div>
        <?= $fetch['list_no'] ?>
    </div>

<?php
    if ($fetch == false) {
        break;
    }
}
?>


<?php
include_once('./_tail.php');
?>