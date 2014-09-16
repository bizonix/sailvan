<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:08:33
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\myEmpower.html" */ ?>
<?php /*%%SmartyHeaderCode:138355403f9b31a4c33-11714890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '339cf918e5dde4bb7263cad014be2898ba01c9c0' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\myEmpower.html',
      1 => 1409736592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138355403f9b31a4c33-11714890',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5403f9b3214da6_07405093',
  'variables' => 
  array (
    'api_open' => 0,
    'authorizationStatus' => 0,
    'authorizationAct' => 0,
    'pc_data_open' => 0,
    'pic_sys_open' => 0,
    'ebay_sys_open' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403f9b3214da6_07405093')) {function content_5403f9b3214da6_07405093($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的授权</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-migrate-1.1.1.js"></script>
<link rel="stylesheet" href="../../js/superbox/jquery.superbox.css" type="text/css" media="all" />
<script type="text/javascript" src="../../js/superbox/jquery.superbox-min.js"></script>
<script type="text/javascript" src="../../js/superbox/jquery.superbox.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/myEmpower.js"></script>
</head>
<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <?php echo $_smarty_tpl->getSubTemplate ('distributionSecondHeader.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('leftNavigate.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right content-mid-unhover">
                        <div class="content-mid-title">
                            	我的授权
                        </div>
                        <div>
                            <div>
                                <img class="interface" src="../images/interface.gif" />
                                <div class="content-mid-describe">
                                    <p class="describe-title">API接口开放</p>
                                    <p class="describe-main">订单、仓储、物流开放接口接入，全程代发货</p>
                                    <p class="describe-main">申请条件：1.已认证分销商</p>
                                </div>
                                <div class="describe-bt">
                                    <p><?php echo $_smarty_tpl->tpl_vars['authorizationStatus']->value[$_smarty_tpl->tpl_vars['api_open']->value];?>
</p>
                                    <a class="a-color" href="#" name="apiShowDialog"><?php echo $_smarty_tpl->tpl_vars['authorizationAct']->value[$_smarty_tpl->tpl_vars['api_open']->value];?>
</a>
                                </div>
                                <div style="clear:both;">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <img class="interface" src="../images/server.gif" />
                                <div class="content-mid-describe">
                                    <p class="describe-title">产品数据包开放服务</p>
                                    <p class="describe-main">专业产品培训资料，类目，SKU信息数据包</p>
                                    <p class="describe-main">申请条件：1.已认证分销商</p>
                                </div>
                                <div class="describe-bt">
                                    <p><?php echo $_smarty_tpl->tpl_vars['authorizationStatus']->value[$_smarty_tpl->tpl_vars['pc_data_open']->value];?>
</p>
                                    <a class="a-color" href="#" name="pcDataShowDialog"><?php echo $_smarty_tpl->tpl_vars['authorizationAct']->value[$_smarty_tpl->tpl_vars['pc_data_open']->value];?>
</a>
                                </div>
                                <div style="clear:both;">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <img class="interface" src="../images/picture.gif" />
                                <div class="content-mid-describe">
                                    <p class="describe-title">图片系统开放</p>
                                    <p class="describe-main">赛维图片系统批量下载，支持自动打水印，专业拍摄</p>
                                    <p class="describe-main">申请条件：1.已认证分销商</p>
                                </div>
                                <div class="describe-bt">
                                    <p><?php echo $_smarty_tpl->tpl_vars['authorizationStatus']->value[$_smarty_tpl->tpl_vars['pic_sys_open']->value];?>
</p>
                                    <a class="a-color" href="#" name="picSysShowDialog"><?php echo $_smarty_tpl->tpl_vars['authorizationAct']->value[$_smarty_tpl->tpl_vars['pic_sys_open']->value];?>
</a>
                                </div>
                                <div style="clear:both;">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <img class="interface" src="../images/paopen.gif" />
                                <div class="content-mid-describe">
                                    <p class="describe-title">ebay刊登系统开发</p>
                                    <p class="describe-main">免范本制作，一键上传，批量发布商品到ebay</p>
                                    <p class="describe-main">申请条件：1.已认证分销商</p>
                                    <p class="describe-main-secon">2.至少已添加一个所有信息完整的ebay店铺</p>
                                </div>
                                <div class="describe-bt">
                                    <p><?php echo $_smarty_tpl->tpl_vars['authorizationStatus']->value[$_smarty_tpl->tpl_vars['ebay_sys_open']->value];?>
</p>
                                    <a class="a-color" href="#" name="ebaySysShowDialog"><?php echo $_smarty_tpl->tpl_vars['authorizationAct']->value[$_smarty_tpl->tpl_vars['ebay_sys_open']->value];?>
</a>
                                </div>
                                <div style="clear:both;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('myEmpowerBox.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('myEmpowerBox1.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('myEmpowerBox2.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ('myEmpowerBox3.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>
<?php }} ?>