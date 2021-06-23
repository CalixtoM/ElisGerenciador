<?php
session_start();
include('inc/conecta.php');

if(isset($_POST['em'], $_POST['pw'])) {

    $senha = hash('sha256', $_POST['pw']);

    $sql = "SELECT * FROM usuario WHERE ds_email = '".$_POST['em']."' AND ds_senha = '".$senha."'";

    if($query = $mysqli->query($sql)){
        $obj = $query->fetch_object();
        
        if ($query->num_rows>0) {
            $_SESSION['login'] = $obj->nm_usuario;
            echo "<script>location.href='index.php';</script>";
		}
	}
	else{
		echo "falha";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script>
    function addDarkmodeWidget() {
      new Darkmode().showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);
  </script>
  <title></title>
</head>

<center>
  <body class="text-center">


    <div class="container">
      <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" id="inputEmail" name="em" class="form-control" placeholder="Seu email" required="" autofocus=""><br>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Senha" required="">
        <a href="registro.php" id="r"><p>Registre-se</p></a>
        <input class="btn btn-lg btn-primary btn-block" id="ent" type="submit" value="login">
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