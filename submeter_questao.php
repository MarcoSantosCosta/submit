<?php
	include("conect.php");
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$chave_usuario=$_SESSION["code_usuario"];
	$chave_prova=$_SESSION["code_prova"];
	$vetor_questoes=$_SESSION["vetor_questoes"];
	$posicao=$_POST["posicao_questao"];
	$envio=$_POST['questao'];
	$chave_questao=$vetor_questoes[$posicao-1];
	$select=("SELECT * from envios WHERE chave_usuario = '$chave_usuario' and chave_prova='$chave_prova' and chave_questao = '$chave_questao'");
	if($sql=mysqli_query($conexao,$select))
		{
			$row = mysqli_num_rows($sql);
			$qtd_envios = $row+1;
		}else
	{
		$qtd_envios=1;
	}
	$insert=("INSERT into envios values(null,$chave_usuario,$chave_prova,$chave_questao,'$envio',$qtd_envios,'$time',-1)");			
	if(!mysqli_query($conexao,$insert))
	{
		echo "Deu Ruim";
	}
	echo"$qtd_envios<br>";  
?>