<?php
use Databases\DB;

include 'DB.php';

try {
    $db = new DB($config);
    // $rows = $db->query('SELECT * FROM news WHERE id>:id',[':id'=>1]);
    // $db->execute("INSERT INTO news SET title=?,author=?",['das','das']);

    //查询
    $db->table('news')->field('title','author')->limit(1,2)->get();

    //插入
    $db->table('news')->insert(['title'=>'学习','author' => 'github']);

    //更新
    $db->table('news')->where('id>0')->update(['title' => '','author' => '']);
    
    //删除
    $db->table('news')->where('id>0')->delete();

} catch (\Exception $th) {
    die($th->getMessage);
}