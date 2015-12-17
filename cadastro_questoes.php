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
	<div style="position:fixed; opacity:0;">
		<?php
            $permicao_pagina=2;
            include('seguranca.php');
			$senha_prova=$_GET['senha_prova'];
			if(isset($_GET['result']))
			{
				if($_GET['result']==0)
				{
					echo"
                        <script>
                            alert('Questão cadastrada com sucesso!');	
                        </script>
                    ";
				}else if($_GET['result']==1)
				{
					echo"
                        <script>
                            alert('Ocorreu algum problema durante o cadastro. Verifique os campoes e tente novamente.');	
                        </script>
                    ";
				}else if($_GET['result']==2)
				{
					
					echo"
                        <script>
                            alert('Senha inexistente');	
                        </script>
                    ";
				}else if($_GET['result']==3)
				{
					
					echo"
                        <script>
                            alert('Quantidade de questões excedida');	
                        </script>
                    ";
				}
			}
		?>
	</div>
</head>
<body>
    <?php include('header.php') ?>
	<div class="container-fluid">
    	<div class="row">
            <div id="form_questoes">
                <form name="cadastro_questões" method="post" action="cadastros.php">
                    <h2>Cadastro de Questões </h2>
                    <label>Senha Prova: </label>
                    <input type="text" name="senha_prova" id="campo_form" style="width:10%;" value="<?php echo"$senha_prova" ?>" ></br>
                    <input type="hidden" name="code" value="2">
                    <label>Enunciado: </label>
                    <textarea name="enunciado" id="enunciado" ></textarea></br>
                    <label>Peso da questão: </label>
                    <input type="text" name="peso" id="campo_form" ></br>
                    <label>Exemplo de Entrada: </label>
                    <input type="text" name="exemplo_in" id="campo_form" ></br>
                    <label>Exemplo de Saida: </label>
                    <input type="text" name="exemplo_out" id="campo_form" ></br> 
                    <input type="submit" value="cadastrar" class="btn" style="margin-left:82%">
                </form>
			</div>
        </div>
    </div>
</body>
</html>