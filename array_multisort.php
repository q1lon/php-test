<?php
//多维数据排序
$data[] = array('customer_name' => '小李', 'money' => 12, 'distance' => 2, 'address' => '长安街C坊');
$data[] = array('customer_name' => '王晓', 'money' => 30, 'distance' => 10, 'address' => '北大街30号');
$data[] = array('customer_name' => '赵小雅', 'money' => 89, 'distance' => 6, 'address' => '解放路恒基大厦A座');
$data[] = array('customer_name' => '小月', 'money' => 150, 'distance' => 5, 'address' => '天桥十字东400米');
$data[] = array('customer_name' => '李亮亮', 'money' => 45, 'distance' => 26, 'address' => '天山西路198弄');
$data[] = array('customer_name' => '董娟', 'money' => 67, 'distance' => 17, 'address' => '新大南路2号');

// array_multisort 方法一 单循环方式 处理多维数据排序
//foreach ($data as $key => $row) {
//    $distance[$key] = $row['distance'];
//    $money[$key] = $row['money'];
//}
//array_multisort($money, SORT_DESC, $data);
//
//print_r($data);


// 方法二 双循环 使用asort 排序value 在使用排序后的key 重新插入数组
function arraySort($array,$keys,$sort='asc') {
    $newArr = $valArr = array();
    foreach ($array as $key=>$value) {
        $valArr[$key] = $value[$keys];
    }
    ($sort == 'asc') ?  asort($valArr) : arsort($valArr);
    reset($valArr);

    foreach($valArr as $key=>$value) {
        $newArr[$key] = $array[$key];
    }
    return $newArr;
}

var_dump(arraySort($data,'money'));