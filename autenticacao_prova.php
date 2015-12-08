<?php
	
	include("conect.php");
	$senha_prova=$_POST["senha_prova"];
	$code=$_POST["code_prova"];
	echo"Senha: $senha_prova Code $code";
	$select="SELECT * FROM provas WHERE senha = '$senha_prova' ";
	$sql=mysqli_query($conexao,$select);
	$prova= $sql->fetch_object();
	$row = mysqli_num_rows($sql);
	/*
	$select=("SELECT * from usuarios WHERE login = '$login' and senha = '$senha'");
  	$sql=mysqli_query($conexao,$select);
	$user= $sql-> fetch_object();
	$row = mysqli_num_rows($sql);
	*/
	if($row != 0 )
	{
		session_start();
		$_SESSION['senha_prova']=$prova->senha;
		$_SESSION['code_prova']=$prova->code;
		$_SESSION['qtd_questoes']=$prova->qtd_questoes;		
		$_SESSION['data']=$prova->data;
		$_SESSION['hora_inicio']=$prova->hora_inicio;
		$_SESSION['hora_fim']=$prova->hora_fim;
		$_SESSION['status']=$prova->status;
		header("Location: base_provas.php");
	}else{
		header("Location: provas.php?$try=1");
		exit;
	}
?> 	