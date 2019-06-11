<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);
?>

<aside id="visit" style="background:#bfbfbf !important ;">
    <h2 style="font-weight:bold !important;"><i class="far fa-chart-bar"></i> 접속자집계 <a style="color:#fff;" href="<?php echo G5_BBS_URL ?>/current_connect.php" title="현재접속자"><i class="fa fa-ellipsis-h"></i></a></h2>
    <ul>
        <li>
            <strong>오늘</strong>
            <span><?php echo number_format($visit[1]) ?></span>
        </li>
        <li>
            <strong>어제</strong>
            <span><?php echo number_format($visit[2]) ?></span>
        </li>
        <li>
            <strong>최대</strong>
            <span><?php echo number_format($visit[3]) ?></span>
        </li>
        <li>
            <strong>전체</strong>
            <span><?php echo number_format($visit[4]) ?></span>
        </li>
    </ul>
</aside>
