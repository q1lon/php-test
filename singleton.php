<?php
/*
* 单例数据库连接
*/
class Db {
    private static $_instance; //static可以保存值不丢失
    private static $_dbConnect;
    private $_dbConfig = array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => '1234qwer',
        'database' => 'testDB',
    );//保存数据库的配置信息

//使用private防止用户new
    private function __construct(){

    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

//重写clone防止用户进行clone

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

//由类的自身来进行实例化

    public function __clone(){
//当用户clone操作时产生一个错误信息
        trigger_error("Can't clone object",E_USER_ERROR);
    }

    public function connect(){
        self::$_dbConnect = @mysql_connect($this->_dbConfig['host'],
            $this->_dbConfig['user'],$this->_dbConfig['password']);

        if(!self::$_dbConnect){
            throw new Exception("mysql connect error".mysql_error());
//die("mysql connect error".mysql_error());
        }
        mysql_query("SET NAMES UTF8");
        mysql_select_db($this->_dbConfig['database'],self::$_dbConnect);
        return self::$_dbConnect;
    }
}

$a = Db::getInstance();
try{
    $a->connect();
}catch(Exception $e){
    echo "sorry,error was happend.".$e->getMessage();
}
