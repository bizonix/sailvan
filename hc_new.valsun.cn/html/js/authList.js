$(function(){
	var divs = ['Pc','API','Pic','Ebay'];
	$.each(divs,function(i,n){
		$('#expand'+n).on('click',function(){
			if($('#'+n+'Div').css('display')=='none'){
				$(this).html('-收起');
				$('#'+n+'Div').show();
			}else{
				$(this).html('+展开');
				$('#'+n+'Div').hide();
			}
		});
	});
	$('#dialog1').dialog({
		buttons:[{text:'确定',click:function(){audit($('#field').val(),4);}},{text:'取消',click:function(){$(this).dialog('close')}}],
		autoOpen:false
	});
	$('#saveDevInfo1').on('click',function(){
		saveDevInfo(1);
	});
	$('#saveDevInfo2').on('click',function(){
		var errStr='';
		if($("[name='ftp_url']").val() == ''){
			errStr  += "请先填写下载链接!\r\n";
		}
		if($("[name='ftp_pwd']").val() == ''){
			errStr  += '请先填写密码!';
		}
		if(errStr != ''){
			alert(errStr);
			return false;
		}
		saveDevInfo(2);
	});
	$('#saveDevInfo3').on('click',function(){
		saveDevInfo(3);
	});
	$('#saveDevInfo4').on('click',function(){
		saveDevInfo(4);
	});
	$('.changeStatus').on('click',function(){
		var field 	= $(this).attr('name');
		var value	= $(this).attr('status');
		if($('#level').val()==''){
			$('#level').focus();
			return false;
		}
		if($('#money').val()==''){
			$('#money').focus();
			return false;
		}
		if($('#credit_line').val()==''){
			$('#credit_line').focus();
			return false;
		}
		if(field == 'pc_data_open'){
			var errStr='';
			if(value==3){
				if($("[name='ftp_url']").val() == ''){
					errStr  += "请先填写下载链接!\r\n";
				}
				if($("[name='ftp_pwd']").val() == ''){
					errStr  += '请先填写密码!';
				}
				if(errStr != ''){
					alert(errStr);
					return false;
				}
			}
			$.ajax({
				type	: 'POST',
				async	: false,
				url		: 'index.php?mod=develop&act=saveDev&jsonp=1&token=2',
				data	: $('#developInfo2').serialize(),
				dataType: "json",
				success	: function(ret){
					if(ret.errCode!="200"){
						alert(ret.errMsg);
					}
				}	
			});
		}
		if(value==4){
			$('#field').val(field);
			$('#dialog1').dialog('open');
			return false;
		}
		audit(field,value);
		
	});
	$('#resetToken').on('click',function(){
		resetToken();
	});
	$('#datepicker').on('focus',function(){
		WdatePicker({skin:'default',startDate:'%Y-%M-%d',dateFmt:'yyyy-MM-dd H:m:s',alwaysUseStartDate:true});
	});
})
function resetToken(){
	$.ajax({
		type	: 'GET',
		async	: false,
		url		: 'index.php?mod=develop&act=resetToken&jsonp=1&token=2',
		success	: function(ret){
			$('#token').val(ret.data);
		}	
	});
}
function audit(field,value){
	
	var json	= {};
	json[field]	= value;
	json['dpId']= getDpId();
	if(value==4){
		if($('#reason').val()==''){
			alert('请填写不通过原因！');
			$('#reason').focus();
			return false;
		}
		if($('#manager_message').val() == ''){
			var message	= {};
			message	= $('#reason').val();
			json['manager_message']	 = message;
		}else{
			var message = $.parseJSON($('#manager_message').val());
			message	= $('#reason').val();
			json['manager_message']	 = message;	
		}
		changeOpenServiceStatus(json);
	}else{
		if(!getIntentionProducts(getDpId())){
			alert("无分销类目");
			return false;
		}
		//整合鉴权
		var flag	=	"";
		if(field=='pic_sys_open'){
			flag	=	'Picture';
		}
		if(field=='ebay_sys_open'){
			flag	=	'Pa';
		}
		if(flag!=''){
			
			$.ajax({
				type	: 'POST',
				async	: false,
				url		: 'index.php?mod=apiIntegration&act=powerAddDeveloper&jsonp=1&token=2',
				data	: {
					"type"	:	flag,
					"dpId"	:	getDpId(),
				},
				dataType: "json",
				success	: function(ret){
					if(ret.errCode=="200"){
						//整合ebay刊登
						if(flag=='Pa'){
							$.ajax({
								type	: 'POST',
								async	: false,
								url		: 'index.php?mod=apiIntegration&act=insertNewEbayDB&jsonp=1&token=2',
								data	: {
									"dpId"	:	getDpId(),
								},
								dataType: "json",
								success	: function(ret){
									if(ret.errCode=='200'){
										changeOpenServiceStatus(json);
									}else{
										alert(ret.errMsg);
									}
								}	
							});
						}else{
							$.ajax({
								type	: 'POST',
								async	: false,
								url		: 'index.php?mod=apiIntegration&act=synDistributorOpenCategoryToPaSysPost&jsonp=1&token=2',
								data	: {
									"dpId"	:	getDpId(),
								},
								dataType: "json",
								success	: function(ret){
									if(ret.errCode=='200'){
										changeOpenServiceStatus(json);
									}else{
										alert(ret.errMsg);
									}
								}	
							});
						}
					}else{
						alert(ret.errMsg);
					}
				}	
			});
		}else{
			if(field=='api_open'){//API接口开放,生成TOKEN,过期时间
				$.ajax({
					type	: 'POST',
					url		: 'index.php?mod=develop&act=apiOpen&jsonp=1&token=2',
					data	: {'dpId':$("[name='dpId']").val()},
					dataType: "json",
					success	: function(ret){
						$('#token').val(ret.data.token);
						$('#datepicker').val(ret.data.token_expire_time);
					}
				})
			}
			changeOpenServiceStatus(json);
		}
	}
}
function changeOpenServiceStatus(json){
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=develop&act=authStatus&jsonp=1&token=2',
		data	: json,
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=="200"){
				if(json[field] == 3){
					alert('审核通过!');
				}else{
					alert('审核成功!');
				}
				location.reload();
			}else{
				alert(ret.errMsg);
			}
		}	
	});
}
function getDpId(){
	var url		=	window.location.href;
	var urlArr	=	url.split("&dpId=");
	var dpId	=	urlArr[1];
	dpId		=	dpId.split("&");
	return dpId[0];
}

function saveDevInfo(type){
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=develop&act=saveDev&jsonp=1&token=2',
		data	: $('#developInfo'+type).serialize(),
		dataType: "json",
		success	: function(ret){
			alert(ret.errMsg);
			if(ret.errCode=="200"){
				location.reload();
			}
		}	
	});
}

function getIntentionProducts(id){
	var status	=	"";
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=develop&act=getIntentionProducts&jsonp=1&token=2&dpId='+id,
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
