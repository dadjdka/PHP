<?php

    // $i = 1;
    // function index(){
    //     global $i;
    //     echo $i;
    //     $i++;
    //     if ($i<5) {
    //         index();
    //     }
    // }

    // index();


    $array = [
        ['id' => 1, 'pid' => 0, 'name' => '分类ID1'],
        ['id' => 2, 'pid' => 0, 'name' => '分类ID2'],
        ['id' => 3, 'pid' => 1, 'name' => '分类ID3，父级ID1'],
        ['id' => 4, 'pid' => 2, 'name' => '分类ID4，父级ID2'],
        ['id' => 5, 'pid' => 3, 'name' => '分类ID5，父级ID3'],
        ['id' => 6, 'pid' => 4, 'name' => '分类ID6，父级ID4'],
    ];
 

    function call(array $array, $id = 0)
    {
        foreach ($array as $key => $value) {
            if ($value['pid'] == $id) {
                $value['chid'] = call($array,$value['id']);
                // print_r($value['chid']);die;
                // if (!$value['chid']) {
                //     unset($value['chid']);
                // }
                 
                $res[] = $value;
                // print_r($res);die;
            }
        }   
        return $res; 
    }

    call($array,2);


   