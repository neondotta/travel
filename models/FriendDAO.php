<?php


class FriendDAO extends DAO{

		public function friend($idUser, $idFriend){

		$sql = 'INSERT INTO tvlfriend
					(idTVLUser, idTVLUser1, favorito, favorito1, seguir, seguir1, pendente, hourFriend)
				VALUES
					(:idUser, :friend, false, false, true, true, true, NOW())
				';
		$query = $this->db()->prepare($sql);
		var_dump($query);

		$query->execute(array(
			':idUser' 	=> $idUser,
			':friend' 	=> $idFriend,
		));

		return $this->db()->lastInsertId();

	}

	public function verifyFriend($idUser, $idFriend){

		$sql = 'SELECT f.idTVLUser, f.idTVLUser1, f.pendente, u.* FROM tvlfriend f
				INNER JOIN tvluser u
					USING(idtvluser)
				WHERE (idtvluser = :idUser 
				AND   idtvluser1= :idFriend) OR (idtvluser = :idFriend 
				AND   idtvluser1= :idUser)';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':idUser' => $idUser, ':idFriend' => $idFriend));

		$listFriend = array();

		foreach ($query as $lista) {

			$user = new User($lista['nome'],$lista['email']);
				$user->setIdTVLUser($lista['idTVLUser']);
			if($idUser == $_SESSION['logar']->getIdTVLUser()){
				$friend = new Friend($user, $lista['idTVLUser1']);
				$friend->setPendente($lista['pendente']);	
			}
			if($idFriend == $_SESSION['logar']->getIdTVLUser()){
				$friend = new Friend($lista['idTVLUser'], $user);
				$friend->setPendente($lista['pendente']);
			}

			array_push($listFriend, $friend);
		}
		return $listFriend;


	}

	public function deleteFriend($idUser, $idFriend){

		$sql = 'DELETE FROM tvlfriend
				WHERE 	(idtvluser = :idUser
				AND		idTVLUser1 = :idFriend)
				OR 		(idtvluser = :idFriend
				AND		idTVLUser1 = :idUser)';

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':idUser' => $idUser, ':idFriend' => $idFriend));

	}

	public function getFriend($id){
		$sql = 'SELECT * FROM tvlfriend WHERE idTVLUser = :id OR idTVLUser1 = :id';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':id' => $id));

		$data = $query->fetch();

		$friend = new Friend($data['idTVLUser'], $data['idTVLUser1']);
			$friend->setTVLFriend($data['idTVLFriend']);
			$friend->setFavorito($data['favorito']);
			$friend->setFavorito1($data['favorito1']);
			$friend->setSeguir($data['seguir']);
			$friend->setSeguir1($data['seguir1']);
			$friend->setHourFriend($data['hourFriend']);

		return $friend;

	}

	public function listFriend($idUser){

		$sql = 'SELECT f.*, u.idTVLUser, u.nome, u.email, u.dataNascimento FROM tvlfriend f
				INNER JOIN tvluser u
					using(idTVLUser)
				WHERE (f.idTVLUser = :idUser OR f.idTVLUser1 = :idUser)
				AND f.pendente = FALSE';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':idUser' => $idUser));

		$listFriend = array();
		$user = new UserDAO();
		foreach($query as $lista){
			if($lista['idTVLUser1'] == $idUser){
					$result = $lista['idTVLUser'];
			}else{
					$result = $lista['idTVLUser1'];
			}

			$id = $user->getUser($result);

			if($lista['idTVLUser1'] == $idUser){
				$friend = new Friend($id, $lista['idTVLUser1']);
					$friend->setFavorito($lista['favorito']);
					$friend->setFavorito1($lista['favorito1']);
					$friend->setSeguir($lista['seguir']);
					$friend->setSeguir1($lista['seguir1']);
					$friend->setHourFriend($lista['hourFriend']);
			}else{
				$friend = new Friend($lista['idTVLUser'], $id);
					$friend->setFavorito($lista['favorito']);
					$friend->setFavorito1($lista['favorito1']);
					$friend->setSeguir($lista['seguir']);
					$friend->setSeguir1($lista['seguir1']);
					$friend->setHourFriend($lista['hourFriend']);
			}

			array_push($listFriend, $friend);

		}

		return $listFriend;
	}

	public function confirmFriend($idUser, $idFriend){

		$sql = 'UPDATE tvlfriend
				SET pendente = false
				WHERE (idTVLUser = :idUser AND idTVLUser1 = :idFriend)
				OR 		(idTVLUser = :idFriend AND idTVLUser1 = :idUser)';

		$query = $this->db()->prepare($sql);


		return $query->execute(array(':idUser' => $idUser, ':idFriend' => $idFriend));


	}

	public function idFriend(){

		$idUser = $_SESSION['logar']->getIdTVLUser();
		$sql = 'SELECT f.*, u.idTVLUser, u.nome, u.email, u.dataNascimento FROM tvlfriend f
				INNER JOIN tvluser u
					using(idTVLUser)
				WHERE (f.idTVLUser = :idUser OR f.idTVLUser1 = :idUser)
				AND f.pendente = FALSE';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':idUser' => $idUser));


		$lista = $this->listFriend($idUser);
		
		$listFriend = array();

		foreach ($query as $postFriend) {

			if($postFriend['idTVLUser'] == $idUser){
					$friend = $postFriend['idTVLUser1'];
			}else{
					$friend = $postFriend['idTVLUser'];
			}
			array_push($listFriend, $friend);

		}

		print_r($listFriend);

		return $listFriend;

	}

	public function postFriend(){

		$postFriend = $this->idFriend();

		$lista = array();

		$postDAO = new postDAO();
		foreach ($postFriend as $val) {
			
			$listaPost = $postDAO->getLista($val);

			if(!empty($listaPost)){
				array_push($lista, $listaPost); 
			}
		}
		echo '<pre>';
		print_r($lista);
		echo '</pre>';
		return $lista;

	}



}



?>