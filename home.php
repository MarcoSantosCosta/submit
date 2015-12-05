<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>SUBMIT</title>
</head>

<body>
<?php
	$permicao_pagina = 2;
	include("security.php");
	include("conect.php");
	$code=$_SESSION['code'];
    $login=$_SESSION['login'];
   	$senha=$_SESSION['senha'];
	$nome_grupo=$_SESSION['nome_grupo'];
	$membros=$_SESSION['membros'];
	$permicao=$_SESSION['permicao'];
		
?>
</body>
</html>
