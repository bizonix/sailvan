<?php /* Smarty version Smarty-3.1.12, created on 2014-08-26 10:53:00
         compiled from "E:\code\fenxiao\hc_new.valsun.cn\html\template\v1\registered.html" */ ?>
<?php /*%%SmartyHeaderCode:23653fbf68c94ab49-91679071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1efa1dbb208aee8cc336bd9d354e103982ff74f5' => 
    array (
      0 => 'E:\\code\\fenxiao\\hc_new.valsun.cn\\html\\template\\v1\\registered.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23653fbf68c94ab49-91679071',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_53fbf68c9834d3_89105491',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fbf68c9834d3_89105491')) {function content_53fbf68c9834d3_89105491($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/form/registered.js"></script>
</head>

<body class="home-body-color Arial-font">
	<div class="container" style="position:relative;height:100%;">
    	<div class="content" style="height:100%;">
    		<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="registered">
                <div class="registered-main">
                    <form class="register-main-form" method="post" action="../index.php?mod=register&act=registerPost" checkData>
                        <ul>
                            <li>
                                <label class="label ali">邮箱：</label>
                                <input type="text" value="" name="email" class="inputxt logintxt" datatype="e">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">密码：</label>
                                <input type="password" value="" name="userpassword" class="inputxt logintxt" datatype="*6-20">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">确认密码：</label>
                                <input type="password" value="" name="repassword" class="inputxt logintxt" datatype="*6-20">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">验证码：</label>
                                <input type="text" class="captchatxt" name="checkCode" />
                                <img src="verify.php" class="captcha register-postion" />
                                <span class="change">看不清<a href="#">换一张</a></span>
                                <div class="agreed-pstion">
                                    <label class="agreed">
                                        <input name="isAgree" checked="checked" type="checkbox" />已阅读并同意&nbsp;<a target="_blank" href="http://developer.valsun.cn/index.php?mod=developerDoc&act=developerProtocol">华成平台开发者注册协议</a>
                                    </label>
                                    <span class="Validform_checktip"></span>
                                </div>
                            </li>
                            <li class="register-bt-top">
                                <label class="label"></label>
                                <input id="regbt" class="login-bt-save" type="submit" value="注 册">
                                <span class="already">已有账号？<a class="forget" href="../index.php?mod=login&act=login">立即登录</a></span>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <div id="suctk" class="suc-box">
            <div class="suc-main">
                <a href="#" class="close-suc-box"></a>
                <div class="suc-box-main">
                    <p><b id="val">3</b>s后自动跳转</p>
                    <p>激活邮箱后，即可登录申请分销商</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php }} ?>