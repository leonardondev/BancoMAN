

<html>
<head>
  <title>Cadastro paciente</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaocadastrar'])) {
		$p_nome = $_POST['string_pnome'];
		$u_nome = $_POST['string_unome'];
		$idade = (int)$_POST['string_idade'];
		$sexo = $_POST['string_sexo'];
		$nsus = $_POST['string_nsus'];
		$RG = "$rg"."-"."$verif"; 
		$rua = $_POST['string_rua'];
		$ncasa = (int)$_POST['string_ncasa'];
		
		$codarea = $_POST['string1_codarea'];
		$fonei = $_POST['string1_fonei'];
		$fonef = $_POST['string1_fonef'];
		$fone1 = "$codarea"." "."$fonei"."-"."$fonef";
	
		if(isset($_POST['string2_fonei1']) AND isset($_POST['string2_fonef'])){
		$codarea = $_POST['string1_codarea'];
		$fonei = $_POST['string2_fonei1'];
		$fonef = $_POST['string2_fonef'];
		$fone2 = "$codarea"." "."$fonei"."-"."$fonef";
		}

		// atributos "NOT NULL"
		if (!(
		$p_nome AND
		$u_nome AND
		$idade AND
		$sexo AND
		$nsus AND
		$rua AND
		$ncasa
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO paciente,telefone (pnome,unome,idade,sexo,nsus,rua,num_casa,nsus_paciente,fone,fone2) VALUES('$p_nome','$u_nome',$idade,'$sexo','$nsus','$rua',$ncasa,'$nsus','$fone1','$fone2');";
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
