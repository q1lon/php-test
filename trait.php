<?php

//在trait继承中，优先顺序依次是：来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
class A
{
    public function sayHello()
    {
        echo "A";
    }
}

trait B
{
    public function sayHello()
    {
//        parent::sayHello();
        echo "B";
    }
}

class C extends A
{
    use B;
}

$c = new C();
$c->sayHello();