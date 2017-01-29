
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
	              								foreach ($lista as $view) {
	              								
	              								if($view == true):
	              							?>
	              							<a href="/travel/?r=user/friend&id=<?=$user->getIdTVLUser()?>">
	              								Amizade
	              							</a>										
	              							<?php
	              								endif;	
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