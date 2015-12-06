<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php
	$permicao_pagina=2;
	include('security.php');
?>
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
    	</ul>
    </li>
</ol></br>

	<form name="cadastro_prova" method="post" action="cadastros.php">
    <input type="hidden" name="code" value="1">
    <label>Senha da prova: </label>
	<input type="text" name="senha_prova"></br>
    <label>Data da prova: </label>
    <input type="text" name="dia" size="1" maxlength="2"> /
    <input type="text" name="mes" size="1" maxlength="2"> /
    <input type="text" name="ano" size="4" maxlength="4"></br>
    <label>Hora Inicio:</label>
    <input type="text" name="hora_inicio"></br>
    <label>Hora Fim: </label>
    <input type="text" name="hora_fim"></br>
    <input type="submit" value="Cadastrar" name="submit">    
    
    
    </form>
    
    
    
    
</body>
</html>