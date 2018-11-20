<?php
   require_once("tools.php");
   require_once("boardDao.php");

   $num = requestValue("num");

   $dao = new boardDao();
 
   $dao->deleteMsg($num);
  
   header("Location: review.php");
?>