$(function(){
	var forgotform=$(".forgotform").Validform({
        tiptype:3,
        label:".label",
        showAllError:true,
        datatype:{
            "zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
            "checkCode":function(){
            	if($.trim($("input[name=checkCode]").val())==$.cookie('verifycode')){
            		return true;
            	}else return false
            }
        },
        ajaxPost:false
    });
    
    //通过$.Tipmsg扩展默认提示信息;
    //$.Tipmsg.w["*6-20"]="输入6位以上字母加数字！";
    forgotform.addRule([{
            ele:".inputxt:eq(0)",
            datatype:"e"
        },{
        	ele:".captchatxt",
	    	datatype:"checkCode"
        }
    ]);
    var thform=$(".thform").Validform({
        tiptype:3,
        label:".label",
        showAllError:true,
        datatype:{
            "zh1-6":/^[\u4E00-\u9FA5\uf900-\ufa2d]{1,6}$/,
            "pwd":/^(?!^\d+$)(?!^[a-zA-Z]+$)[0-9a-zA-Z]{8,}$/,
        },
        ajaxPost:false
    });
    
    //通过$.Tipmsg扩展默认提示信息;
    $.Tipmsg.w["pwd"]			=	"输入8位以上字母与数字";
    $.Tipmsg.w["userpassword"]	=	"请重输密码";
    thform.addRule([
    {
        ele:".inputxt:eq(0)",
        datatype:"pwd"    
    },
    {
        ele:".inputxt:eq(1)",
        datatype:"pwd",
        recheck:"userpassword"    
    }]);
})