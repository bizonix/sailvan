<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:33:45
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\backstageStoreList.html" */ ?>
<?php /*%%SmartyHeaderCode:1493954097569e49089-71943430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6efb80eb3c137deda7f8e074b47709f8143007f5' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\backstageStoreList.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1493954097569e49089-71943430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ebayCount' => 0,
    'ebay' => 0,
    'k' => 0,
    'v' => 1,
    'platNum' => 0,
    'shops' => 1,
    'shop' => 1,
    'platforms' => 1,
    'sites' => 1,
    'showPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54097569f420b8_67129346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54097569f420b8_67129346')) {function content_54097569f420b8_67129346($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>店铺列表</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/form/Validform_v1.0.js"></script>
<script src="../js/shopList.js"></script>
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
                        <div class="content-mid-title content-mid-totalbg">
                           	 店铺列表
                            <span class="content-title-ebay">
                                ebay(<?php echo $_smarty_tpl->tpl_vars['ebayCount']->value;?>
):
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ebay']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
) 
                                <?php } ?>
                            </span>
                            <span class="content-title-smt">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['platNum']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
)
                                <?php } ?>
                            </span>
                        </div>
                        
                        <?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shop']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value){
$_smarty_tpl->tpl_vars['shop']->_loop = true;
?>
                        <div>
                            <span class="col1">店铺名：</span>
                            <span class="col2"><?php echo $_smarty_tpl->tpl_vars['platforms']->value[$_smarty_tpl->tpl_vars['shop']->value['plat_form_id']];?>
<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==1||$_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==5||$_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==6){?><?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->tpl_vars['shop']->value['site_id']];?>
<?php }?></span>
                            <span class="col3"><?php echo $_smarty_tpl->tpl_vars['shop']->value['shop_account'];?>
</span>
                            <span class="col4"><a class="a-color expand" shopid="<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
" href="javascript:void(0)">+展开</a></span>
                            <span class="col5">
                                <?php if ($_smarty_tpl->tpl_vars['shop']->value['status']==2){?>
                                <label><input type="radio" class="changeStatus" status="3" shopName="<?php echo $_smarty_tpl->tpl_vars['shop']->value['shop_account'];?>
" shopid="<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
" />通过</label>
                                <label><input type="radio" class="changeStatus" status="4" shopName="<?php echo $_smarty_tpl->tpl_vars['shop']->value['shop_account'];?>
" shopid="<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
" />不通过</label>
                                <?php }else{ ?>
                                <label><?php echo $_smarty_tpl->tpl_vars['shop']->value['statusCode'];?>
</label>
                                <?php }?>
                            </span>
                        </div>
                        <div style="display:none" id="detail<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
">
                            <?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==1){?>
	                        <div>
	                            <span class="content-mid-name">大paypal账号：</span>
	                            <span><input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['b_paypal_account'];?>
" /></span>
	                        </div>
                            <div>
                                <span class="content-mid-name">小paypal账号：</span>
                                <span><input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['s_paypal_account'];?>
" /></span>
                            </div>
	                        <div>
	                            <span class="content-mid-name">listing：</span>
	                            <span><input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['listing_address'];?>
" /></span>
	                        </div>
	                        <div>
	                            <span class="content-mid-name">店铺水印：</span>
	                            <span class="content-mid-righttab">
	                                  <img src="<?php echo $_smarty_tpl->tpl_vars['shop']->value['shop_watermark'];?>
" />
	                            </span>
                                <div style="clear:both;"></div>
	                        </div>
                            <div>
                                <span class="content-mid-name content-mid-left">运到：</span>
                                <span class="content-mid-righttab">
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['shop']->value['countrys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <label><input type="checkbox" disabled value="<?php echo $_smarty_tpl->tpl_vars['v']->value['location'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['v']->value['location'],$_smarty_tpl->tpl_vars['shop']->value['ship_country'])){?>checked<?php }?>/><?php echo $_smarty_tpl->tpl_vars['v']->value['desciption'];?>
</label>
                                    <?php } ?>
                                </span>
                                <div style="clear:both;">
                                </div>
                            </div>
                            <div>
                                <span class="content-mid-name content-mid-left">不运送国家：</span>
                                <span class="content-mid-righttab">
                                    <?php echo $_smarty_tpl->tpl_vars['shop']->value['no_ship_country'];?>

                                </span>
                                <div style="clear:both;">
                                </div>
                            </div>
	                        <div>
                                <span class="content-mid-name">物品所在国家：</span>
                                <input name="goodsLocationCity1" readonly class="text-width-short" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['goods_location'][0];?>
" />
                                <span class="content-mid-name">物品所在地：</span>
                                <input name="goodsLocationCity1" readonly class="text-width-short" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['goods_location'][1];?>
" />
                            </div>
	                        <div>
	                            <span class="content-mid-name">userToken：</span>
	                            <span class="content-mid-righttab"><textarea rows="4" cols="60" readonly><?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['userToken'];?>
</textarea></span>
	                            <div style="clear:both;">
	                            </div>
	                        </div>
	                        <div>
	                            <span class="content-mid-name">siteID：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['siteID'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">devID：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['devID'];?>
"  />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">appID：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['appID'];?>
"  />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">certID：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['certID'];?>
"  />
	                        </div>
	                        <div>
	                            <span class="content-mid-name">server Url：</span>
	                            <input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['apply_listing_config']['serverUrl'];?>
"  />
	                        </div>
	                        <?php }else{ ?>
                            <div>
                                <span class="content-mid-name">listing：</span>
                                <span><input class="text-width-long" type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['shop']->value['listing_address'];?>
" /></span>
                            </div>
	                        <?php }?>
                        </div>
                        <?php } ?>
                        
                        
                        <div style="width:100%;text-align:center;padding-left:0;" class="pagination"><?php echo $_smarty_tpl->tpl_vars['showPage']->value;?>
</div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    
    <div id="dialog1">
            <input type="hidden" id="shopid"  value="" />
            <b>不通过原因:</b><textarea id="reason"></textarea> 
    </div>
</body>
</html>
<?php }} ?>