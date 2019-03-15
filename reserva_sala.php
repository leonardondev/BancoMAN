

<!DOCTYPE html> 
<html>
<head>
	<title>Reserva sala</title>
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
$conexao = conecta("Man12", "userman12", "userman12");
$cadeia = "SELECT numero,nome_sala FROM sala ORDER BY numero";
$resultado = consulta($conexao, "$cadeia");
$linhas = pg_numrows($resultado);

echo"
<table align='center'  border='5' cellspacing='0' bgcolor='#bfbfbf'>
   <tr><th align='center' valign='top'>Reservar Sala</th></tr>
	<tr><td>
	<form name='acrescenta' method='POST' action='reservar_sala.php'>

		<fieldset>
	 		<legend>Sala</legend>
			<table cellspacing='10'>
				<tr>
					<td><label for='string_nsala'>Sala </label></td>
					<td>
					<select name='string_nsala'>
					<option value=''>escolha uma sala</option>
";
for ($cl=0; $cl<$linhas; $cl++){
	$Numero = pg_result($resultado, $cl, 0);
	$Nome = pg_result($resultado, $cl, 1);
	echo "<option value='$Numero'>"."$Numero"." - "."$Nome"."</option>";
}

echo "
					</select>
					</td>
				</tr>
				<tr>
					<td><label for='string_crm'>CRM </label></td>
					<td><input type='text' name='string_crm' size='8' maxlength='8'></td>
				</tr>
				<tr>
					<td><label>DATA </label></td>
					<td>
						<input type='text' name='string_dia' size='2' maxlength='2' value='dd'>/
						<input type='text' name='string_mes' size='2' maxlength='2' value='mm'>/
						<input type='text' name='string_ano' size='4' maxlength='4' value='aaaa'>
					</td>
				</tr>
				<tr>
					<td><label for='hora_inicio'>Início </label></td>
					<td><input type='text' name='hora_inicio' size='5' maxlength='5' value='00h00'></td>
				</tr>
				<tr>
					<td><label for='hora_fim'>Fim </label></td>
					<td><input type='text' name='hora_fim' size='5' maxlength='5' value='00h00'></td>
				</tr>
			</table>	 		
		</fieldset>
			<table align='center' width='100%'>
				<tr>
					<td align='center'><input type='submit' value='Reservar' name='botaoreserva'></td>
				</tr>
			</table>


		</form>
	</td></tr>
</table>
";
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
