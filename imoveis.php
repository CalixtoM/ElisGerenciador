<?php

	session_start();
	include('inc/conecta.php');

		if(!isset($_SESSION['login'])){
			//Se não houver login registrado o usuário é redirecionado à página de login
			echo "<script> location.href='login.php'; </script>";
		}
		else{

			if(isset($_POST['end'])){
				//Se houver conteúdo no POST nome é chamada a função de cadastro de clientes
				cadastraImoveis($mysqli);
			}

			if(isset($_POST['endedit'])){
				editarImoveis($mysqli);
			}

		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Imoveis</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table class="table">
				  	<thead>
				    	<tr>
				      		<th scope="col">#</th>
				      		<th scope="col">Endereço</th>
				      		<th scope="col">Valor</th>
				      		<th scope="col">Proprietário</th>
				    	</tr>
					</thead>
					<tbody>
				    	<tr>
				    		<?php
				    			buscaImoveis($mysqli); //Chama a função responsável por preencher os dados do cliente
				    		?>
				    	</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
					Adicionar Imovel
				</button>
			</div>
		</div>
	</div>


	<!-- Modal Adicionar-->
	<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLongTitle">Adicionar Imovel</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	        		<form method="post">
	        			<input type="text" placeholder="Endereço" class="form-control" name="end" id="mod">
	        			<input type="number" name="vl" placeholder="Valor" name="tel" class="form-control" id="mod">
	        			<select class="form-control" name="prop" id="mod">
	        				<?php
	        					buscaProp($mysqli);
	        				?>
	        			</select>
	        		
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        		<input type="submit" class="btn btn-primary" value="Salvar"></form>
	      		</div>
	    	</div>
	 	</div>
	</div>

</body>
</html>

<style type="text/css">
	#mod{
		margin-top: 5px;
	}
</style>