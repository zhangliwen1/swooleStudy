<?php
/**
 * Created by PhpStorm.
 * User: zhangliwen
 * Date: 2018/11/29
 * Time: 9:47 AM
 */

$server = new swoole_server("127.0.0.1",9501);

echo '老弟 要点大腰子？';
// 监听
$server->on('connect',function ($serv,$fd) {
    echo "Client is starting";
});


echo "老弟，大腰子来了";

//监听接受数据
$server->on("receive", function($serv,$fd,$form_id,$data){
    echo '来自客户端的数据'.$data;
//    sleep(10);
   $serv->send($fd,"server: hello ".$data);
});

//监听关闭事件

$server->on("close",function($serv,$fd) {
    echo "Client: Close .\n";
});

echo "服务启动";

// 启动服务
$server->start();
