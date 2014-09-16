<?php
error_reporting(-1);
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
require_once "/data/web/hc.valsun.cn/framework.php";
Core::getInstance();
//脚本参数检验
$data   =   array(
        "picJson"   => trim($argv[1]),
        "time"      => time(),
        "account"   => trim($argv[2]),
);
$exchange = 'valsun_picture';
$queue = 'valsun_picture_queue';

include_once dirname(__DIR__)."/common.php";
//实例化消息队列
$rabbitMQ = E('hcMakePicDir');
$rabbitMQ->connection('hcMakePicDir');
$orderids = $rabbitMQ->queueSubscribeLimit($exchange, $queue, 100);
$rabbitMQ->basicPublish($exchange, $data);
?>