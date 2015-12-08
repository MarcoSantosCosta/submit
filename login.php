<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="js/redirect.js"></script>

<title>SUBMIT</title>
</head>
<body>
<ol>
    <li><p>Acesso Livre</p></br>
    	<ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="provas.php">Provas</a></li>
           
        </ul>
    </li>
	<li><p></p>Acesso Restrito</br>
    	<ul>
    	 	<li><a href="cadastro_prova.php">Cadastro Provas</a></li>
            <li><a href="cadastro_questoes.php">Cadastro Questões</a></li>
            <li><a href="cadastro_usuario.php">Cadastro Usuarios</a></li>
            <li><a href="corretor.php">Corretor</a></li>
    	</ul>
    </li>
</ol></br>

	<form name="login" method="post" action="autenticacao_usuario.php">
    	<label>Login: </label>
		<input type="text" name="login"></br>
        <label>Senha: </label>
        <input type="password" name="senha"></br>
        <input type="submit" value="login" name="submit">      
    </form>
</body>
</html>