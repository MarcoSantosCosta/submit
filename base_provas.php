<!DOCTYPE html5>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/style_all.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/shortcut.png" >
    <script type="text/javascript" src="includes/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="includes/refresh_notas.js"></script>
    <title>SUBMIT</title>
	<div style="position:fixed; opacity:0;">
	<?php
		$permicao_pagina=0;
		include('seguranca.php');
		include('conect.php');
		if(!isset($_SESSION['senha_prova']))
		{
			header('Location: provas.php');
		}
		$code_prova = $_SESSION['code_prova'];
		$code_usuario = $_SESSION['code_usuario'];
		$hora_fim=$_SESSION['hora_fim'];
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d');
		$time = date('H:i:s');
	?>
    </div>
</head>
<body>
	<?php include('header.php');?>
    <div id="result">        
    	<?php include('notas.php');?>
    </div>
        <?php
        if($time >= $hora_fim)
		{
			echo"
				<div id='perguntas'>
					<h1>Prova Finalizada</h1>
				</div>";
			exit;
		}else{
			$select_prova="SELECT * from questoes WHERE chave_prova = $code_prova";
			$sql=mysqli_query($conexao,$select_prova);
			$cont=1; 	
			while($questao=$sql->fetch_object())
			{  
				$select_questao=("SELECT * from envios WHERE chave_usuario = '$code_usuario' and chave_prova='$code_prova' and chave_questao = '$questao->code'");
				if($sql_questao=mysqli_query($conexao,$select_questao))
				{
					$qtd_envios = mysqli_num_rows($sql_questao);
					
				}
				echo" 
					<div id='perguntas'>
					<h4 style='color:#0088cc'><strong>Questão $cont</strong></h4>
					<strong>Peso: </strong>$questao->peso
					<p>$questao->enunciado </p>
					<strong>Exemplo de entrada:</strong>
					<p>$questao->exemplo_entrada</p>
					<strong>Exemplo de saida:</strong>
					<p>$questao->exemplo_saida</p>					
					<form name='envio_questao' method='post' action='submeter_questao.php'>";
					if($qtd_envios < 3)
					{
						echo"<textarea name='questao' id='resposta' rows='2' ></textarea><br></input>
						<input type='text' readonly='true' name='qtd_envios' value='Tentativa $qtd_envios/3' style='height:30px; width:110px; margin:5px 5% 0 5px; float:right'>
						<input type='submit' value='Enviar' class='btn' style=' float:right;  margin:5px 0;'></input>";
					}else
					{
						echo"
							<h4 style='color:#0088cc'><strong>Numero de tentativas esgotado!</strong>
							<input   type='text' readonly='true' name='qtd_envios' value='Tentativa: $qtd_envios/3' style='height:30px; width:110px; margin:5px 5% 0 5px; float:right'></h4>";
					}
					echo"
						<input class='hidden' type='text' name='code_prova' value='$code_prova' class='hidden'></input>
						<div style='position:fixed; opacity:0;'>
							<input class='hidden' type='text' name='code_questao' value='$questao->code'></input>
							<input class='hidden' type='text' name='posicao' value='$cont'></input>
							<input class='hidden' type='text' name='qtd_envios' value='$cont'></input>
							<input class='hidden' type='text' name='qtd_envios' value='$questao->peso'></input>
						</div>
					</form>
					</div>";
				
				$cont++;
			}	
		}
    ?>
    </div>
</body>
</html>