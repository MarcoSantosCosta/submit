<?php
	include("conect.php");
	session_start();
	$permicao=$_SESSION['permicao'];
	if(! isset($_SESSION["login"] )and !isset($_SESSION["senha"]))
	{
		
		header("Location: login.php");
		exit;
	}else
	{
	}
	if($permicao < $permicao_pagina)
	{
		echo"Acesso restrito Sua permicao: $permicao Permicao requerida: $permicao_pagina";	
		//header("Location: login.php");
		exit;
	}
?>