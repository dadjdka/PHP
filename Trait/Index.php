<?php

include './Datas.php';


trait App{

    public function com(){
        echo __METHOD__;
    }

    public function op(){
        return __FILE__;
    }
}

class Index{
    
    // use Datas;

    // use App;
    
    use App,Datas{
        Datas:: op as o;
        App:: op as p;
       
    }

    //实例中重写
    public function op(){
        return "实例化方法中的";
    }
   
    
}

$data = new Index();

echo $data->op();
