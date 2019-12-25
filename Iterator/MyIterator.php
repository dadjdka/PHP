<?php
class MyIterator implements Iterator{

    

    private $position = 0;
    private $array = array(
        "first_element",
        "second_element",
        "last_element",
    );  
 
    public function __construct() {
        $this->position = 0;
    }
 
    function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }
 
    function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }
 
    function key() {
        var_dump(__METHOD__);
        return $this->position;
    }
 
    function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }
 
    function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }

    function index() {
        var_dump(__FILE__);
        return isset($this->array[$this->position]);
    }


} 



$it = new MyIterator();

foreach ($it as $key => $value) {
    echo "迭代输出";

    var_dump($key,$value);

    echo $i++;
}