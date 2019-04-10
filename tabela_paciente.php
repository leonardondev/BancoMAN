

<!DOCTYPE html>
<html>
<head>
	<title>Consulta paciente</title>
   <link rel="stylesheet" type="text/css" href="tema1.css">
   <style>
      body{background:#ffffff;}
   </style>
</head>

<body>
	<!-- TABELA PRINCIPAL -->
	<table cellspacing="0" align="center" width="800px" bgcolor="#ffffff"><tr><td>


		<!-- CABEÇALHO -->
		<table cellspacing="1" cellpadding="7" width="100%" bgcolor="#90ee90">
			<!-- Linha com logo, slogan e nome do site-->
			<tr>
				<td rowspan="2" align="right" width="20%">
					<img src="logo.png" width="80px">
				</td>
          	<td align="right" valign="top">
					<form action="home_login.html" method="POST">
      			<input type="submit" name="logout" value="LOGOUT">
   				</form>
				</td>
			</tr>
			<tr>
				<td align="center"><img src="nome.png" width="95%"></td>
			</tr>
		</table>


		<!-- Linha com links de navegação -->
		<table cellpadding="5" cellspacing="4" width="100%" border="0	" bgcolor="#e6e6fa">
			<tr align="center">
				<td bgcolor="#3b5898" width="12%"><a href="home_medico.php">Início</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="conheca.html">Conheça </a></td>
				<td bgcolor="#3b5898" width="12%"><a href="planos.html">Planos</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="exames.html">Exames</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="contato.html">Contato</a></td>

				<td> </td>
			</tr>
		</table>


		<!-- CORPO DO SITE  E MENU DO SITE-->
		<table cellpadding="15" width="100%" align="left" bgcolor="#ffffff">
		<colgroup>
  			<col width="20%">
         <col width="80%">
		</colgroup>

		<tr>
			<td valign="top" bgcolor="#90ee90">

				<!--coluna esquerda-->
				<table align="center" width="100%" cellspacing="7">
				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_exame.php">Lista de<br>exames</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_paciente.php">Buscar dados<br>dos pacientes</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_sala.php">Consultar<br>Sala</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="reserva_sala.php">Reservar<br>Sala</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_medico.php">Médicos</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_secretaria.php">Secretárias</a></td></tr>
				</table>
         </td>
			<td>

<!--coluna central-->

<?php

include ("bdfunc.php");
//prepara uma tabela. cabecalho primeiro
?>
  <div class='rolagem'>
		<table width='1000' border='5' cellpadding='4' align='center' bgcolor='BLACK'>
			<tr align='center' bgcolor='#EAEAEA'>
				<td colspan='9'><b>Pacientes</b></td>
			</tr>
			<tr align='center' bgcolor='#EAEAEA'>
				<td>SUS</td>
				<td>Nome</td>
				<td>Sobrenome</td>
				<td>Idade</td>
				<td>Sexo</td>
				<td>Rua</td>
				<td>nCasa</td>
				<td>telefone1</td>
				<td>telefone2</td>
			</tr>

<?php
$conexao = conecta("Man12", "userman12", "userman12");

// executa uma busca por dados
$cadeia = "SELECT nsus,pnome,unome,idade,sexo,rua,num_casa,fone,fone2 FROM paciente,telefone
WHERE nsus = nsus_paciente ORDER BY pnome;";
$resultado = consulta($conexao, "$cadeia");
$linhas = pg_numrows($resultado);

for ($cl=0; $cl<$linhas; $cl++){
	// recupera campos do resultado
	$SUS = pg_result($resultado, $cl, 0);
	$Nome = pg_result($resultado, $cl, 1);
	$Sobrenome = pg_result($resultado, $cl, 2);
	$Idade = pg_result($resultado, $cl, 3);
	$Sexo = pg_result($resultado, $cl, 4);
	$Rua = pg_result($resultado, $cl, 5);
	$nCasa = pg_result($resultado, $cl, 6);
	$telefone1 = pg_result($resultado, $cl, 7);
	$telefone2 = pg_result($resultado, $cl, 8);

	echo "<tr align='center' bgcolor='#EAEAEA'>".
		"<td>". $SUS. "</td>".
		"<td>". $Nome. "</td>".
		"<td>". $Sobrenome. "</td>".
		"<td>". $Idade. "</td>".
		"<td>". $Sexo. "</td>".
		"<td>". $Rua. "</td>".
		"<td>". $nCasa. "</td>".
		"<td>". $telefone1. "</td>".
		"<td>". $telefone2. "</td>".
		"</tr>";
}
echo "</table></div>";

desconecta($conexao);
?>
<!--fim coluna central-->
			</td>

<!--coluna direita-->
<!--			<td bgcolor="#90ee90"></td>      -->



		</tr>
	</table>
	<!-- RODAPÉ DO SITE-->
	<table align="center">
		<tr>
			<td>
				<br><br><br>
			</td>
		</tr>
	</table>
   </td></tr></table>
</body>

</html>
