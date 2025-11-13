<?php

include_once './config.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA);

if($db->connect_errno){
    echo "Erro Banco de dados: {$db->connect_error}";
    exit();
}

