<?php
	include("conect.php");
	session_start();
	$permicao=$_SESSION['permicao'];
	if(! isset($_SESSION["login"] )and !isset($_SESSION["senha"]))
	{	
		header("Location: login.php");
		exit;
	}
	if($permicao < $permicao_pagina)
	{
		header("Location: provas.php");
		exit;
	}
?>