<?php
class MemberDAO {
	private $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=localhost;dbname=php", "root", "");

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function getMember($id) {
		try {
			$sql = "select * from membership where id = :id";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
			$pstmt->execute();
			$result = $pstmt->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}

		return $result;
	}

	public function insertMember($id, $pw, $name, $email) {
		try {
			$sql = "insert into membership(email, id, pw, name) values(:email, :id, :pw, :name)";
			$pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":email", $email, PDO::PARAM_STR);
            $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
            $pstmt->bindValue(":name", $name, PDO::PARAM_STR);

			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}

	}
    
    function updateMember($id, $pw, $name, $email) {
		try {
            $sql = "update membership set email = :email, pw = :pw, name=:name where id=:id";
            $this-> $this->db->prepare($sql);
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":email", $email, PDO::PARAM_STR);
			$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
			$pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
            $pstmt->bindValue(":name", $name, PDO::PARAM_STR);
            
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}

	}

}

?>