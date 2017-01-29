<?php

class DAO{

	protected $con;

	function __construct(){
		try{
			$this->con = new PDO("mysql:host=localhost:3307;dbname=travel", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}catch(Exception $e){
			echo "Falhou a conexão:" .$e->getMessage();
		}
	}

	public function db(){
		return $this->con;
	}

}

?>