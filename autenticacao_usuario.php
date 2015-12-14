<html>
<head>
<script type="text/javascript" src="js/redirect.js"></script>
<?php
	include('conect.php');
?>
<title>Redirect</title>
</head>
    <body>
    <?php
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $select=("SELECT * from usuarios WHERE login = '$login' and senha =	 '$senha'");
       	$sql=mysqli_query($conexao,$select);
		$user= $sql-> fetch_object();
		$row = mysqli_num_rows($sql);
		if($row != 0)
        {
            session_start();
			$_SESSION['code_usuario']=$user->code;
            $_SESSION['login']=$user->login;
            $_SESSION['senha']=$user->senha;
			$_SESSION['nome_grupo']=$user->nome_grupo;
			$_SESSION['membros']=$user->membros;
			$_SESSION['permicao']=$user->permicao;
            if($user->permicao>1)
				header("Location: corretor.php");
			else
				header("Location: provas.php");
			}else{
				header("Location: login.php?try=1"); 
		}
    ?>	
    </body>
</html>
