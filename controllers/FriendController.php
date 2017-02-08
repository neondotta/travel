<?php

class FriendController{


	public function friend(){

		$idFriend	= $_GET['id'];
		$idUser 	= $_SESSION['logar']->getIdTVLUser();

		$dao = new FriendDAO();

			if($user = $dao->friend($idUser, $idFriend)){
				$mensagem = 'Agora vocês são amiguinhos.';
				require_once __DIR__."/../views/mensagem.php";
			}else{
				$mensagem = 'Acho que é o destino contra sua amizade.';
				require_once __DIR__."/../views/mensagem.php";
			}
	}

	public function verifyFriend($idUser, $idFriend){

		$dao = new FriendDAO();
		$verify = $dao->verifyFriend($idUser, $idFriend);
		if($verify){
			foreach ($verify as $key => $val) {
				
				$friend = $val->getPendente();
				$id = $val->getIdTVLUser()->getIdTVLUser();
				
				if($friend == 0){
					return 1;
				}else{
				
					if($_SESSION['logar']->getIdTVLUser() == $id){
						return 2;
					}else{
						return 3;
					}
				
				}

			}
		}else{
			return 0;
		}

	}

	public function deleteFriend(){

		$idFriend = $_GET['id'];
		$idUser = $_SESSION['logar']->getIdTVLUser();
		$dao = new FriendDAO();

		if($user = $dao->deleteFriend($idUser, $idFriend)){
			$mensagem = "Deletado com sucesso";
			require_once __DIR__."/../views/mensagem.php";
		}else{
			$mensagem = "Erro ao deletar";
			require_once __DIR__."/../views/mensagem.php";
		}

	}

	public function listFriend(){

		$idUser = $_SESSION['logar']->getIdTVLUser();
		$friendDAO = new friendDAO();

		$list = $friendDAO->listFriend($idUser);


		if(empty($list)){
			$mensagem = 'Você ta sem amigos no momento';
			require_once __DIR__."/../views/mensagem.php";
		}

		return $list;

	}

	public function confirmFriend(){

		$dao = new FriendDAO();

		$idUser = $_SESSION['logar']->getIdTVLUser();
		$idFriend = $_GET['id'];

		if($dao->confirmFriend($idUser, $idFriend)){
			$mensagem = "Amiguinho aceito com sucesso.";
		}else{
			$mensagem = "Erro ao aceitar seu amiguinho.";
		}

		$redirect = "?r=index/index";

		require_once __DIR__."/../views/mensagem.php";				

	}

	public function postFriend(){

		$friendDAO = new friendDAO();

		$friend = $friendDAO->postFriend();

		if(empty($friend)){
			$mensagem = "Sem novos POSTS.";
		}

		return $friend;

	}

}


?>