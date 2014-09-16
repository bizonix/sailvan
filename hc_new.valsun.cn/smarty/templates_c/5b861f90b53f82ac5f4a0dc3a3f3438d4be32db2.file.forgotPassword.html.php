<?php /* Smarty version Smarty-3.1.12, created on 2014-09-05 16:54:11
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\forgotPassword.html" */ ?>
<?php /*%%SmartyHeaderCode:2176754097a33125b69-08021329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b861f90b53f82ac5f4a0dc3a3f3438d4be32db2' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\forgotPassword.html',
      1 => 1409648032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2176754097a33125b69-08021329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'flag' => 0,
    'emailAddress' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54097a3318bc40_19941172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54097a3318bc40_19941172')) {function content_54097a3318bc40_19941172($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>忘记密码</title>
<link href="../../js/form/formcss/Validform.css" rel="stylesheet" type="text/css" />
<link href="../../css/valsun.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/jquery.cookie.js"></script>
<script src="../../js/base.js"></script>
<script src="../../js/form/Validform_v1.0.js"></script>
<script src="../../js/form/forget.js"></script>
</head>

<body class="home-body-color Arial-font">
	<div class="container">
    	<div class="content">
        	<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="forgot">
                <div class="forgot-main">
                    <div class="<?php if ($_smarty_tpl->tpl_vars['flag']->value=='stepOne'){?>forgot-bg<?php }elseif($_smarty_tpl->tpl_vars['flag']->value=='thtep'){?>forgot-bg secstp-bg thtep-bg<?php }else{ ?> forgot-bg secstp-bg<?php }?>">
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['flag']->value=='stepOne'){?>
                    <div style="display:block;" class="forgotform-main">
                        <form class="forgotform" method="post" action="../index.php?mod=login&act=forgetPost">
                            <ul>
                                <li>
                                    <label class="label ali">登录邮箱：</label>
                                    <input type="text" value="" name="email" class="inputxt logintxt" datatype="e">
                                    <span class="Validform_checktip"></span>
                                </li>
                                <li>
                                    <label class="label ali">验证码：</label>
                                    <input type="text" class="captchatxt" style="width:69px" name="checkCode" />
                                    <img class="captcha for-posion" src="verify.php" />
                                    <span class="change">看不清<a href="#">换一张</a></span>
                                </li>
                                <li>
                                    <label class="label"></label>
                                    <input class="login-bt-save" type="submit" value="发送验证邮箱">
                                </li>
                            </ul>
                        </form>
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['flag']->value=='thtep'){?>
                    <div style="display:block;" class="forgotform-main">
                        <form class="thform" action="/index.php?mod=login&act=updatePassword" method="post">
                            <ul>
                                <li>
                                <label class="label ali">新密码：</label>
                                <input type="password" value="" name="userpassword" class="inputxt logintxt" datatype="*6-20">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <label class="label ali">新密码确认：</label>
                                <input type="password" value="" name="retypepassword" class="inputxt logintxt" datatype="*6-20" recheck="userpassword">
                                <span class="Validform_checktip"></span>
                            </li>
                                <li>
                                    <label class="label"></label>
                                    <input class="login-bt-save" type="submit" value="提 交">
                                </li>
                            </ul>
                        </form>
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['flag']->value=='sendEmailOk'){?>
                    <div style="display:block;" class="secstp">
                        <div class="secstp-msg">
                            	验证邮箱已发送，请您查收。
                        </div>
                        <div class="secstp-bt-main">
                            <?php if ($_smarty_tpl->tpl_vars['emailAddress']->value=='unknown'){?><?php }else{ ?><input class="login-bt-save secstp-bt" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['emailAddress']->value;?>
');" type="submit" value="登录邮箱"><?php }?>
                        </div>
                        <div class="forgotpassword-msg">
                            <img class="msg-img" src="../images/forgotPasswordIcon.gif" />
                            <div class="msg-text">
                                <p>1.收不到邮件？<br />有可能被误判为垃圾邮件了，请到垃圾邮件文件夹找找</p>
                                <p>2.邮箱不对？<a class="a-color" href="/index.php?mod=login&act=forget">换个邮箱试试</a></p>
                                <p>3.邮箱真的没问题？<a class="a-color" href="/index.php?mod=login&act=forgetPost&email=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">重发一封邮件</a></p>
                            </div>
                        </div>
                    </div>
                    <?php }elseif($_smarty_tpl->tpl_vars['flag']->value=='emailOutTime'){?>
                    <div style="display:block" class="secstp">
                        <div class="thtep-msg">
                         	   验证邮箱已过期。
                        </div>
                        <div class="secstp-bt-main">
                            <input onclick="location.href='../index.php?mod=login&act=forget';" class="login-bt-save secstp-bt" type="submit" value="重新发送">
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div style="display:block" class="secstp">
                        <div class="thtep-msg">
                         	   验证邮箱失败，存在非法地址！
                        </div>
                        <div class="secstp-bt-main">
                            <input onclick="location.href='../index.php?mod=login&act=forget';" class="login-bt-save secstp-bt" type="submit" value="重新发送">
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ('footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</body>
</html>
<?php }} ?>