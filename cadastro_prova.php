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
            $permicao_pagina=2;
            include('seguranca.php');
            if(isset($_GET['erro']))
            {
                if($_GET['erro']==2)
                {
                    echo"
                        <script>
                            alert('Senha já existente');	
                        </script>
						
                    ";
                }else if ($_GET['erro']==1)
                {
                    echo"
                        <script>
                            alert('Algum erro inesperado. Verifique o prenchimento dos campos');	
                        </script>
                    ";
                }
            }
        ?>
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
                <li><a href="cadastro_prova.php">Cadastro Provas</a></li>
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
	<div class="container-fluid">
    	<div class="row">
        	<div id="form" style="margin-top:5%">
                <form name="cadastro_prova" method="post" action="cadastros.php">
                	<h2>Cadastro Prova</h2>
                    <input type="hidden" name="code" id="campo_form" value="1">
                     <label>Data da prova: </label>
                    <input type="text" name="dia" id="campo_form" size="1" maxlength="2" placeholder="Dia" style="width:8% "> /
                    <input type="text" name="mes" id="campo_form" size="1" maxlength="2" placeholder="Mês" style="width:8%; margin-left:0"> /
                    <input type="text" name="ano" id="campo_form" size="4" maxlength="4" placeholder="Ano" style="width:8%; margin-left:0"></br>
                    <label>Senha da prova: </label>
                    <input type="text" name="senha_prova" id="campo_form" ></br>
                    <label>Quantidade de Questões: </label>
                    <input type="text" name="qtd_questoes" id="campo_form"><br>
                    <label>Hora Inicio:</label>
                    <input type="text" name="hora_inicio" id="campo_form" style="width:15%" placeholder="hh:mm:ss"></br>
                    <label>Hora Fim: </label>
                    <input type="text" name="hora_fim" id="campo_form" style="width:15%" placeholder="hh:mm:ss"></br>
                    <input type="submit" value="Cadastrar" name="submit" class="btn" style="margin-left:74%;">    
             	</form>
			</div>           
		</div>
    </div>
</body>
</html>





