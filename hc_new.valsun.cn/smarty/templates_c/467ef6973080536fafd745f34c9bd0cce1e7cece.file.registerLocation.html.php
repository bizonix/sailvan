<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 17:04:00
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\registerLocation.html" */ ?>
<?php /*%%SmartyHeaderCode:18872540979ae1407e2-96272547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '467ef6973080536fafd745f34c9bd0cce1e7cece' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\registerLocation.html',
      1 => 1409907835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18872540979ae1407e2-96272547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_540979ae1ce8e1_22710171',
  'variables' => 
  array (
    'flag' => 0,
    'email' => 0,
    'emailAddress' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540979ae1ce8e1_22710171')) {function content_540979ae1ce8e1_22710171($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册成功</title>
<link href="../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/base.js"></script>
<script src="../js/form/Validform_v1.0.js"></script>
</head>

<body class="home-body-color">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="forgot">
                <div class="forgot-main">
                    <div class="secstp">
                        <div style="color:#03b3fc; font-size:21px; margin:0 auto;" class="secstp-msg">
                            	<?php if ($_smarty_tpl->tpl_vars['flag']->value=='resendOk'){?>邮件已重发<?php }elseif($_smarty_tpl->tpl_vars['flag']->value=='resendError'){?>重发失败，请检查邮箱是否有效<?php }else{ ?>恭喜您，注册成功！<?php }?>
                        </div>
                        <div style="width:389px; margin:0 auto; padding-left:170px;font-size:15px; line-height:20px; color:#747474;">
                            <p>我们发送一封验证邮箱到<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
                            <p>验证并激活邮箱可以帮助您快速找回密码</p>
                            <p>并第一时间通知您最新服务信息</p>
                        </div>
                        <div style="margin-top:30px;" class="secstp-bt-main">
                            <input class="login-bt-save secstp-bt" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['emailAddress']->value;?>
');" type="submit" value="去登录邮箱">
                        </div>
                        <div class="forgotpassword-msg">
                            <img class="msg-img" src="/images/forgotPasswordIcon.gif" />
                            <div class="msg-text">
                                <p>1.收不到邮件？<br />有可能被误判为垃圾邮件了，请到垃圾邮件文件夹找找</p>
                                <p>2.邮箱不对？<a class="a-color" href="/index.php?mod=register&act=register">换个邮箱试试</a></p>
                                <p>3.邮箱真的没问题？<a class="a-color" href="/index.php?mod=register&act=registerLocation&email=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
&flag=resend">重发一封邮件</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>
<?php }} ?>