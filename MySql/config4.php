<?php
header("Content-type: text/html:charset=utf8");

$config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'database' => 'student',
    'charset' => 'utf8',
];

//拼接字符串
$dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s',$config['host'],$config['database'],$config['charset']);

try {
    $pdo = new PDO($dsn,$config['user'],$config['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);

    //占位
    $sth = $pdo->prepare(" SELECT * FROM news where :id=>?");
 
  
} catch (PDOExecption $th) {
    die($th->getMessage());
}