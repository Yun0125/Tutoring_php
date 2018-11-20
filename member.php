<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		require_once("tools.php");
		require_once("memberDao.php");

		$id = requestValue("id");
		$pw = requestValue("pw");
		$name = requestValue("name");
        $email = requestValue("email");

		if($id && $pw && $name && $email) {
			$mdao = new MemberDAO();
			if ($mdao->getMember($id)) {

				 errorBack('이미 사용중인 아이디 입니다.');
				
				exit();
			} else {
				$mdao->insertMember($id, $pw, $name, $email);
				okGo("가입이 완료 되었습니다.", 'login_form.html');
			}
		}

	?>
</body>
</html>