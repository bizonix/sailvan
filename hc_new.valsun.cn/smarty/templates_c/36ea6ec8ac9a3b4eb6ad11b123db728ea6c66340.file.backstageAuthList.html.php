<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:33:42
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\backstageAuthList.html" */ ?>
<?php /*%%SmartyHeaderCode:31711540975669ffd48-44662407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36ea6ec8ac9a3b4eb6ad11b123db728ea6c66340' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\backstageAuthList.html',
      1 => 1408413495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31711540975669ffd48-44662407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'develop' => 0,
    'cates' => 0,
    'flag' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54097566b84606_25250758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54097566b84606_25250758')) {function content_54097566b84606_25250758($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>授权列表</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/form/Validform_v1.0.js"></script>
<script src="../js/datepicker/WdatePicker.js"></script>
<script src="../js/authList.js"></script>
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
                    <?php echo $_smarty_tpl->getSubTemplate ('backstagesAuditHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right content-mid-unhover content-mid-total">
                        <div class="content-mid-title content-mid-totalbg">授权信息</div>
                            <div>
                            <form id="developInfo1">
	                            <input type="hidden" id="email" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
"/>
	                            <input type="hidden" id="manager_message" value='<?php echo $_smarty_tpl->tpl_vars['develop']->value['manager_message'];?>
' />
	                            <input type="hidden" name="dpId" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['id'];?>
"/>
	                            <span class="content-mid-name content-mid-left">开放类目：</span>
	                            <span class="content-mid-rightpos content-mid-righttab">
	                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	                                <label><input <?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
 type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="intention_products[]" <?php if (is_array($_smarty_tpl->tpl_vars['develop']->value['intention_products'])&&in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['develop']->value['intention_products'])){?>checked<?php }?>/><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</label>
	                                <?php } ?>
	                            </span>
	                            <div style="clear:both;">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name">账号：</span>
	                            <input class="text-width-long" readonly type="text" name="erp_account" id="erp_account" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['erp_account'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">开发者等级：</span>
	                            <input class="text-width-short" type="text" name="level" id="level" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['level'];?>
" maxLength="3" />
	                        </div>
	                        <div><span class="content-mid-name">账户余额：</span>
	                            <input class="text-width-short" type="text" name="money" id="money" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['money'];?>
" maxLength="8"  />
	                        </div>
	                        <div><span class="content-mid-name">授信额度：</span>
	                            <input class="text-width-short" type="text" name="credit_line"id="credit_line"  value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['credit_line'];?>
" maxLength="8"  />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">
	                                <input class="login-bt-save" id="saveDevInfo1" type="button" value="保 存"/>
	                            </span>
	                        </div>
                            </form>
                        <div class="content-mid-totalbg">
                            <span class="col1">服务名称：</span>
                            <span class="col3">产品数据包开放</span>
                            <span class="col4"><a class="a-color" id="expandPc" href="javascript:void(0)">-收起</a></span>
                            <span class="col5">
                                
                                <?php if ($_smarty_tpl->tpl_vars['develop']->value['pc_data_open']=='待审核'){?>
                                <label><input type="radio" class="changeStatus" status="3" name="pc_data_open" />通过</label>
                                <label><input type="radio" class="changeStatus" status="4" name="pc_data_open" />不通过</label>
                                <?php }else{ ?>
                                <label><?php echo $_smarty_tpl->tpl_vars['develop']->value['pc_data_open'];?>
</label>
                                <?php }?>
                                
                            </span>
                        </div>
                        <div id="PcDiv">
                            <form id="developInfo2">
                            <input type="hidden" id="email" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
"/>
                            <input type="hidden" id="manager_message" value='<?php echo $_smarty_tpl->tpl_vars['develop']->value['manager_message'];?>
' />
                            <input type="hidden" name="dpId" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['id'];?>
"/>
	                        <div>
	                            <span class="content-mid-name">下载链接：</span>
	                            <input class="text-width-long" type="text" name="ftp_url" maxLength="100" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['ftp_url'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">账号：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['erp_account'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">密码：</span>
	                            <input class="text-width-long" type="text" name="ftp_pwd" maxlength="100"  value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['ftp_pwd'];?>
"  />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">
	                                <input class="login-bt-save" id="saveDevInfo2"  type="button" value="保 存"/>
	                            </span>
	                        </div>
	                        </form>
                        </div>
                        <div class="content-mid-totalbg">
                            <span class="col1">服务名称：</span>
                            <span class="col3">API接口开放</span>
                            <span class="col4"><a class="a-color" id="expandAPI" href="javascript:void(0)">-收起</a></span>
                            <span class="col5">
                                
                                <?php if ($_smarty_tpl->tpl_vars['develop']->value['api_open']=='待审核'){?>
                                <label><input type="radio" class="changeStatus" status="3" name="api_open" />通过</label>
                                <label><input type="radio" class="changeStatus" status="4" name="api_open" />不通过</label>
                                <?php }else{ ?>
                                <label><?php echo $_smarty_tpl->tpl_vars['develop']->value['api_open'];?>
</label>
                                <?php }?>
                                
                            </span>
                        </div>
                        <div id="APIDiv">
                            <form id="developInfo3">
                            <input type="hidden" id="email" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
"/>
                            <input type="hidden" id="manager_message" value='<?php echo $_smarty_tpl->tpl_vars['develop']->value['manager_message'];?>
' />
                            <input type="hidden" name="dpId" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['id'];?>
"/>
	                        <div>
	                            <span class="content-mid-name">token：</span>
	                            <input class="text-width-long" type="text" name="token" id="token" maxlength="100"  value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['token'];?>
" />&nbsp;<a class="a-color" href="javascript:void(0)" id="resetToken">重新生成TOKEN</a>
	                        </div>
	                        <div>
	                            <span class="content-mid-name">过期时间：</span>
	                            <input class="text-width-long" type="text" name="token_expire_time" id="datepicker" value="<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['develop']->value['token_expire_time']);?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">appkeys：</span>
	                            <input class="text-width-long" type="text" name="app_key" maxlength="30" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['app_key'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">
	                                <input class="login-bt-save" id="saveDevInfo3"  type="button" value="保 存"/>
	                            </span>
	                        </div>
	                        </form>
                        </div>
                        <div class="content-mid-totalbg">
                            <span class="col1">服务名称：</span>
                            <span class="col3">图片系统开放</span>
                            <span class="col4"><a class="a-color" id="expandPic" href="javascript:void(0)">-收起</a></span>
                            <span class="col5">
                                
                                <?php if ($_smarty_tpl->tpl_vars['develop']->value['pic_sys_open']=='待审核'){?>
                                <label><input type="radio" class="changeStatus" status="3" name="pic_sys_open" />通过</label>
                                <label><input type="radio" class="changeStatus" status="4" name="pic_sys_open"  />不通过</label>
                                <?php }else{ ?>
                                <label><?php echo $_smarty_tpl->tpl_vars['develop']->value['pic_sys_open'];?>
</label>
                                <?php }?>
                                
                            </span>
                        </div>
                        <div id="PicDiv">
                            <form id="developInfo4">
                            <input type="hidden" id="email" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
"/>
                            <input type="hidden" id="manager_message" value='<?php echo $_smarty_tpl->tpl_vars['develop']->value['manager_message'];?>
' />
                            <input type="hidden" name="dpId" value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['id'];?>
"/>
	                        <div>
	                            <span class="content-mid-name">账号：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">密码：</span>
	                            <input class="text-width-long" type="text" name="login_internal_pwd"  maxlength="100"  value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['login_internal_pwd'];?>
"  />
	                        </div>
                            <div>
                                <span class="content-mid-name">
                                    <input class="login-bt-save" id="saveDevInfo4" type="button" value="保 存"/>
                                </span>
                            </div>
                            </form>
                        </div>
	                    <div class="content-mid-totalbg">
	                        <span class="col1">服务名称：</span>
	                        <span class="col3">ebay刊登系统开放</span>
	                        <span class="col4"><a class="a-color" id="expandEbay" href="javascript:void(0)">-收起</a></span>
	                        <span class="col5">
                                
                                <?php if ($_smarty_tpl->tpl_vars['develop']->value['ebay_sys_open']=='授权中'){?>
                                <label title="如果长时间都是处于授权中的话，请重新审核"><input type="button" class="changeStatus" status="5" name="ebay_sys_open" value="重新审核"/></label>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['develop']->value['ebay_sys_open']=='待审核'){?>
                                <label><input type="radio" class="changeStatus" status="5" name="ebay_sys_open" />通过</label>
                                <label><input type="radio" class="changeStatus" status="4" name="ebay_sys_open"  />不通过</label>
                                <?php }else{ ?>
                                <label><?php echo $_smarty_tpl->tpl_vars['develop']->value['ebay_sys_open'];?>
</label>
                                <?php }?>
                                
	                        </span>
	                    </div>
                        <div id="EbayDiv">
	                        <div>
	                            <span class="content-mid-name">账号：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['email'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">密码：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['develop']->value['login_internal_pwd'];?>
"  />
	                        </div>
                        </div>
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
    <div id="dialog1">
            <input type="hidden" id="field"  value="" />
            <b>不通过原因:</b><textarea id="reason"></textarea> 
    </div>
</body>
</html>
<?php }} ?>