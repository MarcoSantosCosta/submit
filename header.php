	<div class="container-fluid" style="margin:0; padding:0;">
    	<div class="row" style="margin:0; padding:0;">
            <div id="header">
            	<div >
                	<img src="img/Logo3.png" id="logo_header">
                </div>
                <div id="dados_header">
                	<?php 
						
						$nome_grupo=$_SESSION['nome_grupo'];
						echo"<strong style='margin-right:10%'>Nome do Grupo: $nome_grupo</strong>";
						
					?>
                    <a href="logout.php">(Sair)</a>
                </div>       		
            </div>
        </div>
    </div>
    <?php 
		if($permicao>=2)
		{
			echo"
				<div class='navbar'>
					<div class='navbar-inner'>
						<ul class='nav' style='margin-left:5%'>
							<li class='divider-vertical'></li>
							<li><a href='cadastro_prova.php'>Cadastro Provas</a></li>
							<li class='divider-vertical'></li>
							<li><a href='cadastro_questoes.php'>Cadastro Questões</a></li>
							<li class='divider-vertical'></li>
							<li><a href='correcoes.php'>Correções</a></li>
							<li class='divider-vertical'></li>
							<li><a href='provas.php'>Provas</a></li>
							<li class='divider-vertical'></li>
							<li><a href='resultado.php'>Gerar Resultado</a></li>
							<li class='divider-vertical'></li>
						</ul>
					</div>
				</div>
			";
		}else
		{
			echo"
				<div class='navbar'>
					<div class='navbar-inner'>
						<ul class='nav' style='margin-left:5%'>
							<li class='divider-vertical'></li>
							<li><a href='base_provas.php'>Prova</a></li>
							<li class='divider-vertical'></li>
							<li><a href='provas.php'>Provas Abertas</a></li>
							<li class='divider-vertical'></li>
							<li><a href='resultado.php'>Resultado</a></li>
						</ul>
					</div>
				</div>

			";
		}
	?>
