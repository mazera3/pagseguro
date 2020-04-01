<?php
$hostname = 'localhost';
$username = 'mazera';
$password = 'mazera';
$database = 'pagseguro';

//$conn = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
}
catch(PDOException $e){
    echo $e->getMessage();
    echo " <p>Conexao falhou!</p>";
}			
?>