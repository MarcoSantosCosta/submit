<!DOCTYPE html5>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php
	
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

	<form name="cadastro_usuarios" method="post" action="cadastros.php">
    	
        <input type="hidden" name="code" value="3"q>
        <label>Login: </label>
        <input type="text" name="login"></br>
        <label>Senha: </label>
        <input type="password" name="password"></br>
        <label>Mebros: </label>
        <input type="text" name="membros"></br>
        <label>Nome do grupo: </label>
        <input type="text" name="nome_grupo"></br>
        <input type="submit" value="Cadastrar">
        <label></label>
        
    </form>
</body>
</html>