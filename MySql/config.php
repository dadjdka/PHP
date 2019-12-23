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
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);//错误处理模式

    //数据库返回处理函数
    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //数据库返回数据大小写处理
    $pdo->setAttribute(PDO::ATTR_CASE,PDO::CASE_UPPER);

    //发送执行语句
    $pdo->exec("INSERT INTO news (title,author,description) VALUES('xx','学习','湿哒哒')");

    //获取主键
    $pdo->lastInsertId();
} catch (PDOExecption $th) {
    die($th->getMessage());
}