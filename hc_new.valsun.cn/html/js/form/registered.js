
//登录、注册、忘记密码页面表单验证
$(function(){
	//邮箱失去焦点时
	$("input[name=email]").blur(function(){
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
        			if(data.errCode!='200'){
        				$("input[name=email]").next().addClass("Validform_wrong").text(data.errMsg);
        			}else{
        				$("input[name=email]").next().addClass("Validform_right").text(data.errMsg);
        			}
        		}
	        });
		 }
	});
	
	$('#suctk').hide();
	var register=$(".register-main-form").Validform({
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
        //验证验证码
        beforeCheck:function(curform){
        	$($(".agreed").next().removeClass("Validform_wrong").text(""));
        	if(!$(".agreed").find("input")[0].checked) {
        		$($(".agreed").next().addClass("Validform_wrong").text("请勾选阅读协议！"));
        		return false;
        	}
        },
        callback:function(data){
        	if(data.errCode == 200) {
        		location.href = '../index.php?mod=register&act=registerLocation&email='+$("input[name=email]").val();
//        		$('#suctk').show();
//        		var wait=$('#val');
//    		    var time = 3;
//    		    var interval = setInterval(function(){
//    			    time--;
//    			    wait.html(time);
//    			    if(time == 0) {
//    			        location.href = '../index.php?mod=register&act=registerLocation&email='+$("input[name=email]").val();
//    			        clearInterval(interval);
//    			    } else {
//    			        $('.close-suc-box').click(function(){
//    			            $('#suctk').hide();
//    			            clearInterval(interval);
//    			            wait.html(3);
//    			        });
//    			    }
//    		    }, 1000);
        	}else {
        		data.errMsg = data.errMsg.replace("字段[email]","邮箱");
        		if(data.errCode == 10154){
        			$("input[name=email]").next().addClass("Validform_wrong").text('账号未激活，去邮箱激活？');
        		}else{
        			$("input[name=email]").next().addClass("Validform_wrong").text(data.errMsg);
        		}
        	}
        }
    });
    //通过$.Tipmsg扩展默认提示信息;
	$.Tipmsg.w["pwd"]		= "输入8位以上字母加数字！";
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
	    },
	    {
	        ele:".inputxt:eq(2)",
	        datatype:"pwd",
	        recheck:"userpassword"    
	    },{
	    	ele:".captchatxt",
	    	datatype:"checkCode"
	    }
    ]);
    
});
//验证邮箱是否已经存在
function checkEmailExist($email){
	
	$.ajax({ 
		type  : "POST",
		async : false,
		url	  : '../json.php?mod=register&act=checkEmail',
		dataType : "json",
		data  :	{
			'email' : $email, //验证email		       
		}, 
		success : function(data){
			$(".progressBar").css('display','none');
			if(data==1) {				
				asyncbox.tips('登录成功','success'); 
				location.href='/json.php?mod=manager&act=index';		  	  
			}			
			else {
				asyncbox.error('错误码:'+data.errCode+"<br/>错误信息:"+data.errMsg,'删除失败',function(){});
			}
		}
	});
}