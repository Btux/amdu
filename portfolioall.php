<?php
require 'libs/config.php';

$DB = new DB();

$req = $DB->db->query('SELECT COUNT(id) FROM portfolios');

$portfoliosCount = current(current($req->fetchAll(PDO::FETCH_ASSOC)));

$portfolioParPage = 8;

$nbPages = ceil($portfoliosCount/$portfolioParPage);

$pageCourante  = 1;

if(isset($_GET['p']) && is_numeric($_GET['p']))
{
	$page = (int) $_GET['p'];

	if($page >= 1 && $page <= $nbPages)
	{
		$pageCourante = $page;

	}
	elseif($page < 1)
	{
		$pageCourante = 1;
	}else{
		$pageCourante = $nbPages;
	}
}

$debut = ($pageCourante * $portfolioParPage - $portfolioParPage);

$req = $DB->db->prepare("SELECT * FROM portfolios LIMIT :debut, :portfolioParPage");

$req->bindParam(':debut', $debut,PDO::PARAM_INT);
$req->bindParam(':portfolioParPage', $portfolioParPage, PDO::PARAM_INT);

$req->execute();

$portfolios = $req->fetchAll(PDO::FETCH_OBJ);

render('portfolio/all',0,0,0,array('portfolios' => $portfolios,'nbPages' => $nbPages,'pageCourante' => $pageCourante ));