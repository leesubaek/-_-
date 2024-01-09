<? 
include $_SERVER['DOCUMENT_ROOT']."/db.php";
header("Content-Type: text/html; charset=UTF-8");
$mode= $_REQUEST["mode"];
$page=basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<!--<html Lang="ko">-->
<meta charset="UTF-8">
<head>
<title>dcinside_copy</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src=""https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="board_area">
    <div class="row">
    <div class="col-md-3">
    <img src="\Screenshot_2024-01-09-17-59-51.png" alt="광고" width="100%" class="img-responsive">

    </div>
    <div class="col-md-6"> 
        <h3>자유 게시판 <small>subaek</small></h3>
        <hr>
        <ul class="nav nav-tabs">
        <ul class="nav nav-tabs">
        <li role="presentation"<?php if (empty($mode) || $mode == "fileBrowser") echo "class=\"active\""; ?>><a href="<?=$page?>?mode=fileBrowser">전체 글</a></li>
        </ul>

        </ul> 
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>작성일</th>
                    <th>조회수</th>
                    <th>추천수</th>
                </tr>   
            </thead>
            <?
                 $sql = mq("select * from board order by idx desc limit 0,10"); 
                 while($board = $sql->fetch_array())
                 {
                  
                   $title=$board["title"]; 
                   if(strlen($title)>30)
                   { 
                  
                     $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                   }
             ?>
            <tbody>
                <tr>
                <td width="70"><?php echo $board['idx']; ?></td>
                <td width="500"><a href="/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
                <td width="120"><?php echo $board['name']?></a></td>
                <td width="120"><?php echo $board['date']?></td>
                <td width="100"><?php echo $board['hit']; ?></td>
                <td width="100"><?php echo $board['good']; ?></td>   
                </tr>
            </tbody>
        <?}?>
        </table>
        <div id="write_btn">
      <a href="/writer.php"><button>글쓰기</button></a>
        </div>
        <hr>
        <p class="text-muted text-center">leesubaek@1998</p>
    </div>    
    <div class="col-md-3">  <img src="\Screenshot_2024-01-09-17-59-51.png" alt="광고" width="100%" class="img-responsive">
</div>    
    </div>    
</div>
</body>
</html>
