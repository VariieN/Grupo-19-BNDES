<?php 
require_once 'CLASSES/usuarios.php';
$u = new Usuario;

?>
<html>
<head>
	<meta charset ="utf-8" />
	<title> Projeto login </title>
	<link rel="stylesheet" href ="ia.css"
</head>
<body>
	<div id="corpo-form-cad">
		<form class="inputs" method="POST">
			<h1>Entrar</h1>
			<input type="email" placeholder="Usuário" name="email">
			<input type="password" placeholder="Senha" name="senha">
			<input type="submit" placeholder="Enviar">
			
			<p><strong>Não tem uma conta ainda?</strong><a href="cadastrar.php" ><strong>Inscreva-se aqui</strong></a></p>

		</form>

		<footer id="ff">
			
			<p>Made by Group IXI BNDES</p>

		</footer>
	</div>
	<?php
	if(isset ($_POST['email']))
	{	
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
	
	
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("projeto_loguin","localhost","root","");
	if($u->msgErro == "")
	{
		if($u->logar($email,$senha))
			{	
				header("location: AreaPrivada.php");
			}
		else
			{
			?>
			<div class="msg-erro">
				Email e/ou senha estão incorretos!
				<?php
			}
		}
		else 
			{

			?>
			<div class="msg-erro">

			<?php echo "Erro: ".$u->msgErro; ?>
				
				<?php


				
			}
	}
		else
		{

		?>
			<div class="msg-erro">
				preencha todos os campos!";
				<?php	
		}
		}
	?>
</body>
</html>