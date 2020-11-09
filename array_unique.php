<?php
//数组去重
$a1 = array("a" => "red", "b" => "red", "c" => "blue", "d" => "yellow");
// 1 array_unique 数据去重
$result = array_unique1($a1);
print_r($result);
// 2 翻转数组
//$result = array_flip($result);
//print_r($result);

//3 数组去重算法实现
function array_unique1($array)
{
    $tem = [];
    foreach ($array as $key => $value) {
        if (in_array($value, $tem))
            unset($array[$key]);
        else {
            $tem[] = $value;
        }
    }

    return $array;
}

//print_r(array_unique1($a1));