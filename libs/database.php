<?php 
/**
* DB
*/
class DB
{
	
	public $db;

	function __construct()
	{

		try{

			$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			
			$this->db = new PDO('mysql:host=localhost;dbname=amdu','root','',$options);
			
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}