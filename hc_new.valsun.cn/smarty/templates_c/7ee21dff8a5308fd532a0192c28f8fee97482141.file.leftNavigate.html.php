<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 12:44:31
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\leftNavigate.html" */ ?>
<?php /*%%SmartyHeaderCode:303155403f9afb99514-50323983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ee21dff8a5308fd532a0192c28f8fee97482141' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\leftNavigate.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303155403f9afb99514-50323983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5403f9afc06db2_95856551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403f9afc06db2_95856551')) {function content_5403f9afc06db2_95856551($_smarty_tpl) {?><div class="content-mid-left">
    <div class="sidebar">
        <ul>
            
            <li class="sidebar-first <?php if (($_smarty_tpl->tpl_vars['mod']->value=='distributorBasicInformation')||($_smarty_tpl->tpl_vars['mod']->value=='sucAuthentication')){?> sidebar-first-select <?php }?> ">
                <a class="auth" href="#">认证分销商</a>
            </li>
            <li class="sidebar-second">
                <a <?php if ((($_smarty_tpl->tpl_vars['mod']->value=='distributorBasicInformation')||($_smarty_tpl->tpl_vars['mod']->value=='sucAuthentication'))&&($_smarty_tpl->tpl_vars['act']->value=='index')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=sucAuthentication&act=index">基本信息</a><br />
                <a <?php if (($_smarty_tpl->tpl_vars['mod']->value=='distributorBasicInformation')&&($_smarty_tpl->tpl_vars['act']->value=='addShop')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=distributorBasicInformation&act=addShop">添加店铺</a><br/>
                <a <?php if (($_smarty_tpl->tpl_vars['mod']->value=='distributorBasicInformation')&&($_smarty_tpl->tpl_vars['act']->value=='shopInfo')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=distributorBasicInformation&act=shopInfo">店铺资料</a>
            </li>
            <li class="sidebar-first <?php if (($_smarty_tpl->tpl_vars['mod']->value=='myEmpower')){?> sidebar-first-select <?php }?> ">
                <a class="accr" href="#">我的授权</a>
            </li>
            <li class="sidebar-second">
                <a <?php if ($_smarty_tpl->tpl_vars['mod']->value=='myEmpower'){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=myEmpower&act=index">我的授权</a><br />
            </li>
            <li class="sidebar-first <?php if (($_smarty_tpl->tpl_vars['mod']->value=='api'&&$_smarty_tpl->tpl_vars['act']->value=='myApi')){?> sidebar-first-select <?php }?> ">
                <a class="myapi" href="#">我的API</a>
            </li>
            <li class="sidebar-second">
                <a <?php if (($_smarty_tpl->tpl_vars['mod']->value=='api')&&($_smarty_tpl->tpl_vars['act']->value=='myApi')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=api&act=myApi">我的API</a><br />
            </li>
            <li class="sidebar-first <?php if (($_smarty_tpl->tpl_vars['mod']->value=='api'&&$_smarty_tpl->tpl_vars['act']->value=='applyApi')){?> sidebar-first-select <?php }?> ">
                <a class="apply" href="#">申请API</a>
            </li>
            <li class="sidebar-second">
                <a <?php if (($_smarty_tpl->tpl_vars['mod']->value=='api')&&($_smarty_tpl->tpl_vars['act']->value=='applyApi')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=api&act=applyApi">申请API</a><br />
            </li>
            <li class="sidebar-first <?php if (($_smarty_tpl->tpl_vars['mod']->value=='basicInfor')){?> sidebar-first-select <?php }?> ">
                <a class="password" href="#">修改密码</a>
            </li>
            <li class="sidebar-second">
                <a <?php if (($_smarty_tpl->tpl_vars['mod']->value=='basicInfor')&&($_smarty_tpl->tpl_vars['act']->value=='changePwd')){?>class="sidebar-second-select"<?php }?> href="../index.php?mod=basicInfor&act=changePwd">修改密码</a><br />
            </li>
        </ul>
    </div>
</div><?php }} ?>