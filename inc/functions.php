<?php

	//Função faz um select nos clientes cadastrados, exibindo todos na tabela
	function buscaCliente($mysqli){
		$cliente = "SELECT * FROM cliente ORDER BY cd_cliente ASC";


		if($result = $mysqli->query($cliente)){
			while($obj = $result->fetch_object()){
				$cont = 0;
				$cont ++;

				echo "
					<th scope='row'> ".$cont."</th>
					<td>".$obj->nm_cliente."</td>
					<td>".$obj->nr_telefone."</td>
					<td>".$obj->nr_celular."</td>
					<td>".$obj->ds_email."</td>
					<td><a type='button' class='btn btn-warning' data-toggle='modal' data-target='#modaledit$obj->cd_cliente'>
					Editar
					</a></td><td><a type='button' class='btn btn-danger' data-toggle='modal' data-target='#modaldel?cd=$obj->cd_cliente'>
					Excluir
				</a></td>
				</tr>

				<div class='modal fade' id='modaledit$obj->cd_cliente' tabindex'-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-centered' role='document'>
					    	<div class='modal-content'>
					    		<div class='modal-header'>
					        		<h5 class='modal-title' id='exampleModalLongTitle'>Editar Cliente</h5>
					        		<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					          			<span aria-hidden='true'>&times;</span>
					        		</button>
					      		</div>
					      		<div class='modal-body'>
					        		<form method='post'>
					        			<input type='text' placeholder='Nome' value='$obj->nm_cliente' class='form-control' name='nome' id='mod'>
					        			<input type='number' placeholder='Telefone' value='$obj->nr_telefone' name='tel' class='form-control' id='mod'>
					        			<input id='mod' type='number' placeholder='Celular' value='$obj->nr_celular' name='cel' class='form-control'>
					        			<input id='mod' type='email' placeholder='Email' value='$obj->ds_email' name='email' class='form-control'>
					        			        		
					        	</div>
					        	<div class='modal-footer'>
					        		<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
					        		<input type='submit' class=btn btn-primary' value='Salvar'></form>
					      		</div>
					    	</div>
					 	</div>
					</div>
				";


				//modal editar
				echo '
					

				';		
			}
		}
	}


	//função realiza o insert do cliente dentro do banco de dados
	function cadastraCliente($mysqli){
		$inserir = "INSERT INTO cliente VALUES (NULL, '".$_POST['nome']."', '".$_POST['tel']."', '".$_POST['cel']."', '".$_POST['email']."')";
		
		if(!$mysqli->query($inserir)) {
			echo $mysqli->error;
		}
		
		else{

		echo "<script>location.href='clientes.php';</script>";
		}
	}

	function editarCliente($mysqli){

		$cliente = "SELECT * FROM cliente WHERE cd_cliente = '".$_SESSION['cliente']."'";


		if($result = $mysqli->query($cliente)){
			while($obj = $result->fetch_object()){

			echo '<form method="post">
	        			<input type="text" placeholder="Nome" class="form-control" name="nome" id="mod">
	        			<input type="number" placeholder="Telefone" name="tel" class="form-control" id="mod">
	        			<input id="mod" type="number" placeholder="Celular" name="cel" class="form-control">
	        			<input id="mod" type="email" placeholder="Email" name="email" class="form-control">
	        		
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        		<input type="submit" class="btn btn-primary" value="Salvar"></form>';
			}
		}
	}		

?>