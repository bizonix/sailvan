$(function(){
	$('#dialog1').dialog({
		buttons:[{text:'确定',click:function(){audit($('#shopid').val(),4);}},{text:'取消',click:function(){$(this).dialog('close');$('.changeStatus').attr('checked',false);}}],
		autoOpen:false
	});
	$('.changeStatus').on('click',function(){
		var shopid		= $(this).attr('shopid');
		var shopName	= $(this).attr('shopName');
		var status  	= $(this).attr('status');
		if(status==4){
			$('#shopid').val(shopid);
			$('#dialog1').dialog('open');
			return false;
		}
		audit(shopid,status);
	})
	
	$('.expand').on('click',function(){
		var shopid	= $(this).attr('shopid');
		if($('#detail'+shopid).css('display')=='none'){
			$(this).html('-收起');
			$('#detail'+shopid).show();
		}else{
			$(this).html('+展开');
			$('#detail'+shopid).hide();
		}
	});
	
})

function audit(shopid,status){
	var json	= {};
	if(status==4){
		var reason = $('#reason').val();
		if(reason==''){
			alert('请填写不通过原因！');
			$('#reason').focus();
			return false;
		}
		json['not_pass_reason'] = reason;
	}
	json['shopid'] = shopid;
	json['status'] = status;
	json['dpId']   = getDpId();
	if(status=='3'){
		if(!confirm("确定通过该店铺下所有站点(等待审核)的店铺设置吗")){
			return false;
		}
	}
	if(status=='4'){
		if(!confirm("确定不通过该店铺下所有站点(等待审核)的店铺设置吗")){
			return false;
		}
	}
	$.ajax({
		type	: 'POST',
		async	: false,
		url		: 'index.php?mod=develop&act=shopStatus&jsonp=1&token=2',
		data	: json,
		dataType: "json",
		success	: function(ret){
			if(ret.errCode=='200'){
				if(status == 3){
					alert('审核通过');
					location.reload();
				}
				if(status==4){
					alert('审核成功!');
					location.reload();
				}
			}else{
				alert(ret.errMsg);
				$('.changeStatus').attr('checked',false);
				$('#dialog1').dialog('close');
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
