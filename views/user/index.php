
<div class="container">
	<div class="row">
		<div class="col-md-12">	
				        
			<div class="panel panel-primary">						

				<div class="panel-heading">

					<div class="row">
						<div class='col-md-10'>
							Usuários	
						</div>
						
						<div class="col-md-2">														
	    					<a href="/travel/?r=user/insert">Incluir</a>
	    				</div>
					</div>				

				</div>	
						
				<?php
					foreach ($lista as $user):
				?>

						<ul class="list-group">

							<li class="list-group-item">
								<div class="row">	

	                        		<div class="col-md-10">
										<?=$user->getNome()?>
									</div>
	                        		<div class="col-md-10">
										<?=$user->getEmail()?>
									</div>
	                        		<div class="col-md-10">
										<?=$user->getDataNascimento()?>
									</div>
	                        		<div class="col-md-10">
										<?=$user->getCpf()?>
									</div>
	                        		<div class="col-md-10">
										<?=$user->getSenha()?>
									</div>
	                        		<div class="col-md-10">
										<?=$user->getNivel()?>
									</div>
									
								
									<div class="col-md-1">
										<a href="/travel/?r=user/edit&id=<?=$user->getIdTVLUser()?>">Editar</a>
	                				</div>

									<div class="col-md-1">
	              						<a href="/travel/?r=user/deleteUser&id=<?=$user->getIdTVLUser()?>">Excluir</a>										
	                				</div>
	                				<?php
	                				if($_SESSION['logar']->getIdTVLUser() != $user->getIdTVLUser()):
	                   				?>
										<div class="col-md-1">
	              							<?php
	              								$userController = new FriendController();
	              								$idUser = $_SESSION['logar']->getIdTVLUser();
	              								$idFriend = $user->getIdTVLUser(); 
	              								
	              								$verify = $userController->verifyFriend($idUser, $idFriend);

	              								if($verify == 3){

	              							?>

			              							<a href="/travel/?r=friend/confirmFriend&id=<?=$user->getIdTVLUser()?>">
			              								Aceitar Solicitação.
			              							</a>
			              							<br>
			              							<a href="/travel/?r=friend/deleteFriend&id=<?=$user->getIdTVLUser()?>">
			              								Rejeitar Solicitação.
			              							</a>										
										
											<?php
	              								}else if($verify == 2){
	              							?>
			              				
			              							Pendente

	              							<?php
	              								}else if($verify == 1){
	              							?>
			              							<a href="/travel/?r=friend/deleteFriend&id=<?=$user->getIdTVLUser()?>">
														Desfazer Amizade
			              							</a>
	              							<?php
	              								}else{
	              							?>
			              							<a href="/travel/?r=friend/friend&id=<?=$user->getIdTVLUser()?>">
			              								Criar Amizade
			              							</a>	
	              							<?php
	              								}
	              							?>
	                					</div>
	                				<?php
	                				endif;
	                				?>
								</div>
							</li>
						</ul>
					<?php
							endforeach;
			        ?>		            		
	            		
		        </div>	              

		</div>

	</div>	
</div>

<a href="/travel/">Voltar</a>