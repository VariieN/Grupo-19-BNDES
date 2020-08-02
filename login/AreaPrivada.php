<?php

	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
	}


?>



SEJA BEEEEEEM VINDOOOO!

<a href =" sair.php"> Sair </a>