<?php
if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
}
if(isset($_GET['id']) && !empty($_GET['id'])){

	$id = (int)	$_GET['id'];

	/*if(is_int($id)){
		$DB = new DB();
		$req = $DB->db->prepare('DELETE  FROM portfolios WHERE id = :id');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();

	}*/
	header('Location: portfolioall.php');
}