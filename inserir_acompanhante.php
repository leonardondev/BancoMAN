

<html>
<head>
  <title>Cadastro acompanhante</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaocadastrar'])) {
		$Nome = $_POST['string_nome'];
		$rg = $_POST['string_rg'];
		$verif = $_POST['string_verif'];
		$RG = "$rg"."-"."$verif"; 
		$Paciente = $_POST['string_paci'];
	
		// atributos "NOT NULL"
		if (!(
		$Nome AND
		$RG AND
		$Paciente
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO acompanhante (nome_acomp,rg_acomp,nsus_paciente) VALUES('$Nome','$RG','$Paciente');";

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
