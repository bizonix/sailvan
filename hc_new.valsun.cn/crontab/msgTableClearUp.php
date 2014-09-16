<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
//require_once "/data/web/hc.valsun.cn/framework.php";
require_once "E:/code/fenxiao/hc_new.valsun.cn/framework.php";
Core::getInstance();
global $dbConn;

//model测试
//$aa=    M("FromOpenConfig");
//var_dump($aa->getDataCount());


//act测试
//$aa=    A("FromOpenConfig");
//var_dump($aa->act_getDataList());
//var_dump($aa->act_getDataCount());
////var_dump($aa->act_getDataWhere());
//echo "\r\n\r\n\r\n\r\n\r\n\r\n****************************************************";
//var_dump($aa->act_addData(""));
//var_dump($aa->act_updateData());
//var_dump($aa->act_delData());


//插入错误信息
$msg    =   array(

    "",
    "",
    "",
    "",
    "",

);
foreach($msg    as $v){
    $arr                    =  array();
    $arr["errormsg"]        =  $v;
    $arr["type"]            =  "common";
    $arr["status"]          =  "2";
    $arr["creatorName"]     =  "王长先";
    $arr["createTime"]      =  time();
    $arr["lastmodifyName"]  =  "王长先";
    $arr["lastmodefyTime"]  =  time();
}


?>