<?php /* Smarty version Smarty-3.1.12, created on 2014-08-26 11:39:19
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\promptMsg.html" */ ?>
<?php /*%%SmartyHeaderCode:2983653fafa5b7c6e70-57006680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44faa7481edab7bb92d9184a964881ed702d2edd' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\promptMsg.html',
      1 => 1409023961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2983653fafa5b7c6e70-57006680',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fafa5b831c08_34232461',
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
    'g_errormsg' => 0,
    'list' => 0,
    'val' => 0,
    'show_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fafa5b831c08_34232461')) {function content_53fafa5b831c08_34232461($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\code\\fenxiao\\hc_new.valsun.cn\\lib\\template\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>错误码管理</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<script src="../js/promptMsg.js"></script>
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
                                    错误信息：                                        <input type="text" name="errormsg" value="<?php echo $_smarty_tpl->tpl_vars['g_errormsg']->value;?>
"/>
                                <input style="margin:0 50px;" class="addshops-bt-save" type="submit" value="查询" />
                                <input class="addshops-bt-add" type="button" value="新增" />
                            </form>
                        </div>
                        <div>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>编号</td>
                                        <td>错误分类</td>
                                        <td>类型</td>
                                        <td>错误信息</td>
                                        <td>更新人</td>
                                        <td>更新时间</td>
                                        <td>操作</td>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['type'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['status']=='1'){?>正确<?php }else{ ?>错误<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['errormsg'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['lastmodifyName'];?>
</td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['lastmodefyTime'],'%Y-%m-%d');?>
</td>
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
                        错误码管理-<span id="dialogTitle"></span>
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
                            <div class="empower-main-name">错误分类：</div>
                            <div class="empower-main-text">
                                <select name="type">
                                    <option value='common'>common</option>
                                    <option value='view'>view</option>
                                    <option value='model'>model</option>
                                    <option value='action'>action</option>
                                    <option value='other'>other</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">类型：</div>
                            <div class="empower-main-text">
                                <select name="status">
                                    <option value='1'>正确</option>
                                    <option value='2'>错误</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">错误信息：</div>
                            <div class="empower-main-text"><input type="text" name="errormsg"/></div>
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