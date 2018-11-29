<?php
/**
 * Created by PhpStorm.
 * User: zhangliwen
 * Date: 2018/11/29
 * Time: 11:11 AM
 */
$client = new swoole_client(SWOOLE_SOCK_TCP);

// 连接
if(!$client->connect('127.0.0.1',9501,15)) {
    die("send failed");
}

//发送
if(!$client->send("zhangliwen")) {
    die('send failed');
}
// 从服务器接受数据
$data = $client->recv();
if(!$data){
    die('recv failed');
}
echo $data;
// 关闭连接
$client->close();

