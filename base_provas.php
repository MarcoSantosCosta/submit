<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	$permicao_pagina=0;
	include('seguranca.php');
	include('conect.php');	
	$code_prova = $_SESSION['code_prova'];
	$code_usuario = $_SESSION['code_usuario'];

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUBMIT</title>
<script type="text/javascript" src="js/notas.js"></script>
</head>
<body>
<h1>Base Provas</h1>
<ol>
    <li>Acesso Livre
    	<ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="provas.php">Provas</a></li>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </li>
	<li>Acesso Restrito</br>
    	<ul>
    	 	<li><a href="cadastro_prova.php">Cadastro Provas</a></li>
            <li><a href="cadastro_questoes.php">Cadastro Questões</a></li>
            <li><a href="cadastro_usuario.php">Cadastro Usuarios</a></li>
            <li><a href="corretor.php">Corretor</a></li>
    	</ul>
    </li>
</ol>
<div id="result">
Aqui estão as notas:</br>
<?php
include('notas.php');
?>
</br>
</div>
<?php
	$select_prova="SELECT * from questoes WHERE chave_prova = $code_prova";
	$sql=mysqli_query($conexao,$select_prova);
	$cont=1;
	echo"Code Prova: $code_prova<br><br>";
	while($questao=$sql->fetch_object())
	{
		
		echo"<strong>$cont.</strong> $questao->enunciado <br>
		<strong>Exemplo de entrada:</strong>
		$questao->exemplo_entrada<br>
		<strong>Exemploe de saida:</strong>
		$questao->exemplo_saida<br><br>
		<form name='envio_questao' method='post' action='submeter_questao.php'>
		<input type='text' name='code_questao' value='$questao->code'><br>
		<input type='text' name='posicao' value='$cont'><br>
		<textarea name='questao' cols='75' rows='10'></textarea><br>
		</input>
		<input type='submit' value='Enviar'>
		</form>
		<br><br>";
		$cont++;
	}	
?>

</body>
</html>