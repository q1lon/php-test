<?php
// 插入排序
// 方式一(从大到小排)
function quiclySort($arr)
{
    $count = count($arr);
    for ($i = 1; $i < $count; $i++) {
        $tmp = $arr[$i];//3
        $j = $i - 1; // 0
        while ($j >= 0 && $tmp > $arr[$j]) {
            $arr[$j + 1] = $arr[$j--];
        }
        $arr[$j + 1] = $tmp;
    }
    return $arr;
}

// 方式二(从小到大排)
function insertSort($arr)
{
    $len = count($arr);
    for ($i = 1, $i < $len; $i++;) {
        $tmp = $arr[$i];
        //内层循环控制，比较并插入
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($tmp < $arr[$j]) {
                //发现插入的元素要大，交换位置，将后边的元素与前面的元素互换
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    return $arr;
}

$arr = [2, 3, 4, 1, 5, 6, 7];
var_dump(quiclySort($arr));;