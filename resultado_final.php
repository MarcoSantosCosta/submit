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
<?php include('header.php')?>
	<?php 
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$hora_fim=$_POST['hora_fim'];
		if($time <= $hora_fim and $permicao<2)
		{
			echo"
				<div id='perguntas'>
					<h1>Prova em andamento</h1>
				</div>";
			exit;
			}else{
			$code_prova=$_POST['code_prova'];
			$select_nota_final="SELECT * FROM notas WHERE chave_prova=$code_prova ORDER BY nota DESC ";
			$sql_nota_final=mysqli_query($conexao,$select_nota_final);
			$row=mysqli_num_rows($sql_nota_final);
			$pos=1;
			echo"<div id='grid_result' style='background:#0088cc; color:#fff; height:50px;	 '>";
			echo"<h3 style='margin:0; font-size:20pt;' align='center';><strong>Resultado Final</strong></h3><br>";
			echo"</div>";
			if($row!=0){
				while ($nota_final=$sql_nota_final->fetch_object()) 
				{
					$select_usuario="SELECT * FROM usuarios WHERE code = $nota_final->chave_usuario";
					$sql_usuario=mysqli_query($conexao,$select_usuario);
					$usuario=$sql_usuario->fetch_object();
					if($pos%2==0)
					{
						echo"<div id='grid_result' style='background:#0088cc; color:#fff'>";
					}else
					{
						echo"<div id='grid_result' style='background:#fff'>";
					}
					echo"	<div style='float:left; padding-left:2%; width:32%; height:100%'><p><strong> $pos".'º'." Lugar- Grupo:</strong> $usuario->nome_grupo</p></div> 
							<div style='float:left; width:32%;height:100%; text-align:center'><p><strong>Nota media: </strong>$nota_final->nota</p></div> 
							<div style='float:left; padding-rigth:2%; width:32%;height:100%; text-align:right'><p><strong>Tempo medio: </strong>$nota_final->tempo</p></div>";			
					echo"</div>";
					$pos++;
				}
			}
		}
	?>
</head>
</body>
