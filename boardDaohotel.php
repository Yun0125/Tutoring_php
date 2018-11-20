<?php
class BoardDAO {
	private $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=localhost;dbname=php", "root", "");

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function insertMsg($title, $writer, $content) {
		try {
			$sql = "insert into hotelreview(title, writer, content) values(:title, :writer, :content)";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":title", $title, PDO::PARAM_STR);
			$pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
			$pstmt->bindValue(":content", $content, PDO::PARAM_STR);

			$pstmt->execute();

		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function getManyMsgs() {
		try {
			$sql = "select * from hotelreview";	
			$pstmt = $this->db->prepare($sql);	
			$pstmt->execute();
			$msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}

		return $msgs;
	}

	public function getMsg($num) {
		try {
			$sql = "select * from hotelreview where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_STR);
			$pstmt->execute();

			$msg = $pstmt->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}
		return $msg;
	}

	public function increaseHits($num) {
		try {
			$sql = "update hotelreview set hits=hits+1 where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function deleteMsg($num) {
		try {
			$sql = "delete from hotelreview where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}	

	public function updateMsg($num, $title, $writer, $content) {
		try {
			$sql = "update hotelreview set title=:t, writer=:w, content=:c where num=:n"; 

             $pstmt = $this->db->prepare($sql);      
             $pstmt->bindValue(":t", $title, PDO::PARAM_STR);
             $pstmt->bindValue(":w", $writer, PDO::PARAM_STR);
             $pstmt->bindValue(":c", $content, PDO::PARAM_STR);
             $pstmt->bindValue(":n", $num, PDO::PARAM_INT);

             $pstmt->execute();

		}catch(PDOException $e) {
			exit($e->getMessage());
		}


	}

	function getPageMsgs($startRecord, $count) {
	try {
			$sql = "select * from hotelreview order by num desc limit :startRecord, :count";	
			$pstmt = $this->db->prepare($sql);	
			$pstmt->bindValue(":startRecord", $startRecord, PDO::PARAM_INT);
			$pstmt->bindValue(":count", $count, PDO::PARAM_INT);
			$pstmt->execute();
			$msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}

		return $msgs;
	}

	public function getTotalCount() {
		try {
			$sql = "select count(*) as totalCount from hotelreview";
			$pstmt = $this->db->prepare($sql);
			$pstmt->execute();
			$count = $pstmt->fetchColumn();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
		return $count;
	}
}	

?>