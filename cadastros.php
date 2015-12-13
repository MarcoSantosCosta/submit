<?php
	include("conect.php");	
	$code=$_POST['code'];
	switch($code)
	{
		case 0:
			echo"Você não deveria estar aqui!";
		break;
		case 1://Cadastros provas
			$senha_prova=$_POST["senha_prova"];
			$qtd_questoes=$_POST["qtd_questoes"];
			if($_POST["ano"]<100)
			{
				$ano=$_POST["ano"]+2000;
			}else
			{
				$ano=$_POST["ano"];
			}
   			$data_prova=$ano.$_POST["mes"].$_POST["dia"];
			$hora_inicio=$_POST["hora_inicio"];	
			$hora_fim=$_POST["hora_fim"];
			echo"$ano";
			$insert_provas="INSERT into  provas values(null,'$senha_prova',$qtd_questoes,'$data_prova','$hora_inicio','$hora_fim',1)";
			if(mysqli_query($conexao,$insert_provas))
			{
				header("Location: cadastro_prova.php");
				exit;
			}else{
				echo"Ocorreu algum erro!";
			}
		break;
		case 2://Cadastros questões
			$senha_prova=$_POST["senha_prova"];
			$enunciado=$_POST["enunciado"];
			$exemplo_in=$_POST["exemplo_in"];
			$exemplo_out=$_POST["exemplo_out"]; 
			$select="SELECT code from provas WHERE senha = '$senha_prova'";
			$sql=mysqli_query($conexao,$select);
			$prova=$sql->fetch_object();
			$row=mysqli_num_rows($sql);
			if($row !=0)
			{
				$code_prova=$prova->code;				
				echo"Code prova: $code_prova Senha prova: $senha_prova";
				$insert_questoes="INSERT into  questoes values(null,'$code_prova','$enunciado','$exemplo_in','$exemplo_out')";
				if(mysqli_query($conexao,$insert_questoes))			
				{	
					header("Location: cadastro_questoes.php");
					exit;
				}else{
					echo"Algum campo inválido";
				}
			}else{
				echo"senha inesistente";
			}
		break;
		case 3://Cadastros Usuarios
			$login=$_POST["login_new"];
			$password=$_POST["password_new"];
			$membros=$_POST["membros"];
			$nome_grupo=$_POST["nome_grupo"];
      		$insert_usuarios="INSERT into usuarios values(null,'$login','$password','$nome_grupo','$membros',1)";
			if(mysqli_query($conexao,$insert_usuarios))
			{
					header("Location: home.php");
			}
		break; 
		default:
			echo"deu merda";
		break;
			
	}
?>