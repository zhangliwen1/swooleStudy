<?php
/**
 * Created by PhpStorm.
 * User: zhangliwen
 * Date: 2018/11/29
 * Time: 11:34 AM
 */
// 撸 一个 异步 tcp客户端 异步 非阻塞,创建socket数据格式
// 异步，其实用户态与内核态io的交互方式，阻塞非阻塞，是当前线程在io没有完成时候，当前线程属于等待状态
$client =new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);
//注册成功回调
$client->on('connect',function($cli) {
    $cli->send('张丽文\n');
});

//接受数据
$client->on('receive',function($cli,$data) {
    echo "Received:".$data;
});

//注册失败回调
$client->on('error',function($cli) {
    echo 'connect failed';
});

//注册连接关闭回调
$client->on("close", function($cli){
    echo "Connection close\n";
});

$client->connect('127.0.0.1',9501,1);