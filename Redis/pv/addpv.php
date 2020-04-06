<?php

$name = $_GET['name'];

$conn = mysqli_connect('127.0.0.1','root','root','pv');

//mysqli_select_db($conn,'pv');
//更新pv
mysqli_query($conn,'update pv set value=value+1 where name ="'.$name.'" limit 1');
//查询pv
$pv = mysqli_query($conn,'select value from pv where name ="'.$name.'" limit 1');

$pv = mysqli_fetch_array($pv);
echo $pv['value'];
mysqli_close($conn);

