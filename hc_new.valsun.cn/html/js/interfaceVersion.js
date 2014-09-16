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
				url		: 'index.php?mod=interfaceVersion&act=delData',
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
			$("dialogTitle").text("编辑");
			$("input[name=dialogType]").val("update");
			$("input[name=id]").val(id);
			$.ajax({
				type	: "POST",
				dataType: "json",
				url		: 'index.php?mod=interfaceVersion&act=getSingleData',
				data	: {
					'id'	:	id,
				},
				success	: function (msg){
					if(msg.errCode=='200'){
						$("input[name='requestname']").val(msg.data[0]['requestname']);
						$("input[name='rule']").val(msg.data[0]['rule']);
						$("input[name='version']").val(msg.data[0]['version']);
						$("input[name='extend_package']").val(msg.data[0]['extend_package']);
						$("input[name='extend_transform']").val(msg.data[0]['extend_transform']);
						$("#checkCommissioning").css('display','block');
						$('input:radio[name=is_disable]:nth('+msg.data[0]['is_disable']+')').attr('checked',true);
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
		$("input[name='requestname']").val('');
		$("input[name='rule']").val('');
		$("input[name='version']").val('');
		$("input[name='extend_package']").val('');
		$("input[name='extend_transform']").val('');
		$('input:radio[name=is_disable]:nth(0)').attr('checked',true);
		$(".empower-box-shade").show();
	});
	$("input[name='submit']").on("click",function(){
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=interfaceVersion&act='+$("input[name=dialogType]").val()+'Data',
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