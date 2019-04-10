

<html>
<head>
  <title>Cadastro usuário</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaoconta'])) {
		$Email = $_POST['string_email'];
		$Usuario_ppth = $_POST['string_usuario'];
		$Cargo = $_POST['string_cargo'];
		$Senha_usuario = $_POST['pass'];
		$Senha_confirm = $_POST['passconfirm'];

      if(!($Senha_usuario == $Senha_confirm)){echo "NÃO PASSOU NO TESTE DE IGUALDADE.";
//			header("location: home_login.html");
			exit();
		}

		// atributos "NOT NULL"
		if (!($Email AND $Usuario_ppth AND $Cargo )){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}

		$Email = "$Email"."@ppth.com";

    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO usuario (email,ppthuser,senha,cargo) VALUES('$Email','$Usuario_ppth','$Senha_usuario','$Cargo');";

    $resultado = consulta($conexao, "$cadeia");

    if ($resultado){
      echo "Operação realizada!";
    }
    else{ 
      echo "Não deu certo!";
    }
    desconecta($conexao);
  }
?>
  <!HTML>
  <form name="cadastro" method="POST" action="home_login.html">
  <input type="submit" name="submitVoltar" value="Voltar">
  </form>

</body>
</html>
