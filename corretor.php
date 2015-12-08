<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUBMIT</title>
<?php
	$permicao_pagina=2;
	include('seguranca.php');
	include('conect.php');
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
            <li><a href="corretor.php">Corretor</a></li>
    	</ul>
    </li>
</ol></br>
<?php
	$select_envios=("SELECT * FROM envios WHERE nota = -1 ORDER BY hora_envio ASC LIMIT 1");
	$sql=mysqli_query($conexao,$select_envios);	
	$row = mysqli_num_rows($sql);
	if($row)
	{
		$envio=$sql->fetch_object();
		echo"CODE: $envio->code CHAVE USUARIO: $envio->chave_usuario CHAVE PROVA: $envio->chave_prova <br>";
		echo"NUMERO ENVIO: $envio->numero_envio HORA ENVIO: $envio->hora_envio NOTA: $envio->nota";
		echo"
			<form name='correcao' method='post' action='correcao.php'>
				<input type='hidden' name='code_envio' value='$envio->code'>
				<textarea cols='100' rows='25'>$envio->envio</textarea>
				<label>Nota: </label>
				<input name='nota' type='submit' value='0' >
				<input name='nota' type='submit' value='1' >
				<input name='nota' type='submit' value='2' >
			</form>
			";
	}else
	{
		echo"Nenhum exercicio agurdando correção";
	}
?>
</body>
</html>