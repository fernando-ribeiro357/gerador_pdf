<?php

$file = '.settings.ini';

if (!$set = parse_ini_file($file, TRUE)) {
    throw new exception('Erro ao tentar abrir o arquivo ' . $file . '.');
}
$dsn = $set['database']['driver'] .
':host=' . $set['database']['host'] .
';dbname=' . $set['database']['dbname'];

$pdo = new PDO($dsn,$set['database']['login'], $set['database']['secret']);
   if(!$pdo){
       die('Erro ao criar a conexão');
   } 
   //else { echo "<br>Conectou! \":^) <br>"; }

?>