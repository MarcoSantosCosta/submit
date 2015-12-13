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
                <h1>Cadastro de Provas</h1>
                <form name="cadastro_questões" method="post" action="cadastros.php">
                    <input type="hidden" name="code" value="2">
                    <input type="text" name="senha_prova" placeholder="Enunciado: "></br>
                    <input type="text" name="enunciado" placeholder="Senha Prova: "></br>
                    <input type="text" name="exemplo_in" placeholder="Exemplo de Entrada: "></br>
                    <input type="text" name="exemplo_out" placeholder="Exemplo de Saida: "></br> 
                    <input type="submit" value="cadastrar">
                </form>
</body>
</html>