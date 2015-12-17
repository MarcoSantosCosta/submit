<!DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>SUBMIT</title>
</head>

<body>
</head>
<body>
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
            <li><a href="correcoes.php">Corretor</a></li>
    	</ul>
    </li>
</ol></br>

<?php
	$permicao_pagina = 0;
	include("seguranca.php");
	include("conect.php");
	$code=$_SESSION['code_usuario'];
    $login=$_SESSION['login'];
   	$senha=$_SESSION['senha'];
	$nome_grupo=$_SESSION['nome_grupo'];
	$membros=$_SESSION['membros'];
	$permicao=$_SESSION['permicao'];
		
?>
<?php include('fotter.php');?>
</body>
</html>
