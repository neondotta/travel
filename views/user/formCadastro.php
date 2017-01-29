<div>
	<h2>Adiciona Usuário</h2>	
	<form method="POST">


		<input type="text" name="nome" placeholder="Nome" value="<?=isset($id) ? $user->getNome() : ""?>">
		<input type="text" name="cpf" placeholder="CPF" value="<?=isset($id) ? $user->getCpf() : ""?>">
		<input type="email" name="email" placeholder="E-mail" value="<?=isset($id) ? $user->getEmail() : ""?>">
		<input type="password" name="senha" placeholder="Senha" value="<?=isset($id) ? $user->getSenha() : ""?>">
		<input type="date" name="dataNascimento" value="<?=isset($id) ? $user->getDataNascimento() : ""?>">
		<input type="<?=isset($id) ? "text" : "hidden" ?>" name="nivel" value="<?=isset($id) ? $user->getNivel() : ""?>">

		<input type="hidden" class="form-control" id="idTVLUser" name="idTVLUser" value="<?=isset($id) ? $user->getIdTVLUser() : ""?>">

		<button type="submit">Salvar</button>


	</form>

</div>