$(function(){
	//API接口开放
	$("a[name='apiShowDialog']").on("click",function(){
		setShowDialog('api_open');
	}); 
	//产品数据包开放服务
	$("a[name='pcDataShowDialog']").on("click",function(){
		setShowDialog('pc_data_open');
	});
	//图片系统开放
	$("a[name='picSysShowDialog']").on("click",function(){
		setShowDialog('pic_sys_open');
	});
	//ebay系统开放
	$("a[name='ebaySysShowDialog']").on("click",function(){
		setShowDialog('ebay_sys_open');
	});
	$(".describe-hide-box").click(function(){
      $(".empower-box-shade").hide();
	});
});
function setShowDialog(submitType){
	//隐藏三类对话框
	$("#dialog").hide();//申请对话框
	$("#dialog1").hide();//结果显示对话框
	$("#dialog2").hide();//调整对话框
	var title			=	'';
	var leftContent		=	'';
	var rightContent	=	'';
	var button1			=	'';
	var button2			=	'';
	var rightContent1	=	'';
	var rightContent2	=	'';
	var leftContent1	=	'';
	var leftContent2	=	'';
	//判断是否是已经授权
	var Authentication	=	getAuthentication();
	if(Authentication===false||Authentication=='4'||Authentication=='5'){
		//失败跳转
		title			=	"非法用户";
		rightContent	=	"请先完成注册并且完善信息";
		button1			=	"type1";
		button2			=	"type1";
		iniDialog1(title,rightContent,button1,button2);
		$("#dialog1").show();
		return ;
	}else if(Authentication=='6'){//未授权
		title			=	"您的信息不完善，暂不能申请授权";
		rightContent	=	"1、完善基本信息页面相关资料，且至少添加一个在线店铺<p>2、提交即可认证";
		button1			=	"type4";
		button2			=	"type1";
		iniDialog1(title,rightContent,button1,button2);
		$("#dialog1").show();
		return ;
	}
	//判断是否已经设置意向分类
	var intentionProducts	=	getIntentionProducts();
	var status	=	getStatusById(submitType);
	if(!intentionProducts){
		if(submitType=='ebay_sys_open'){
			if(status=='1'){
				title			=	"申请授权-ebay刊登系统";
				leftContent	=	"意向类目：";
				rightContent	=	getCategoryHTML();
				leftContent1	=	"申请店铺：";
				rightContent1	=	getShopHTML();
				if(rightContent1==''){
					title			=	"您的信息不完善，暂不能申请授权";
					rightContent	=	"1、完善基本信息页面相关资料，且至少添加一个在线ebay店铺<p>2、提交即可认证";
					button1			=	"type1";
					button2			=	"type4";
					iniDialog1(title,rightContent,button1,button2);
					$("#dialog1").show();
					return ;
				}
				button1			=	"type9";
				//首次
				iniDialog3(title,leftContent,rightContent,leftContent1,rightContent1,button1,submitType);
				$("#dialog3").show();
			}else if(status=='2'){
				title			=	"申请授权-ebay刊登系统";
				leftContent	=	"意向类目：";
				rightContent	=	getCategoryHTML();
				leftContent1	=	"";
				rightContent1	=	'';
				button1			=	"type9";
				//首次
				iniDialog3(title,leftContent,rightContent,leftContent1,rightContent1,button1,submitType);
				$("#dialog3").show();
			}
		}else{
			title		=	"申请授权-【接口名称】";
			leftContent	=	"意向类目：";
			rightContent=	getCategoryHTML();
			button1		=	"type3";
			//首次
			iniDialog(title,leftContent,rightContent,button1,submitType);
			$("#dialog").show();
		}
	}else{

		//查询当前状态
		var status	=	getStatusById(submitType);
		switch(status){
			case '1' ://非第一次  未申请
				if(submitType=='ebay_sys_open'){
					title		=	"申请授权-ebay刊登系统";
					leftContent	=	"申请店铺：";
					rightContent=	getShopHTML();
					if(rightContent==''){
						title			=	"您的信息不完善，暂不能申请授权";
						rightContent	=	"1、完善基本信息页面相关资料，且至少添加一个在线ebay店铺<p>2、提交即可认证";
						button1			=	"type1";
						button2			=	"type4";
						iniDialog1(title,rightContent,button1,button2);
						$("#dialog1").show();
						return ;
					}
					button1		=	"type10";
				}else{
					title			=	"确定提交审核吗?";
					rightContent	=	"我们将在2-3个工作日内完成审核，结果会通知您，请注意查看！<p>如通过，将获得授权凭证，即可快速铺货~";
					button1			=	"type1";
					button2			=	"type6";
				}
				break;
			case '2'://待审核
				title			=	"已提交申请，资料审核中...";
				rightContent	=	"我们将在2-3个工作日内完成审核，结果会通知您，请注意查看！<p>如通过，将获得授权凭证，即可快速铺货~";
				button1			=	"type1";
				button2			=	"type12";
				break;
			case '3'://查看授权
				title			=	"恭喜您，已获得授权";
				rightContent	=	"可分销类目："+getIntentionProductsDetail()+"(适用所有授权)";
				rightContent	+=	getReapplyButton(submitType)+"<p>"
				rightContent	+=	getAccountAndPwd(submitType);
				button1			=	"type1";
				button2			=	"type5";
				break;
			case '4'://未通过
				title			=	"很遗憾，暂未通过申请";
				rightContent	=	"未通过原因："+getReason(submitType);
				button1			=	"type7";
				button2			=	"type8";
				break;
		}
		if(submitType=='ebay_sys_open'&&status=='1'){
			iniDialog(title,leftContent,rightContent,button1,submitType);
			$("#dialog").show();
			
		}else{
			iniDialog1(title,rightContent,button1,button2,submitType);
			$("#dialog1").show();
		}
	}
}
//申请对话框
function iniDialog(title,leftContent,rightContent,button,submitType){
	$("#title").html(title);//对话框头部
	$("#leftContent").html(leftContent);//对话框左边
	$("#rightContent").html(rightContent);//对话框内容
	buttonTypeChoose(button,"bt_1",submitType);
}
//申请对话框2 ebay刊登
function iniDialog3(title,leftContent1,rightContent1,leftContent2,rightContent2,button,submitType){
	$("#title").html(title);//对话框头部
	$("#leftContent3_1").html(leftContent1);//对话框左边
	$("#rightContent3_1").html(rightContent1);//对话框内容
	$("#leftContent3_2").html(leftContent2);//对话框左边
	$("#rightContent3_2").html(rightContent2);//对话框内容
	buttonTypeChoose(button,"bt3_1",submitType);
}
//结果显示对话框
function iniDialog1(title,rightContent,button1,button2,submitType){
	$("#title1").html(title);//对话框头部
	$("#rightContent1").html(rightContent);//对话框内容
	buttonTypeChoose(button1,"bt1_1",submitType);
	buttonTypeChoose(button2,"bt1_2",submitType);
}
//调整对话框
function iniDialog2(content1,content2,button,submitType){
	$("#rightContent2_1").html(content1);//对话框左边
	$("#rightContent2_2").html(content2);//对话框内容
	buttonTypeChoose(button,"bt2_1",submitType);
}
//
function buttonTypeChoose(type,id,submitType){
	switch(type){
		case 'type1'://去除按钮
			$("#"+id).css("display","none");
			break;
		case 'type2'://返回按钮
			$("#"+id).val("返回");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$(".empower-box-shade").hide();
			});
			break;
		case 'type3'://第一次 提交意向分类按钮
			$("#"+id).val("提交");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=updateIntentionProducts&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					data	: $("#intentionProductsForm").serialize(),
					success	: function(ret){
						alert(ret.errMsg);
						if(ret.errCode=='200'){
							window.location.reload(true);
						}
					}
				});
				//$(".empower-box-shade").hide();
			});
			break;
		case 'type4'://跳转基本信息页面
			$("#"+id).val("去完善信息");
			$("#"+id).on("click",function(){
				window.location.href="index.php?mod=distributorBasicInformation&act=index";
			});
			break;
		case 'type5'://查看
			switch(submitType){
				case 'api_open':
					$("#"+id).val("去申请");
					$("#"+id).off("click");
					$("#"+id).on("click",function(){
						window.location.href="index.php?mod=api&act=myApi";
						$(".empower-box-shade").hide();
					});
					break;
				case 'pc_data_open':
					$("#"+id).val("去下载");
					$("#"+id).off("click");
					$("#"+id).on("click",function(){
						window.location.href="index.php?mod=myEmpower&act=gotoDown&jsonp=1&token=2";
						$(".empower-box-shade").hide();
					});
					break;
				case 'pic_sys_open':
					$("#"+id).val("进入图片系统");
					$("#"+id).off("click");
					$("#"+id).on("click",function(){
						window.open("http://pics.valsun.cn"); 
						//window.location.href="http://pics.valsun.cn";
						$(".empower-box-shade").hide();
					});
					break;
				case 'ebay_sys_open':
					$("#"+id).val("进入刊登系统");
					$("#"+id).off("click");
					$("#"+id).on("click",function(){
						window.open("http://pa.valsun.cn"); 
						//window.location.href="http://pa.valsun.cn";
						$(".empower-box-shade").hide();
					});
					break;
			}
			break;
		case 'type6'://非首次 申请
			$("#"+id).val("确定");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=updateStatus&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					success	: function(ret){
						if(ret.errCode=='200'){
							alert("提交成功");
							window.location.reload(true);
						}else{
							alert("失败");
						}
					}
				});
			});
			break;
		case 'type7'://重新申请
			$("#"+id).val("重新申请");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=updateStatus&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					success	: function(ret){
						alert(ret.errMsg);
						if(ret.errCode=='200'){
							window.location.reload(true);
						}
					}
				});
			});
			break;
		case 'type8':
			$("#"+id).val("去修改分销商资料");
			$("#"+id).on("click",function(){
				window.location.href="index.php?mod=distributorBasicInformation&act=shopInfo";
			});
			break;
		case 'type9':
			$("#"+id).val("提交");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=updateIntentionProductsAndShop&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					data	: $("#intentionProductsAndShopForm").serialize(),
					success	: function(ret){
						alert(ret.errMsg);
						if(ret.errCode=='200'){
							window.location.reload(true);
						}
					}
				});
			});
			break;
		case 'type10':
			$("#"+id).val("提交");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=updateIntentionShop&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					data	: $("#intentionProductsForm").serialize(),
					success	: function(ret){
						alert(ret.errMsg);
						if(ret.errCode=='200'){
							window.location.reload(true);
						}
					}
				});
			});
			break;
		case 'type11':
			$("#"+id).val("提交");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$.ajax({
					type	: 'POST',
					async	: false,
					url		: 'index.php?mod=myEmpower&act=adjustmentIntention&jsonp=1&token=2&type='+submitType,
					dataType: "json",
					data	: $("#adjustmentForm").serialize(),
					success	: function(ret){
						if(ret.errCode=='200'){
							alert("提交成功");
							window.location.reload(true);
						}else{
							alert("提交失败");
						}
					}
				});
			});
			break;
		case 'type12':
			$("#"+id).val("确定");
			$("#"+id).off("click");
			$("#"+id).on("click",function(){
				$(".empower-box-shade").hide();
			});
			break;
	}
}
function getAuthentication(){
	var status	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getAuthentication&jsonp=1&token=2',
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				status	=	ret.data['status'];
			}else{
				status	=	false;
			}
		}
	});
	return status;
}
function getIntentionProducts(){
	var status	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getIntentionProducts&jsonp=1&token=2',
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				status	=	ret.data['status'];
			}else{
				status	=	false;
			}
		}
	});
	return status;
}
function getCategoryHTML(){
	var html	=	'';
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getCategory&jsonp=1&token=2',
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				for(var i in ret.data){
					html	+=	'<label><input type="checkbox" value="'+i+'" name="intentionProducts[]">'+ret.data[i]+'</label>';
				}
			}else{
				html	=	'';
			}
		}
	});
	return html;
}
function getStatusById(submitType){
	var status	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getStatus&jsonp=1&token=2&type='+submitType,
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				status	=	ret.data;
			}else{
				status	=	false;
			}
		}
	});
	return status;
}
function getAccountAndPwd(submitType){
	var html	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getAccountAndPwd&jsonp=1&token=2&type='+submitType,
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				switch(submitType){
					case 'pic_sys_open':
					case 'ebay_sys_open':
						html	=	"登录账号:"+ret.data[0]+" 登录密码:"+ret.data[1];
						break;
					case 'api_open':
						html	=	"token:"+ret.data[0]+"<p>appKey:"+ret.data[1];
						break;
					case 'pc_data_open':
						html	=	"下载账号:"+ret.data[0]+"  密码:"+ret.data[1];
						break;
				}
			}else{
				html	=	"";
			}
		}
	});
	return html;
}
function getIntentionProductsDetail(){
	var html	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getIntentionProductsDetail&jsonp=1&token=2',
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				html	=	ret.data;
			}else{
				html	=	'';
			}
		}
	});
	return html;
}
function getReason(submitType){
	var html	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getReason&jsonp=1&token=2&type='+submitType,
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				html	=	ret.data;
			}else{
				html	=	'';
			}
		}
	});
	return html;
}
function getShopHTML(){
	var html	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=myEmpower&act=getShop&jsonp=1&token=2',
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				for(var i in ret.data){
					html	+=	'<label style="word-break:break-all; word-wrap:break-word;"><input type="checkbox" value="'+ret.data[i]['id']+'" name="shop[]">'+ret.data[i]['shop_account']+'</label>';
				}
			}else{
				html	=	'';
			}
		}
	});
	return html;
}
function getReapplyButton(submitType){
	var html	=	'';
	//html	=	'<button onclick="reApply(\''+submitType+'\')">申请调整</button>';
	return html;
}
function reApply(submitType){
	$("#dialog").hide();//申请对话框
	$("#dialog1").hide();//结果显示对话框
	var rightContent1	=	getIntentionProductsDetail();
	var rightContent2	=	getCategoryHTML();
	var button			=	'type11';
	//var rightContent3	=	"";
	iniDialog2(rightContent1,rightContent2,button,submitType);
	$("#dialog2").show();//调整对话框
	
}