<!DOCTYPE html5>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_all.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/shortcut.png" >
    <title>SUBMIT</title>
	<?php
		echo"<div style='position:fixed; opacity:0;'>";
		$permicao_pagina=2;
		include('seguranca.php');
		include('conect.php');
		echo"</div>";
	?>
</head>
</head>
<body>
<?php include('header.php') ?>
	<div id="correcao">
	<?php
		if(!isset($_POST['code_prova']) and !isset($_SESSION['code_correcao']))
		{
			header("location: correcoes.php");
			exit;
		}
		if(isset($_POST['code_prova']))
		{
			$_SESSION['code_correcao'] = $_POST['code_prova'];
		}
		$code_prova=$_SESSION['code_correcao'];
		$select_envios=("SELECT * FROM envios WHERE nota = -1 and chave_prova = $code_prova ORDER BY hora_envio ASC LIMIT 1");
		$sql_envios=mysqli_query($conexao,$select_envios);	
		$row = mysqli_num_rows($sql_envios);
		if($row)
		{
			$envio=$sql_envios->fetch_object();
			$select_usuarios=("SELECT * FROM usuarios WHERE code = $envio->chave_usuario");
			$sql_usuario=mysqli_query($conexao,$select_usuarios);
			$usuario=$sql_usuario->fetch_object();
			echo"
				<p><strong>Nome do grupo:</strong> $usuario->nome_grupo</p>
				<p><strong>Numero:</strong> $envio->numero_envio</p>
				<p><strong>Hora:</strong> $envio->hora_envio</p>
				<p><strong>Code envio:</strong> $envio->code</p>
				<form name='correcao' method='post' action='corretor.php'>
					<label style='display:inline; float='left'><strong><p>Nota: </strong></label>
					<input name='nota' type='submit' value='0' class='btn'>
					<input name='nota' type='submit' value='1' class='btn'>
					<input name='nota' type='submit' value='2' class='btn'>	</p>		
					<input class='hidden' type='text' name='code_envio' value='$envio->code'><br>
					<textarea cols='100' rows='25' style='width:90%; margin-left:5%;' >$envio->envio</textarea>
				</form>";
		}else
		{
			echo"<h2 align='center'>Nenhum exercicio agurdando correção</h2>";
		}
    ?>
    </div>
</body>
</html>