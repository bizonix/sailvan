<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:08:38
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\addShop.html" */ ?>
<?php /*%%SmartyHeaderCode:2177754041f2c2acc09-66272969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc15c1208f90841c420a9855e378f6d1bd8eaf9c' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\addShop.html',
      1 => 1409825801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2177754041f2c2acc09-66272969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54041f2c433530_87921432',
  'variables' => 
  array (
    'shop' => 0,
    'PHPSESSID' => 0,
    'k' => 0,
    'val' => 0,
    'shipCountry' => 0,
    'noShipCountry' => 0,
    'key' => 0,
    'goodsLocation' => 0,
    'shopInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54041f2c433530_87921432')) {function content_54041f2c433530_87921432($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加店铺</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-migrate-1.1.1.js"></script>
<link rel="stylesheet" href="../../js/superbox/jquery.superbox.css" type="text/css" media="all" />
<script type="text/javascript" src="../../js/superbox/jquery.superbox-min.js"></script>
<script type="text/javascript" src="../../js/superbox/jquery.superbox.js"></script>
<script src="../../js/base.js"></script>
<?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']>1){?>
<?php }else{ ?>
<script src="../../js/swfupload/swfupload/swfupload.js"></script>
<script src="../../js/swfupload/js/swfupload.queue.js"></script>
<script src="../../js/swfupload/js/fileprogress.js"></script>
<script src="../../js/addShopUpload.js"></script>
<script src="../../js/PCASClass.js"></script>
<?php }?>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/addShop.js"></script>
</head>

<body class="home-body-color Arial-font">
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['PHPSESSID']->value;?>
" name="PHPSESSID" />
	<div class="container">
    	<div class="content" role-plat-form="<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id'];?>
">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <?php echo $_smarty_tpl->getSubTemplate ('distributionSecondHeader.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('leftNavigate.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <form name="addShopForm" ENCTYPE="multipart/form-data" action="../index.php?mod=distributorBasicInformation&act=addShopPost">
	                    <div class="content-mid-right">
	                        <div name="shopTitle" class="content-mid-title">
	                            	填写店铺资料：
	                        </div>
	                        <div>
	                            <span class="content-mid-name"><a title="即您的店铺名字">店铺账号：</a></span>
	                            <select class="disselect-base" name="shopPlat1" class="select-width">
	                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('PLATFORMS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
	                                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']==$_smarty_tpl->tpl_vars['k']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
	                            <?php } ?>
	                            </select>
	                            <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']>1){?>
	                            <?php }else{ ?>
	                            <select name="siteId" class="select-width disselect-base">
	                            	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('SITES'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
	                                	<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['site_id']==$_smarty_tpl->tpl_vars['k']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
	                            	<?php } ?>
	                            </select>
	                            <?php }?>
	                            <br/><span class="content-mid-name"></span>
	                            <input name="shopAccount1" maxlength='50' placeholder="店铺账号(memberid)，即店铺英文名字，非登录邮箱" class="text-width-long" type="text" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_account'];?>
" />
	                        </div>
	                        <div>
	                            <span class="content-mid-name"><a title="访问您店铺时的网页地址">店铺链接：</a></span>
	                            <input name="shopLisingAddress1" maxlength='600' placeholder="访问您店铺时的网页地址" class="text-width-long" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['listing_address']);?>
" />
	                        </div>
	                        <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']>1){?>
	                        <?php }else{ ?>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="即标准费率账号，付款金额大于8才使用">大paypal账号：</a></span>
	                            <input name="bigPaypal1" placeholder="大paypal账号" maxlength='30' class="text-width-long" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['b_paypal_account']);?>
" />
	                            <span class="content-mid-name"><a title="即小额费率账号，付款金额小于8使用。如无，则大小paypal可相同">小paypal账号：</a></span>
	                            <input name="smallPaypal1" placeholder="小paypal账号" maxlength='30' class="text-width-long" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value[0]['s_paypal_account']);?>
" />
	                        </div>
	                        <div name="dataDiv" class="content-mid-title">
	                           	 授权信息（申请ebay刊登必填）
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="即防伪标志，防止盗图 ">店铺水印：</a></span>
	                            <span id="idCardSpanButtonPlaceHolder" style="z-index:-1;"></span>
	                            <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['shop_watermark']){?>
	                            <a class="a-color" name="watermark" target="view_window" href="<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_watermark'];?>
" rel="superbox[image]"><?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_account'];?>
.png</a>
	                            <?php }else{ ?>
	                            <a class="a-color" name="watermark" href="#" rel="superbox[image]">未上传图片</a>
	                            <?php }?>
	                            <input type="hidden" name="watermarkUrl" value="<?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['shop_watermark']){?><?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['shop_watermark'];?>
<?php }?>"/>
	                            <input id="idCardBtnCancel" style="display:none;" type="button" value="取消所有上传" onclick="swfu1.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
	                            <div class="fieldset flash" id="idCardFsUploadProgress"></div>
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name content-mid-left"><a title="即您可运往的国家">运送国家：</a></span>
	                            <span class="content-mid-rightpos content-mid-rightcont">
	                            <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['ship_country']){?>
	                            <?php $_smarty_tpl->tpl_vars["shipCountry"] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['ship_country'],true), null, 0);?>
	                            	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shipCountry']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
	                            		<input type="hidden" name="hideShippCountry" value="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
"/>
	                            	<?php } ?>
	                            <?php }else{ ?>
	                            <label style="color:red;">请选择站点</label>
	                            <?php }?>
	                            </span>
	                            <div style="clear:both;">
	                            </div>
	                        </div>
	                        <div id='noShippingCountry' name="dataDiv" style="word-break: break-all;">
	                            <span class="content-mid-name"><a title="即您不支持运送的地区">不运送国家：</a></span>
	                            <!-- <select name="noShipCountry1" class="select-width">
	                                <option value="all">运输至所有国家</option>
	                                <option value="ebaySite">选择ebay站点设置</option>
	                                <option value="noShipArea">选择不运送地区</option>
	                            </select> -->
	                            	<input type="button" id="setExcludeCountry" value="设置区域及国家"/><br/>
	                            	<?php $_smarty_tpl->tpl_vars["noShipCountry"] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['no_ship_country'],true), null, 0);?>
	                            	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['noShipCountry']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
	                            		<label><input name="noShippingCountry1[]" style="display:none;" type="checkbox" checked value="<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
"><sm><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php if ($_smarty_tpl->tpl_vars['key']->value+1!=count($_smarty_tpl->tpl_vars['noShipCountry']->value)){?>,<?php }?></sm></label>
	                            	<?php } ?>
	                        </div>
	                        <div name="dataDiv">
	                        <?php $_smarty_tpl->tpl_vars["goodsLocation"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['shop']->value[0]['goods_location']), null, 0);?>
	                        	<span class="content-mid-name"><a title="如通过我处国内仓库代发货，选china">物品所在国家：</a></span>
	                            <select name="goodsLocationCountry1" class="select-width disselect-base">
	                                <option value="CN" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="China"){?>selected="selected"<?php }?>>China</option>
	                                <option value="US" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="USA"){?>selected="selected"<?php }?>>USA</option>
	                                <option value="AU" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="Australia"){?>selected="selected"<?php }?>>Australia</option>
	                                <option value="DE" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="Germany"){?>selected="selected"<?php }?>>Germany</option>
	                                <option value="MY" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="Malaysia"){?>selected="selected"<?php }?>>Malaysia</option>
	                                <option value="SG" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="Sinapore"){?>selected="selected"<?php }?>>Sinapore</option>
	                                <option value="HK" <?php if ($_smarty_tpl->tpl_vars['goodsLocation']->value[0]=="Hongkong"){?>selected="selected"<?php }?>>Hongkong</option>
	                            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                            <span class="content-mid-name"><a title="如通过我处国内仓库代发货，选shenzhen">物品所在地：</a></span>
	                            <input name="goodsLocationCity1" maxlength='40' placeholder="城市地区 (英文或拼音)" class="text-width-short" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['goodsLocation']->value[1]);?>
" />
	                        </div>
	                        <?php $_smarty_tpl->tpl_vars["shopInfo"] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['shop']->value[0]['apply_listing_config'],true), null, 0);?>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="登录ebay获取，为您的专属令牌">userToken：</a></span>
	                            <input name="shopToken1" placeholder="userToken" class="text-width-long" type="text" maxlength='872' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['userToken']);?>
" />
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="站点id。已根据您的站点自动为您输入，如美国即为0">siteID：</a></span>
	                            <input name="siteID1" placeholder="siteID" class="text-width-long" type="text" maxlength='60' value="<?php if ($_smarty_tpl->tpl_vars['shopInfo']->value[0]['siteID']>0){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['siteID']);?>
<?php }elseif($_smarty_tpl->tpl_vars['shop']->value[0]['site_id']>0){?><?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['site_id'];?>
<?php }else{ ?>0<?php }?>" />
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="登录ebay获取，别名Developer Key">devID：</a></span>
	                            <input name="devID1" placeholder="devID" class="text-width-long" type="text" maxlength='60' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['devID']);?>
" />
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="登录ebay获取，别名Application Key">appID：</a></span>
	                            <input name="appID1" placeholder="appID" class="text-width-long" type="text" maxlength='60' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['appID']);?>
" />
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="登录ebay获取，别名Certificate Key">certID：</a></span>
	                            <input name="certID1" placeholder="certID" class="text-width-long" type="text" maxlength='60' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['certID']);?>
" />
	                        </div>
	                        <div name="dataDiv">
	                            <span class="content-mid-name"><a title="即ebay开放的正式服务器调用地址，已自动为您输入">server Url：</a></span>
	                            <input name="serverUrl1" placeholder="server Url" class="text-width-long" type="text" maxlength='60' value="<?php if ($_smarty_tpl->tpl_vars['shopInfo']->value[0]['serverUrl']>0){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shopInfo']->value[0]['serverUrl']);?>
<?php }else{ ?>https://api.ebay.com/ws/api.dll<?php }?>" />
	                        </div>
	                        <?php }?>
	                        <div name="operateDiv1">
	                            <span class="content-mid-name"></span>
	                            <input type="hidden" name="shopId" value="<?php echo $_smarty_tpl->tpl_vars['shop']->value[0]['id'];?>
">
	                            <input class="addshops-bt-save" type="button" name="saveShopInfo" value="保存">
	                            <input class="addshops-bt-add" type="button" name="saveShopInfoAndGoOn" value="保存并继续添加">
	                            <?php if ($_smarty_tpl->tpl_vars['shop']->value[0]['plat_form_id']==1){?>
	                            <input class="addshops-bt-onlyread" type="button" name="applyListing" role-flag="applyListing" value="申请刊登授权">
	                            <?php }else{ ?>
	                            <input type="button" name="applyListing" role-flag="applyListing" disabled="disabled" value="申请刊登授权">
	                            <?php }?>
	                        </div>
	                    </div>
                    </form>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ('myEmpowerBox.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>