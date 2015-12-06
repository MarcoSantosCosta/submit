<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<ol>
    <li><p>Acesso Livre</p></br>
    	<ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="provas.php">Provas</a></li>
            <li><a href="logout.php">Logout</a></li>
           
        </ul>
    </li>
	<li><p></p>Acesso Restrito</br>
    	<ul>
    	 	<li><a href="cadastro_prova.php">Cadastro Provas</a></li>
            <li><a href="cadastro_questoes.php">Cadastro Questões</a></li>
            <li><a href="cadastro_usuario.php">Cadastro Usuarios</a></li>
    	</ul>
    </li>
</ol>
	<?php
	$permicao_pagina=1;
    include('security.php');
	include('conect.php');
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	//echo "data: $date Hora: $time<br>";
	
	$select_provas = ("SELECT * FROM provas WHERE status = 1 and data = '$date'");
	//$provas = $query->fetch_object();
	//$row = mysqli_num_rows($query);
    $sql=mysqli_query($conexao,$select_provas);	
		$row=mysqli_num_rows($sql);
	if($row == 0)
	{
		echo"<h1>Nenhuma Prova abeta</h1><br>";
	}else
	{
		while($prova = $sql-> fetch_object())
		{ 	
			$hora_inicio=strtotime('$prova->hora_inicio');
			if($time > $hora_inicio)
			{		
				echo"Prova numer: $prova->code<br>
				<form name='valida_prova' method='post' action='valida_prova.php'>
					<label>Digite a senha para acessar: </label>
					<input type='text' name='senha_prova'>
					<input type='hidden' name='code_prova' value='$prova->code'>
					</input>
					<input type='submit' value='acessar'>
				<form><br><br>";
			}else{
			echo "tem prova hoje mas não agora";
			}
		}
	}
	?>
</body>
</html>