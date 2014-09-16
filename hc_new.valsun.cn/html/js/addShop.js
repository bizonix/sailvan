var shopIsOk = false;
var copyIsOk = false;
$(function(){
    checkIsApplyOk();
    checkVal("input","shopLisingAddress1",15,600);
    //验证账号是否已经被其他分销商使用
    if($.trim($("input[name=shopAccount1]").val())){
    	shopIsOk = true;
    }
    $("input[name=shopAccount1]").on("blur",function(){
    	var thisObj = $(this);
    	var val 	= 	$.trim($(this).val());
    	var regexp 	= 	/^[0-9a-zA-Z]*$/g; 
    	var flag	=	regexp.test(val);
    	if(!flag){
    		thisObj.next("p").remove();
    		thisObj.after('<p style="color:red">账号只能为字母和数字组合</p>');
			shopIsOk = false;
    	}else{
    		//去后台判断是否已经有其他分销商存在此账号
    		var updateFlag 		= $.trim($("input[name=updateFlag]").val());
    		if(updateFlag == 'updateShopInfo') return;
    		
    		var siteId 		= $.trim($("select[name=siteId]").val());
    		if(!siteId) siteId = 0;
    		var platFormId 	= $.trim($('select[name=shopPlat1]').val());
        	$.ajax({
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=distributorBasicInformation&act=checkShopIsExistPost',
        		dataType : "json",
        		data  :	{"shopAccount":val,"siteId":siteId,"platFormId":platFormId},
        		success : function(data){
        			if(data.data == '1'){
        				thisObj.next("p").remove();
        				thisObj.after('<p style="color:red">已经有分销商添加了该店铺，如有疑问请联系我们的客服！</p>');
        				shopIsOk = false;
        			}else if(data.data == '2'){
        				thisObj.next("p").remove();
        				thisObj.after('<p style="color:red">同一平台下已经存在相同站点的店铺账号了！</p>');
        				shopIsOk = false;
        			}else{
        				shopIsOk = true;
        				thisObj.next("p").remove();
        			}
        		}
        	});
        	//去后台判断是否已经有存在此账号(其他站点)
        	if(shopIsOk&&!copyIsOk){
        		if($("select[name='shopPlat1']").val() == 1){
        			$.ajax({
    	        		type  : "POST",
    	        		async : false,
    	        		url	  : '../index.php?mod=distributorBasicInformation&act=getExistShopInfo',
    	        		dataType : "json",
    	        		data  :	{"shopAccount":val},
    	        		success : function(data){
    	        			if(data.data){
    	        				if(!confirm("系统已经有该店铺了，是否复制账号信息？")){
    	                			return false;
    	                		}
    	        				//$("select[name='shopPlat1']").val();
    	        				$("input[name='bigPaypal1']").val(data.data['b_paypal_account']);
    	        				$("input[name='smallPaypal1']").val(data.data['s_paypal_account']);
    	        				$("a[name='watermark']").attr('href',data.data['shop_watermark']);
    	        				$("input[name='shopToken1']").val(data.data['apply_listing_config'][0]['userToken']);
    	        				$("input[name='siteID1']").val(data.data['apply_listing_config'][0]['siteID']);
    	        				$("input[name='devID1']").val(data.data['apply_listing_config'][0]['devID']);
    	        				$("input[name='appID1']").val(data.data['apply_listing_config'][0]['appID']);
    	        				$("input[name='certID1']").val(data.data['apply_listing_config'][0]['certID']);
    	        				$("input[name='serverUrl1']").val(data.data['apply_listing_config'][0]['serverUrl']);
    	        			}
    	        		}
    	        	});
        		}
        	}
    	}
    });
    //点击保存时保存店铺信息
    $("input[name=saveShopInfo]").on("click",function(){
    	if(shopIsOk){
    		$.ajax({
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=distributorBasicInformation&act=addShopPost&flag=saveInfo',
        		dataType : "json",
        		data  :	$(this).parent().parent().parent().serialize(), 
        		success : function(data){
        			if(data.data.save){
        				alert("保存成功！");
        				location.href = '../index.php?mod=distributorBasicInformation&act=addShop&flag=updateShopInfo&shopId='+data.data.save;
        			}else{
        				alert(data.errMsg);
        			}
        		}
        	});
    	}else{
    		alert("请填写正确的店铺信息！");
    	}
    });
    
    //点击保存并继续添加时
    $("input[name=saveShopInfoAndGoOn]").on("click",function(){
    	var formObj = $(this).parent().parent().parent();
    	var shopPlat     =   $.trim($('select[name=shopPlat1]').val());//平台ID
    	if(shopIsOk){
    		$.ajax({ 
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=distributorBasicInformation&act=addShopPost&flag=saveInfo',
        		dataType : "json",
        		data  :	formObj.serialize(),
        		success : function(data){
        			if(data.data.save){
        				location.href = '../index.php?mod=distributorBasicInformation&act=addShop&platForm='+shopPlat;
        			}else{
        				alert(data.errMsg);
        			}
        		}
        	});
    	}else{
    		alert("请填写正确的店铺信息！");
    	}
    });
    
    
  //点击申请刊登授权时
    $("input[name=applyListing]").on("click",function(){
    	
    	if(shopIsOk){
	    	if($(this).attr("role-flag") == "applyCheck"){   //点击申请认证时
	    		var checkFlag = false;
	    		if(!$("#checkButton").attr("id")){
	    			checkFlag = true;

	    			alert("你已经是认证分销商");
	    		}else{

	    			$.ajax({ 
	            		type  : "POST",
	            		async : false,
	            		url	  : '../index.php?mod=distributorBasicInformation&act=addShopPost&flag=saveInfo&checkFlag=checkDistributor',
	            		dataType : "json",
	            		data  :	$(this).parent().parent().parent().serialize(), 
	            		success : function(data){
	            			if(data.data.check){
	            				checkFlag = true;
	            				alert("认证分销商成功");
	            				$("input[name=applyListing]").attr({"role-flag":"applyListing","class":"addshops-bt-add"}).val("申请刊登授权");
	            				$("#checkButton").remove();
	            			}else{
	            				alert(data.errMsg);
	            			}
	            		}
	            	});
	    		}
	    		if(checkFlag){
	    			var shopPlat	=   $.trim($('select[name=shopPlat1]').val());
	    			if(shopPlat == 1){
	    				$("input[name=applyListing]").attr({"role-flag":"applyListing","class":"addshops-bt-add"}).val("申请刊登授权");
	    				$("#checkButton").remove();
	    			}else{
	    				$("input[name=applyListing]").attr({"role-flag":"applyListing","disabled":true,"class":"addshops-bt-onlyread"}).val("申请刊登授权");
	    				$("#checkButton").remove();
	    			}
	    		}
	    	}else{   //点击申请刊登授权时
	    		var shopPlat	=   $.trim($('select[name=shopPlat1]').val());
				if(shopPlat == 1){
		    		$.ajax({ 
		        		type  : "POST",
		        		async : false,
		        		url	  : '../index.php?mod=distributorBasicInformation&act=addShopPost&flag=applyListing',
		        		dataType : "json",
		        		data  :	$(this).parent().parent().parent().serialize(), 
		        		success : function(data){
		        			if(data.data.save){
		        				alert("我们将在2-3个工作日内完成审核，如通过，将获得授权凭证，即可快速铺货~");
		        				location.href="../index.php?mod=distributorBasicInformation&act=shopInfo";
		        			}else{
		        				alert(data.errMsg);
		        			}
		        		}
		        	});
				}else{
					alert("该平台暂时不开放刊登系统");
				}
	    	}
    	}else{
    		alert("请填写正确的店铺信息！");
    	}
    });
    //设置不运送国家
    var nowSiteId = '0';
    $("#setExcludeCountry").on("click",function(){
    	if($(".empower-box-msg").find("label").size()>0 && $("select[name=siteId]").val() == nowSiteId){
    		$("#dialog").css("display","block");
    	}else{
    		if($("select[name=siteId]").val() != "-"){
    			//获取已选
    			var hasChecked = $("#noShippingCountry").find(":checkbox");
    			nowSiteId	   = $("select[name=siteId]").val();
    			$.ajax({
            		type  : "POST",
            		async : false,
            		url	  : '../index.php?mod=distributorBasicInformation&act=getExcludeCountryPost',
            		dataType : "json",
            		data  :	{"siteId":$("select[name=siteId]").val()}, 
            		success:	function(ret){
            			var dat	=	ret.data;
            			var html	=	'';
            			for(var i in dat){
            				var label	=	i;
            				var detail	=	dat[i];
            				html += '<div class="empower-box-line">';
            				if(label == 'Worldwide') continue;
            				var isAllExit    = true;
            				var innerContent = '';
            				for(var k=0; k<detail.length; k++){
            					innerContent += '<label><input name="noShippingCountry1[]"';
            					var isIn = false;
            					hasChecked.each(function(){
            						if($(this).val() == detail[k]["Location"]) {
            							innerContent += ' checked = "checked" ';
            							isIn = true;
            						}
            					});
            					if(!isIn){
            						isAllExit = false;
            					}
            					innerContent += ' type="checkbox" value="'+detail[k]["Location"]+'"><sm>'+detail[k]["Description"]+'</sm></label>';
            				}
            				
            				if(isAllExit){
            					html += '<div class="empower-main-name"><input type="checkbox" name="noShippingCategory" checked="checked"> <strong>'+label+'：</strong></div>';
            				}else{
            					html += '<div class="empower-main-name"><input type="checkbox" name="noShippingCategory"> <strong>'+label+'：</strong></div>';
            				}
            				html += '<div class="empower-main-text">';
            				html += innerContent;
            				html += '</div>';
            				html += '<div class="clear"></div>';
            				html += '</div>';
            			}
            			$(".empower-box-msg").find("div[role-name!=submitButton]").remove();
            			$(".empower-box-msg").prepend(html);
            			$("#dialog").css("display","block");
            		}
            	});
    		}else{
    			alert("请选择站点");
    		}
    	}
    });
    $("input[name=noShippingCategory]").live("click",function(){
    	if($(this)[0].checked){
    		$(this).parent().next().find(":checkbox").attr("checked", true);;
    	}else{
    		$(this).parent().next().find(":checkbox").attr("checked", false);;
    	}
    });
    $("#bt_1").on('click',function(){
    	var obj = $(this).parent().siblings().find(":checkbox");
    	var isFirstCheck = true;
    	$("#noShippingCountry").find("label").remove();
    	obj.each(function(){
    		if($(this)[0].checked && $(this).attr("name")!="noShippingCategory") {
    			var checkObj = $(this).parent().clone(true);
    			checkObj.find(":checkbox").attr("style","display:none;");
    			if(isFirstCheck){
    				isFirstCheck = false;
    				checkObj.find("sm").text(checkObj.find("input").val());
    			}else{
    				checkObj.find("sm").text(","+checkObj.find("input").val());
    			}
    			checkObj.appendTo($("#noShippingCountry"));
    		}
    	})
    	$("#dialog").css("display","none");
    });
    
    //选择非ebay平台时自动隐藏刊登申请输入框
    $("select[name=shopPlat1]").on("change",function(){
    	if($("div[role-plat-form]").attr("role-plat-form") != 1 && $("select[name=shopPlat1]").val() == 1){
    		location.href = "../index.php?mod=distributorBasicInformation&act=addShop";
    	}else if($(this).val() != 1){
    		$(this).parent().nextAll("div[name=dataDiv]").hide();
    		$("select[name=siteId]").hide();
    	}else{
    		$(this).parent().nextAll("div[name=dataDiv]").show();
    		$("select[name=siteId]").show();
    	}
    	eventTouched();  //触发事件
    	checkTextIsFull();
    });
    
    //选择站点时拉取运送国家
    $("select[name=siteId]").on("change",function(){
    	getShippingCountry();
    	$("#noShippingCountry").find("label").remove();
    	$("input[name=siteID1]").val($(this).val());
    	eventTouched();  //触发事件
    });
    if($("select[name=shopPlat1]").val() == 1){
    	getShippingCountry();
    }
});

//拉取运送国家
function getShippingCountry(){
	$.ajax({
		type  : "POST",
		async : false,
		url	  : '../index.php?mod=distributorBasicInformation&act=getShipCountryPost',
		dataType : "json",
		data  :	{"siteId":$("select[name=siteId]").val()}, 
		success:	function(ret){
			var dat	=	ret.data;
			var html	=	'';
			if(dat.length > 0){
				//获取已经选中的
				var hasShippingCountry  = $("input[name=hideShippCountry]");
				var shippingCountryNums = hasShippingCountry.length;
				for(var i in dat){
					var label	=	i;
					var detail	=	dat[i];
					html += '<label><input name="shippingCountry1[]" type="checkbox"';
					if(shippingCountryNums > 0){
						hasShippingCountry.each(function(){
							if($(this).val() == detail.location){
								html += ' checked="checked" ';
							}
						});
					}
					html += ' value="'+detail.location+'">'+detail.desciption+'</label>';
				}
			}else{
				html += '<label style="color:red;">无运送国家</label>';
			}
			$(".content-mid-rightcont").find("label").remove();
			$(".content-mid-rightcont").prepend(html);
		}
	});
}


//验证输入框长度限制
function checkVal(item,name,start,end){
	$(item+'[name='+name+']').blur(function(){
		if($(this).val().length == 0){
			$(this).next("p").remove();
		}else if($(this).val().length < start ){
			$(this).next("p").remove();
			$(this).after('<p style="color:red">字符数应在 '+start+'~'+end+' 之间</p>');
		}else{
			$(this).next("p").remove();
		}
	});
}

//验证是否可以申请认证分销商

function checkIsApplyOk(){
	if($("#checkButton").attr("id")){
		$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyCheck","class":"addshops-bt-onlyread"}).val("申请认证");
    }else{
    	$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyListing","class":"addshops-bt-onlyread"}).val("申请刊登授权");
    }
	checkTextIsFull();
	$("input[name=shopAccount1],input[name=shopLisingAddress1],input[name=bigPaypal1],input[name=smallPaypal1],select[name=shopPlat1]").blur(function(){
		checkTextIsFull();
	});
}

//验证
function checkTextIsFull(){
	var shopPlat1               =   $.trim($('select[name=shopPlat1]').val());//平台ID
	var siteId  	            =   $.trim($('select[name=siteId]').val());//站点ID
	var shopAccount1           	=   $.trim($('input[name=shopAccount1]').val());//店铺账号
	var shopLisingAddress1     	=   $.trim($('input[name=shopLisingAddress1]').val());//店铺listing的地址
	var bigPaypal1    			=   $.trim($('input[name=bigPaypal1]').val());//大paypal
	var smallPaypal1			=   $.trim($('input[name=smallPaypal1]').val());//小paypal
	if(shopPlat1 == 1){
		if($("#checkButton").attr("id")){
			if(shopAccount1 && shopLisingAddress1 && bigPaypal1 && smallPaypal1){
				$("input[name=applyListing]").attr({"disabled":false,"role-flag":"applyCheck","class":"addshops-bt-add"}).val("申请认证");
			}else{
				$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyCheck","class":"addshops-bt-onlyread"}).val("申请认证");
			}
		}else{
			if(shopAccount1 && shopLisingAddress1 && bigPaypal1 && smallPaypal1){
				$("input[name=applyListing]").attr({"disabled":false,"role-flag":"applyListing","class":"addshops-bt-add"}).val("申请刊登授权");
			}else{
				$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyListing","class":"addshops-bt-onlyread"}).val("申请刊登授权");
			}
		}
	}else{
		if($("#checkButton").attr("id")){
			if(shopAccount1 && shopLisingAddress1){
				$("input[name=applyListing]").attr({"disabled":false,"role-flag":"applyCheck","class":"addshops-bt-add"}).val("申请认证");			
			}else{
				$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyCheck","class":"addshops-bt-onlyread"}).val("申请认证");
			}
		}else{
			$("input[name=applyListing]").attr({"disabled":true,"role-flag":"applyListing","class":"addshops-bt-onlyread"}).val("申请刊登授权");
		}
	}
}
function GetLength(str) {
    ///<summary>获得字符串实际长度，中文2，英文1</summary>
    var realLength = 0, len = str.length, charCode = -1;
    for (var i = 0; i < len; i++) {
        charCode = str.charCodeAt(i);
        if (charCode >= 0 && charCode <= 128) realLength += 1;
        else realLength += 2;
    }
    return realLength;
}
 function eventTouched(){
	 var evt = document.createEvent("MouseEvents");
	 evt.initEvent("blur",true,true);  //keyup或者onkeyup。。
	 $("input[name=shopAccount1]")[0].dispatchEvent(evt);
 }
