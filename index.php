<?php
require 'libs/config.php';

$DB = new DB();

$db = $DB->db;

$req = $db->query('SELECT * FROM portfolios LIMIT 0,4');

$portfolios = $req->fetchAll(PDO::FETCH_OBJ);

render('index',0,0,0,array('portfolios' => $portfolios));