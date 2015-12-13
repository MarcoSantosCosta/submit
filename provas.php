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
</head>
<body>
	<div class="container-fluid" style="margin:0; padding:0;">
    	<div class="row" style="margin:0; padding:0;">
            <div id="header">
        		
            </div>
        </div>	
			<?php
				
				$permicao_pagina=1;
				include('seguranca.php');
				include('conect.php');
				date_default_timezone_set('America/Sao_Paulo');
				$date = date('Y-m-d');
				$time = date('H:i:s');	
				$select_provas = ("SELECT * FROM provas WHERE status = 1 and data = '$date'");
				$sql=mysqli_query($conexao,$select_provas);	
				$row=mysqli_num_rows($sql);
				$provas_abertas=0;
				if($row == 0)
				{
					echo"<h1>Nenhuma Prova abeta</h1><br>";
								
				}else
				{
					while($prova = $sql-> fetch_object())
					{ 	
						$hora_inicio=$prova->hora_inicio;
						$hora_fim=$prova->hora_fim;
						if($time >= $hora_inicio and $time <= $hora_fim)
						{		
							echo"Prova numer: $prova->code<br>
							<form name='valida_prova' method='post' action='autenticacao_prova.php'>
								<label>Digite a senha para acessar: </label>
								<input type='text' name='senha_prova'>
								
								HIDDEN(
								<input type='text' class='hidden' name='code_prova' value='$prova->code'>
								)
								<input type='submit' value='acessar'>
							<form><br><br>";
							$provas_abertas++;
						}
					}if($provas_abertas==0)
					{
						echo"<h1>Nenhuma Prova abeta nesse horario</h1><br>";
					}
				}
			?>
		</div>
	</div>
</body>
</html>