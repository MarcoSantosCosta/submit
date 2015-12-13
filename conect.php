<?php
 $conexao =mysqli_connect('localhost', 'root','', 'submit');
   if($conexao)
   echo"<h1></h1>";
   else 
   echo "<h1>Erro de conexão tente novamente tarde</h1>";    
?>