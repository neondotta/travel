<?php

class UserDAO extends DAO{

	public function insert(User $user){

		$sql = "INSERT INTO tvluser
					(nome,cpf,email,senha,dataNascimento,nivel)
				VALUES
					(:nome,:cpf,:email,:senha,:dataNascimento,:nivel)";

		$query = $this->db()->prepare($sql);
		
		$query->execute(array(
			':nome'		=> $user->getNome(), 
			':cpf'		=> $user->getCpf(),
			':email'	=> $user->getEmail(),
			':senha'	=> $user->getSenha(),
			':dataNascimento' => $user->getDataNascimento(),
			':nivel'	=> $user->getNivel() ? $user->getNivel() : 1
		));

		return $this->db()->lastInsertId();

	}

    public function getUser($id){

        $sql = "SELECT * from tvluser where idTVLUser = :id";
        $query = $this->db()->prepare($sql);

        $query->execute(array(':id' => $id));

        $data = $query->fetch();

		$user = new User($data['nome'],$data['email'],$data['senha']);
            $user->setIdTVLUser($data['idTVLUser']);
            $user->setCpf($data['cpf']);
            $user->setDataNascimento($data['dataNascimento']);
            $user->setNivel($data['nivel']);

        return $user;

    }

	public function getLista(){

		$sql = "SELECT * FROM tvluser";

		$query = $this->db()->query($sql);


		$lista = array();

		foreach($query as $data){

			$user = new User($data['nome'],$data['email'],$data['senha']);
			$user->setIdTVLUser($data['idTVLUser']);
			$user->setDataNascimento($data['dataNascimento']);

			array_push($lista, $user);


		}

		return $lista;

	}

	public function edit(User $user){

		$sql = "UPDATE tvluser 
				SET nome=:nome,
					cpf=:cpf,
					email=:email,
					senha=:senha,
					dataNascimento=:dataNascimento,
					nivel=:nivel
				WHERE
					idTVLUser=:idUser";

		$query = $this->db()->prepare($sql);

		$query->bindParam(':idUser', $user->getIdTVLUser(), PDO::PARAM_INT);
		$query->bindParam(':nome', $user->getNome(), PDO::PARAM_STR);
		$query->bindParam(':cpf', $user->getCpf(), PDO::PARAM_STR);
		$query->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
		$query->bindParam(':senha', $user->getSenha(), PDO::PARAM_STR);
		$query->bindParam(':dataNascimento', $user->getDataNascimento(), PDO::PARAM_STR);
		$query->bindParam(':nivel', $user->getNivel(), PDO::PARAM_INT);

		return $query->execute();

	}

	public function deleteUser($idUser){

		$sql = "DELETE FROM tvluser WHERE idTVLUser = :idUser";

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':idUser' => $idUser));

	}


	public function logar($email, $pass){

		$sql = "SELECT * FROM tvluser
				WHERE 	email = :email
				AND		senha = :pass";

		$query = $this->db()->prepare($sql);
		$query->execute(array(':email' => $email, ':pass' => $pass));

		$result = $query->fetch();

		if(empty($result)){
			return false;
		}else{
			$user = new User($result['nome'],$result['email'],$result['pass']);
			$user->setIdTVLUser($result['idTVLUser']);
			$user->setDataNascimento($result['dataNascimento']);

			session_start();
			$_SESSION['logar'] = $user;
			return true;
		}

	}

	public function friend($idUser, $idFriend){

		$sql = 'INSERT INTO tvlfriend
					(idTVLUser, idTVLUser1, favorito, seguir, horaFriend)
				VALUES
					(:idUser, :friend, :favorito, :seguir, NOW())
				';

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':idUser' 	=> $idUser,
			':friend' 	=> $idFriend,
			':favorito'	=> false,
			':seguir'	=> true
		));

		return $this->db()->lastInsertId();

	}

	public function verifyFriend($idUser, $idFriend){

		$sql = 'SELECT f.idTVLUser1, u.* FROM tvlfriend f
				INNER JOIN tvluser u
					USING(idtvluser)
				WHERE idtvluser = :idUser 
				AND   idtvluser1= :idFriend';

		$query = $this->db()->prepare($sql);

		$query->execute(array('idUser' => $idUser, 'idFriend' => $idFriend));

		if($idUser == $idFriend){
			return true;
		}else{
			return false;
		}

	}

}


?>