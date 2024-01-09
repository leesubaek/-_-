<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
   
	$bno = $_GET['idx'];
    $good = mysqli_fetch_array(query("select good from board where idx='$bno';"));
    $good = $good['good'] + 1;
    query("update board set good=".$good." where idx=".$bno.";");
    ?>
    <script type="text/javascript">alert("추천되었습니다.");</script>
    <meta http-equiv="refresh" content="0 url=/index1.php" />