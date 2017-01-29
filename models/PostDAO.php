<?php

class PostDAO extends DAO{

	public function insertUser(Post $post){

		$sql = "INSERT INTO tvlpost
					(idTVLUser,idTVLGrupo, horaPost,titulo,texto)
				VALUES
					(:idTVLUser,:idTVLGrupo, NOW(),:titulo,:texto)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':idTVLUser' 	=> $post->getIdTVLUser()->getIdTVLUser(),
			':idTVLGrupo' 	=> $post->getIdTVLGrupo() ? $post->getIdTVLGrupo() : null,
			':titulo' 		=> $post->getTitulo(),
			':texto' 		=> $post->getTexto()
		));

		return $this->db()->lastInsertId();

	}

	public function edit(POST $post){

		$sql = "UPDATE tvlpost
				SET titulo = :titulo,
					texto = :texto
				WHERE idTVLPost = :idPost";

		$query = $this->db()->prepare($sql);

		$query->bindParam(':idPost', $post->getIdTVLPost(), PDO::PARAM_INT);
		$query->bindParam(':titulo', $post->getTitulo(), PDO::PARAM_STR);
		$query->bindParam(':texto', $post->getTexto(), PDO::PARAM_STR);

		return $query->execute();

	}

	public function getLista($idUser){

		$sql = 'SELECT p.*, u.* FROM tvlpost p
				INNER JOIN tvluser u
					USING(idtvluser)
				WHERE p.idtvluser = :idUser
				ORDER BY p.horaPost DESC';

		$query = $this->db()->prepare($sql);
		$query->execute(array(':idUser' => $idUser));

		$listar = array();
		
		foreach ($query as $dataPost) {
			
			$user = new User($dataPost['nome'],$dataPost['email'],$dataPost['senha']);
			$user->setIdTVLUser($dataPost['idTVLUser']);
			
			$post = new Post($dataPost['texto']);
			$post->setTitulo($dataPost['titulo']);
			$post->setHoraPost($dataPost['horaPost']);
			$post->setIdTVLPost($dataPost['idTVLPost']);
			$post->setIdTVLUser($user);

			array_push($listar, $post);
		}
		
		return $listar;

	}

	public function getPost($id){

		$sql = 'SELECT * FROM tvlpost
				INNER JOIN tvluser
					USING(idtvluser)
				WHERE idTVLPost = :idPost';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':idPost' => $id));

		$data = $query->fetch();

		$user = new User($data['nome'],$data['email'],$data['senha']);
		$user->setIdTVLUser($data['idTVLUser']);

		$post = new POST($data['texto']);
			$post->setIdTVLPost($data['idTVLPost']);
			$post->setTitulo($data['titulo']);
			$post->setHoraPost($data['horaPost']);
			$post->setIdTVLUser($user);

		return $post;

	}

	public function deletar($id){

		$sql = 'DELETE FROM tvlpost WHERE idTVLPost = :idPost';

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':id' => $id));

	}

}


?>