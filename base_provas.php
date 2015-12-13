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
	<?php
		$permicao_pagina=0;
		include('seguranca.php');
		include('conect.php');	
		$hora_fim=$_SESSION['hora_fim'];
		$code_prova = $_SESSION['code_prova'];
		$code_usuario = $_SESSION['code_usuario'];
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d');
		$time = date('H:i:s');
	?>
</head>
<body>
	<?php
    if($time >= $hora_fim)
        {
            echo"<h1>Prova Finalizada</h1>";
            exit;
        }
    ?>
    <div id="result">
        <h3>NOTAS:</h3></br>        
        
        <div id="nota">
        </div>
    </div>
    </br>
    </div>
    <?php
        $select_prova="SELECT * from questoes WHERE chave_prova = $code_prova";
        $sql=mysqli_query($conexao,$select_prova);
        $cont=1;	
        echo"Code Prova: $code_prova<br><br>";
        while($questao=$sql->fetch_object())
        {
            
            echo"<strong>$cont.</strong> $questao->enunciado <br>
            <strong>Exemplo de entrada:</strong>
            $questao->exemplo_entrada<br>
            <strong>Exemploe de saida:</strong>
            $questao->exemplo_saida<br><br>
			<form name='envio_questao' method='post' action='submeter_questao.php'>
				<textarea name='questao' cols='75' rows='10'></textarea><br></input>
				<input class='hidden' type='text' name='code_prova' value='$code_prova' class='hidden'></input>
				<input class='hidden' type='text' name='code_questao' value='$questao->code' class='hidden'></input>
				<input class='hidden' type='text' name='posicao' value='$cont' class='hidden'></input>
           		<input type='submit' value='Enviar'></input>
            </form>
            <br><br>";
            $cont++;
        }	
    ?>
</body>
</html>