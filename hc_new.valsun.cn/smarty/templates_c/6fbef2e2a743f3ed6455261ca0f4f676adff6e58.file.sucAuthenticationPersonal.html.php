<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 12:44:31
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\sucAuthenticationPersonal.html" */ ?>
<?php /*%%SmartyHeaderCode:166135403f9af99c1a7-50034600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fbef2e2a743f3ed6455261ca0f4f676adff6e58' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\sucAuthenticationPersonal.html',
      1 => 1408931991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166135403f9af99c1a7-50034600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'companyShortName' => 0,
    'address2' => 0,
    'address' => 0,
    'contactPerson' => 0,
    'contactPersonPhone' => 0,
    'contactPersonExt' => 0,
    'v' => 0,
    'k' => 0,
    'contactPersonPhoneExt' => 0,
    'mainProducts' => 0,
    'soldToCountries' => 0,
    'idCardUrl' => 0,
    'bank' => 0,
    'bankName' => 0,
    'bankUser' => 0,
    'bankCardNo' => 0,
    'lastYearSales' => 0,
    'lastYearSale' => 0,
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
  'unifunc' => 'content_5403f9afac5f60_66024054',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403f9afac5f60_66024054')) {function content_5403f9afac5f60_66024054($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基本信息</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery-migrate-1.1.1.js"></script>
<link rel="stylesheet" href="../../js/superbox/jquery.superbox.css" type="text/css" media="all" />
<script type="text/javascript" src="../../js/superbox/jquery.superbox-min.js"></script>
<script type="text/javascript" src="../../js/superbox/jquery.superbox.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>

</head>

<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <?php echo $_smarty_tpl->getSubTemplate ('distributionSecondHeader.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('leftNavigate.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right">
                        <div class="content-mid-title">
                            	基本信息
                        </div>
                        <div>
                            <span class="content-mid-name">分销商类型：</span>
                            <span class="content-mid-rightpos">个人</span>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <span class="content-mid-name">姓名：</span>
                            <span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <span class="content-mid-name">英文名称：</span>
                            <span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['companyShortName']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <span class="content-mid-name">联系地址：</span>
                            <span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address2']->value);?>
(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value);?>
)</span>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <span class="content-mid-name">联系人与手机：</span>
                            <span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPerson']->value);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPersonPhone']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
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
									<span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value);?>
  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactPersonPhoneExt']->value[$_smarty_tpl->tpl_vars['k']->value]);?>
</span><br>
								</span>
							<?php } ?>
						</div>
                        <div>
                            <span class="content-mid-name">主营产品：</span>
                            <span class="content-mid-rightpos"><?php echo $_smarty_tpl->tpl_vars['mainProducts']->value;?>
</span>
                            <div class="clear"></div>
                        </div>
                        <div>
                            <span class="content-mid-name">主销国家：</span>
                            <span class="content-mid-rightpos"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['soldToCountries']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
                        
                        <div>
                            <span class="content-mid-name">身份证-双面：</span>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['idCardUrl']->value;?>
" rel="superbox[image]" class="check-pic content-mid-rightpos a-color">查看</a>
                        </div>
                        <div class="content-mid-tmsg">
                            <span>高级信息（可填）：填写后能优先审核，有机会获得更高权限</span>
                            <a class="slide-bt" href="javascript:void(0);">+展开</a>
                        </div>
                        <div class="slide">
                            <span class="content-mid-name">开户银行：</span>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bank']->value);?>
</span>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankName']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <span class="content-mid-name">开户人：</span>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankUser']->value);?>
</span>
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bankCardNo']->value);?>
</span>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="slide">
                            <span class="content-mid-name">营业额：</span>
                            <span class="content-mid-rightpos">
                                <?php if ($_smarty_tpl->tpl_vars['lastYearSales']->value!=''){?>
                                <span class="text-width-four">上年销售额:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lastYearSale']->value);?>
</span>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['predictSalesByYear']->value!=''){?>
                                <span class="text-width-four">预计今年销售额:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['predictSalesByYear']->value);?>
</span>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['retail']->value!=''){?>
                                <span class="text-width-four">零售:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['retail']->value);?>
</span>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['wholesale']->value!=''){?>
                                <span class="text-width-four">批发:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wholesale']->value);?>
</span>
                                <?php }?>
                            </span>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <span class="content-mid-name">分销额：</span>
                            <span class="content-mid-rightpos">
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['predictSalesByEveryMonth']->value);?>

                            </span>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <span class="content-mid-name">从业情况：</span>
                            <span class="content-mid-rightpos">
                                <?php if ($_smarty_tpl->tpl_vars['startElectricBusinessTime']->value!=''){?>
                                <span class="text-width-short">开始电商时间:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['startElectricBusinessTime']->value);?>
</span>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['electricBusinessPlatform']->value!=''){?>
                                <span class="text-width-short">主营电商平台:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['electricBusinessPlatform']->value);?>
</span>
                                <?php }?>
                            </span>
                            <div class="clear"></div>
                        </div>
                        <div class="slide">
                            <span class="content-mid-name">其他联系人：</span>
                            <span class="content-mid-rightpos">
                                <span class="text-width-short"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['otherContactPersonName']->value);?>
</span>
                                <span class="text-width-short"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['otherContactPhone']->value);?>
</span>
                            </span>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>

<script src="../../js/base.js"></script><?php }} ?>