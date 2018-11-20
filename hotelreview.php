<!--예상문제 한페이지에 5개씩 몇개를 만들어서 어쩌고-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min3.css">
	<style>
		a:hover {text-decoration: none}
	</style>	
</head>
<body>

<div class="container">	
	<table class="table table-hover">
		<tr>	
			<th>제목</th>
			<th></th>
			<th>작성자</th>
			<th>조회수</th>
		</tr>
	<?php

		require_once("boardDaohotel.php");
		require_once("tools.php");

		$page = requestValue("page"); 
		if ($page < 1)
			$page = 1;

		$dao = new BoardDao();
		$startRecord = ($page-1)*10; 
		$msgs = $dao->getPageMsgs($startRecord, 10);
		
	?> 
	<?php foreach($msgs as $msg) : ?> 
		<tr>			    
            <td><a href="view_hotel.php?num=<?= $msg["Num"] ?>&page=<?= $page?>"> <?= $msg["Title"] ?> </a> </td>
			<td></td>
			<td><?= $msg["Writer"] ?> </td>
			<td><?= $msg["Hits"] ?> </td>
		</tr>
	<?php endforeach ?>	
	</table>	

<div class="float-center" style="margin-top:20px">	
	<button class="btn btn-primary btn-lg" onclick="location.href='write_hotelform.html'">글쓰기</button>
</div>
</div>
<?php
	$numPageLinks = 10;
	$numMsgs = 10; 
	$startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
    $endPage = $startPage + ($numPageLinks-1);
    $count = $dao->getTotalCount(); 
    $totalPages = ceil($count/$numMsgs); 
    if($endPage > $totalPages) 
    	$endPage = $totalPages; 
?>
<?php if($startPage > 1) : ?>
<a href="board.php?page=<?= $startPage - $numPageLinks ?>"> 
    <li class="page-item disabled">
      <a class="page-link" href="#">&laquo;</a>
    </li> 
</a>
<?php endif ?>

<?php for($i=$startPage; $i <= $endPage; $i++) : ?> 
	 <a href="board.php?page=<?= $i ?>"> 
	 	<?php if($i==$page) :?>
	 		<b>
	 			<?= $i ?> 
	 		</b>
	 	<?php else :?>
	 		<?= $i ?>	
	 	<?php endif ?>
	</a> 

<?php endfor ?>    

<?php if ($endPage < $totalPages) : ?>
	<a href="board.php?page=<?=$endPage+1?>">
        <li class="page-item">
          <a class="page-link" href="#">&raquo;</a>
        </li>
	</a>	
<?php endif ?>	

</body>
</html>