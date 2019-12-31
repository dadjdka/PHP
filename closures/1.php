<?php

// $fun = function(){
//    echo "44";
// };

// $fun;

function getName(){
    $fun = function(){
        echo "1";
    };
    $fun();
    echo "2<br>";
}

getName();


function getMoney() {
        $rmb = 1;
        $dollar = 6;
        $func = function() use ( $rmb ) {
            echo $rmb;
        //  echo $dollar;
        };
    $func();
}
getMoney();