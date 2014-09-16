$(document).ready(function(){
	$("input[name='submit']").on('click',function(){
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=backstagesLogin&act=login',
			data	: $("#backstagesloginForm").serialize(),//序列化表单里所有的内容
			success	: function (msg){
				if(msg.errCode=='200'){
					alert('登陆成功');
					window.location.href="index.php?mod=developerInformationList&act=index";
				}else{
					alert(msg.errMsg);
				}
			}
		});
		return false;
	});
});