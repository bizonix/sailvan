<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 15:23:59
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\details.html" */ ?>
<?php /*%%SmartyHeaderCode:2079254041f0fbd84e7-04999291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43e96a3f20447f2f1b988101ef167e16d0835bcc' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\details.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2079254041f0fbd84e7-04999291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop' => 0,
    'k' => 0,
    'val' => 0,
    'shopInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54041f0fcc0db3_34921015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54041f0fcc0db3_34921015')) {function content_54041f0fcc0db3_34921015($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>店铺详情</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<script src="../js/form/Validform_v1.0.js"></script>
</head>

<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <?php echo $_smarty_tpl->getSubTemplate ('distributionSecondHeader.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('leftNavigate.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    	<div class="content-mid-right content-mid-details content-mid-unhover content-mid-backcolor content-details-st">
                    		<?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['status']==3){?>
		                        <span class="content-mid-detsuc">
		                            <p>已获得授权</p>
		                            <p>可分销类目：服饰与配饰 鞋子及箱包（适用所有授权）</p>
		                             <a class="a-color" target="_blank" href="http://pa.valsun.cn">去登录</a>
		                            <!-- <a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['id'];?>
">申请调整</a> -->
		                        </span>
	                        <?php }elseif($_smarty_tpl->tpl_vars['shop']->value[0]['status']==4){?>
		                        <span class="content-mid-deterr">
			                        <p class="deterr-fontsize">审核不通过</p>
		                            <p>未通过原因：<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['not_pass_reason'];?>
</p>
									<p>添加您的更多店铺信息，可重新申请</p>
		                            <!-- <a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['id'];?>
">申请调整</a> -->
			                    </span>
			                <?php }else{ ?>
			                	<span class="content-mid-deterr">
			                        <p class="deterr-fontsize">等待审核</p>
		                            <p>我们将在2-3个工作日内完成审核，结果会通知您，请注意查看！如通过，将获得授权凭证，即可快速铺货~</p>
		                            <!-- <a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['id'];?>
">申请调整</a> -->
			                    </span>
		                    <?php }?>
	                        <div class="content-mid-title content-backcolor">
	                           	 店铺详情
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">店铺账号：</span>
	                            <span class="content-mid-later content-details-later"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('PLATFORMS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']==$_smarty_tpl->tpl_vars['k']->value){?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?>
					                            <?php } ?>-<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_account'];?>
</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">listing：</span>
	                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['listing_address']);?>
</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']==1){?>
	                        <div>
	                            <span class="content-mid-name content-details-name">paypal账号：</span>
	                            <span class="content-mid-later content-details-later">大paypal：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['b_paypal_account']);?>
</span>
	                            <span class="content-mid-later content-details-later">小paypal：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['s_paypal_account']);?>
</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">店铺水印：</span>
	                            <span class="content-mid-later content-details-later"><?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_account'];?>
_watermark.png</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">物品所在地：</span>
	                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['goods_location']);?>
</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">运到：</span>
	                            <span class="content-mid-later content-details-later"><?php echo implode(",",(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['ship_country'],true)));?>
</span>
	                            <div class="clear">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name content-details-name">不运送国家：</span>
	                            <span class="content-mid-later content-details-later"><?php echo implode(",",(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['no_ship_country'],true)));?>
</span>
	                            <div class="clear">
	                            </div>
	                            <?php $_smarty_tpl->tpl_vars["shopInfo"] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['apply_listing_config'],true), null, 0);?>
	                        </div>
	                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shopInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
		                        <div>
		                            <span class="content-mid-name content-details-name">user token：</span>
		                            <span class="content-mid-later content-details-later"><textarea style="width:210px;height:50px;margin:10px 0;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['userToken']);?>
</textarea></span>
		                            <div class="clear">
		                        </div>
		                        </div>
		                        <div>
		                            <span class="content-mid-name content-details-name">site id：</span>
		                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['siteID']);?>
</span>
		                            <div class="clear">
		                            </div>
		                        </div>
		                        <div>
		                            <span class="content-mid-name content-details-name">app id：</span>
		                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['appID']);?>
</span>
		                            <div class="clear">
		                            </div>
		                        </div>
		                        <div>
		                            <span class="content-mid-name content-details-name">dev id：</span>
		                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['devID']);?>
</span>
		                            <div class="clear">
		                            </div>
		                        </div>
		                        <div>
		                            <span class="content-mid-name content-details-name">cert id：</span>
		                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['certID']);?>
</span>
		                            <div class="clear">
		                            </div>
		                        </div>
		                        <div>
		                            <span class="content-mid-name content-details-name">server url：</span>
		                            <span class="content-mid-later content-details-later"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['val']->value['serverUrl']);?>
</span>
		                            <div class="clear">
		                            </div>
		                        </div>
	                        <?php } ?>
	                      <?php }?>
	                    </div>
	                    <img style="float:right;" src="../../images/details_bt_bg.gif" />
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>
<?php }} ?>