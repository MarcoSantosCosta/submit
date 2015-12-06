<?php 
	include("conect.php");
	session_start();
	$code_usuario=$_SESSION['code_usuario'];
	$code_prova=$_SESSION['code_prova'];
	$select=("SELECT * FROM envios WHERE chave_usuario = $code_usuario and chave_prova = $code_prova ");
	if(mysqli_query($conexao,$select))
	{
		echo"Deu bão";
	}else
	{
		echo"Deu bosta";
	}
	
?>