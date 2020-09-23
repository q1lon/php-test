<?php

function getValue($num, $arr)
{
//查找数组的中间位置
    $length = count($arr);
    $start = 0;
    $end = $length;
    $middle = floor(($start + $end) / 2);
//    echo $middle;
//循环判断
    while ($start < $end - 1) {
        if ($arr[$middle] == $num) {
            return $middle + 1;
        } elseif ($arr[$middle] < $num) {
//如果当前要查找的值比当前数组的中间值还要大，那么意味着该值在数组的后半段
//所以起始位置变成当前的middle的值，end位置不变。
            $start = $middle;
            $middle = floor(($start + $end) / 2);
        } else {
            $end = $middle;
            $middle = floor(($start + $end) / 2);
        }
    }
    return false;

}

//echo getValue(2,[1,2,3,4,5,6,7,8,9,10]);
var_dump((1-0.9)==0.1);