<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 15:23:52
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\storeDataList.html" */ ?>
<?php /*%%SmartyHeaderCode:797854041f08b73d70-05586189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a43b09411ead02dbfd3002321319178aff6c2a80' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\storeDataList.html',
      1 => 1408931991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '797854041f08b73d70-05586189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'p_platFormID' => 0,
    'val' => 0,
    'p_status' => 0,
    'p_shopAccount' => 0,
    'shops' => 0,
    'key' => 0,
    'shop' => 0,
    'showPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54041f08ca40a2_41348376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54041f08ca40a2_41348376')) {function content_54041f08ca40a2_41348376($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>店铺资料</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<script src="../js/storeDataList.js"></script>
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

                    <div class="content-mid-right content-mid-table content-mid-unhover">
                        <div class="content-mid-title">
                           	 店铺资料
                        </div>
                        <div>
	                        <form action="#" method="post">
	                            <span>
	                                <select class="disselect-base" name="platFormID">
	                                	<option value="-">平台</option>
		                                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('PLATFORMS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
		                                	<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (is_numeric($_smarty_tpl->tpl_vars['p_platFormID']->value)&&$_smarty_tpl->tpl_vars['p_platFormID']->value==$_smarty_tpl->tpl_vars['k']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
		                            	<?php } ?>
	                                </select>
	                            </span>
	                            <span>
	                                <select class="disselect-base" name="status">
	                                    <option value="-">ebay刊登状态</option>
	                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('AUTHORIZATIONSTATUS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
		                                	<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['p_status']->value==$_smarty_tpl->tpl_vars['k']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option>
		                            	<?php } ?>
	                                </select>
	                            </span>
	                            <span>
	                                <input class="distext-base" type="text" placeholder="店铺账号" name="shopAccount" value="<?php echo $_smarty_tpl->tpl_vars['p_shopAccount']->value;?>
"/>
	                                <input type="hidden" name="flag" value="searchShop"/>
	                            </span>
	                            <span>
	                                <input class="disbutton-base" type="submit" value="查找">
	                            </span>
	                            <span>
	                                <input class="disbutton-base" type="button" onclick="location.href='../index.php?mod=distributorBasicInformation&act=addShop';" value="添加店铺">
	                            </span>
	                        </form>
                        </div>
                        <table width="100%" cellpadding="0" cellspacing="0"  style="text-align: center;">
                            <thead>
                                <td width="10%">编号</td>
                                <td width="15%" style="text-align: left;">站点</td>
                                <td width="23%" style="text-align: left;"> 账号</td>
                                <td width="17%">ebay刊登状态</td>
                                <td width="25%">操作</td>
                            </thead>
                            <tbody>
                            	<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shop']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['shops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value){
$_smarty_tpl->tpl_vars['shop']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['shop']->key;
?>
	                                <tr>
	                                    <td>
	                                    	<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>

	                                    </td>
	                                    <td style="text-align: left;">
	                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==1){?>
			                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('PLATFORMS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==$_smarty_tpl->tpl_vars['k']->value){?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?>
					                            <?php } ?>
	                                         	-
	                                         	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('SITES'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['site_id']==$_smarty_tpl->tpl_vars['k']->value){?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?>
					                            <?php } ?>
	                                         <?php }else{ ?>
	                                         	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('PLATFORMS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==$_smarty_tpl->tpl_vars['k']->value){?><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php }?>
					                            <?php } ?>
	                                         <?php }?>
	                                    </td>
	                                    <td style="text-align: left;">
	                                        <?php echo $_smarty_tpl->tpl_vars['shop']->value['shop_account'];?>

	                                    </td>
	                                    <td>
	                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']==1){?>
			                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = C('AUTHORIZATIONSTATUS'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['status']==$_smarty_tpl->tpl_vars['k']->value){?><font color="lightcoral"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</font><?php }?>
				                            	<?php } ?>
			                            	<?php }else{ ?>
			                            		<font color="lightcoral">-</font>
			                            	<?php }?>
	                                    </td>
	                                    <td>
	                                    	<?php if ($_smarty_tpl->tpl_vars['shop']->value['plat_form_id']!='1'){?>
	                                    		<a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
">修改</a>
	                                    		<a class="a-color" role-id="<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
" href="#" role-type="deleteShop">删除</a>
	                                    	<?php }elseif($_smarty_tpl->tpl_vars['shop']->value['status']=='1'){?>
	                                    		<a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
">去申请</a>
	                                    	<?php }else{ ?>
	                                        	<a class="a-color" href="../index.php?mod=distributorBasicInformation&act=showShopInfo&shopId=<?php echo $_smarty_tpl->tpl_vars['shop']->value['id'];?>
">查看</a>
	                                        <?php }?>
	                                    </td>
	                                </tr>
                                <?php } ?>
                                <?php if (count($_smarty_tpl->tpl_vars['shops']->value)==0){?>
                                	<tr>
	                                    <td class="content-myapi-tfoot" colspan="6" align="center">
	                                        <p>还没有店铺</p>
	                                        <a class="a-color" href="../index.php?mod=distributorBasicInformation&act=addShop">添加店铺</a>
	                                    </td>
                                	</tr>
                                <?php }?>
                            </tbody>
                            <?php if (count($_smarty_tpl->tpl_vars['shops']->value)>0){?>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align="center">
                                        <div class="pagination"><?php echo $_smarty_tpl->tpl_vars['showPage']->value;?>
</div>
                                    </td>
                                </tr>
                            </tfoot>
                            <?php }?>
                        </table>
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
<?php }} ?>