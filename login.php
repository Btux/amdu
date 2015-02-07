<?php
require 'libs/config.php';


if(isset($_SESSION['logged']['id'])){
	header('Location: index.php');
}
if(isset($_POST) && !empty($_POST)){

	extract($_POST);

	if(isset($pseudo) AND isset($password))
	{
		$erreurs = 0;
		
		if(empty($pseudo)){
			$erreurs++;
			$message['Erreur'] = 'Le pseudo ne doit pas être vide.';
		}

		if(empty($password)){
			$erreurs++;
			$message['Erreur'] = 'Le mot de passe ne doit pas etre vide.';
		}

		if(!$erreurs){
			$password = sha1($password);

			$DB = new DB();

			$req = $DB->db->prepare('SELECT * FROM users WHERE pseudo= :pseudo AND password = :password LIMIT 1');

			$req->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
			$req->bindParam(':password',$password,PDO::PARAM_STR);

			$req->execute();

			$user = current($req->fetchAll(PDO::FETCH_OBJ));
			echo $user;
			if($user AND $user->id){
				if($user->pseudo == $pseudo && $user->password == $password){
					$_SESSION['logged']['pseudo'] = $user->pseudo;
					$_SESSION['logged']['id'] = $user->id;

					header('Location: index.php');
				}else{
					render('login', 0, array('Erreur' => "Cet utilisateur n'existe pas."));
				}
			}else{
				render('login', 0, array('Erreur' => "Cet utilisateur n'existe pas."));
			}

		}else{
			render('login',0,$message);
		}

	}else{
		render('login',0,array('Erreur' => 'Le pseudo ou le mot de passe ne doivent pas être vide.'));
	}

}else{
	render('login');
}