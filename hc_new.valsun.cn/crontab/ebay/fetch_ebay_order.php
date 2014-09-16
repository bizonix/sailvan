<?php
	//脚本参数检验
	if($argc<2){
		exit("Usage: /usr/bin/php	$argv[0] eBayAccount \n");
	}
	$nowtime 	= time();
	$account	= trim($argv[1]);
	include_once dirname(__DIR__)."/common.php";
	$accounts = M('Account')->getAccountNameByPlatformId(1);
	if (!in_array($account, $accounts)){
		exit("{$argv[1]} is wrong!\n");
	}
	//实例化消息队列
	$rabbitMQ = E('RabbitMQ');
	$rabbitMQ->connection('fetchorder');
	$exchange = "ORDER_spiderOrderId_{$account}";
	$queue = 'queue_orderid';
	$orderids = $rabbitMQ->queueSubscribeLimit($exchange, $queue, 100);
	//$orderids = array('380933641186-498647809025', '141311689891-985443612004'); //for test
	/*
	注册函数回调模式
	$rabbitMQ->basicReceive($exchange, $queue, 'test_function');
	exit;
	function test_function($msg){
		echo "\n--------\n";
		echo $msg->body;
		echo "\n--------\n";
			
		$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
		
		if ($msg->body === 'quit') {
			$msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
		}
	}*/
	
	echo "\n<<<<=====[".date('Y-m-d H:i:s', $nowtime)."]系统【开始】同步账号【 $account 】订单 =====>>>>\n";
	if (count($orderids)>0){
		echo "\n\t------- 同步订单为".implode(',', $orderids)." -------\n";
		$ebaybutt = A('EbayButt');
		$ebaybutt->setToken($account);
		$spiderlists = $ebaybutt->spiderOrderLists($orderids);
		var_dump($spiderlists);
	}else {
		echo "\n\t------- 同步订单为空，消息队列暂无消息  -------\n";
	}
	echo "\n\t------- [耗时:".ceil((time()-$nowtime)/60)."分钟] -------\n";
	echo "\n<<<<=====[".date('Y-m-d H:i:s')."]系统【结束】同步账号【 $account 】订单=====>>>>\n";
?>