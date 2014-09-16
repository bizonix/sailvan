<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
include_once dirname(__DIR__)."/conf/define.php";
include_once WEB_PATH."framework.php";
Core::getInstance();
$mod	=	isset($_REQUEST['mod']) ? $_REQUEST['mod']: "index";
$act	=	isset($_REQUEST['act']) ? $_REQUEST['act']: "index";
error_reporting(-1);
// if(empty($mod)){
// 	redirect_to(WEB_URL."index.php?mod=index&act=index"); // 跳转到登陆页
// 	exit;
// }
// if(empty($act)){
// 	redirect_to(WEB_URL."index.php?mod=index&act=index");
// 	exit;
// }
// echo WEB_PATH."crontab/php-amqplib/workplace/picSystemToDistributor.php";
// exec("/usr/local/php/bin/php ".WEB_PATH."crontab/php-amqplib/workplace/picSystemToDistributor.php testus100101 testus100101  &> /dev/null &",$a,$c);
// var_dump($a);var_dump($c);
// exit;//初始化memcache类
$memc_obj 	= new Cache(C('CACHEGROUP'));
$modName	= ucfirst($mod."View");
$modClass	= new $modName();
$actName	= "view_".$act;
if(method_exists($modClass, $actName)){
	$ret	=	$modClass->$actName();
}else{
	echo "no this act!!";
}
?>