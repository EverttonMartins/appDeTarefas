<?php
    
    require_once 'usuarios.php';
    $u = new Usuario;

?>




<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					App Lista Tarefas
				</a>
			</div>
		</nav>
<!------------------------------------>

<!------------------------------------>
		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>
<!------------------------------------>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Usuário</h4>
								<hr />

                                    <div class="container"><!-- container --> 

                                            
                                        <form method="POST">  <!-- fim formulario -->
                        
                                                <!--Nome completo-->
                                                <div class="form-group">
                                                    <label><span style="color: red">*</span>Login</label>
                                                    <input type="text" class="form-control" minlength="5"  name="NOME" onkeypress="return lettersOnly(event);" required>
                                                </div>

                        
                                                <!--Senha-->
                                                <div class="form-group">
                                                    <label><span style="color: red">*</span> Senha</label>
                                                    <input type="password" minlength="8" maxlength="30" class="form-control mb-2" name="SENHA" id="password"  placeholder="***" required>
                                                    <small id="emailHelp" class="form-text text-muted">Senha no mínimo 8 caracteres</small>
                                                </div>

                                                <!--Confirmação de senha-->
                                                <div class="form-group">
                                                    <label><span style="color: red">*</span> Confirme senha:</label>
                                                    <input type="password" minlength="8" maxlength="30"  class="form-control mb-2" name="CONFSENHA" id="confirm_password" placeholder="***" required>
                                                </div>

                                                <div >
                                                
                                                        <a class="btn btn-success" href="login.php" role="button">CANCELAR</a>
                                                
                                              
                                                        <button type="submit" class="btn btn-success">CADASTRAR</button>
                                                 
                                                </div> 
                                        </form> <!-- fim formulario -->
                                                                                
                                    </div> <!-- /container -->





							</div>
						</div>
					</div>
				</div>

<!------------------------------------>

			</div>
		</div>

<?php
//verificar se clicou no botao

if(isset($_POST['NOME']))
{
    $nome = addslashes($_POST['NOME']);
    $senha = addslashes($_POST['SENHA']);
    $confsenha = addslashes($_POST['CONFSENHA']);
    //verificar se esta preenchido
    if (!empty($nome) && !empty($senha) && !empty($confsenha)) 
    {
      $u->conectar("database","localhost","root","");
       if ($u->msgErro =="") 
       {

            if($senha == $confsenha)
            {

                if($u->cadastrar($nome,$senha))
                {
                    echo "Cadastrado com sucesso! Acesse para entrar!";
                }
                else
                {
                    echo "Pessoa ja cadastrada!";
                }

            }
            else 
            {
                echo "Senha e confirmar senha não correspondem!";
            }
       }

    }
    else
    {
        echo "Preencha todos os campos!";
    }
}
?>

	</body>
</html>