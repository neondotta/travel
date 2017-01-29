<div>
	<h2>Adiciona POST</h2>	
	<form method="POST">

		<textarea name="texto" id="" cols="30" rows="10" placeholder="Texto"><?=isset($id) ? $post->getTexto() : ""?></textarea>
		<input type="text" name="titulo" placeholder="Titulo" value="<?=isset($id) ? $post->getTitulo() : ""?>">
		<?php
			if(isset($_GET['id'])):
		?>
			<input type="text" name="idPost" value="<?=isset($id) ? $post->getIdTVLPost() : ""?>">
			<input type="text" name="horaPost" value="<?=isset($id) ? $post->getHoraPost() : ""?>">
			<input type="text" name="idtvluser" value="<?=isset($id) ? $post->getIdTVLUser()->getNome() : ""?>">	
		<?php
			endif;
		?>

		<button type="submit">Salvar</button>


	</form>

</div>