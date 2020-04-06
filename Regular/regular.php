<?php

$url = "http://za.fp929.com/app/index.php?i=4&c=entry&m=ewei_shopv2&do=mobile&r=diypage&id=19";

$success = preg_match("/(?<=\d{id})/",$url,$urls);

var_dump($urls);die;