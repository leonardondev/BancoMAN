<html>
<head>
   <title>Consulta Telefone</title>
   <link rel="stylesheet" type="text/css" href="tema1.css">
   <style>
      body{background:#2222ff;}
   </style>
</head>
<body>
   <h1 class="title">HOSPITAL</h1>
   <div class="corpo"><h2 align='center'>Telefones</h2>

<?php
  include ("bdfunc.php");
  

  //prepara uma tabela. cabecalho primeiro
  echo "<table border='1' align='center'>".
       "<tr align='center'>
           <td colspan='2'><b>Telefones</b>
           </td>
        </tr>".

       "<tr align='center'>".
          "<td>NSUS</td>".
          "<td>Fone</td>
        </tr>";


  $conexao = conecta("Man12", "userman12", "userman12");
  // executa uma busca por dados
  $resultado = consulta($conexao, "SELECT * FROM telefone;");
  $linhas = pg_numrows($resultado);



  for ($cl=0; $cl<$linhas; $cl++)
  {
    // recupera campos do resultado
    $Nsus = pg_result($resultado, $cl, 0);
    $Fone = pg_result($resultado, $cl, 1);


    echo "<tr align='center'>".
"<td>". $Nsus. "</td>".
"<td>". $Fone. "</td>".
   "</tr>";
   }
   echo "</table>";
   desconecta($conexao);
?>
</div>
</body>
</html>
