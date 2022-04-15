<?php
// 依赖关系应该是接口/约定或抽象类，而不是具体的实现
// 这样基于这个接口实现的适配器代码就都可以注入了
namespace Database;

class Database
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}

interface AdapterInterface
{
}

class MysqlAdapter implements AdapterInterface
{
}

$mysql = new MysqlAdapter();
$db = new Database($mysql);