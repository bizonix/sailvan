<?php /* Smarty version Smarty-3.1.12, created on 2014-08-25 08:46:26
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\header.html" */ ?>
<?php /*%%SmartyHeaderCode:470453fa876263f703-26423272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8b160956759e29a183033b2af7d8d5138e8c5d1' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\header.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '470453fa876263f703-26423272',
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
  'unifunc' => 'content_53fa876265c793_59077908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa876265c793_59077908')) {function content_53fa876265c793_59077908($_smarty_tpl) {?>
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