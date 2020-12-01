<?php

//接口 接口中的方法 需要全部都实现
interface Shop
{
    public function buy($gid);

    public function sell($gid);

    public function view($gid);
}

// 抽象类 子类需要实现全部的抽象方法
abstract class BaseShop implements Shop
{
    // 抽象方法1
    abstract function goods_list();

    // 抽象方法2
    abstract function shop_view();

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

// 子类想要实例化 必须 实现所有父类中的抽象方法
class BallShop extends BaseShop
{
    var $item_id = null;

    public function __construct()
    {
        $this->item_id = 2314;
    }

    public function goods_list()
    {
        // TODO: Implement goods_list() method.
        echo '获取商品的列表';
    }

    public function shop_view()
    {
        // TODO: Implement shop_view() method.
        echo '获取商店的详情';
    }

    public function open()
    {
        $this->sell($this->item_id);
    }
}

// 实例化
$n = new BallShop();
// 调用子类中的实现了的方法
$n->goods_list();
// 调用自身的方法 会直接使用抽象类中的已经实现了的方法
$n->open();

// 如果子类不实例化 需要加abstract关键字在class前面 可以不去实现父类中的抽象方法
abstract class ShoeShop extends BaseShop
{

}

// 如果子类想要实例化 还是需要实现父类中的 抽象方法
class test extends ShoeShop
{

    function goods_list()
    {
        // TODO: Implement goods_list() method.
        echo '测试子类中的抽象方法1';
    }

    function shop_view()
    {
        // TODO: Implement shop_view() method.
        echo '测试子类中的抽象方法2';
    }
}

//实例化
$t = new test();
// 使用实现了的抽象方法
$t->shop_view();
// 使用抽象类中的方法
$t->sell(111);
