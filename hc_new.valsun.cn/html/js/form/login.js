$(function(){
	//邮箱失去焦点时
	$("input[name=useremail]").blur(function(){
		 var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
		 var email_val = $.trim($(this).val());
		 if(search_str.test(email_val)){       
			 $.ajax({ 
        		type  : "POST",
        		async : false,
        		url	  : '../index.php?mod=register&act=checkEmailIsExistPost',
        		dataType : "json",
        		data  :	{"email":email_val}, 
        		success : function(data){
        			if(data.data){
        				if(data.errCode == 10154){
                			$("input[name=useremail]").next().addClass("Validform_right");
                		}else{
                			$("input[name=useremail]").next().addClass("Validform_wrong").html('<a style="color:#FF7A4B;text-decoration:none;border:none;" target="_blank" href="../index.php?mod=register&act=register">尚未注册，去注册？</a>');
                		}
        			}
        		}
	        });
		 }
	});
	var register=$(".registerform").Validform({
        tiptype:3,
        label:".label",
        showAllError:true,
        datatype:{
            "zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
            "pwd":/^(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{8,}$/,
            "checkCode":function(){
            	if($.trim($("input[name=checkCode]").val())==$.cookie('verifycode')){
            		return true;
            	}else return false
            }
        },
        ajaxPost:true,
        callback:function(data){
        	if(data.errCode == 200) {
        		location.href = '../index.php?mod=distributorBasicInformation&act=index';
        	}else if(data.errCode == 10152) {
        		$("input[name=userpassword]").next(".Validform_checktip").addClass("Validform_wrong").html(data.errMsg);
        	}else if(data.errCode == 10051||data.errCode == 10154||data.errCode == 10155) {
        		$("input[name=useremail]").next(".Validform_checktip").addClass("Validform_wrong").html(data.errMsg);
        	}else if(data.errCode == 10156) {
        		$("input[name=useremail]").next(".Validform_checktip").addClass("Validform_wrong").html(data.errMsg);
        	}else if(data.errCode == 10014) {
        		$("input[name=checkCode]").next(".Validform_checktip").addClass("Validform_wrong").html(data.errMsg);
        	}
        }
    });
    //通过$.Tipmsg扩展默认提示信息;
	$.Tipmsg.w["pwd"]		= "输入8位以上字母与数字";
	$.Tipmsg.w["e"]			= "邮箱格式错误";
    $.Tipmsg.w["checkCode"]	= "验证码错误";
    register.addRule([
	    {
	        ele:".inputxt:eq(0)",
	        datatype:"e"
	    },
	    {
	        ele:".inputxt:eq(1)",
	        datatype:"pwd"    
	    },{
	    	ele:".captchatxt",
	    	datatype:"checkCode"
	    }
    ]);
})