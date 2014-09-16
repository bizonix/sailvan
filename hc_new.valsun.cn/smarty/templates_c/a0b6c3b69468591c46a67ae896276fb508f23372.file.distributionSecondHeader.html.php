<?php /* Smarty version Smarty-3.1.12, created on 2014-09-01 12:44:31
         compiled from "E:\code2\hc_new\hc_new.valsun.cn\html\template\v1\distributionSecondHeader.html" */ ?>
<?php /*%%SmartyHeaderCode:60745403f9afad8c58-37116629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0b6c3b69468591c46a67ae896276fb508f23372' => 
    array (
      0 => 'E:\\code2\\hc_new\\hc_new.valsun.cn\\html\\template\\v1\\distributionSecondHeader.html',
      1 => 1408413496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60745403f9afad8c58-37116629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'progressInfor' => 0,
    'conf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5403f9afb8a8c9_89213488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5403f9afb8a8c9_89213488')) {function content_5403f9afb8a8c9_89213488($_smarty_tpl) {?><div class="content-top">
    <div class="content-top-padding">
        <div class="content-top-offwidth">
            <?php if ($_smarty_tpl->tpl_vars['progressInfor']->value["checkInfor"]==0){?>
            	<div class="content-top-banner content-top-sucauth">
                </div>
	            <div class="content-top-msg">
	                <p>恭喜您！已成功认证分销商！</p>
	                <a href="../index.php?mod=myEmpower&act=index">去申请授权</a>
	            </div>
	        <?php }else{ ?>
		        <div class="content-top-banner">
	                <?php echo $_smarty_tpl->tpl_vars['progressInfor']->value["progressInfor"];?>

	            </div>
	            <div class="content-top-msg">
                <p>注册分销商，即可免费申请授权</p>
                <?php if ($_smarty_tpl->tpl_vars['progressInfor']->value["basicInforProgress"]!="100%"||$_smarty_tpl->tpl_vars['progressInfor']->value["shopInforProgress"]!="100%"){?>
                <a href="#">待完善</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['progressInfor']->value["basicInforProgress"]!="100%"){?>
                <a href="../index.php?mod=distributorBasicInformation&act=index">基本信息</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['progressInfor']->value["shopInforProgress"]!="100%"){?>
                <a href="../index.php?mod=distributorBasicInformation&act=addShop">店铺资料</a>
                <?php }?>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['progressInfor']->value["checkInfor"]==6){?>
            <div id="checkButton" class="content-top-bt">
                <a href="#">申请认证分销商</a>
            </div>
            <!-- 
            <div class="content-top-bt">
            	<?php $_smarty_tpl->tpl_vars["conf"] = new Smarty_variable(C('ACCOUNT_STATUS'), null, 0);?>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['conf']->value[$_smarty_tpl->tpl_vars['progressInfor']->value["checkInfor"]];?>
</a>
            </div>
             -->
            <?php }?>
            <div style="clear:both;">
            </div>
        </div>
        <div class="content-top-ser">
            <p>我的服务：</p>
            <div class="content-top-icon">
            	<a class="api-icon<?php if (in_array(1,$_smarty_tpl->tpl_vars['progressInfor']->value['serviceInfor'])){?><?php }else{ ?>-gray<?php }?>" href="../index.php?mod=myEmpower&act=index">API</a>
                <a class="product-icon<?php if (in_array(2,$_smarty_tpl->tpl_vars['progressInfor']->value['serviceInfor'])){?><?php }else{ ?>-gray<?php }?>" href="../index.php?mod=myEmpower&act=index">产品数据包</a>
                <a class="picture-icon<?php if (in_array(3,$_smarty_tpl->tpl_vars['progressInfor']->value['serviceInfor'])){?><?php }else{ ?>-gray<?php }?>" href="../index.php?mod=myEmpower&act=index">图片系统</a>
                <a class="pa-icon<?php if (in_array(4,$_smarty_tpl->tpl_vars['progressInfor']->value['serviceInfor'])){?><?php }else{ ?>-gray<?php }?>" href="../index.php?mod=myEmpower&act=index">ebay刊登系统</a>
            </div>
        </div>
        <div style="clear:both;">
        </div>
    </div>
    <script type="text/javascript">
    $(function(){
    	$("#checkButton").on("click",function(){
    		$.ajax({ 
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=public&act=checkDistribution',
        		dataType : "json",
        		success : function(data){
        			if(data.data){
        				alert("认证成功！");
        				location.reload();
        			}else{
        				alert(data.errMsg);
        			}
        		}
        	});
    	});
    });
    </script>
</div><?php }} ?>