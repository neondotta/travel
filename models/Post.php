<?php
class Post{
	private $idTVLPost;
	private $idTVLGrupo;
	private $idTVLUser;
	private $horaPost;
	private $titulo;
	private $texto;

	function __construct($texto){
		$this->setTexto($texto);
	}

	public function getIdTVLPost(){
		return $this->idTVLPost;
	}
	public function setIdTVLPost($idTVLPost){
		$this->idTVLPost = $idTVLPost;
		return $this;
	}
	public function getIdTVLGrupo(){
		return $this->idTVLGrupo;
	}
	public function setIdTVLGrupo(Grupo $idTVLGrupo){
		$this->idTVLGrupo = $idTVLGrupo;
		return $this;
	}
	public function getIdTVLUser(){
		return $this->idTVLUser;
	}
	public function setIdTVLUser($idTVLUser){
		$this->idTVLUser = $idTVLUser;
		return $this;
	}
	public function getHoraPost(){
		return $this->horaPost;
	}
	public function setHoraPost($horaPost){
		$this->horaPost = $horaPost;
		return $this;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
		return $this;
	}
	public function getTexto(){
		return $this->texto;
	}
	public function setTexto($texto){
		$this->texto = $texto;
		return $this;
	}

}

?>