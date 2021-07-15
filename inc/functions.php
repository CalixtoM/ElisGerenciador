<?php

	//Função faz um select nos clientes cadastrados, exibindo todos na tabela
	function buscaCliente($mysqli){
		$cliente = "SELECT * FROM cliente ORDER BY cd_cliente ASC";

		$cont = 0;

		if($result = $mysqli->query($cliente)){
			while($obj = $result->fetch_object()){
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
					        			<input type='hidden' placeholder='Nome' value='$obj->cd_cliente' class='form-control' name='cd' id='mod' >
					        			<input type='text' placeholder='Nome' value='$obj->nm_cliente' class='form-control' name='nomeedit' id='mod'>
					        			<input type='number' placeholder='Telefone' value='$obj->nr_telefone' name='teledit' class='form-control' id='mod'>
					        			<input id='mod' type='number' placeholder='Celular' value='$obj->nr_celular' name='celedit' class='form-control'>
					        			<input id='mod' type='email' placeholder='Email' value='$obj->ds_email' name='emailedit' class='form-control'>
					        			        		
					        	</div>
					        	<div class='modal-footer'>
					        		<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
					        		<input type='submit' class='btn btn-primary' value='Salvar'></form>
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


	function editarCliente($mysqli) {
		
		$editar = "UPDATE cliente SET nm_cliente = '".$_POST['nomeedit']."', nr_telefone = '".$_POST['teledit']."', nr_celular = '".$_POST['celedit']."', ds_email = '".$_POST['emailedit']."' WHERE cd_cliente = '".$_POST['cd']."'";

		if($result = $mysqli->query($editar)){

		}
		else{
			printf("Error: %s\n", $mysqli->error);
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

	function buscaProp($mysqli){
		$cliente = "SELECT * FROM cliente ORDER BY cd_cliente ASC";

		if($result = $mysqli->query($cliente)){
			while($obj = $result->fetch_object()){


				echo "<option value='$obj->cd_cliente'>".$obj->nm_cliente."</option>";
			}	
		}	
	}

	function buscaComp($mysqli){
		$cliente = "SELECT * FROM cliente ORDER BY cd_cliente ASC";

		if($result = $mysqli->query($cliente)){
			while($obj = $result->fetch_object()){


				echo "<option value='$obj->cd_cliente'>".$obj->nm_cliente."</option>";
			}	
		}	
	}

	function buscaImoveis($mysqli){
		$imoveis = "SELECT * FROM imovel AS i INNER JOIN cliente AS c ON i.id_proprietario = c.cd_cliente ORDER BY cd_imovel asc";

		if($result = $mysqli->query($imoveis)){
			while($obj = $result->fetch_object()){



				echo "
					<td>".$obj->ds_endereco."</td>
					<td>".$obj->nr_valor."</td>
					<td>".$obj->nm_cliente."</td>
					<td><a type='button' class='btn btn-warning' data-toggle='modal' data-target='#modaledit$obj->cd_imovel'>
					Editar
					</a></td><td><a type='button' class='btn btn-danger' data-toggle='modal' data-target='#modaldel?cd=$obj->cd_imovel'>
					Excluir
				</a></td>
				</tr>

				<div class='modal fade' id='modaledit$obj->cd_imovel' tabindex'-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
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
					        			<input type='hidden' value='$obj->cd_imovel' class='form-control' name='codigo' >
					        			<input type='text' placeholder='Endereço' value='$obj->ds_endereco' class='form-control' name='endedit' id='mod'>
					        			<input type='number' placeholder='Valor' value='$obj->nr_valor' name='valedit' class='form-control' id='mod'>
					        			<select class='form-control' name='prop' id='mod'>
					        			";
					        					buscaProp($mysqli);	 echo
					        			"	
					        			</select>		
					        	</div>
					        	<div class='modal-footer'>
					        		<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
					        		<input type='submit' class='btn btn-primary' value='Salvar'></form>
					      		</div>
					    	</div>
					 	</div>
					</div>

				";	
			}
		}
	}

	function buscaImoveis2($mysqli){
		$imoveis = "SELECT * FROM imovel AS i INNER JOIN cliente AS c ON i.id_proprietario = c.cd_cliente ORDER BY cd_cliente ASC";

		if($result = $mysqli->query($imoveis)){
			while($obj = $result->fetch_object()){

			echo "<option value='$obj->cd_cliente'>".$obj->ds_endereco."</option>";

	
			}
		}
	}

	function cadastraImoveis($mysqli){

		$cdimoveis = "INSERT INTO imovel VALUES (NULL, '".$_POST['end']."', '".$_POST['vl']."', '".$_POST['prop']."')";

		if(!$mysqli->query($cdimoveis)) {
			echo $mysqli->error;
		}
		
		else{

		echo "<script>location.href='imoveis.php';</script>";
		}
	}

	function editarImoveis($mysqli) {
		
		$editar = "UPDATE imovel SET ds_endereco = '".$_POST['endedit']."', nr_valor = '".$_POST['valedit']."', id_proprietario = '".$_POST['prop']."' WHERE cd_imovel = '".$_POST['codigo']."'";

		if($result = $mysqli->query($editar)){

		}
		else{
			printf("Error: %s\n", $mysqli->error);
		}
	}

	function buscaCompraVenda($mysqli) {

		$buscacv = "SELECT * FROM compra_venda AS cv INNER JOIN imovel AS i ON cv.id_imovel = i.cd_imovel INNER JOIN cliente AS c ON cv.id_vendedor = c.cd_cliente ";

		if($result = $mysqli->query($buscacv)){
		 	while($obj = $result->fetch_object()){



		 		echo "
						<td>".$obj->ds_endereco."</td>
						<td>".$obj->nm_cliente."</td>
		 				<td>".$obj->id_comprador."</td>
		 				<td>".$obj->ds_financiamento."</td>
						<td><a type='button' class='btn btn-warning' data-toggle='modal' data-target='#modaledit$obj->cd_compravenda'>
		 					Editar
		 					</a></td><td><a type='button' class='btn btn-danger' data-toggle='modal' data-target='#modaldel?cd=$obj->cd_compravenda'>
		 					Excluir
		 				</a></td>
		 				</tr>	
		 						";
		 	}					
		} 		
		else{
			echo $mysqli->error;

		}
	}

	function cadastraFinanciamento($mysqli){

		$buscprop = "SELECT * FROM imovel WHERE cd_imovel = '".$_POST['end']."'";

		

		if($result = $mysqli->query($buscprop)){
		 	while($objt = $result->fetch_object()){
		
		 		$prop = $objt->id_proprietario;

				$cdfi = "INSERT INTO compra_venda VALUES (NULL, '".$_POST['end']."', '".$prop."', '".$_POST['comp']."', '".$_POST['fin']."')";

				if(!$mysqli->query($cdfi)) {
					echo $mysqli->error;
				}
		
				else{

					echo "<script>location.href='compravenda.php';</script>";
				}	
			}
		}
	}

	function editaFinanciamento($mysqli){

		$buscprop = "SELECT * FROM imovel WHERE cd_imovel = '".$_POST['end']."'";

		if($result = $mysqli->query($buscaprop)){
		 	while($obj = $result->fetch_object()){

		 	}
		} 		
	}

?>