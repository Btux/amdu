<?php
require 'libs/config.php';


if(isset($_POST) && !empty($_POST))
{
	extract($_POST);
	extract($_FILES);

	$erreurs = 0;
	if(!empty($titre))
	{
		$titre = htmlentities($titre); 
	}else{
		$erreurs++;
		$messageErreurs['titre'] = "Le titre de la réalisation ne doit pas etre vide."; 
	}

	if(empty($miniature)){
		$erreurs++;
		$messageErreurs['miniature'] = "La réalisation doit avoir une miniature.";
	}else{

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

	}

	$description = (!empty($description)) ? htmlentities($description): '';
	$etiquettes = (!empty($etiquettes)) ? htmlentities($etiquettes): '';

	if(!$erreurs){
		$DB = new DB();

		$req = $DB->db->prepare('INSERT INTO portfolios (titre,miniature,description,etiquettes) VALUES(:titre,:miniature,:description,:etiquettes)');
		$req->bindParam(':titre', $titre);
		$req->bindParam(':miniature', $miniatureName);
		$req->bindParam(':description', $description);
		$req->bindParam(':etiquettes', $etiquettes);

		if($req->execute()){
			$flash['success'] = "La réalisation a été bien ajoutée."; 
		}else{
			$flash['erreur'] = "La réalisation n'as pas bien été enregistré";
		}
	}
}
 $Flashes = isset($flash) ? $flash : '';
 $message = isset($messageErreurs) ? $messageErreurs : '';
render('portfolio/add',0, array('Erreur' => $message, 'Flash' => $Flashes));