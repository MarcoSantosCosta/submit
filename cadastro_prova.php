<!DOCTYPE html5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form name="cadastro_prova" method="post" action="cadastros.php">
    <input type="hidden" name="code" value="1">
    <label>Senha da prova: </label>
	<input type="text" name="senha_prova"></br>
    <label>Data da prova: </label>
    <input type="text" name="dia" size="1" maxlength="2"> /
    <input type="text" name="mes" size="1" maxlength="2"> /
    <input type="text" name="ano" size="4" maxlength="4"></br>
    <label>Hora Inicio:</label>
    <input type="text" name="hora_inicio"></br>
    <label>Duração: </label>
    <input type="text" name="duracao"></br>
    <input type="submit" value="Cadastrar" name="submit">    
    
    
    </form>
    
    
    
    
</body>
</html>