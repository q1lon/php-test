<?php
//1+2+3+...+100递归求和
//方式1 100递归求和
function test($n){
    global $num;
    $num+=$n;
    if($n<100){
        test($n+1);//调用自身
    }
    return $num;
}
echo test(1);

//方法二
function sum($n){
    if($n>1){
        $s=sum($n-1)+$n;//调用自身
    }else{
        $s=1;
    }
    return $s;
}
echo sum(100);

