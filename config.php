<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){
    //dados do servidor local (para desenvolvimento)
    define("BASE_URL", "http://localhost/cube_gmp/");
    $config['dbname'] = 'cube_gmp';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    //dados do servidor de hospedagem
    define("BASE_URL", "http://meusite.com.br/");
    $config['dbname'] = 'cube_gmp';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
    
}

global $db;
try{
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
    
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}