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
	<div class="container-fluid">
    	<div class="row">
        	<div id="form" style="height:350px">
                <h2 style="margin-left:10%">Faça seu cadastro</h2>
                <br>
                <form name="cadastro_usuarios" method="post" action="cadastros.php"  >
                    <input type="hidden" name="code" value="3"q>
                    <input type="text" name="login_new" id="campo_form" id="campo_form" placeholder="Usuário"></br>
                    <input type="password" name="password_new" id="campo_form" id="campo_form"placeholder="Senha"></br>
                    <input type="text" name="nome_grupo" id="campo_form" id="campo_form" placeholder="Nome do Grupo"></br>
                    <input type="text" name="membros" id="campo_form" id="campo_form" placeholder="Nome dos membros"></br>
                     <p style="margin-left: 10%"><a href="login.php">Voltar</a></p>
                    <input type="submit" value="Cadastrar" style="margin-left:73%;" class="btn" >
                    <label></label>            
                </form>
            </div>
		</div>
    </div>
</body>
</html>