<?php
	include("conect.php");
	$nota=$_POST['nota'];
	$code_envio = $_POST['code_envio'];
	$update=("UPDATE envios SET nota = $nota WHERE code = $code_envio ");
	if(mysqli_query($conexao,$update))
	{
		echo"Deu certo<br>";
		header("Location: corretor.php");
		exit;
	}else
	{
		echo "Deu bosta <br>";
	}
	echo"Nota: $nota Envio: $code_envio";
?>