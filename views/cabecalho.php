<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Fórum</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="/travel/css/custom.css">
	</head>

	<body>

		<h1>Cabeçalho!</h1>
		
		<?php
			global $tipo;
			if(isset($_SESSION["logar"]) && !empty($_SESSION["logar"])):
		?>

			<a href="/travel/?r=post/insertUser">Criar Post</a>
			<a href="/travel/?r=post/listar&id=<?=$_SESSION['logar']->getIdTVLUser()?>">Listar Post</a>
			<a href="/travel/?r=user/insert">Criar Usuário</a>
			<a href="/travel/?r=user/lista">Listar Usuário</a>


			<a href="/travel/?r=user/logout">Logout</a>

		<?php
			endif;
		?>