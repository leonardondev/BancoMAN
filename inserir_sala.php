

<html>
<head>
  <title>Cadastro sala</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaocadastrar'])) {
		$Numero = (int)$_POST['string_n'];
		$Nome = $_POST['string_nome'];

		// atributos "NOT NULL"
		if (!($Numero)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO sala (numero,nome_sala) VALUES($Numero,'$Nome');";

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
  <form name="cadastro" method="POST" action="cadastro_paciente.html">
  <p align="center">CADASTRO REALIZADO COM SUCESSO!<br>
  <input type="submit" name="submitVoltar" value="Voltar"></p>
  </form>

</body>
</html>
