<?php

namespace Databases;

class DB{
    protected $link;
    protected $options = [
        'table' => '', 'field' => '','order' =>'',
        'limit' => '', 'where' => ''
    ];

    public function __construct(array $config)
    {
        $this->connect($config);
    }

    protected function connect(array $config){
        $config = [
            'host' => 'localhost',
            'user' => 'root',
            'password' => 'root',
            'database' => 'student',
            'charset' => 'utf8',
        ];
        $this->link = new PDO($dsn,$config['user'],$config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);        
    }

    public function query(string $sql,array $vars = [])
    {
        $query = $this->link->prepare($sql);
        $query = $this->link->execute($vars);
        return $query->fetchAll();
    }

    public function execute(string $sql,array $vars = [])
    {
        $query = $this->link->prepare($sql);
        return $query->execute($vars);
    }

    public function table(string $table)
    {
        $this->options['table'] = $table;
        return $this;
    }

    //不确定情况...
    public function field(...$fields)
    {
        $this->options['field'] = '`'.\implode('`,`',$fields).'`';

        return $this;
    }

    public function limit(...$limit){
        $this->options['limit'] = "LIMIT ".\implode(',',$limit);
        return $this;
    
    }

    public function order(string $order){
        $this->options['order'] = "ORDER BY ".$order;
        return $this;
    }

    public function where(string $where){
        $this->options['where'] = "WHERE".$where;
        return $this;
    }

    public function get(){
        $sql = "SELECT {$this->options['field']} FROM {$this->options['table']} {$this->options['where']} {$this->options['order']} 
                {$this->options['limit']}";

        $this->query($sql);
        
    }

    public function insert( array $vars){

        $fields = \implode('`,`',array_keys($vars));
       
        $values = array_fill(0,\count($vars),'?');
        
        $sql = "INSERT INTO {$this->options['table']} {$fields} VALUES {$values}";
   

        return $this->execute($sql,array_values($vars));
    }

    public function update(array $vars){

        if (empty($this->options['where'])) {
            throw new Exception("条件不能为空", 1);
            
        }

        $sql = "UPDATE {$this->options['table']} SET".\implode('=?,',array_keys($vars)."=?{$this->options['where']}");
        // $sql = "UPDATE {$this->options['table']} SET".\implode('=?,',array_keys($vars)."=?{$this->options['where']}");

        return $this->execute($sql,array_values($vars));
    }


    public function delete(array $vars){

        if (empty($this->options['where'])) {
            throw new Exception("条件不能为空", 1);
            
        }

        $sql = "DELETE FROM {$this->options['table']}" .
        "=?{$this->options['where']}";

        return $this->execute($sql);
    }
}