<?php
require 'libs/config.php';

if(isset($_FILES) AND !empty($_FILES['image']['name'])){
	
	$imgExtensions = array('jpg','png', 'gif','jpeg');
	$imgExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	
	if(in_array($imgExtension, $imgExtensions)){

		$uploadNewName = 'medias'.DS.md5($_FILES['image']['name']).'.'.$imgExtension;

		$uploadPath = _ROOT_.DS.$uploadNewName;

		move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

		$data = getimagesize($uploadPath);


		$link = $uploadNewName;
		       //Here we are constructing the JSON Object
		       $res = array("upload" => array(
		                               "links" => array("original" => $link),
		                               "image" => array("width" => $data[0],
		                                                "height" => $data[1]
		                                               )                              
		                   ));
		       //echo out the response :)
		       echo json_encode($res);

	}
	
}