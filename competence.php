<?php
require 'libs/config.php';

	$DB = new DB();

	$req = $DB->db->query('SELECT * FROM competence WHERE id = 1');

	$competence = current($req->fetchAll());

	if(empty($competence)){
		$req = $DB->db->query("INSERT INTO competence VALUES ('','competence','Competence vide.')");
		$req = $DB->db->query('SELECT * FROM competence WHERE id = 1');

		$competence = current($req->fetchAll());	
	}

	render('competence', 0,0,0,array('competence' => $competence));	

