
<?php
    require_once("tools.php");
    require_once("boardDaohotel.php"); 

    $title = requestValue("title");
    $writer = requestValue("writer");
    $content = requestValue("content");

    if ($title && $writer && $content) {
        $dao = new BoardDao();
        $dao->insertMsg($title, $writer, $content);
        okGo("정상적으로 입력되었습니다", "hotelreview.php");
    }else {
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
    }
?>