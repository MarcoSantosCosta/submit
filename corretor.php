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
<div class="container-fluid" style="margin:0; padding:0;">
    	<div class="row" style="margin:0; padding:0;">
            <div id="header">
            	<div >
                	<img src="img/Logo3.png" id="logo_header">
                </div>
                <div id="dados_header">
                	<?php 
						
						$nome_grupo=$_SESSION['nome_grupo'];
						echo"<strong style='margin-right:10%'>Nome do Grupo: $nome_grupo</strong>";
					?>
                    <a href="logout.php">(Sair)</a>
                </div>       		
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav" style="margin-left:5%">
                <li class="divider-vertical"></li>
                <li><a href="cadastros_prova.php">Cadastro Provas</a></li>
                <li class="divider-vertical"></li>
                <li><a href="cadastro_questoes.php">Cadastro Questões</a></li>
                <li class="divider-vertical"></li>
                <li><a href="corretor.php">Corretor</a></li>
                <li class="divider-vertical"></li>
                <li><a href="provas.php">Provas</a></li>
                <li class="divider-vertical"></li>
                <li><a href="">LINKS</a></li>
                <li class="divider-vertical"></li>
            </ul>
        </div>
    </div>
	<div id="correcao">
	<?php
		$select_envios=("SELECT * FROM envios WHERE nota = -1 ORDER BY hora_envio ASC LIMIT 1");
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
				<p><strong>Hora:</strong> $envio->hora_envio</p>";
			echo"
			<form name='correcao' method='post' action='correcao.php'>
				<label style='display:inline; float='left'><strong><p>Nota: </strong></label>
				<input name='nota' type='submit' value='0' class='btn'>
				<input name='nota' type='submit' value='1' class='btn'>
				<input name='nota' type='submit' value='2' class='btn'>	</p>		
				<input type='hidden' name='code_envio' value='$envio->code' ><br>
				<textarea cols='100' rows='25' style='width:90%; margin-left:5%;' >$envio->envio</textarea>

		";
		}else
		{
			echo"<h2 align='center'>Nenhum exercicio agurdando correção</h2>";
		}
    ?>
    </div>
</body>
</html>