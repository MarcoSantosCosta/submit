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
		$hora_fim=$_SESSION['hora_fim'];
		$code_prova = $_SESSION['code_prova'];
		$code_usuario = $_SESSION['code_usuario'];
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d');
		$time = date('H:i:s');
	?>
    </div>
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
    <div id="result">        
    	<?php include('notas.php');?>
    </div>
        <?php
        if($time >= $hora_fim)
		{
			echo"<h1>Prova Finalizada</h1>";
			exit;
			}else{
			$select_prova="SELECT * from questoes WHERE chave_prova = $code_prova";
			$sql=mysqli_query($conexao,$select_prova);
			$cont=1;	
			while($questao=$sql->fetch_object())
			{  
				echo" 
					<div id='perguntas'>
					<strong>Questão $cont.</strong><p>$questao->enunciado </p>
					
						<strong>Exemplo de entrada:</strong>
						<p>$questao->exemplo_entrada</p>
					
						<strong>Exemploe de saida:</strong>
						<p>$questao->exemplo_saida</p>
					
					<form name='envio_questao' method='post' action='submeter_questao.php'>
						<textarea name='questao' id='resposta' ></textarea><br></input>
						<input class='hidden' type='text' name='code_prova' value='$code_prova' class='hidden'></input>
						<input class='hidden' type='text' name='code_questao' value='$questao->code' class='hidden'></input>
						<input class='hidden' type='text' name='posicao' value='$cont' class='hidden'></input>
						<input type='submit' value='Enviar' class='btn'></input>
					</form>
					</div><br>";
				
				$cont++;
			}	
		}
    ?>
    </div>
</body>
</html>