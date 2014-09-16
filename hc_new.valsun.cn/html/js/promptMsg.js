$(document).ready(function(){
	$(".a-color").on("click",function(){
		var id	=	$(this).attr("value");
		if($(this).text()=='删除'){
			if(!confirm("确定要删除吗？")){
				return false;
			}
			$.ajax({
				type	: "POST",
				dataType: "json",
				url		: 'index.php?mod=promptMsg&act=delData',
				data	: {
					'id'	:	id,
				},
				success	: function (msg){
					alert(msg.errMsg);
					if(msg.errCode=='200'){
						window.location.reload();
					}
				}
			});
		}else{
			var id	=	$(this).attr("value");
			$("#dialogTitle").text("编辑");
			$("input[name=dialogType]").val("update");
			$("input[name=id]").val(id);
			$.ajax({
				type	: "POST",
				dataType: "json",
				url		: 'index.php?mod=promptMsg&act=getSingleData',
				data	: {
					'id'	:	id,
				},
				success	: function (msg){
					if(msg.errCode=='200'){
						$("select[name='type']").val(msg.data[0]['type']);
						$("select[name='status']").val(msg.data[0]['status']);
						$("input[name='errormsg']").val(msg.data[0]['errormsg']);
						$(".empower-box-shade").show();
					}else{
						alert(msg.errMsg);
					}
				}
			});
		}
	});
	$(".addshops-bt-add").on("click",function(){
		$("#dialogTitle").text("新增");
		$("input[name=dialogType]").val("add");
		$("select[name='type']").val('');
		$("select[name='status']").val(1);
		$("input[name='errormsg']").val('');
		$(".empower-box-shade").show();
	});
	$("input[name='submit']").on("click",function(){
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=promptMsg&act='+$("input[name=dialogType]").val()+'Data',
			data	: $("#submitData").serialize(),
			success	: function (msg){
				alert(msg.errMsg);
				if(msg.errCode=='200'){
					window.location.reload();
				}
			}
		});
	});
});