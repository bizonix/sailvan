<?php /* Smarty version Smarty-3.1.12, created on 2014-08-27 09:29:54
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\interfaceVersion.html" */ ?>
<?php /*%%SmartyHeaderCode:1822253faefe57addb5-73946741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5896147b3bb8329e79d91df294ffa2c9d6b0f10f' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\interfaceVersion.html',
      1 => 1409102993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1822253faefe57addb5-73946741',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53faefe5872564_08604655',
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
    'g_requestname' => 0,
    'g_rule' => 0,
    'list' => 0,
    'val' => 0,
    'show_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53faefe5872564_08604655')) {function content_53faefe5872564_08604655($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提供接口管理</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<script src="../js/interfaceVersion.js"></script>
</head>

<body class="home-body-color">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('backstagesHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="content-main">
                <div class="content-top-appli">
                    <img src="../images/appli_banner.gif">
                </div>
                <div class="content-mid">
                    <?php echo $_smarty_tpl->getSubTemplate ('backstagesMenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <div class="content-mid-right content-mid-unhover content-mid-total">
                        <div class="content-mid-title content-mid-totalbg">
                            接口管理
                        </div>
                        <div>
                            <form method="get">
                                <input type="hidden" name="mod" value=<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
 />
                                <input type="hidden" name="act" value=<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
 />
                                    请求名称：                                        <input type="text" name="requestname" value="<?php echo $_smarty_tpl->tpl_vars['g_requestname']->value;?>
"/>
                                    转换规则：                                        <input type="text" name="rule" value="<?php echo $_smarty_tpl->tpl_vars['g_rule']->value;?>
"/>
                                <input style="margin:0 50px;" class="addshops-bt-save" type="submit" value="查询" />
                                <input class="addshops-bt-add" type="button" value="新增" />
                            </form>
                        </div>
                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td width='2%'>编号</td>
                                        <td width='10%'>请求名称</td>
                                        <td width='20%'>转换规则</td>
                                        <td width='2%'>版本</td>
                                        <!-- <td width='20%'>接口返回数据封装</td>
                                        <td width='20%'>接口请求转化</td> -->
                                        <td width='5%'>是否启用</td>
                                        <td width='5%'>操作</td>
                                    </tr>
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
                                        <td title="<?php echo $_smarty_tpl->tpl_vars['val']->value['note'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['requestname'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['rule'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['version'];?>
</td>
                                        <!-- <td><?php echo $_smarty_tpl->tpl_vars['val']->value['extend_package'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['extend_transform'];?>
</td> -->
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['is_disable']=='0'){?>启用<?php }else{ ?>禁用<?php }?></a></td>
                                        
                                        <td>
                                            <a class="a-color" href="#" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">编辑</a>
                                            <a class="a-color" href="#" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">删除</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="center">
                                            <div class="pagination">
                                                <?php echo $_smarty_tpl->tpl_vars['show_page']->value;?>

                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    
    <div class="empower-box-shade" id="dialog">
        <div class="empower-box-content" >
            <div class="empower-box-title" >
                <div class="empower-title-main" id="title">
                        提供接口管理-<span id="dialogTitle"></span>
                <input type="hidden"  name='dialogType' value=""/>
                </div>
                <div class="empower-title-bt">
                    <a class="describe-hide-box" href="javascript:void(0);"></a>
                </div>
                <div class="clear">
                </div>
            </div>
            <div class="empower-box-main">
                <div class="empower-box-msg">  
                    <form id="submitData">
                        <div class="empower-box-line">
                            <div class="empower-main-name">请求名称:</div>
                            <div class="empower-main-text">
                                <input type='text' name='requestname' />
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">转换规则：</div>
                            <div class="empower-main-text">
                                <input type='text' name='rule' />
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">接口版本：</div>
                            <div class="empower-main-text">
                                <input type="text" name="version"/>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">接口返回数据封装：</div>
                            <div class="empower-main-text">
                                <input type="text" name="extend_package"/>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">接口请求转化：</div>
                            <div class="empower-main-text">
                                <input type="text" name="extend_transform"/>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">接口请求转化：</div>
                            <div class="empower-main-text">
                                <input type="radio" name="is_disable" value="0"/>启用
                                <input type="radio" name="is_disable" value="1"/>禁用
                            </div>
                            <div class="clear"></div>
                            <input type='hidden' name='id' value/>
                        </div>
                    </form>
                    <div style="padding-left:143px;" role-name="submitButton" class="empower-box-line">
                        <input type="button" name="submit" value="提交" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php }} ?>