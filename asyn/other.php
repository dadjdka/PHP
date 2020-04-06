
<?php
header("content-type:text/html;charset=utf-8");
//error_reporting(0);
//ini_set('html_errors',false);
//ini_set('display_errors',false);
$name = isset($_POST['name'])?$_POST['name']:'';
$pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
echo $name.$pwd;
echo '<hr/>success ok';
die;
