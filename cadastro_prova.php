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
		$permicao_pagina=2;
		include('seguranca.php');
	?>

</head>
<body>
	<div class="container-fluid">
    	<div class="row">
        	<div id="form">
                <form name="cadastro_prova" method="post" action="cadastros.php">
                <h2>Cadastro Prova</h2>
                    <input type="hidden" name="code" id="campo_form" value="1">
                    <label>Senha da prova: </label>
                    <input type="text" name="senha_prova" id="campo_form" ></br>
                    <label>Data da prova: </label>
                    <input type="text" name="dia" id="campo_form" size="1" maxlength="2" placeholder="Dia" > /
                    <input type="text" name="mes" id="campo_form" size="1" maxlength="2" placeholder="Mês" > /
                    <input type="text" name="ano" id="campo_form" size="4" maxlength="4" placeholder="Ano" ></br>
                    <label>Quantidade de Questões: </label>
                    <input type="text" name="qtd_questoes" id="campo_form"><br>
                    <label>Hora Inicio:</label>
                    <input type="text" name="hora_inicio" id="campo_form"></br>
                    <label>Hora Fim: </label>
                    <input type="text" name="hora_fim" id="campo_form"></br>
                    <input type="submit" value="Cadastrar" name="submit" class="btn">    
             	</form>
			</div>           
		</div>
    </div>
</body>
</html>





