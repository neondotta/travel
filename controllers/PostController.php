<?php

class PostController{

	public function insertUser(){

		if(isset($_POST['texto'])){
			$user = new User($_SESSION['logar']->getNome(),$_SESSION['logar']->getEmail(),$_SESSION['logar']->getSenha());
			$user->setIdTVLUser($_SESSION['logar']->getIdTVLUser());

			$postDAO = new PostDAO();

			$post = new Post($_POST['texto']);
			$post->setTitulo($_POST['titulo']);
			$post->setIdTVLUser($user);

			$idPost = $postDAO->insertUser($post);

			$post->setIdTVLPost($idPost);
			$mensagem = "Deu certo!";
			require_once __DIR__."/../views/mensagem.php";
		}else{
			$mensagem = "Deu errado!";
			require_once __DIR__."/../views/post/formCadastro.php";
		}

	}


	public function edit(){

		if(isset($_POST['texto'])){
			if(isset($_GET["id"]) && !empty($_GET["id"])){
				$id = $_GET['id'];

				$post = new Post($_POST['texto']);
				$post->setIdTVLPost($_POST['idPost']);
				$post->setTitulo($_POST['titulo']);

				$dao = new PostDAO();

				if($dao->edit($post)){
					$mensagem = "Atualizado com sucesso.";
				}else{
					$mensagem = "Erro ao atualizar.";
				}

				require_once __DIR__.'/../views/mensagem.php';
			}
		}else{
			$id = $_GET['id'];

			$dao = new PostDAO();
			$post = $dao->getPost($id);
			require_once __DIR__."/../views/post/formCadastro.php";
		}

	}

	public function listar(){

	    if (isset($_GET["id"]) && !empty($_GET["id"])) {
	    	if($_GET['id'] == $_SESSION['logar']->getIdTVLUser()){
	        	$id = $_GET["id"];

				$dao = new PostDAO();
				$listar = $dao->getLista($id);

				if(!empty($listar)){
					require_once __DIR__.'/../views/post/index.php';
				}else{
					$mensagem = "Sem POSTS deste usuário";
					require_once __DIR__.'/../views/mensagem.php';
				}
			}else{
				$mensagem = "Informações não batem";
				require_once __DIR__.'/../views/mensagem.php';
			}
		}

	}

	public function deletar(){

		$id = $_GET['id'];
		$dao = new PostDAO();

		if($post = $dao->deletar($id)){
			$mensagem = 'POST deletado com sucesso';
		}else{
			$mensagem = 'Erro ao deletar o POST';
		}

		require_once __DIR__.'/../views/mensagem';


	}

	
}

?>