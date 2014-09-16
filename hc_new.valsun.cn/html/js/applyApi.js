$(function(){
	
	$("#updateCallApi").on('click',function(){
		$(".progressBar").css('display','inherit');
		var isChange = false;
		var isNull	 = true;
		$(":text").each(function(){
			if($.trim($(this).val()) != $(this).attr("title")){
				isChange = true;
			}
			if($.trim($(this).val())){
				isNull = false;
			}
		});
		if(isChange){
			$.ajax({ 
				type  : "POST",
				async : false,
				url	  : '../index.php?mod=api&act=applyApiPost',
				dataType : "json",
				data  :	$("#developerCallApi").serialize(), 
				success : function(ret) {
					$(".progressBar").css('display','none');
					if(ret.errCode == "200") {	
						$("#rightContent1").addClass("empower-box-thtep-right").removeClass("empower-box-thtep");
						$("#dialog1").css("display","block");
						$("#title1").html('处理结果');
						$("#rightContent1").html('<p>&nbsp;</p><p>'+ret.errMsg+'</p>');
						$(".empower-box-bt").html('');
						$(":text").each(function(){
							$(this).attr("title",$.trim($(this).val()));
						});
						$("#rightContent1").removeClass("empower-box-thtep-right").addClass("empower-box-thtep");
					} else {
						$("#dialog1").css("display","block");
						$("#title1").html('处理结果');
						$(".empower-box-bt").html('');
						$("#rightContent1").html('<p>错误码:'+ret.errCode+"<br/>错误信息:"+ret.errMsg+' ，更新失败！</p>');
					}
				}
			});
		}else if(!isChange && isNull){
			$("#dialog1").css("display","block");
			$("#title1").html('错误提示');
			$(".empower-box-bt").html('');
			$("#rightContent1").html('<p>&nbsp;</p><p>请填写你要申请的接口！</p>');
		}else{
			$("#dialog1").css("display","block");
			$("#title1").html('错误提示');
			$(".empower-box-bt").html('');
			$("#rightContent1").html('<p>&nbsp;</p><p>未做任何修改！</p>');
		}
	});
	
});

//修改单个api的申请
function updateDeveloperCallApi(id,api,url)
{
	$("#api").val(api);
	$("#id").val(id);
	$("#url").val(url);
	$("#updateDeveloperCallApi").dialog({
		width		: "630",
		height		: "300",
		modal		: true,
		resizable	: true,
		position	: { my: "center", at: "center center", of: window },
		buttons		: {
			"提交": function() {	
				if($.trim($("#url").val())){
					$.ajax({ 
						type  : "POST",
						async : false,
						url	  : '../index.php?mod=api&act=modifyApplyApiPost',
						dataType : "json",
						data  :	{
							'id'  : id,
							'url' : $("#url").val()						
						}, 
						success : function(ret){
							if(ret.data == true) {				
								asyncbox.tips('修改成功','success'); 	
								window.location.reload();			  	  
							} else {
								asyncbox.error('错误码:'+ret.errCode+"<br/>错误信息:"+ret.errMsg,'删除失败',function(){});
							}
						}
					});	
				}else{
					alert("回调地址URL不能为空！");
				}
			},
			"关闭": function() { 
				$( this ).dialog( "close" ); 
			}
		}
	});
}

