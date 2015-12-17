<?php
 	$conexao =mysqli_connect('localhost', 'root','', 'submit');
   	if(!$conexao)
   	{
     	$conexao =mysqli_connect('localhost', 'u579069965_submi','admin_submit', 'u579069965_submi');
     	if(!$conexao)
 			echo "<h1>Erro de conexão tente novamente tarde</h1>";    
	}
?>