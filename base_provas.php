<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUBMIT</title>
<script type="text/javascript" src="js/result.js"></script>
</head>
<body>
<h1>Base Provas</h1>

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
<div id="result">
Aqui estão as notas:
</div>
<?php
	$permicao_pagina=0;
	include('security.php');
	include('conect.php');	
	$code_prova = $_SESSION['code_prova'];
	$select="SELECT * from questoes WHERE chave_prova = $code_prova";
	$sql=mysqli_query($conexao,$select);
	$cont=0;
	while($questao=$sql->fetch_object())
	{
		$vetor_questoes[$cont]=$questao->code;
		$cont++;
		echo"<strong>$cont.</strong> $questao->enunciado <br>
		<strong>Exemplo de entrada:</strong>
		$questao->exemplo_entrada<br>
		<strong>Exemploe de saida:</strong>
		$questao->exemplo_saida<br><br>";
	}
	$_SESSION['vetor_questoes']=$vetor_questoes;
?>
<form name='envio_questao' method='post' action='submeter_questao.php'>
	<select name='posicao_questao'>	
		<?php 
			for($i=1; $i <= $cont; $i++)
			{
				echo "$i";
				echo"<option value='$i'>$i</option>";
			}?>
	</select>
   <textarea name='questao' cols='75' rows='10'></textarea>
  </input>
	<input type='submit' value='Enviar'>
</form>
</body>
</html>