<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUBMIT</title>
</head>
<body>
<h1>Base Provas</h1>

<ol>
    <li><p>Acesso Livre</p></br>
    	<ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="provas.php">Provas</a></li>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </li>
	<li><p></p>Acesso Restrito</br>
    	<ul>
    	 	<li><a href="cadastro_prova.php">Cadastro Provas</a></li>
            <li><a href="cadastro_questoes.php">Cadastro Questões</a></li>
            <li><a href="cadastro_usuario.php">Cadastro Usuarios</a></li>
    	</ul>
    </li>
</ol>
<?php
	$permicao_pagina=0;
	include('security.php');
	include('conect.php');	
	$code_prova = $_SESSION['code_prova'];
	$senha_prova = $_SESSION['senha_prova'];
	$data_prova = $_SESSION['data'];
	$hora_inicio = $_SESSION['hora_inicio'];
	$hora_fim = $_SESSION['hora_fim'];
	$status = $_SESSION['status'];
	$code_usuario = $_SESSION['code_usuario'];
	$select="SELECT * from questoes WHERE chave_prova = $code_prova";
	$sql=mysqli_query($conexao,$select);
	$cont=0;
	while($questao=$sql->fetch_object())
	{
		$code_questoes[10]=0;
		$code_questoes[$cont]=$questao->code;
		$cont++;
		echo"<strong>$cont.</strong> $questao->enunciado <br>
		<strong>Exemplo de entrada:</strong> <br>
		$questao->exemplo_entrada <br>
		<strong>Exemploe de saida:</strong> <br>
		$questao->exemplo_saida<br> 
		<form name='envio_questao' method='post' action='recebe_questao.php'>
			<input type='hidden' name='code_usuario' value='$code_usuario'>
			<input type='hidden' name='code_prova' value='$code_prova'>
			<input type='hidden' name='code_prova' value=''>
			
			<input type='text' name='qustao.php'>
			</input>
			<input type='submit' value='Enviar'>
		</form>
		";	
	}
?>
</body>
</html>