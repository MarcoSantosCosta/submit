<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUBMIT</title>
<?php
	$permicao_pagina=2;
	include('security.php');
	include('conect.php');
?>
</head>
<body>
<?php
	$select_envios=("SELECT * FROM envios WHERE nota = -1 ORDER BY hora_envio DESC LIMIT 1");
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