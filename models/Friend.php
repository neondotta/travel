<?php

class Friend{

	private $idTVLFriend;
	private $idTVLUser;
	private $idTVLUser1;
	private $favorito;
	private $favorito1;
	private $seguir;
	private $seguir1;
	private $hourFriend;
	private $pendente;

	function __construct($idTVLUser,$idTVLUser1){
		$this->setIdTVLUser($idTVLUser);
		$this->setIdTVLUser1($idTVLUser1);
	}

	public function getIdTVLFriend(){
		return $this->idTVLFriend;
	}

	public function setIdTVLFriend($idTVLFriend){
		$this->idTVLFriend = $idTVLFriend;
		return $this;
	}
	public function getIdTVLUser(){
		return $this->idTVLUser;
	}

	public function setIdTVLUser($idTVLUser){
		$this->idTVLUser = $idTVLUser;
		return $this;
	}
	public function getIdTVLUser1(){
		return $this->idTVLUser1;
	}

	public function setIdTVLUser1($idTVLUser1){
		$this->idTVLUser1 = $idTVLUser1;
		return $this;
	}

	public function getFavorito(){
		return $this->favorito;
	}

	public function setFavorito($favorito){
		$this->favorito = $favorito;
		return $this;
	}
	public function getFavorito1(){
		return $this->favorito1;
	}

	public function setFavorito1($favorito1){
		$this->favorito1 = $favorito1;
		return $this;
	}

	public function getSeguir(){
		return $this->seguir;
	}

	public function setSeguir($seguir){
		$this->seguir = $seguir;
		return $this;
	}
	public function getSeguir1(){
		return $this->seguir1;
	}

	public function setSeguir1($seguir1){
		$this->seguir1 = $seguir1;
		return $this;
	}

	public function getHourFriend(){
		return $this->hourFriend;
	}

	public function setHourFriend($hourFriend){
		$this->hourFriend = $hourFriend;
		return $this;
	}
	public function getPendente(){
		return $this->pendente;
	}

	public function setPendente($pendente){
		$this->pendente = $pendente;
		return $this;
	}

}

?>