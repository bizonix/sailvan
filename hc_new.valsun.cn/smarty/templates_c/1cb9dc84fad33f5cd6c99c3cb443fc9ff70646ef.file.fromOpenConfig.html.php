<?php /* Smarty version Smarty-3.1.12, created on 2014-08-26 18:16:21
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\fromOpenConfig.html" */ ?>
<?php /*%%SmartyHeaderCode:3130453fb0b73993661-62720846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cb9dc84fad33f5cd6c99c3cb443fc9ff70646ef' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\fromOpenConfig.html',
      1 => 1409048178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3130453fb0b73993661-62720846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fb0b73a2bbb8_27567384',
  'variables' => 
  array (
    'mod' => 0,
    'act' => 0,
    'g_functionname' => 0,
    'g_method' => 0,
    'list' => 0,
    'val' => 0,
    'show_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb0b73a2bbb8_27567384')) {function content_53fb0b73a2bbb8_27567384($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>调用接口管理</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<link href="../css/page.css" rel="stylesheet" type="text/css" />
<script src="../js/fromOpenConfig.js"></script>
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
                                   函数名称                                            <input type="text" name="functionname" value="<?php echo $_smarty_tpl->tpl_vars['g_functionname']->value;?>
"/>
                                 请求API	            <input type="text" name="method" value="<?php echo $_smarty_tpl->tpl_vars['g_method']->value;?>
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
                                        <td>函数名称</td>
                                        <td>请求地址</td>
                                        <td>请求API</td>
                                        <!-- <td>返回数据格式</td> 
                                        <td>版本</td>-->
                                        <td>发送请求方式</td>
                                        <!--<td>用户</td>-->
                                        <td>缓存时间</td>
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
                                        <td title="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['functionname'];?>
</td>
                                        <td title="<?php echo $_smarty_tpl->tpl_vars['val']->value['requesturl'];?>
"><?php if ($_smarty_tpl->tpl_vars['val']->value['requesturl']=='http://idc.gw.open.valsun.cn/router/rest?'){?>外网<?php }else{ ?>内网<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['method'];?>
</td>
                                        <!-- <td><?php echo $_smarty_tpl->tpl_vars['val']->value['format'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['v'];?>
</td> -->
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['getOrPost']=='1'){?>GET<?php }else{ ?>POST<?php }?></td>
                                        <!--<td><?php echo $_smarty_tpl->tpl_vars['val']->value['username'];?>
</td>-->
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['cachetime'];?>
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
                       调用接口管理-<span id="dialogTitle"></span>
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
                            <div class="empower-main-name">函数名称：</div>
                            <div class="empower-main-text">
                                <input type="text" name="functionname" />
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">函数说明：</div>
                            <div class="empower-main-text">
                                <input type="text" name="name" />
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">请求地址：</div>
                            <div class="empower-main-text">
                                <select name="requesturl">
                                    <option value='http://gw.open.valsun.cn:88/router/rest?'>内网</option>
                                    <option value='http://idc.gw.open.valsun.cn/router/rest?'>外网</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">请求API：</div>
                            <div class="empower-main-text">
                                <input type="text" name="method"/>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">返回数据格式：</div>
                            <div class="empower-main-text">
                                <select name="format">
                                    <option value='json'>json</option>
                                    <option value='xml'>xml</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">版本：</div>
                            <div class="empower-main-text">
                                <input type="text" name="v" value="1.0" />
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">发送请求方式：</div>
                            <div class="empower-main-text">
                                <select name="getOrPost">
                                    <option value='1'>GET</option>
                                    <option value='2'>POST</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">用户：</div>
                            <div class="empower-main-text">
                                <input name="username" type="text" value="purchase" />
                                
                            </div>
                            <div class="clear"></div>
                            <div class="empower-main-name">缓存时间：</div>
                            <div class="empower-main-text">
                                <input name="cachetime" type="text" value="0" />
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