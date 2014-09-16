<?php /* Smarty version Smarty-3.1.12, created on 2014-08-25 08:46:30
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\backstagesHead.html" */ ?>
<?php /*%%SmartyHeaderCode:281853fa87666e5c46-06957622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e739b77f3835ef256aa7944c3b9888f08710ee25' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\backstagesHead.html',
      1 => 1408416978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281853fa87666e5c46-06957622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 1,
    'loginStatus' => 1,
    'loginName' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fa87667021c4_05349752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa87667021c4_05349752')) {function content_53fa87667021c4_05349752($_smarty_tpl) {?>
<div class="header">
    <div class="top-bar">
        <div class="header-nav">
            <ul>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value=='backstagesIndex'){?>selected<?php }?>">
                    <a href="../index.php?mod=backstagesIndex&act=index">首页</a>
                </li>
                <li class="tab">
                    <a href="#">开发文档</a>
                </li>
                <li class="tab">
                    <a href="#">官方论坛</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['loginStatus']->value=='in'){?>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value!='backstagesIndex'&&$_smarty_tpl->tpl_vars['mod']->value!='backstagesLogin'){?>selected<?php }?>">
                    <a href="../index.php?mod=developerInformationList&act=index"><?php echo $_smarty_tpl->tpl_vars['loginName']->value;?>
</a>
                </li>
                <li class="tab">
                    <a href="../index.php?mod=backstagesLogin&act=logout">退出</a>
                </li>
                <?php }else{ ?>
                <li class="tab <?php if ($_smarty_tpl->tpl_vars['mod']->value=='backstagesLogin'){?>selected<?php }?>">
                    <a href="../index.php?mod=backstagesLogin&act=index">登录</a>
                </li>
                <?php }?>
            </ul>
            <div class="barTop"></div>
        </div>
        <div class="logo">
            <img src="../images/logo.gif" />
        </div>
    </div>
</div>
<?php }} ?>