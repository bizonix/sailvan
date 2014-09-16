$(function(){
	var changePwd=$(".changepassform").Validform({
        tiptype:3,
        label:".label",
        showAllError:true,
        datatype:{
            "zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
            "pwd":/^(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{8,}$/
        },
        ajaxPost:true,
        //验证验证码
        callback:function(data){
        	if(data.errCode == '200') {
        		$(":submit").siblings(".Validform_checktip").removeClass("Validform_wrong").addClass("Validform_right").text(data.errMsg);
        	} else {
        		data.errMsg = data.errMsg.replace("字段[email]","邮箱");
        		$(":submit").siblings(".Validform_checktip").removeClass("Validform_right").addClass("Validform_wrong").text(data.errMsg);
        	}
        }
    });
    //通过$.Tipmsg扩展默认提示信息;
    $.Tipmsg.w["pwd"]="输入8位以上字母加数字！";
    changePwd.addRule([
	    {
	        ele:".inputxt:eq(0)",
	        datatype:"pwd"
	    },
	    {
	        ele:".inputxt:eq(1)",
	        datatype:"pwd"    
	    },
	    {
	        ele:".inputxt:eq(2)",
	        datatype:"pwd",
	        recheck:"newPwd"    
	    }
    ]);
});
        	