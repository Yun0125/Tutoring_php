<?php
    require_once("boardDao.php");
    require_once("tools.php");

    $content = requestValue("content");
    $title = requestValue("title");
    $num = requestValue("num");
    $writer = requestValue("writer");

    if(content && title && num && writer){ 
        $dao = new BoardDao();
        $dao->updateMsg($num, $title, $writer, $content); 
        okGo("게시글이 정상적으로 수정되었습니다.", "review.php");
    }else {
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다."); 
    }
?>