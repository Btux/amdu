<?php
require 'libs/config.php';

if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
}

if(isset($_POST) AND !empty($_POST['content'])){

	$DB = new DB();

	$req = $DB->db->prepare('UPDATE competence SET content = :content WHERE id = 1');

	$req->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
	$req->execute();

	header('Location: competence.php');

}else{

	$DB = new DB();

	$req = $DB->db->query('SELECT * FROM competence WHERE id = 1');

	$competence = current($req->fetchAll(PDO::FETCH_OBJ));

	if(empty($competence)){
		$req = $DB->db->query("INSERT INTO competence VALUES ('','competence','Competence vide.')");
		$req = $DB->db->query('SELECT * FROM competence WHERE id = 1');

		$competence = current($req->fetchAll(PDO::FETCH_OBJ));	
	}

	render('competence/edit', 0,0,0,array('competence' => $competence));	
}
