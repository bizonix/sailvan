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
				url		: 'index.php?mod=fromOpenConfig&act=delData',
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
			$("#dialogTitle").text("编辑");
			$("input[name=dialogType]").val("update");
			$("input[name=id]").val(id);
			$.ajax({
				type	: "POST",
				dataType: "json",
				url		: 'index.php?mod=fromOpenConfig&act=getSingleData',
				data	: {
					'id'	:	id,
				},
				success	: function (msg){
					if(msg.errCode=='200'){
						$("input[name='functionname']").val(msg.data[0]['functionname']);
						$("input[name='name']").val(msg.data[0]['name']);
						$("select[name='requesturl']").val(msg.data[0]['requesturl']);
						$("input[name='method']").val(msg.data[0]['method']);
						$("select[name='format']").val(msg.data[0]['format']);
						$("input[name='v']").val(msg.data[0]['v']);
						$("select[name='getOrPost']").val(msg.data[0]['getOrPost']);
						$("input[name='cachetime']").val(msg.data[0]['cachetime']);
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
		$("input[name='functionname']").val("");
		$("input[name='name']").val("");
		$("select[name='requesturl']").val("http://idc.gw.open.valsun.cn/router/rest?");
		$("input[name='method']").val("");
		$("select[name='format']").val("json");
		$("select[name='v']").val("1.0");
		$("select[name='getOrPost']").val("1");
		$("input[name='cachetime']").val("600");
		$(".empower-box-shade").show();
	});
	$("input[name='submit']").on("click",function(){
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=fromOpenConfig&act='+$("input[name=dialogType]").val()+'Data',
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