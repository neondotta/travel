<?php
	session_start();
	require_once __DIR__.'/cabecalho.php';

	if(!empty($_SESSION['logar'])) {
		header('Location: /travel/index.php');
	}
?>

<form action="/travel/index.php?r=user/logar" method="post">
	
	<input type="text" name="email" placeholder="Insira seu E-mail">
	<input type="password" name="pass" placeholder="Insira sua senha">

	<input type="submit" value="Logar">

</form>


<?php
	require_once __DIR__.'/rodape.php';
?>