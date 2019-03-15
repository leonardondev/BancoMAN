<! bdfunc.php>
<! funções para tratamento de conexões com PostgreSQL >
<! 26.mai.2011>

<?php
  // funcao para conexao com um BD
  // o host esta codificado.
  // a funcao usa como parametros o nome do banco,
  // usuario e senha
  function conecta ($basenome, $usuario, $senha)
  {
    $host="143.107.137.62";    
    $porta="5432";

    //php guarda erros na var php_errormsg
    $php_errormsg = "";

    // o @ espaço trata o erro, se ocorrer
    @ $con = pg_pconnect("
                         host=$host
                         port=$porta
                         dbname=$basenome
                         user=$usuario
                         password=$senha
                         ");

    if (!empty($php_errormsg))
    {
      echo "Problema de conexão: $php_errormsg";
      $php_errormsg = "";
      exit;
    }
    else
      return $con;
  }

  // para processar qualquer consulta ao banco
  function consulta ($conexao, $cadeia)
  {
    $php_errormsg = "";
    @ $tupla = pg_query($conexao, $cadeia);
    if (!empty($php_errormsg))
    {
      echo "Ocorreu seguinte erro: $php_errormsg";
      exit;
    }
    else
      return $tupla; 
  }

  function desconecta($conexao)
  {
    pg_close($conexao);
  }
?>
