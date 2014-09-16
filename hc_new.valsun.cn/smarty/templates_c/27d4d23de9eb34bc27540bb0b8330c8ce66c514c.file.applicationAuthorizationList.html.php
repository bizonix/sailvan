<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:33:39
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\applicationAuthorizationList.html" */ ?>
<?php /*%%SmartyHeaderCode:1497454097563923170-45818273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27d4d23de9eb34bc27540bb0b8330c8ce66c514c' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\applicationAuthorizationList.html',
      1 => 1408526878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1497454097563923170-45818273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
    'authorizationList' => 0,
    'g_applyType' => 0,
    'val' => 0,
    'g_company' => 0,
    'authorizationstatus' => 0,
    'g_status' => 0,
    'k' => 0,
    'list' => 0,
    'show_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_540975639d18d5_20072824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540975639d18d5_20072824')) {function content_540975639d18d5_20072824($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\code2\\hc_new\\hc_new.valsun.cn\\lib\\template\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>授权申请列表</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/applicationAuthorizationList.js"></script>
</head>
<body class="home-body-color Arial-font">
    <div class="container">
        <div class="content">
            <?php echo $_smarty_tpl->getSubTemplate ('backstagesHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <div class="content-top-appli">
                    <img src="../images/appli_banner.gif">
                </div>
                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('backstagesMenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right content-mid-table content-mid-unhover content-mid-total">
                        <div class="content-mid-title"> 授权申请列表</div>
                        <div>
                            <form action="/index.php" method="get" >
                            <input type="hidden" name="mod" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
">
                            <input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
                                <span>
                                    <select name='applyType'>
                                        <option value=''>全部</option>
                                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['authorizationList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['g_applyType']->value==$_smarty_tpl->tpl_vars['val']->value['id']){?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['val']->value['cn_name'];?>
</option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['cn_name'];?>
</option>
                                        <?php }?>
                                        <?php } ?>
                                    </select>
                                </span>
                                <span>
                                    <input type="text" placeholder="公司名称" name="company" value="<?php echo $_smarty_tpl->tpl_vars['g_company']->value;?>
" />
                                </span>
                                <span>
                                    <select name="status">
                                        <option value=''>全部</option>
                                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['authorizationstatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['g_status']->value==$_smarty_tpl->tpl_vars['k']->value){?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
                                        <?php }?>
                                        <?php } ?>
                                    </select>
                                </span>
                                <span>
                                    <input type="submit" value="搜索" name="submit">
                                </span>
                            </form>
                        </div>
                        <table width="100%" cellpadding="0"
                            cellspacing="0">
                            <thead>
                                <td width="5%">编号</td>
                                <td width="25%">公司名称</td>
                                <td width="15%">申请服务</td>
                                <td width="20%">登录账号</td>
                                <td width="15%">申请时间</td>
                                <td width="10%">状态</td>
                                <td width="10%">操作</td>
                            </thead>
                            <tbody>
                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['company']);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['cn_name']);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['email']);?>
</td>
                                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['apply_time'],'%Y-%m-%d');?>
</td>
                                    <td><font color="lightcoral"><?php echo $_smarty_tpl->tpl_vars['authorizationstatus']->value[$_smarty_tpl->tpl_vars['val']->value['status']];?>
</font>
                                    </td>
                                    <td><a class="a-color" href="index.php?mod=develop&act=authList&dpId=<?php echo $_smarty_tpl->tpl_vars['val']->value['dpId'];?>
">查看</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align="center">
                                        <div class="pagination">
                                            <?php echo $_smarty_tpl->tpl_vars['show_page']->value;?>

                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <div class="home-main">
            </div>
            <div class="login-bt">
                <div class="login-bt-main">
                    <div>
                        <a href="#">关于我们</a><span> | </span>
                        <a href="#">联系我们</a><span> | </span>
                        <a href="#">人才招聘</a><span> | </span>
                        <a href="#">商家入驻</a><span> | </span>
                        <a href="#">广告服务</a><span> | </span>
                        <a href="#">友情链接</a><span> | </span>
                        <a href="#">销售联盟</a><span> | </span>
                        <a href="#">华成社区</a>
                    </div>
                    <p>
                        Copyright©2014 华城云商 版权所有
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php }} ?>