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
			if(isset($_SESSION["login"]) && !empty($_SESSION["login"])):
		?>

			<h3>Com sessão</h3>

		<?php
			endif;
		?>