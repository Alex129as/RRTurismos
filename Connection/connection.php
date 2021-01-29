<?php 

  try {
    
    //Definindo Caminho do Banco de DADOS
    define("DB_HOST",'localhost');
    define("DB_NAME",'RRTurismos');
    define("DB_USER",'postgres');
    define("DB_PASS",'admin@root');
    define("DB_PORT", '5433');
 
    //CONEXÃO COM BANCO DE DADOS
    return new PDO(sprintf("pgsql:host=%s; port=%s; dbname=%s", DB_HOST, DB_PORT , DB_NAME), DB_USER, DB_PASS);

  }catch(\Throwable $th) {
   
    echo "Error: " . $th->getMessage()."<br>". "Tipo do Erro: " . $th->getCode();

  }
  ?>