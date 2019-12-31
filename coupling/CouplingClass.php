<?php

namespace app\coupling\coplingclass;

class Coupling{

    public function dostring()
    {
        return __METHOD__;
    }
}

class Index{

    private $obj;
    public function __construct(Coupling $obj){

        $this->obj=$obj;
    }

    public function dostring(){

        $this->obj->dostring();

        echo "耦合测试";
    }
}

$in = new Coupling();

// print_r($in);