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

    //单条查询循环返回集合
    $query = $pdo->query('SELECT * FROM news where id<>0');
    //查询不为空继续执行
    while ($field = $query->fetch(PDO::FETCH_ASSOC)) {
        # code...
    }
  
} catch (PDOExecption $th) {
    die($th->getMessage());
}