<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaologin'])) {
		$Usuario_ppth = $_POST['string_user'];
		$Senha_usuario = $_POST['pass'];

	// atributos "NOT NULL"
	if (!( $Usuario_ppth AND $Senha_usuario )){
	echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
	exit();
	}

	$conexao = conecta("Man12", "userman12", "userman12");
   $cadeia = "SELECT ppthuser,cargo FROM usuario WHERE senha = '$Senha_usuario';";
	// executa uma busca por dados
	$resultado = consulta($conexao, "$cadeia");
	$linhas = pg_numrows($resultado);

   // recupera campos do resultado
   $User_ppth = pg_result($resultado, 0, 0);
   $Cargo = pg_result($resultado, 0, 1);

   if($Cargo == 'médico'){
		header("location: home_medico.php");
	}
	elseif($Cargo == 'secretária'){
		header ("location: home_secretaria.php"); 
	}


   desconecta($conexao);
}
?>

