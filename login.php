<!DOCTYPE html5>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/style_all.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="img/shortcut.png" >
    <title>SUBMIT</title>
</head>
<body>
	<div class="container-fluid">
    	<div class="row">
        	<div id="form"  style="height:350px;">
            <img src="img/Logo3.png" alt="Logo da plataforma SUBMIT" class="logo" >
            <br><br><br>
            <form name="login" method="post" action="autenticacao_usuario.php" class="form">
                <input type="text" name="login"  id="campo_form" placeholder="Usuário"></br>
                <input type="password" name="senha" id="campo_form" placeholder="Senha" ></br>
                <p style="margin-left:10%"><a href="cadastro_usuario.php">Faça seu cadastro!</a></p>
                <input type="submit" value="Entrar" name="submit" class="btn" style="margin-left:78%;">      
				<?php
					if(isset($_GET['try']))
					{
						$try=$_GET['try'];
						echo"<p style='color:#f00; margin-left:35%; float:left' >Login ou senha invalido</p>";		
					}else
					{
						echo"<p style='color:#f00; margin-left:35%' ></p>";			
					}
				?>
        	    </form>
			</div>
		</div>
	</div>

</body>
</html>