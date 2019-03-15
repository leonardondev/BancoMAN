

<html>
<head>
  <title>Cadastro médico</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaocadastrar'])) {
		$Crm = $_POST['string_crm'];
		$Nome = $_POST['string_nome'];
		$Area = $_POST['string_area'];
		}

		// atributos "NOT NULL"
		if (!(
		$Crm AND
		$Nome AND
		$Area
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO medico (crm,nome_medico,area_de_atuacao) VALUES('$Crm','$Nome','$Area');";

    $resultado = consulta($conexao, "$cadeia");

    if ($resultado){
      echo "Operação realizada!";
    }
    else{ 
      echo "Não deu certo!";
    }
    desconecta($conexao);
  
?>
  <!HTML>
  <form name="cadastro" method="POST" action="cadastro_paciente.html">
  <p align="center">CADASTRO REALIZADO COM SUCESSO!<br>
  <input type="submit" name="submitVoltar" value="Voltar"></p>
  </form>

</body>
</html>
