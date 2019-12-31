<?php

session_start();
if(isset($_SESSION['views']))
{
    $_SESSION['views']=$_SESSION['views']+1;
}
else
{
    $_SESSION['views']=0;
}



if(isset($_SESSION['views']) && $_SESSION['views'] == true) {
    echo "登录成功";
}