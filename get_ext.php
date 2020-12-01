<?php
//获取文件名
function get_fileName($file_path){
    //1、先获取带文件部分
    $file_base_name = basename($file_path);
//    echo strrpos($file_base_name,'.');
    //2、查找截取即可
    $f_name = substr($file_base_name,0,strrpos($file_base_name,'.'));
    return $f_name;
}
get_fileName('../../src/bac.1.php');