<?php

   //文件路径
   $dir = "F:\city" ;


   //扫描文件夹
   $file = getSubdirectory($dir,true) ;


   //打印结果
   echo " <pre>";
   print_r($file);


   /*
   *    获取所有文件名
   *    @ $dir  文件路径
   *    @ $is_recursion  是否递归获取
   */
   function getSubdirectory($dir,$is_recursion = false)
   {
       if ($is_recursion) {
           
           $files = array();    //定义一个数组

           
           if (is_dir($dir)) {        //检测是否存在文件
               
               if ($handle = opendir($dir)) {    //打开目录
                   
                   while (($file = readdir($handle)) !== false) {        //返回当前文件的条目
                       
                       if ($file != "." && $file != "..") {        //去除特殊目录
                           
                           if (is_dir($dir . "/" . $file)) {        //判断子目录是否还存在子目录
                               
                               $files[$file] = getSubdirectory($dir . "/" . $file,$is_recursion =true);        //递归调用本函数，再次获取目录
                           } else {
                               
                               $files[] = $dir . "/" . $file;        //获取目录数组
                           }
                       }
                   }
                   
                   closedir($handle);        //关闭文件夹
                   
                   return $files;        //返回文件夹数组
               }
           }


       }
       


       $file = scandir($dir);

       return $file;
   }

