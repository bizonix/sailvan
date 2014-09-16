<?php /* Smarty version Smarty-3.1.12, created on 2014-08-25 08:46:59
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\backstagesAuditHead.html" */ ?>
<?php /*%%SmartyHeaderCode:2669753fa8783361fa1-39127318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a77773b220ff5abd6a47182ba46fb4c58e73b4b' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\backstagesAuditHead.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2669753fa8783361fa1-39127318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'act' => 0,
    'g_dpId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fa8783380c02_16774798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa8783380c02_16774798')) {function content_53fa8783380c02_16774798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('backstagesMenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content-mid-tab">
    <ul>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['act']->value=='backstageBase'){?>class="tab-select"<?php }?> href="index.php?mod=develop&act=backstageBase&dpId=<?php echo $_smarty_tpl->tpl_vars['g_dpId']->value;?>
">基本信息</a>
        </li>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['act']->value=='backstageSenior'){?>class="tab-select"<?php }?> href="index.php?mod=develop&act=backstageSenior&dpId=<?php echo $_smarty_tpl->tpl_vars['g_dpId']->value;?>
">高级信息</a>
        </li>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['act']->value=='shopList'){?>class="tab-select"<?php }?> href="index.php?mod=develop&act=shopList&dpId=<?php echo $_smarty_tpl->tpl_vars['g_dpId']->value;?>
">店铺列表</a>
        </li>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['act']->value=='authList'){?>class="tab-select"<?php }?> href="index.php?mod=develop&act=authList&dpId=<?php echo $_smarty_tpl->tpl_vars['g_dpId']->value;?>
">授权列表</a>
        </li>
    </ul>
</div><?php }} ?>