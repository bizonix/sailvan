<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 11:38:39
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\login.html" */ ?>
<?php /*%%SmartyHeaderCode:203575403ea3f2d5f41-10009893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b21af07bb40e9b4509d9a2c76819e1458082352' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\login.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203575403ea3f2d5f41-10009893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activeMsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5403ea3f38d9d9_27567054',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403ea3f38d9d9_27567054')) {function content_5403ea3f38d9d9_27567054($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/form/login.js"></script>
</head>

<body class="Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="login">
                <div class="login-main">
                    <?php if ($_smarty_tpl->tpl_vars['activeMsg']->value){?>
                        <span class="login-fg"><?php echo $_smarty_tpl->tpl_vars['activeMsg']->value;?>
</span>
                    <?php }?>
                    <span class="login-main-title">登录账号</span>
                    <form class="registerform" action="../index.php?mod=login&act=loginPost" method="post">
                        <ul>
                            <li>
                                <label class="label ali">邮箱：</label>
                                <input type="text" value="" name="useremail" class="inputxt logintxt" datatype="e">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">密码：</label>
                                <input type="password" value="" name="userpassword" class="inputxt logintxt" datatype="*6-20">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">验证码：</label>
                                <input type="text" name="checkCode" class="captchatxt" />
                                <img class="captcha" src="verify.php" />
                                <span class="change">看不清<a href="#">换一张</a></span>
                            </li>
                            <li>
                                <label class="label"></label>
                                <input class="login-bt-save" type="submit" value="登 录">
                                <span class="forget-span-width">
                                    <a class="forget" href="../index.php?mod=login&act=forget">忘记密码?</a>
                                    <br />
                                    <span class="forget-span-msg">新注册用户登录，可免费申请获取授权</span>
                                </span><br/>
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