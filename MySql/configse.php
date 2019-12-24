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


//预处理防止sql注入

// $query = $pdo->query("SELECT * FROM news where id=:id");

// $query = $pdo->prepare("SELECT * FROM news where id=:id");

$query = $pdo->prepare("INSERT INTO news (title,author) VALUES(:title,:author)");

// 预处理
$query->execute([':id' => 1]);  
  
} catch (PDOExecption $th) {
    die($th->getMessage());
}