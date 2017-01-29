<?php

class UserController{

	public function insert(){

		if(isset($_POST['nome'],$_POST['email'], $_POST['senha'])){

			$userDAO = new UserDAO();

			$user = new User($_POST['nome'],$_POST['email'], $_POST['senha']);
			$user->setCpf($_POST['cpf']);
			$user->setDataNascimento($_POST['dataNascimento']);
			$user->setNivel($_POST['nivel']);
			
			echo"<pre>";
				var_dump($user);
			echo"<pre>";
			$idUser = $userDAO->insert($user);

			$user->setIdTVLUser($idUser);

			$redirect = "?r=index/index";
			$mensagem = "Deu certo";
			require_once __DIR__."/../views/mensagem.php";
		}else{
			$mensagem = "Deu errado";
			require_once __DIR__."/../views/user/formCadastro.php";			
		}

	}

	public function lista(){

		$dao = new UserDAO();
		$lista = $dao->getLista();

		if(!empty($lista)){
			require_once __DIR__."/../views/user/index.php";
		}else{
			$mensagem = "Sem usuários cadastrados";
			require_once __DIR__."/../views/index/index.php";
		}

	}

	public function edit(){
		if(isset($_POST['nome'],$_POST['email'], $_POST['senha'],$_POST['cpf'],$_POST['dataNascimento'],$_POST['nivel'])){

			$user = new User($_POST['nome'],$_POST['email'], $_POST['senha']);
			$user->setIdTVLUser($_POST['idTVLUser']);
			$user->setCpf($_POST['cpf']);
			$user->setDataNascimento($_POST['dataNascimento']);
			$user->setNivel($_POST['nivel']);
			$dao = new UserDAO();

			if($dao->edit($user)){

				$mensagem = "Editado com sucesso.";
			}else{
				$mensagem = "Erro ao editar.";
			}

			$redirect = "?r=index/index";

			require_once __DIR__."/../views/mensagem.php";

		}else{
			$id = $_GET['id'];
			$dao = new UserDAO();

			$user = $dao->getUser($id);
			require_once __DIR__."/../views/user/formCadastro.php";
		}
	}

	public function deleteUser(){

		$id = $_GET['id'];
		$dao = new UserDAO();

		if($user = $dao->deleteUser($id)){
			$mensagem = "Deletado com sucesso";
		}else{
			$mensagem = "Erro ao deletar";
		}

	}

	public function logar(){
		$dao = new UserDAO();
		$lista = $dao->logar($_POST['email'],$_POST['pass']);

		if($lista){
			header("Location: /travel/index.php");		
		}else{
			$mensagem = "Dados incorretos";
			require_once __DIR__."/../views/mensagem.php";
		}

	}
	public function logout() {
		session_start();
		unset($_SESSION["logar"]);
		session_destroy();

		header('Location: /travel/');
	}

	public function friend(){

		$idFriend	= $_GET['id'];
		$idUser 	= $_SESSION['logar']->getIdTVLUser();

		$dao = new UserDAO();

		if($verify = $dao->verifyFriend($idUser, $idFriend)){
			if($user = $dao->friend($idUser, $idFriend)){
				$mensagem = 'Agora vocês são amiguinhos.';
				require_once __DIR__."/../views/user/friend.php";
			}else{
				$mensagem = 'Acho que é o destino contra sua amizade.';
				require_once __DIR__."/../views/mensagem.php";
			}
			return $view = true;
		}else{
			return $view = false;
		}
	}

	public function verifyFriend(){

		$idFriend	= $_GET['id'];
		$idUser 	= $_SESSION['logar']->getIdTVLUser();

		$dao = new UserDAO();

		if($verify = $dao->verifyFriend($idUser, $idFriend)){
			return true;
		}else{
			return false;
		}

	}

}

?>