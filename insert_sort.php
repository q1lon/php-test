<?php
// 插入排序
// 在要排序的一组数中，假设前面的数已经是排好顺序的，现在要把第 n 个数插到前面的有序数中，使得这 n 个数也是排好顺序的。如此反复循环，直到全部排好顺序。
// 方式一(从大到小排)
function insertSort($arr)
{
    $count = count($arr);
    for ($i = 1; $i < $count; $i++) {
        $tmp = $arr[$i];//3 4
        $j = $i - 1; // 0 1
        while ($j >= 0 && $tmp > $arr[$j]) {
            $arr[$j + 1] = $arr[$j--];
        }
        $arr[$j + 1] = $tmp;
    }
    return $arr;
 }

// 方式二(从小到大排)
function insertSort1($arr)
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
//$arr = [3, 2, 4, 1, 5, 6, 7]; //$arr = [3, 4, 2, 1, 5, 6, 7]; //$arr = [4, 3, 2, 1, 5, 6, 7];


var_dump(insertSort($arr));;