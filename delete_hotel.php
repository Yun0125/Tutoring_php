<?php
   require_once("tools.php");
   require_once("boardDaohotel.php");

   $num = requestValue("num");

   $dao = new boardDao();
 
   $dao->deleteMsg($num);
  
   header("Location: hotelreview.php");
?>