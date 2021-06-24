<?php

session_start();
include('inc/conecta.php');

	if(!isset($_SESSION['login'])){
		//Se não houver login registrado o usuário é redirecionado à página de login
		echo "<script> location.href='login.php'; </script>";
	}
	else{

		if(isset($_POST['nome'])){
			//Se houver conteúdo no POST nome é chamada a função de cadastro de clientes
			cadastraCliente($mysqli);
		}

		if(isset($_POST['nomeedit'])){
			editarCliente($mysqli);
		}
	}
?>

<!-- ESSA PÁGINA É RESPONSÁVEL POR EXIBIR, CADASTRAR OU EDITAR CLIENTES  -->
<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<table class="table">
				  	<thead>
				    	<tr>
				      		<th scope="col">#</th>
				      		<th scope="col">Nome</th>
				      		<th scope="col">Telefone</th>
				      		<th scope="col">Celular</th>
				      		<th scope="col">Email</th>
				      		<th scope="col">Opções</th>
				    	</tr>
					</thead>
					<tbody>
				    	<tr>
				    		<?php
				    			buscaCliente($mysqli); //Chama a função responsável por preencher os dados do cliente
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
					Adicionar Cliente
				</button>
			</div>
		</div>
	</div>

	<!-- Modal Adicionar-->
	<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLongTitle">Adicionar Cliente</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	        		<form method="post">
	        			<input type="text" placeholder="Nome" class="form-control" name="nome" id="mod">
	        			<input type="number" placeholder="Telefone" name="tel" class="form-control" id="mod">
	        			<input id="mod" type="number" placeholder="Celular" name="cel" class="form-control">
	        			<input id="mod" type="email" placeholder="Email" name="email" class="form-control">
	        		
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        		<input type="submit" class="btn btn-primary" value="Salvar"></form>
	      		</div>
	    	</div>
	 	</div>
	</div>

	<!-- Modal Editar -->
	

	<!-- Modal deletar -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modaldel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Excluir Cliente</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <h6><b>Tem certeza que deseja excluir esse cliente?</b></h6>
	        <p>Digite "Excluir" para confirmar:</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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