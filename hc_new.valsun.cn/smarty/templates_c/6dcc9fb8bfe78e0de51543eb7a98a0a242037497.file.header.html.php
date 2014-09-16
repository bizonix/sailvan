<?php /* Smarty version Smarty-3.1.12, created on 2014-08-29 18:06:25
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\header.html" */ ?>
<?php /*%%SmartyHeaderCode:29469540050a1981614-15058532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dcc9fb8bfe78e0de51543eb7a98a0a242037497' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\header.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29469540050a1981614-15058532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 1,
    'loginStatus' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_540050a19a6088_80816044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540050a19a6088_80816044')) {function content_540050a19a6088_80816044($_smarty_tpl) {?>
<div class="header">
    <div class="top-bar">
        <div class="header-nav">
            <ul>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value=='index'){?>selected<?php }?>">
                    <a href="../index.php?mod=index&act=index">首页</a>
                </li>
                <li class="tab">
                    <a target="_blank" href="http://developer.valsun.cn/index.php?mod=developerDoc&act=index">开发文档</a>
                </li>
                <li class="tab">
                    <a href="#">官方论坛</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['loginStatus']->value=='in'){?>
                <li class="tab selected">
                    <a href="../index.php?mod=distributorBasicInformation&act=index">个人中心</a>
                </li>
                <li class="tab">
                    <a href="../index.php?mod=login&act=logout">退出</a>
                </li>
                <?php }else{ ?>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value=='login'){?>selected<?php }?>">
                    <a href="../index.php?mod=login&act=login">登录</a>
                </li>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value=='register'){?>selected<?php }?>">
                    <a href="../index.php?mod=register&act=register">注册</a>
                </li>
                <?php }?>
                
            </ul>
            <div class="barTop"></div>
            <div style="clear:both;"></div>
        </div>
        <div class="logo">
            <img src="../../images/logo.gif" />
        </div>
    </div>
</div>
<?php }} ?>