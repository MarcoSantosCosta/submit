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
	<?php
		echo"<div style='position:fixed; opacity:0;'>";
			$permicao_pagina=1;
			include('seguranca.php');
			include('conect.php');
		echo"</div>";

	?>
</head>
</head>
<body>

<?php include('header.php')?>;
	<?php
		$code_prova=$_POST['code_prova'];
		$select_provas = "SELECT * FROM provas WHERE status = 1 and code='$code_prova'";
		$sql=mysqli_query($conexao,$select_provas);	
		$prova = $sql-> fetch_object();
		$hora_inicio=$prova->hora_inicio;
		$hora_fim=$prova->hora_fim;
		echo"
		<form name='validar_notas' method='POST' action='resultado_final.php' >
		<div style='position:fixed; opacity:0;' class='hidden'>		
			<input type='text' name='code_prova' value='$prova->code' style='height:30px; width:30%; float:right'>
			<input type='text' name='qtd_questoes' value='$prova->qtd_questoes'>
			<input type='text' name='hora_inicio' value='$hora_inicio'>
			<input type='text' name='validar' value='1'>
		</div>
			<input type='submit'  value='Calcular Resultado' class='btn' style='margin-left:4%; '>
		</form>
		";
	?>
	<?php
			$qtd_questoes=$_POST['qtd_questoes'];
			$hora_inicio=$_POST['hora_inicio'];
			$select_usuario=('SELECT * from usuarios');
			$sql_usuarios=mysqli_query($conexao,$select_usuario);
			$hora_inicio = explode( ':', $hora_inicio);
			$hora_inicio = mktime( $hora_inicio[0], $hora_inicio[1]);
			while($usuario=$sql_usuarios->fetch_object())
			{
				$select_envio="SELECT * FROM envios  WHERE envios.ultimo=1 and envios.chave_usuario = $usuario->code and envios.chave_prova = $code_prova ORDER BY chave_questao ASC";
				$soma_nota=0;
				$soma_tempo=0;
				$soma_pesos=0;
				$sql_envio=mysqli_query($conexao,$select_envio);
				$qtd_envios=mysqli_num_rows($sql_envio);
				if($qtd_envios!=0)
				{
					echo"<div id='campo_prova' style='height:auto'>";
					echo"<p align='center'><strong>Nome do grupo:</strong> $usuario->nome_grupo</p>";
					$code_usuario=$usuario->code;
					$soma=0;
					$i=1;
					$p=1;
					while($envio=$sql_envio->fetch_object())
					{	
						$select_questoes="SELECT * FROM questoes WHERE chave_prova =$code_prova  and code = $envio->chave_questao";
						$sql_questoes=mysqli_query($conexao,$select_questoes);
						$questoes=$sql_questoes->fetch_object();
						$peso=$questoes->peso;
						$soma_pesos=$soma_pesos+$peso;

						if($envio->nota != -1)
						{
							if($envio->nota==0)
							{
								$nota=0;
							}else if ($envio->nota==1)
							{

								$nota=(50-(5*($envio->numero_envio-1)));
							}else
							{	

								$nota=(100-(5*($envio->numero_envio-1)));
							}
							$hora_envio=$envio->hora_envio;
							$hora_envio = explode( ':', $hora_envio );
							$hora_envio = mktime( $hora_envio [0], $hora_envio[1]);
							$horaDiferenca = $hora_envio - $hora_inicio-(60*60);
							$soma_tempo=$soma_tempo+$horaDiferenca;
							echo"<h5>Questão $p:</h5>
							<p><strong>Peso:</strong>$peso</p>
							<p><strong>Nota:</strong>$nota</p>
							<p><strong>Tentaiva:</strong>$envio->numero_envio</p>"; 
							echo"<p><strong>Tempo de Envio:</strong>".date('H',$horaDiferenca ).":".date('i',$horaDiferenca ).":".date('s',$horaDiferenca);
							echo"</p><p><strong>Code questão:</strong>$envio->chave_questao</p><hr>";
							
							//echo"calculaTempo($envio->hora_envio,$hora_inicio);<br>";
							//echo"$soma_tempo=$envio->hora_envio-$hora_inicio;<br>";
							//echo"$soma_tempo<br>";
							$soma_nota=$soma_nota+($nota*$peso);

							$p++;
						}else
						{
							echo"<h5>Questão $p.</h5>
								<p><strong>Aguardando avaliação!</strong></p><hr>
							";
						}	
					}
					$select_questoes="SELECT * FROM questoes WHERE chave_prova =$code_prova";
					$sql_questoes=mysqli_query($conexao,$select_questoes);
					
					if($soma_pesos==0)
					{
						$soma_pesos=1;
					}
					$nota_final= $soma_nota/$soma_pesos;
					$nota_final=number_format($nota_final,2);
					$tempo_final=$soma_tempo/$qtd_questoes;
					echo"
						<p><strong>Nota media: </strong>$nota_final </p>
						<p><strong>Tempo medio: </strong>".date('H',$tempo_final).":".date('i',$tempo_final).":".date('s',$tempo_final);
					echo"</p>";
					echo"</div>";
				}
			}
		
		?>
</body>
</html>

