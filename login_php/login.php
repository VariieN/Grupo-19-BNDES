<?php
session_start();
include('conexao.php');


if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');    // evita que o usuario acesse outras partes da página sem entrar com o login e a senha
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario_id, usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {                                 //autenticação
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['usuario'] = $usuario_bd['usuario'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>