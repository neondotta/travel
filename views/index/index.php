<h2>INDEX BITCH</h2>


<div>
	
<?php

	$list = new FriendController();
	
	$postFriend = $list->postFriend();

	foreach ($postFriend as $post => $val) {

?>
	
	<ul>
		
		<li><?=$val->getTitulo()?></li>
	
	</ul>
	
<?php
	}


	$listFriend = $list->listFriend();


	foreach ($listFriend as $friend => $value) {
		if($value->getIdTVLUser() == $_SESSION['logar']->getIdTVLUser()){
	?>


	<ul>
		<li><?=$value->getIdTVLUser1()->getNome()?></li>
		<li><?=$value->getIdTVLUser1()->getDataNascimento()?></li>	
	<?php
		}else{
	?>
		<li><?=$value->getIdTVLUser()->getNome()?></li>
		<li><?=$value->getIdTVLUser()->getDataNascimento()?></li>		
	<?php		
		}
	?>
		<li>
			<?php
				if($value->getSeguir()){
			?>
				Seguindo
			<?php
				}else{
			?>
				Seguir ?
			<?php
				}
			?>
		</li>
		<li>
			Favorito:
			<?php
				if($value->getFavorito()){
			?>
				Sim
			<?php
				}else{
			?>
				Não
			<?php
				}
			?>
		</li>
	</ul>

<?php
	}


?>

</div>