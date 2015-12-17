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

<div style="position:fixed; opacity:0;">
<?php
        $permicao_pagina=1;
		include('seguranca.php');
?>
</div>
<?php include('header.php')?>
	<?php			
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
				echo"
					<div id='campo_prova' style='width:80%; heigth: auto; margin-top:1%;margin-left:10%;'>
						<h1 align='center' style='color:#0088cc'>Nenhuma Prova aberta nesse horário.</h1>
					</div>";
							
			}else
			{
			echo"<div class='center'>";
				while($prova = $sql-> fetch_object())
				{ 	
					$hora_inicio=$prova->hora_inicio;
					$hora_fim=$prova->hora_fim;
					if($time >= $hora_inicio and $time <= $hora_fim)
					{		
						
							echo"
							<div id='campo_prova'>
								<form name='valida_prova' method='post' id='form_prova'action='autenticacao_prova.php'>
									<label style='color:#0088cc;'><strong>Prova numero:</strong> $prova->code</label>
									<input type='password'  name='senha' style='height:30px; float:left;' placeholder='Digite a senha para acessar'/>
									<input type='submit' value='Acessar' class='btn' style='float:left'><br><br>
									<label style='color:#0088cc; display:inline; float:left;'><strong>Inicio: </strong> $prova->hora_inicio </label>
									<label style='color:#0088cc; display:inline; float:left; margin-left:2%'><strong>Fim: </strong> $prova->hora_fim</label>
									<div style='position:fixed; opacity:0;''>
										<input type='text' class='hidden' name='code_prova' value='$prova->code'>
									</div>
								</form>
							</div>";
						$provas_abertas++;
					}
				}
				echo"</div>";
				if($provas_abertas==0)
				{
					echo"
					<div id='campo_prova' style='width:80%; heigth: auto; margin-top:5%;margin-left:10%;'>
						<h1 align='center' style='color:#0088cc'>Nenhuma Prova aberta nesse horário.</h1>
					</div>";
				}
			}
		?>

</body>
</html>