<?php

set_time_limit(0);
require_once './DelayQueue.php';
$dq = new DelayQueue('close_order', [
    'host' => '127.0.0.1',
    'port' => 6379,
    'auth' => '',
    'timeout' => 60,
]);

while (true) {
    $dq->run();
    usleep(100000);
}