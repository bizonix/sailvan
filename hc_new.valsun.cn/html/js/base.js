//顶部导航滑动效果
$(function(){
    var sel=$('.selected');
    var barTop=$('.barTop');
    var tab=$('.tab');
    if(sel.length > 0){
    	var tabLeft=sel.position().left;//记录初始selsected left值
        var tabTop=sel.position().top;  //记录初始selsected top值    
        var indexTmp=sel.index();

        barTop.css({
            'width':sel.outerWidth(),
            'top':sel.position().top,
            'left':sel.position().left
        });
    }
    
    $('.tab,.sel').mouseover(function() {

        var _this=$(this);

        if (_this.position().left<barTop.position().left) {
            barTop.stop().animate({
                'width':_this.outerWidth(),
                'top':_this.position().top,
                'left':_this.position().left-10
            },400,function(){
                barTop.animate({
                    'left':_this.position().left
                }, 400);
                barTop.stop()
            });             
        }else if(_this.position().left>barTop.position().left){
            barTop.stop().animate({
                'width':_this.outerWidth(),
                'top':_this.position().top,
                'left':_this.position().left+10
            },400,function(){
                barTop.animate({
                    'left':_this.position().left
                }, 400);
                barTop.stop()
            });             
        }

    }).mouseleave(function(event) {

        var _this=$(this);
        var index=_this.index();
        

        barTop.stop().animate({
            'width':sel.outerWidth(),
            'top':tabTop,
            'left':tabLeft
        },130*(index+2));           
    });;
    
    //验证码
    $(".change,.captcha").click(function(){
		$(".captcha").attr("src","../verify.php?"+Math.random());
	});
    
    
});
//微信移入放大效果
 $(function(){
            $('#wx').mouseover(function(){
                $('#wxbig').css('display','block');
            }).mouseleave(function(){
                $('#wxbig').css('display','none');
                })
            });
   //侧边栏
 $(function(){
            $(".sidebar-second").hide();
            $(".sidebar-first-select").next().show()
            $(".sidebar-first a").click(function(){
            $(".sidebar-second").slideUp("fast");
            $(this).parent().next().slideDown("fast");
            return false;
            });
        });
//展开收起高级信息
 $(function(){
            $(".slide").hide();
            $(".slide-bt").click(function(){
                $(".slide").slideToggle("fast",function(){
                    if($(".slide").css('display') == 'none')
                    {
                        $(".slide-bt").html('+展开');
                    }
                    else
                    {
                        $(".slide-bt").html('-收起');
                    }
                })
            });
        });  
  //弹出框
 $(function(){
            $(".empower-box-shade").hide();
            $(".describe-show-box").click(function(){
                $(".empower-box-shade").show();
            });
             $(".describe-hide-box").click(function(){
                $(".empower-box-shade").hide();
             });
        });
 if($(".empower-box-shade").length > 0||$(".check-pic").length>0){
	 $.superbox.settings = {
			boxId: "superbox", // Id attribute of the "superbox" element
			boxClasses: "", // Class of the "superbox" element
			overlayOpacity: .8, // Background opaqueness
			boxWidth: "600", // Default width of the box
			boxHeight: "400", // Default height of the box
			loadTxt: "Loading...", // Loading text
			closeTxt: "js/superbox/close.png", // "Close" button text
			prevTxt: "Previous", // "Previous" button text
			nextTxt: "Next" // "Next" button text
	 };
	 
	 $.superbox();
 }
        	