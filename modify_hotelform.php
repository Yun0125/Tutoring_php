<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min3.css">
	<style>
        body{
            padding-top: 80px;    
        }
        
        .write {
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
     <?php
        require_once("boardDaohotel.php");
        require_once("tools.php");
        $page = requestValue("page");
        $num = requestValue("num");
    
        $dao = new boardDao();
        $msg = $dao->getMsg($num);
    ?>
    
     <form class="write" action="modifyhotel.php" method="post">
          <fieldset>
            <div class="form-group">
              <label for="title">제목</label>
              <input class="form-control" value="<?= $msg["Title"] ?>"  id="title" name="title" type="text" required>
            </div>
            <div class="form-group">
              <label for="writer">작성자</label>
              <input class="form-control" value="<?= $msg["Writer"] ?>"  id="witer" name="writer" type="text" required>
            </div>
            <div class="form-group">
              <label for="content">내용</label>
             <textarea class="form-control" id="content" name="content" rows="5"><?=$msg["Content"] ?></textarea>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">수정하기</button>
            <button type="button" onclick="location.href='hotelreview.php'" class="btn btn-primary btn-lg">이전으로</button>
          </fieldset>
    </form>
</body>
</html>
<!--
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" type="file">
      <small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
    
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="custom-file">
            <input class="custom-file-input" id="inputGroupFile02" type="file">
            <label class="custom-file-label" for="inputGroupFile02"></label>
            </div>
            <div class="input-group-append">
            <span class="input-group-text">Upload</span>
            </div>
        </div>
    </div>
-->