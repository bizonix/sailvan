<?php /* Smarty version Smarty-3.1.12, created on 2014-08-25 10:30:13
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\basicInformationPersonal.html" */ ?>
<?php /*%%SmartyHeaderCode:350653fa9fb5ecac64-00363559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8939250f3c9fde1ad494b96f748db4d9539e21cd' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\basicInformationPersonal.html',
      1 => 1408931991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '350653fa9fb5ecac64-00363559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PHPSESSID' => 0,
    'company' => 0,
    'companyShortName' => 0,
    'address2' => 0,
    'companyAddressExtend' => 0,
    'contactPerson' => 0,
    'contactPersonPhone' => 0,
    'contactPersonExt' => 0,
    'v' => 0,
    'k' => 0,
    'contactPersonPhoneExt' => 0,
    'category' => 0,
    'mainProducts' => 0,
    'val' => 0,
    'soldToCountries' => 0,
    'idCardUrl' => 0,
    'bank' => 0,
    'bankName' => 0,
    'bankUser' => 0,
    'bankCardNo' => 0,
    'lastYearSales' => 0,
    'predictSalesByYear' => 0,
    'retail' => 0,
    'wholesale' => 0,
    'predictSalesByEveryMonth' => 0,
    'startElectricBusinessTime' => 0,
    'electricBusinessPlatform' => 0,
    'otherContactPersonName' => 0,
    'otherContactPhone' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fa9fb6049047_81549051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa9fb6049047_81549051')) {function content_53fa9fb6049047_81549051($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>basicInformationPersonal</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-migrate-1.1.1.js"></script>
<link rel="stylesheet" href="../../js/superbox/jquery.superbox.css" type="text/css" media="all" />
<script type="text/javascript" src="../../js/superbox/jquery.superbox-min.js"></script>
<script type="text/javascript" src="../../js/superbox/jquery.superbox.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/PCASClass.js"></script>
<script src="../../js/swfupload/swfupload/swfupload.js"></script>
<script src="../../js/swfupload/swfupload/swfupload.js"></script>
<script src="../../js/swfupload/js/swfupload.queue.js"></script>
<script src="../../js/swfupload/js/fileprogress.js"></script>
<script src="../../js/swfupload/js/handlers.js"></script>
<script src="../../js/distributorBasicInformation.js"></script>
</head>

<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['PHPSESSID']->value;?>
" name="PHPSESSID" />
<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <?php echo $_smarty_tpl->getSubTemplate ('distributionSecondHeader.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <form id="contentForm">
                    <div class="content-mid">
                        <?php echo $_smarty_tpl->getSubTemplate ('leftNavigate.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <div class="content-mid-right">
                            <div class="content-mid-title">
                                基本信息
                            </div>
                            <div>
                                <span class="content-mid-name">分销商类型：</span>
                                <label><input name='type' value='2' type="radio" />公司</label>
                                <label><input name='type' value='1' checked type="radio" />个人</label>
                            </div>
                            <div>
                                <span class="content-mid-name">姓名：</span>
                                <input placeholder="输入姓名" class="text-width-long" type="text" name='company' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value);?>
" maxlength='60' />
                            </div>
                            <div>
                                <span class="content-mid-name">英文名称：</span>
                                <input placeholder="输入英文名称" class="text-width-long" type="text" name='companyShortName' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyShortName']->value);?>
" maxlength='30' />
                            </div>
                            <div>
                                <span class="content-mid-name">联系地址：</span>
                                <input type="hidden" name="address2" value="<?php echo $_smarty_tpl->tpl_vars['address2']->value;?>
" />
                                <select name="companyAddressProvince"></select><select name="companyAddressCity"></select><select name="companyAddressDistrict"></select>
                            </div>
                            <div>
                                <span class="content-mid-name"></span>
                                <input placeholder="不需要重复填写市区" class="text-width-long" type="text" name='companyAddressExtend' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyAddressExtend']->value);?>
" maxlength='120'  />
                            </div>
                            <div>
                                <span class="content-mid-name">联系人与手机：</span>
                                <input placeholder="联系人姓名" class="text-width-short" type="text" name='contactPerson' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPerson']->value);?>
" maxlength='25' />
                                <input placeholder="联系人常用11位有效手机号码" class="text-width-mid" type="text" name='contactPersonPhone' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPersonPhone']->value);?>
" maxlength='20' />
                                <a class="content-mid-add" href="javascript:void(0)" id="addPersnPhone">+新增</a>
                                <div  id="PersnPhoneExt" >
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contactPersonExt']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<span <?php if (($_smarty_tpl->tpl_vars['v']->value=='')&&($_smarty_tpl->tpl_vars['contactPersonPhoneExt']->value[$_smarty_tpl->tpl_vars['k']->value]=='')){?> style="display:none;"<?php }?>>
										<span class="content-mid-name"></span>
										<input placeholder="联系人姓名" class="text-width-short" type="text" name='contactPersonExt[]' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value);?>
" maxlength='25'/>
										<input placeholder="联系人常用11位有效手机号码" class="text-width-mid" type="text" name='contactPersonPhoneExt[]' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPersonPhoneExt']->value[$_smarty_tpl->tpl_vars['k']->value]);?>
" maxlength='20'/>&nbsp;<a   class="content-mid-add" href="javascript:void(0)" name="delPersnPhoneExt">-删除</a>
									</span>
								<?php } ?>
                                </div>
                            </div>
                            <div>
                                <span class="content-mid-name content-mid-left">主销产品：</span>
                                <span class="content-mid-rightpos">
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                    <label><input type="checkbox" value='<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' name="mainProducts[]" <?php if ($_smarty_tpl->tpl_vars['mainProducts']->value[$_smarty_tpl->tpl_vars['k']->value]==1){?>checked<?php }?>/><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label>
                                    <?php } ?>
                                </span>
                                <div style="clear:both;">
                                </div>
                            </div>
                            <div>
                                <span class="content-mid-name">主销国家：</span>
                                <input placeholder="您主要销往的国家" class="text-width-long" type="text" name='soldToCountries' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['soldToCountries']->value);?>
" maxlength='120' />
                            </div>
                            <div>
                                <span class="content-mid-name">身份证-双面：</span>
                                <span id="idCardSpanButtonPlaceHolder"></span>
                                <input type="hidden" name="idCard" value="" />
                                <input id="idCardBtnCancel" type="button" value="取消所有上传" onclick="swfu1.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px; display: none;" />
                                
                                <a <?php if ($_smarty_tpl->tpl_vars['idCardUrl']->value==''){?> style="display: none;"<?php }?>  href="<?php echo $_smarty_tpl->tpl_vars['idCardUrl']->value;?>
" id="idCardUrl" rel="superbox[image]" class="check-pic a-color">查看</a>
                                
                            </div>
                            <div class="fieldset flash" id="idCardFsUploadProgress"></div>
                            <div class="content-mid-tmsg">
                                <span>基本信息（可填）：填写后能优先审核，有机会获得更高权限</span>
                                <a class="slide-bt" href="javascript:void(0);">+展开</a>
                                <input type="hidden" value="off" name="advanceInformation">
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">开户银行：</span>
                                <select class="select-width" name="bank" value="<?php echo $_smarty_tpl->tpl_vars['bank']->value;?>
" selectedBank="<?php echo $_smarty_tpl->tpl_vars['bank']->value;?>
">
                                    北京银行、上海银行、宁波银行、华夏银行、光大银行、广发银行、江苏银行、北京农商银行、泉州银行、厦门银行、其他
                                    <option value='中国银行'>中国银行</option>
                                    <option value='工商银行'>工商银行</option>
                                    <option value='农业银行'>农业银行</option>
                                    <option value='交通银行'>交通银行</option>
                                    <option value='建设银行'>建设银行</option>
                                    <option value='中国邮政储蓄银行'>中国邮政储蓄银行</option>
                                    <option value='中信银行'>中信银行</option>
                                    <option value='招商银行'>招商银行</option>
                                    <option value='平安银行'>平安银行</option>
                                    <option value='民生银行'>民生银行</option>
                                    <option value='兴业银行'>兴业银行</option>
                                    <option value='浦发银行'>浦发银行</option>
                                    <option value='北京银行'>北京银行</option>
                                    <option value='上海银行'>上海银行</option>
                                    <option value='宁波银行'>宁波银行</option>
                                    <option value='华夏银行'>华夏银行</option>
                                    <option value='光大银行'>光大银行</option>
                                    <option value='广发银行'>广发银行</option>
                                    <option value='江苏银行'>江苏银行</option>
                                    <option value='北京农商银行'>北京农商银行</option>
                                    <option value='泉州银行'>泉州银行</option>
                                    <option value='厦门银行'>厦门银行</option>
                                    <option value='其他'>其他</option>
                                </select>
                                <input placeholder="请填写具体开户行，如中国银行深圳宝龙支行" class="text-width-mid" type="text" name='bankName' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankName']->value);?>
" maxlength='30' />
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">开户人：</span>
                                <input placeholder="请填写开户人姓名" class="text-width-short" type="text" name='bankUser' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankUser']->value);?>
" maxlength='25' />
                                <input placeholder="填写银行卡账号，方便后期结算支付" class="text-width-mid" type="text" name='bankCardNo' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankCardNo']->value);?>
" maxlength='25' />
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">营业额：</span>
                                <span class="content-mid-rightpos">
                                    <input placeholder="上年销售额" class="text-width-four" type="text" name='lastYearSales' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lastYearSales']->value);?>
" maxlength='14' />
                                        <input placeholder="预计今年销售额" class="text-width-four" type="text" name='predictSalesByYear' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['predictSalesByYear']->value);?>
"  maxlength='14'/>
                                        <input placeholder="零售" class="text-width-four" type="text" name='retail' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['retail']->value);?>
"  maxlength='14' />
                                        <input placeholder="批发" class="text-width-four" type="text" name='wholesale' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wholesale']->value);?>
"  maxlength='14' />
                                </span>
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">分销额：</span>
                                <span class="content-mid-rightpos">
                                    <input placeholder="预计每月分销额" class="text-width-long text-one-margin" type="text" name='predictSalesByEveryMonth' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['predictSalesByEveryMonth']->value);?>
" maxlength='20'  />
                                </span>
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">从业情况：</span>
                                <span class="content-mid-rightpos">
                                    <input placeholder="开始电商时间" class="text-width-short" type="text" name='startElectricBusinessTime' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['startElectricBusinessTime']->value);?>
" maxlength='20'  />
                                    <input placeholder="主营电商平台和对应账号数，如ebay，速卖通34" class="text-width-mid" type="text" name='electricBusinessPlatform' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['electricBusinessPlatform']->value);?>
" maxlength='50' />
                                </span>
                            </div>
                            <div class="slide">
                                <span class="content-mid-name">其他联系人：</span>
                                <span class="content-mid-rightpos">
                                    <input placeholder="请填写其他联系人姓名" class="text-width-short" type="text" name='otherContactPersonName' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['otherContactPersonName']->value);?>
" maxlength='25' />
                                    <input placeholder="请填写联系人有效联系方式" class="text-width-mid" type="text" name='otherContactPhone' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['otherContactPhone']->value);?>
" maxlength='20'  />
                                </span>
                            </div>
                            <div>
                                <span class="content-mid-name"></span>
                                <input class="addshops-bt-save" type="button" value="保存" name='save'>
                                <input class="addshops-bt-add" type="button" value="继续" name='continue'>
                            </div>
                        </div>
                        <div style="clear:both;">
                        </div>
                    </div>
                </form>
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
<script src="../js/base.js"></script>
<?php }} ?>