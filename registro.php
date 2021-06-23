<!-- conexão com banco -->
<?php
session_start();
include('inc/conecta.php');

if(isset($_POST['nome'])){

	if($_POST['password'] == $_POST['password2']){



/* $senhacrip armazena senha com criptografia sha256 */
		$senhacrip = hash('sha256', $_POST['password']);

/* $sql Insere dados no banco */

		$sql = "INSERT INTO usuario VALUES (null, '".$_POST['nome']."', '".$_POST['email']."', '".$senhacrip."')";


 		$query = "SELECT * FROM usuario";

/*Registra os dados e Redireciona para a pagina de login*/
 		if ($query = $mysqli->query($sql)){
 			echo "funcionou";
 			header("location: index.php");
		}

/* Caso não funcionar, exibe o erro*/ 						 
		else{
 			printf("Erro obtido: %s\n", $mysqli->error);
 		}

	}
	else{
		echo "<script>alert('Senhas Não Conferem!');</script>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<center>
  <body class="text-center">


    <div class="container">
      <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Registre-se</h1>
        <label for="inputEmail" class="sr-only">Insira Seu Nome</label>
        <input type="text" id="inputNome" name="nome" class="form-control" placeholder="Seu nome" required="" autofocus=""><br>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Seu email" required="" autofocus=""><br>
        <label for="inputPassword" class="sr-only">Sua Senha</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required=""><br>
        <label for="inputPassword" class="sr-only">Confirme sua Senha</label>
        <input type="password" name="password2" id="inputPassword" class="form-control" placeholder="Confirme sua Senha" required="">
        <a href="registro.php" id="r"><p>Login</p></a>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="registrar">
        <p class="mt-5 mb-3 text-muted">© 2021 - Matheus Calixto</p>
      </form>
    

  </body>
    </div>
</center>
</html>

<style type="text/css">
	  body{
	    background-color: #f5f5f5;

	  }

	  form{
	    width: 400px;
	    height: 486px;
	  }

	  
	  body {
	    padding-top: 130px;
	    padding-bottom: 40px;
	    background-color: #f5f5f5;
	}
</style>