<?php
	include("conect.php");
	$senha_prova=$_POST["senha"];
	$code_prova=$_POST["code_prova"];
	echo"$senha_prova";
	$select="SELECT * FROM provas WHERE senha = '$senha_prova' and code='$code_prova'";
	$sql=mysqli_query($conexao,$select);
	$prova= $sql->fetch_object();
	$row = mysqli_num_rows($sql);
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
		header("Location: provas.php");
		exit;
	}
?> 	