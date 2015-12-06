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

    <form name="cadastro_questões" method="post" action="cadastros.php">
        <input type="hidden" name="code" value="2">
        <label>Senha Prova: </label>
        <input type="text" name="senha_prova"></br>
        <label>Enunciado: </label>
        <input type="text" name="enunciado"></br>
        <label>Exemplo de Entrada: </label>
        <input type="text" name="exemplo_in"></br>
        <label>Exemplo de Saida: </label>
        <input type="text" name="exemplo_out"></br> 
    	<input type="submit" value="cadastrar">
    </form>
</body>
</html>