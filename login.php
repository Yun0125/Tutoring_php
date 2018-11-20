<?php

	require_once("tools.php");
	require_once("memberDao.php");

	session_start();

	$id = requestValue("id");
	$pw = requestValue("pw");

	$mdao = new MemberDao();
	$member = $mdao->getMember($id);

	if($member && $member["pw"] == $pw) {
		$_SESSION["uid"] = $id;
		$_SESSION["name"] = $member["name"];
		goNow(MAIN_PAGE);
	} else { 	
		errorBack("로그인 실패");
	}
?>









