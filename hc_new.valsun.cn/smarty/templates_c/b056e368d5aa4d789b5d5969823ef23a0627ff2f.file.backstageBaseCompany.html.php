<?php /* Smarty version Smarty-3.1.12, created on 2014-09-06 11:55:04
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\backstageBaseCompany.html" */ ?>
<?php /*%%SmartyHeaderCode:21876540a8598005692-43727067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b056e368d5aa4d789b5d5969823ef23a0627ff2f' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\backstageBaseCompany.html',
      1 => 1408931991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21876540a8598005692-43727067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PHPSESSID' => 0,
    'company' => 0,
    'companyShortName' => 0,
    'companyLegalPerson' => 0,
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
    'businessLicenseUrl' => 0,
    'taxRegistrationUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_540a859813fee3_34491305',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a859813fee3_34491305')) {function content_540a859813fee3_34491305($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基本信息-公司</title>
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
        	<?php echo $_smarty_tpl->getSubTemplate ('backstagesHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <div class="content-top-appli">
                    <img src="../images/appli_banner.gif">
                </div>
                <div class="content-mid">
                <form id="contentForm">
                    <?php echo $_smarty_tpl->getSubTemplate ('backstagesAuditHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right content-mid-unhover content-mid-total">
                        <div class="content-mid-title content-mid-totalbg">
                            基本信息
                        </div>
                        
                        <div>
                            <span class="content-mid-name">分销商类型：</span>
                            <label><input type="radio" name='type' value='2' checked />公司</label>
                            <label><input type="radio" name='type' value='1' />个人</label>
                            
                        </div>
                        <div>
                            <span class="content-mid-name">公司全称：</span>
                            <input placeholder="公司全称，与营业执照一致" class="text-width-long" type="text" name='company' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value);?>
" maxlength='60'/>
                        </div>
                        <div>
                            <span class="content-mid-name">公司英文简称：</span>
                            <input placeholder="公司英文名称简称" class="text-width-long" type="text" name='companyShortName' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyShortName']->value);?>
" maxlength='30'/>
                            
                        </div>
                        <div>
                            <span class="content-mid-name">公司法人：</span>
                            <input placeholder="公司法人，与营业执照一致" class="text-width-long" type="text" name='companyLegalPerson' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyLegalPerson']->value);?>
" maxlength='25'/>
                        </div>
                        <div>
                            <span class="content-mid-name">公司地址：</span>
                            <input type="hidden" name="address2" value="<?php echo $_smarty_tpl->tpl_vars['address2']->value;?>
" />
                            <select name="companyAddressProvince"></select><select name="companyAddressCity" ></select><select name="companyAddressDistrict" ></select>
                            
                        </div>
                        
                        <div>
                            <span class="content-mid-name"></span>
                            <input placeholder="不需要重复填写市区" class="text-width-long" type="text" name='companyAddressExtend' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyAddressExtend']->value);?>
" maxlength='120'/>
                        </div>
                        <div>
                            <span class="content-mid-name">联系人与手机：</span>
                            <input placeholder="联系人姓名" class="text-width-short" type="text" name='contactPerson' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPerson']->value);?>
" maxlength='25'/>
                            <input placeholder="联系人常用11位有效手机号码" class="text-width-mid" type="text" name='contactPersonPhone' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPersonPhone']->value);?>
" maxlength='20'/>
                            <a class="content-mid-add" href="javascript:void(0)" id="addPersnPhone">+新增</a>
                            <div  id="PersnPhoneExt">
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
" maxlength='20'/>&nbsp;<a   class="content-mid-add" href="javascript:void(0)" name="delPersnPhoneExt">-删除</a><br>
									</span>
								<?php } ?>
                            </div>
                        </div>
                        <div>
                            <span class="content-mid-name content-mid-left">主销产品：</span>
                            <span class="content-mid-rightpos content-mid-righttab">
                                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                <label><input type="checkbox" value='<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
' name="mainProducts[]"<?php if ($_smarty_tpl->tpl_vars['mainProducts']->value[$_smarty_tpl->tpl_vars['k']->value]==1){?>checked<?php }?> /><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</label>
                                <?php } ?>
                            </span>
                            <div style="clear:both;">
                            </div>
                        </div>
                        
                        <div>
                            <span class="content-mid-name">主销国家：</span>
                            <input placeholder="您主要销往的国家" class="text-width-long" type="text" name='soldToCountries' value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['soldToCountries']->value);?>
" maxlength='120'/>
                        </div>
                        <div>
                            <span class="content-mid-name" >身份证-双面：</span>
                            <span id="idCardSpanButtonPlaceHolder"></span>
                            <input type="hidden" name="idCard" value="" />
                            <input id="idCardBtnCancel" type="button" value="取消所有上传" onclick="swfu1.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px; display: none;"  />
                            
                            <a <?php if ($_smarty_tpl->tpl_vars['idCardUrl']->value==''){?>style="display: none;"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['idCardUrl']->value;?>
" id="idCardUrl" rel="superbox[image]" class="check-pic">查看</a>
                            
                        </div>
                        <div class="fieldset flash" id="idCardFsUploadProgress"></div>
                        
                        <div>
                            <span class="content-mid-name" >营业执照：</span>
                            <span id="businessLicenseSpanButtonPlaceHolder"></span>
                            <input type="hidden" name="businessLicense" value="" />
                            <input id="businessLicenseBtnCancel" type="button" value="取消所有上传" onclick="swfu2.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px; display: none;" />
                            
                            <a <?php if ($_smarty_tpl->tpl_vars['businessLicenseUrl']->value==''){?>style="display: none;"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['businessLicenseUrl']->value;?>
" id="businessLicenseUrl" rel="superbox[image]" class="check-pic">查看</a>
                            
                        </div>
                        <div class="fieldset flash" id="businessLicenseFsUploadProgress" ></div>
                        
                        <div>
                            <span class="content-mid-name" >税务登记证：</span>
                            <span id="taxRegistrationSpanButtonPlaceHolder"></span>
                            <input type="hidden" name="taxRegistration" value="" />
                            <input id="taxRegistrationBtnCancel" type="button" value="取消所有上传" onclick="swfu3.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px; display: none;" />
                            <a  <?php if ($_smarty_tpl->tpl_vars['taxRegistrationUrl']->value==''){?>style="display: none;"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['taxRegistrationUrl']->value;?>
" id="taxRegistrationUrl" rel="superbox[image]" class="check-pic">查看</a>
                           
                        </div>
                        <div class="fieldset flash" id="taxRegistrationFsUploadProgress"></div>
                        <div>
                            <span class="content-mid-name">
                                <input type="button" value="修改保存" id='backstagesSaveBase'>
                            </span>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                    </form>
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
<script src="../../js/base.js"></script>
</html>
<?php }} ?>