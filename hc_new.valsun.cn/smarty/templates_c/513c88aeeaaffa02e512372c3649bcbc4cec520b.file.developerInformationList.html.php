<?php /* Smarty version Smarty-3.1.12, created on 2014-09-02 16:40:20
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\developerInformationList.html" */ ?>
<?php /*%%SmartyHeaderCode:2770554058274e61f85-26740651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '513c88aeeaaffa02e512372c3649bcbc4cec520b' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\developerInformationList.html',
      1 => 1408526538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2770554058274e61f85-26740651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
    'g_type' => 0,
    'g_companyAndPhone' => 0,
    'g_status' => 0,
    'g_tokenStatus' => 0,
    'list' => 0,
    'val' => 0,
    'accountStatus' => 0,
    'show_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5405827501a5a1_45089959',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5405827501a5a1_45089959')) {function content_5405827501a5a1_45089959($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\code2\\hc_new\\hc_new.valsun.cn\\lib\\template\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分销商列表</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<script src="../js/form/Validform_v1.0.js"></script>
<script src="../js/developerInformationList.js"></script>
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
                        <div class="content-mid-title">分销商列表</div>
                        <form action="/index.php" method="get" >
                        <input type="hidden" name="mod" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
">
                        <input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
                        <div>
                            <span>
                                <select name='type' >
                                    <option value=''>选择类型</option>
                                    <option value='1' <?php if ($_smarty_tpl->tpl_vars['g_type']->value=='1'){?>selected<?php }?>>个人</option>
                                    <option value='2' <?php if ($_smarty_tpl->tpl_vars['g_type']->value=='2'){?>selected<?php }?>>公司</option>
                                </select>
                                <input type="text" name="companyAndPhone" value="<?php echo $_smarty_tpl->tpl_vars['g_companyAndPhone']->value;?>
" placeholder="公司名称/手机" />
                            </span>
                            <span>状态：
                                <select name="status">
                                    <option value=''>选择状态</option>
                                    <option value='0' <?php if ($_smarty_tpl->tpl_vars['g_status']->value=='0'){?>selected<?php }?>>已认证</option>
                                    <option value='6' <?php if ($_smarty_tpl->tpl_vars['g_status']->value=='6'){?>selected<?php }?>>未认证</option>
                                    <option value='5' <?php if ($_smarty_tpl->tpl_vars['g_status']->value=='5'){?>selected<?php }?>>没激活</option>
                                    <option value='4' <?php if ($_smarty_tpl->tpl_vars['g_status']->value=='4'){?>selected<?php }?>>停用该账户</option>
                                </select>
                            </span>
                            <span>
                                token状态：
                                <select name="tokenStatus" >
                                    <option value=''>全部</option>
                                    <option value='1' <?php if ($_smarty_tpl->tpl_vars['g_tokenStatus']->value=='1'){?>selected<?php }?>>有效</option>
                                    <option value='2' <?php if ($_smarty_tpl->tpl_vars['g_tokenStatus']->value=='2'){?>selected<?php }?>>过期</option>
                                </select>
                            </span>
                            <span>
                                <input type="submit" name="submit" value="搜索">
                            </span>
                            
                        </div>
                        </form>
                        <table width="100%" cellpadding="0"
                            cellspacing="0">
                            <thead>
                                <td width="5%">编号</td>
                                <td width="5%">类型</td>
                                <td width="25%">公司/个人名称</td>
                                <td width="20%">登录邮箱</td>
                                <td width="10%">对接人</td>
                                <td width="10%">对接人手机</td>
                                <td width="10%">注册时间</td>
                                <td width="10%">状态</td>
                                <td width="5%">操作</td>
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
                                    <?php if ($_smarty_tpl->tpl_vars['val']->value['type']=='1'){?>
                                    <td>个人</td>
                                    <?php }else{ ?>
                                    <td>公司</td>
                                    <?php }?>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['company']);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['user_name']);?>
</td>
                                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['phone']);?>
</td>
                                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['create_time'],'%Y-%m-%d');?>

                                    </td>
                                    <td><font color="red"><?php echo $_smarty_tpl->tpl_vars['accountStatus']->value[$_smarty_tpl->tpl_vars['val']->value['status']];?>
</font>
                                        
                                    </td>
                                    <td>
                                        <select name="operation">
                                            <option value="">请选择</option>
                                            <option value="1">编辑</option>
                                            <option value="2">注销</option>
                                            <option value="3">认证</option>
                                        </select>
                                        <input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['status'];?>
" >
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9" align="center">
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