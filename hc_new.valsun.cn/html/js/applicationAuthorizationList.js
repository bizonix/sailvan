$(document).ready(function(){
//	$("input[name='submit']").on('click',function(){
//		$.ajax({
//			type	: "POST",
//			dataType: "json",
//			url		: 'index.php?mod=applicationAuthorizationList&act=index',
//			data	: $("#search").serialize(),
//			success	: function (msg){
//				if(msg.errCode='200'){
//					alert('操作成功');
//					//window.location.reload(true);
//				}else{
//					alert('操作失败');
//				}
//			}
//		});
//	}); 
//	$("#ss").on('click',function(){
//			$.ajax({
//			type	: "POST",
//			dataType: "json",
//			url		: 'index.php?mod=apiIntegration&act=powerAddDeveloper&dpId=106',
//			success	: function (msg){
//				if(msg.errCode='200'){
//					alert('操作成功');
//					//window.location.reload(true);
//				}else{
//					alert('操作失败');
//				}
//			}
//		});
//	});
	$("#ss").on('click',function(){
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=apiIntegration&act=insertNewEbayDB&dpId=106',
			success	: function (msg){
				if(msg.errCode='200'){
					alert('操作成功');
					//window.location.reload(true);
				}else{
					alert('操作失败');
				}
			}
		});
	});
});