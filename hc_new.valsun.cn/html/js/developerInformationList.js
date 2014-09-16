$(document).ready(function(){
	//操作
	$("select[name='operation']").on("change",function(){
		var type	=	$(this).val();
		var id		=	$(this).parent().parent().children()[0].innerHTML;
		var nowSta	=	$(this).next().val();
		switch(type){
			case '1'://编辑
				window.location.href="index.php?mod=develop&act=backstageBase&dpId="+id;
				break;
			case '2'://注销
				if(nowSta=='4'){
					alert("已经是停用状态了");
					return ;
				}
				if(confirm("确定注销该账号么？")){
					changeAccountStatus(id,'cancel');
				}
				break;
			case '3'://认证
				if(nowSta=='0'){
					alert("已经是认证状态了");
					return ;
				}
				if(confirm("确定将该账号改为认证状态么？")){
					changeAccountStatus(id,'authentication');
				}
				break;
			default:
				alert("无此操作");
		}
		
	});
});
function changeAccountStatus(id,type){
	$.ajax({
		type	: "POST",
		dataType: "json",
		url		: 'index.php?mod=developerInformationList&act=changeAccountStatus',
		data	: {
			'id'	:	id,
			'type'	:	type,
		},
		success	: function (msg){
			alert(errMsg);
			if(msg.errCode='200'){
				window.location.reload(true);
			}
		}
	});
}