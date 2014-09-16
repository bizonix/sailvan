<?php /* Smarty version Smarty-3.1.12, created on 2014-08-26 17:22:57
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\backstagesHomePage.html" */ ?>
<?php /*%%SmartyHeaderCode:2733153fc51f172a284-98076135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d1a082455d6988b2a05bd3516f3d95ac897e9e4' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\backstagesHomePage.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2733153fc51f172a284-98076135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fc51f1825a10_17822932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fc51f1825a10_17822932')) {function content_53fc51f1825a10_17822932($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>homePage</title>
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/base.js"></script>
</head>

<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('backstagesHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="banner">
                <div class="banner-main">
                    <div class="banner-text">
                        <p class="valsun-font-size">华成云商</p>
                        <p class="open-font-size">分销平台</p>
                        <a href="../index.php?mod=register&act=register">我要入驻</a>
                    </div>
                    <p class="valsun-font-title">2014</p>
                </div>
            </div>
            <div class="home-main">
            </div>
            <div class="home-bt-main">
                <div class="bt-main-url">
                    <ul>
                        <li class="aboutUs">
                            <a href="#">关于我们</a>
                        </li>
                        <li class="settled">
                            <a href="#">商家入驻</a>
                        </li>
                        <li class="service">
                            <a href="#">特色服务</a>
                        </li>
                        <li class="contact">
                            <a href="#">联系我们</a>
                        </li>
                    </ul>
                </div>
                <div class="bt-footer">
                    <a id="wx" href="#">
                        <img src="../../images/weixin.gif" />
                    </a>
                    <p class="phone">0755-89619666</p>
                    <p>深圳市赛维网络科技有限公司</p>
                </div>
                <div id="wxbig" class="weixinbiger">
                    <img src="../../images/weixinbiger.gif" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php }} ?>