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
		$permicao_pagina=1;
		include('seguranca.php');
		include('conect.php');
		echo"</div>";
	?>
</head>
</head>
<body>
<?php include('header.php') ?>
<?php
	include("conect.php");
	$permicao_pagina=1;
	include('seguranca.php');
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$hora_fim=$_SESSION['hora_fim'];
	$chave_usuario=$_SESSION["code_usuario"];

	if(!($chave_prova=$_POST["code_prova"]))
	{
		header("Location: base_provas.php");
	}
	if($time >= $hora_fim)
	{
			echo"
				<div id='perguntas'>
					<h1>A questão não foi enviada</h1>
					<h2 align='center'>Prova Finalizada</h1>


				</div>";
	}else{
		$chave_questao=$_POST['code_questao'];
		$posicao=$_POST['posicao'];
		$envio=$_POST['questao'];
		$select=("SELECT * from envios WHERE chave_usuario = '$chave_usuario' and chave_prova='$chave_prova' and chave_questao = '$chave_questao'");
		if($sql=mysqli_query($conexao,$select))
		{
			$row = mysqli_num_rows($sql);
			$qtd_envios = $row+1;
		}else{
			$qtd_envios=1;
		}
		if($qtd_envios <= 3)
		{
			$insert=("INSERT into envios values(null,$chave_usuario,$chave_prova,$chave_questao,'$envio',$posicao,$qtd_envios,'$time',-1,1,0)");
			$update=("UPDATE envios SET ultimo = 0 WHERE chave_usuario = '$chave_usuario' and chave_prova='$chave_prova' and chave_questao = '$chave_questao'");
			mysqli_query($conexao,$update);		
			if(mysqli_query($conexao,$insert))
			{

				header("Location: base_provas.php");
			} 
		}else
		{
			header("Location: base_provas.php");
		}
	}
?>
</body>
</head>