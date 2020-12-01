<?php

// 接口
interface Shop
{
    public function buy($gid);

    public function sell($gid);

    public function view($gid);
}

// 必须实现接口中所有的方法
class BaseShop implements Shop
{
    public function buy($gid)
    {
        echo('你购买了ID为 :' . $gid . '的商品');
    }

    public function sell($gid)
    {
        echo('你卖了ID为 :' . $gid . '的商品');
    }

    public function view($gid)
    {
        echo('你查看了ID为 :' . $gid . '的商品');
    }
}
$b=new BaseShop();
$b->buy(11);