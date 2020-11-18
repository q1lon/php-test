<?php
// 递归函数输出 32123
function test($n){
    if ($n>1){
        echo $n;
        test($n-1);
    }
    echo $n;
}
// 递归的执行过程
function a($n=3){
    if ($n>1){
        echo 3;
        b($n-1);
    }
    echo $n;
}
function b($n=2){
    if ($n>1){
        echo $n;
        c($n-1);
    }
    echo $n;
}
function c($n=1){
    if ($n>1){// 此时$n=1 不会在输出 if里面的 echo了
        echo $n;
    }
    echo $n;
}

test(3);