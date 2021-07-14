<?php

	session_start();
	include('inc/conecta.php');

		if(!isset($_SESSION['login'])){
			//Se não houver login registrado o usuário é redirecionado à página de login
			echo "<script> location.href='login.php'; </script>";
		}
		else{

			echo "oi";

		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Compra e Venda</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table class="table">
				  	<thead>
				    	<tr>
				      		<th scope="col">Imovel</th>
				      		<th scope="col">Proprietario</th>
				      		<th scope="col">Comprador</th>
				      		<th scope="col">FInanciamento</th>
				    	</tr>
					</thead>
					<tbody>
				    	<tr>
				    		<?php
				    			buscaCompraVenda($mysqli); //Chama a função responsável por preencher os dados de compra e venda
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
					Registrar Compra e Venda
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
	        			<select class="form-control" name="prop" id="mod">
	        				<?php
	        					buscaImoveis2($mysqli);
	        				?>
	        			</select>
	        			<select class="form-control" name="prop" id="mod">
	        				<?php
	        					buscaProp($mysqli);
	        				?>
	        			</select>
	        			<select class="form-control" name="comp" id="mod">
	        				<?php
	        					buscaComp($mysqli);
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