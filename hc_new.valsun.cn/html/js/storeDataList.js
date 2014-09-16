$(function(){
	$("a[role-type=deleteShop").click(function(){
		if(confirm("你确定要删除此店铺吗？")){
			var obj = $(this);
			$.ajax({ 
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=distributorBasicInformation&act=deleteShopPost',
        		dataType : "json",
        		data  :	{"shopId":obj.attr("role-id")}, 
        		success : function(data){
        			if(data.errCode	== '200'){
        				obj.parent().parent().remove();
        			}else{
        				alert(data.errMsg);
        			}
        		}
        	});
		}
	});
});
