<?php

session_start();
include('verifica_login.php');
exit();

?>

<h2>Ola, <?php echo $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>