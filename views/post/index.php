
<div class="container">
	<div class="row">
		<div class="col-md-12">	
				        
			<div class="panel panel-primary">						

				<div class="panel-heading">

					<div class="row">
						<div class='col-md-10'>
							POSTs	
						</div>
						
						<div class="col-md-2">														
	    					<a href="/travel/?r=post/insertUser">Incluir</a>
	    				</div>
					</div>				

				</div>	
						
				<?php
					foreach ($listar as $post):
				?>

						<ul class="list-group">

							<li class="list-group-item">
								<div class="row">	

	                        		<div class="col-md-10">
										<?=$post->getIdTVLPost()?>
									</div>
	                        		<div class="col-md-10">
										<?=$post->getTitulo()?>
									</div>
	                        		<div class="col-md-10">
										<?=$post->getHoraPost()?>
									</div>
	                        		<div class="col-md-10">
										<?=$post->getTexto()?>
									</div>
	                        		<div class="col-md-10">
										<?=$post->getIdTVLUser()->getNome()?>
									</div>
									
									<?php
										$idUser 	= $post->getIdTVLUser()->getIdTVLUser();
										$session 	=$_SESSION['logar']->getIdTVLUser();
										if($idUser == $session):
									?>
									<div class="col-md-1">
										<a href="/travel/?r=post/edit&id=<?=$post->getIdTVLPost()?>">Editar</a>
	                				</div>

									<div class="col-md-1">
	              						<a href="/travel/?r=post/deletar&id=<?=$post->getIdTVLPost()?>">Excluir</a>										
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