 <?php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// 现在 $arr 是 array(2, 4, 6, 8)

// 未使用 unset($value) 时，$value 仍然引用到最后一项 $arr[3]
// var_dump($arr);die;
foreach ($arr as $key => $value1) {
    // $arr[3] 会被 $arr 的每一项值更新掉…
    echo "{$key} => {$value1} ";
    print_r($arr);
}