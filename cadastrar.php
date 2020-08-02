<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario;
	?>

<html>
<head>
	<meta charset ="utf-8" />
	<title> Projeto login </title>
	<link rel="stylesheet" href ="css/estilo.css"
</head>
<body>
	<div id="corpo-form">
		<h1>Cadastrar</h1>
	<form method="POST" >
		<input type ="text" name="nome" placeholder="Nome completo" maxlength="30">
		<input type ="text" name="telefone" placeholder="telefone" maxlength="30">
		<input type ="email" name="email" placeholder="Usuário" maxlength="40">
		<input type ="passowrd" name="senha" placeholder="Senha" maxlength="15">
		<input type ="passowrd" name="confSenha" placeholder="Confirmar Senha" >
		<input type ="submit" value="Cadastrar">
</form>
</div>
<?php
	if(isset ($_POST['nome']))
	{
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$confirmarSenha = addslashes($_POST['confSenha']);
		//verificar se esta preenchido
		if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	{
		 $u->conectar("projeto_loguin","localhost","root","");
		 if($u->msgErro == "")// se esta tudo ok
		 {
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
				?>

					<div id="msg-sucesso">
					Cadastrado com sucesso! Acesse para entrar
					</div>
					<?php

				}

				else
				{
				?>
				<div class="msg-erro">
					 email ja cadastrado!
					</div>
					<?php
				}
			}
			else{
			?>
				<div class="msg-erro">
					senha e confirmar senha não correspondem
					</div>
					<?php
				 
			}
		 }
		 else{
		 
		?>
				<div class="msg-erro">
					<?php echo "erro:".$u->msgErro;?>
					</div>
					<?php
		 	
		 }
	}else
	{

		?>
				<div class="msg-erro">
					Preencha todos os campos
					</div>
					<?php
	}
	
	
	}
	
?>
		
</body>
</html>