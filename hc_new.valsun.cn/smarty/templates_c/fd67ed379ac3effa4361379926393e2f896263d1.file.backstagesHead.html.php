<?php /* Smarty version Smarty-3.1.12, created on 2014-09-02 16:40:05
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\backstagesHead.html" */ ?>
<?php /*%%SmartyHeaderCode:27119540582658d53c8-73033159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd67ed379ac3effa4361379926393e2f896263d1' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\backstagesHead.html',
      1 => 1408416978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27119540582658d53c8-73033159',
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
  'unifunc' => 'content_54058265945664_35157949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54058265945664_35157949')) {function content_54058265945664_35157949($_smarty_tpl) {?>
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