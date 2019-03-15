

<html>
<head>
  <title>Cadastro paciente</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaoagendar'])) {
		$Sus = $_POST['string_sus'];
		$Crm = $_POST['string_crm'];
		$Nomeexame = $_POST['string_nomeexame'];
		$Dia = $_POST['exame_dia'];
		$Mes = $_POST['exame_mes'];
		$Ano = $_POST['exame_ano'];
		$Data = "$Ano"."-"."$Mes"."-"."$Dia"; 
		$Horario = $_POST['string_horario'];
		$Dia = $_POST['retorno_dia'];
		$Mes = $_POST['retorno_mes'];
		$Ano = $_POST['retorno_ano'];
		$Retorno = "$Ano"."-"."$Mes"."-"."$Dia";
		
		$Secretaria = $_POST['id_secretaria'];
	
		// atributos "NOT NULL"
		if (!(
		$Sus AND
		$Crm AND
		$Nomeexame AND
		$Data AND
		$Horario AND
		$Secretaria
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
	$conexao = conecta("Man12", "userman12", "userman12");

	//sequenciador de id
	$id = consulta($conexao, "SELECT id_e FROM exame;");
	$linhas = pg_numrows($id);
	$max_id = 0;
	$n = 0;
	for ($cl=0; $cl<$linhas; $cl++){
		$n = pg_result($id, $cl, 0);
		if($n > $max_id)	
			{$max_id = $n;}
	}$n = $n+1;

	$cadeia = "INSERT INTO exame (id_e,nsus_paci,crm_m,nome_exame,horario,data_exame,data_retorno) VALUES($n,'$Sus','$Crm','$Nomeexame','$Horario','$Data','$Retorno');";
	$resultado = consulta($conexao, "$cadeia");

	$cadeia = "INSERT INTO agenda (id_exame,id_secretaria) VALUES($n,'$Secretaria');";
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
  <form method="POST" action="agendar_exame.html">
  <p align="center">AGENDAMENTO REALIZADO COM SUCESSO!<br>
  <input type="submit" name="submitVoltar" value="Voltar"></p>
  </form>

</body>
</html>
