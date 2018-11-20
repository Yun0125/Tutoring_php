<?php
	/*
		1. 클리어언트로부터 전송되어오 num 값을 추출
		2. 그 num 값으로 DB에서 게시글 레코드를 읽고
		3. 그 읽은 레코드를 이용해서 
		   게시글 상세정보를 html로 만든다.
	*/
	require_once("tools.php");
	require_once("boardDao.php");
	$num = requestValue("num");
    $page = requestValue("page");
	$dao = new boardDao();
	$dao->increaseHits($num); //조회수
	$msg = $dao->getMsg($num); 
?>
<html>
<head>
	<meta charset="UTF-8">
		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min3.css">	

	<script>
		function processDelete(num) {
			result = confirm("삭제할까요?");
			if(result) {
				location.href="delete_review.php?num="+num;
			}
		}
	</script>
    <style>
        body{
            padding-top: 80px;    
        }
        
        .container {
            max-width: 500px;
            padding: 15px;
            margin: 0 auto;
            position: relative;
            box-sizing: border-box;
            height: auto;
            font-size: 20px;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="form-group">
              <label for="title">제목</label>
              <input type="text" id="title" class="form-control" value="<?=$msg["Title"] ?>" >
            </div>
            <div class="form-group">
              <label for="writer">작성자</label>
              <input type="text" id="writer" class="form-control" value="<?=$msg["Writer"] ?>" >
            </div>
            <div class="form-group">
              <label for="hits">조회수</label>
              <input type="text" id="hits" class="form-control" value="<?=$msg["Hits"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <div ><?=$msg["Content"] ?></div>
            </div>
            <button type="button" onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>'" class="btn btn-primary btn-lg">수정하기</button>
            <button type="submit" onclick="delete_review.php"class="btn btn-primary btn-lg">삭제하기</button>
            <button type="button" onclick="location.href='review.php'" class="btn btn-primary btn-lg">목록보기</button>
        </div>
</body>
</html>