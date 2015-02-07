<?php 
require 'libs/config.php';

if(!isset($_SESSION['logged']['id'])){
        header('Location: login.php');
}

if (isset($_POST) && !empty($_POST['id'])) {

	extract($_POST);
	extract($_FILES);

	$erreurs = 0;
	
	if(!empty($id)){
		$id = (int) $id;
	}else{
		$flash['erreur'] = "Vous n'avez choisi la réalisation à modifier.";
	}

	if(!empty($titre))
	{
		$titre = htmlentities($titre); 
	}else{
		$erreurs++;
		$messageErreurs['titre'] = "Le titre de la réalisation ne doit pas etre vide."; 
	}

	if(!empty($miniature['name'])){

		$miniatureType =  pathinfo($miniature['name'], PATHINFO_EXTENSION);
		$miniatureSize = !empty($miniature['tmp_name']) ? getimagesize($miniature['tmp_name']):'';

		if(empty($miniatureSize) OR ($miniatureSize[0] < 460 OR $miniatureSize[1] < 460)){
			$messageErreurs['miniature'] = "La taille de la miniature doit être supérieur à 460x460.";
			$erreurs++;
		}

		if(!in_array($miniatureType, array('jpg','jpeg','png','gif'))){
			$messageErreurs['miniature'] = "Le type d'image de la miniature n'est pas permise. (Ex: jpg, jpeg, png, gif)";
			$erreurs++;
		}

		if(!$erreurs){	
			$miniatureName = DS.'uploads'.DS.'portfolios'.DS.md5($miniature['name']).'.'.$miniatureType;
			$miniaturePath = _ROOT_.DS.$miniatureName;

			if(!move_uploaded_file($miniature['tmp_name'], $miniaturePath)){
				$messageErreurs['miniature'] = "Impossible d'uploader la miniature";
				$erreurs++;
			}	
		}

	}else{
		$miniature = false;
	}

	$description = (!empty($description)) ? htmlentities($description): '';
	$etiquettes = (!empty($etiquettes)) ? htmlentities($etiquettes): '';

	if(!$erreurs){
		$DB = new DB();

		if($miniature){
			$req = $DB->db->prepare('UPDATE portfolios  SET titre = :titre, miniature = :miniature, description = :description, etiquettes = :etiquettes WHERE id = :id');
		}else{
			$req = $DB->db->prepare('UPDATE portfolios  SET titre = :titre, description = :description, etiquettes = :etiquettes WHERE id = :id');
		}
		
		$req->bindParam(':id', $id);
		$req->bindParam(':titre', $titre);
		if($miniature){
			$req->bindParam(':miniature', $miniatureName);
		}
		$req->bindParam(':description', $description);
		$req->bindParam(':etiquettes', $etiquettes);

		if($req->execute()){
			$flash['success'] = "La réalisation a été bien modifiée."; 
			header('Location: portfolio.php');
		}else{
			$flash['erreur'] = "La réalisation n'as pas bien été modifiée.";
		}
	}

}elseif(isset($_GET['id']) && !empty($_GET['id'])){

	$id = (int)	$_GET['id'];

	if(is_int($id)){
		$DB = new DB();
		$req = $DB->db->prepare('SELECT * FROM portfolios WHERE id = :id');
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();

		$portfolio = current($req->fetchAll(PDO::FETCH_OBJ));

		if(isset($portfolio->id) && !empty($portfolio->id)){

			render('portfolio/edit',0,0,$portfolio);
		
		}

	}else{

	}
}else{
	header('Location: index.php');
}