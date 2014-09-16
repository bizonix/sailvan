<?php /* Smarty version Smarty-3.1.12, created on 2014-08-25 08:46:30
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\backstagesLogin.html" */ ?>
<?php /*%%SmartyHeaderCode:2158153fa876666ec11-91998165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5d438a3573566a256002c9f7eec072bd9336553' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\backstagesLogin.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2158153fa876666ec11-91998165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activeMsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fa87666d86a6_77006163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa87666d86a6_77006163')) {function content_53fa87666d86a6_77006163($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/backstageslogin.js"></script>
</head>

<body class="Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('backstagesHead.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="login">
                <div class="login-main">
                    <span class="login-main-title">登录账号</span>
                    <form class="registerform" id="backstagesloginForm">
                        <ul>
                            <li>
                                <label class="label ali">后台账号：</label>
                                <input type="text" value="" name="useremail" class="inputxt logintxt">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">密码：</label>
                                <input type="password" value="" name="userpassword" class="inputxt logintxt">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label"></label>
                                <input class="login-bt-save" type="submit" value="登 录" name="submit">
                                <?php if ($_smarty_tpl->tpl_vars['activeMsg']->value){?>
                                <span style="color:red;font-size:12px;font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['activeMsg']->value;?>
</span>
                                <?php }?>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>
<?php }} ?>