<?php

class User{
	
	private $idTVLUser;
	private $nome;
	private $email;
	private $cpf;
	private $senha;
	private $dataNascimento;
	private $nivel;	

	function __construct($nome, $email, $senha){
		$this->setNome($nome);
		$this->setEmail($email);
		$this->setsenha($senha);
	}

	public function getIdTVLUser(){
		return $this->idTVLUser;
	}
	public function setIdTVLUser($idTVLUser){
		$this->idTVLUser = $idTVLUser;
		return $this;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setCpf($cpf){
		$this->cpf = $cpf;
		return $this;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}
	public function getDataNascimento(){
		return $this->dataNascimento;
	}
	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
		return $this;
	}
	public function getNivel(){
		return $this->idTVLUser;
	}
	public function setNivel($nivel){
		$this->nivel = $nivel;
		return $this;
	}


}

?>