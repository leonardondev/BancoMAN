

<html>
<head>
  <title>Cadastro paciente</title>
</head>

<?php
	require("bdfunc.php");
  
	if (isset($_POST['botaoreserva'])) {
		$nsala = (int)$_POST['string_nsala'];
		$Crm = $_POST['string_crm'];
		$Dia = $_POST['string_dia'];
		$Mes = $_POST['string_mes'];
		$Ano = $_POST['string_ano'];
		$Data = "$Ano"."-"."$Mes"."-"."$Dia";
		$Hinicio = $_POST['hora_inicio'];
		$Hfim = $_POST['hora_fim'];
		}

		// atributos "NOT NULL"
		if (!(
		$nsala AND
		$Crm AND
		$Data AND
		$Hinicio AND
		$Hfim
		)){
		echo "NÃO FOI PREENCHIDO TODOS OS CAMPOS OBRIGATÓRIOS.";
		exit();
		}
  
    $conexao = conecta("Man12", "userman12", "userman12");

    $cadeia = "INSERT INTO reserva (num_sala,crm_med,data_reserva,hora_inicio,hora_fim) VALUES($nsala,'$Crm','$Data','$Hinicio','$Hfim');";

    $resultado = consulta($conexao, "$cadeia");

    if ($resultado){
      echo "<br><p align='center'>CADASTRO REALIZADO COM SUCESSO!</p>";
    }
    else{ 
      echo "<p align='center'>FALHA NO CADASTRO!</p>";
    }
    desconecta($conexao);
?>
  <!HTML>
  <form name="cadastro" method="POST" action="reserva_sala.php">
  <p align='center'><input type="submit" name="submitVoltar" value="Voltar"></p>
  </form>

</body>
</html>
