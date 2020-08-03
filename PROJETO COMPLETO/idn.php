<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>AGENDAMENTO</title>
		<link rel="stylesheet" href="idnn.css">		
		<style type="text/css">
			.carregando{
				color:#ff0000;
				display:none;
			}
		</style>
	</head>
	<body>
		
		<?php include_once("conexao.php"); ?>
		
		<form class="inputs" method="POST" action="salvar_post.php">
			<h1>CADASTRAR AGENDAMENTO</h1>
			<label>Horário:</label>
			<input type="text" name="horario" placeholder="horário"> <br><br>
			
			<label>Loja:</label>
			<select name="id_categoria" id="id_categoria">
				<option value="">Escolha a Loja</option>
				<?php
					$result_cat_post = "SELECT * FROM categorias_post ORDER BY nome_categoria";
					$resultado_cat_post = mysqli_query($conn, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_categoria'].'</option>';
					}
				?>
			</select><br><br>
			
			
			
			<input type="submit" value="Cadastrar">
		</form>
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
	
		
	</body>
</html>