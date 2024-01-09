<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php"; 
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/style.css" />
</head>
<body>
	<?php
		$bno = $_GET['idx']; 
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board where idx='".$bno."'"); 
		$board = $sql->fetch_array();
	?>

<div class="board_area">
 <div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-6">
	<div id="board_read">
		<h2><?php echo $board['title']; ?></h2>
			<div id="user_info">
				<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?> 추천수:<? echo $board['good'];?>
					<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>

	
	<div id="bo_ser">
		<ul>
			<li><a href="/index1.php?idx=<?php echo $board['idx']; ?>">[목록으로]</a></li>
            <li><a href="good.php?idx=<?php echo $board['idx']; ?>">[추천]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
    </div>
	</div>
</div>
<div class="col-md-3"></div>
</div>	
</div>
</body>
</html>