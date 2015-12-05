<?php
	include("conect.php");
	$code = $_POST["code"];
	switch($code)
	{
		case 1:
			$senha_prova=$_POST["senha_prova"];
   			$data_prova=$_POST["ano"].$_POST["mes"].$_POST["dia"];
			$hora_inicio=$_POST["hora_inicio"];	
			$duracao=$_POST["duracao"];
			$insert_provas="INSERT into  provas values(null,'$senha_prova','$data_prova','$hora_inicio','$duracao')";
			mysqli_query($conexao,$insert_provas);
		break;
		case 2:
			$senha_prova=$_POST["senha_prova"];
			$enunciado=$_POST["enunciado"];
			$exemplo_in=$_POST["exemplo_in"];
			$exemplo_out=$_POST["exemplo_out"]; 
			$select="SELECT code from provas WHERE senha = '$senha_prova'";
			$sql=mysqli_query($conexao,$select);
			$row=$sql-> fetch_object();
			$code_prova=$row->code;				
			echo"Code prova: $code_prova Senha prova: $senha_prova";
			$insert_qustoes="INSERT into  questoes values(null,'$code_prova','$enunciado','$exemplo_in','$exemplo_out')";
			mysqli_query($conexao,$insert_qustoes);	
		break;
		case 3:
			$login=$_POST["login"];
			$password=$_POST["password"];
			$membros=$_POST["membros"];
			$nome_grupo=$_POST["nome_grupo"];
      		$insert_usuarios="INSERT into usuarios values(null,'$login','$password','$nome_grupo','$membros',1)";
			mysqli_query($conexao,$insert_usuarios);
		break; 
			
	}
?>