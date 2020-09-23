<?php

function getRedis()
{
    try {
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
//        echo "Server is running: " . $redis->ping();
        return $redis;
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

}

//加锁
function lock($key, $random)
{
    $redis = getRedis();
    //设置锁的超时时间，避免释放锁失败，del()操作失败，产生死锁。
    $ret = $redis->set($key, $random, ['nx', 'ex' => 3 * 60]);
    return $ret;
}

//解锁
function unLock($key, $random)
{
    $redis = getRedis();
    //这里的随机数作用是，防止更新缓存操作时间过长，超过了锁的有效时间，导致其他请求拿到了锁。
    //但上一个请求更新缓存完毕后，如果不加判断直接删除锁，就会误删其他请求创建的锁。
    if ($redis->get($key) == $random) {
        $redis->del($key);
    }
}

//从缓存中获取文章数据
function getArticleInCache($id)
{
    $redis = getRedis();
    $key = 'article_content_' . $id;
    $ret = $redis->get($key);
    if ($ret === false) {
        //生成锁的key
        $lockKey = $key . '_lock';
        //生成随机数，用于设置锁的值，后面释放锁时会用到
        $random = mt_rand();
        //拿到互斥锁
        if (lock($lockKey, $random)) {
            //这里是伪代码，表示从数据库中获取文章数据
            $value = '11112222233333';
            //更新缓存，过期时间可以根据情况自已调整
            $redis->set($key, $value, 2 * 60);
            //释放锁
            unLock($lockKey, $random);
            return $value;
        } else {
            //等待200毫秒，然后重新获取缓存值，让其他获取到锁的进程取得数据并设置缓存
            usleep(200);
            getArticleInCache($id);
        }
    } else {
        return $ret;
    }
}

//function error_handler($errno, $errstr, $errfile, $errline)
//{
//    if (!(error_reporting() & $errno)) {
//        // This error code is not included in error_reporting\
//        file_put_contents('error_msg', date("Y-m-d H:i:s") . "\t" . "errno:{$errno},errstr:{$errstr}, errfile:{$errfile}, errline:{$errline}" . PHP_EOL, FILE_APPEND);
//        return false;
//    }
//    file_put_contents('error_msg', date("Y-m-d H:i:s") . "\t" . "errno:{$errno},errstr:{$errstr}, errfile:{$errfile}, errline:{$errline}" . PHP_EOL, FILE_APPEND);
//    return true;
//}
//
//set_error_handler("error_handler");
//trigger_error("A custom error has been triggered");

echo getArticleInCache(1);