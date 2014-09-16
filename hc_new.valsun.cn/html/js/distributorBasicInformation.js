$(document).ready(function(){
	$("select[name='bank']").val($("select[name='bank']").attr('selectedBank'));
	if($("#backstagesSaveSenior").length==0){
		var address2	=	$("input[name='address2']").val();
		if(address2!='' && address2!='undefined'){
			address2		=	address2.split('-');
			new PCAS("companyAddressProvince","companyAddressCity","companyAddressDistrict",address2[0],address2[1],address2[2]);
		}else{
			address2		=	address2.split('-');
			new PCAS("companyAddressProvince","companyAddressCity","companyAddressDistrict","广东省","深圳市","龙岗区");
		}

		//上传图片插件实例化
		uploadPic();
	}
	
	//保存
	
	$("input[name='save']").on("click",function(){
		var msg	=	checkData();
		var status	=	true;
		if(msg!=''){
			if(msg=="##"){
				return false;
			}
			if(!confirm(msg+"\n信息未完善,无法认证,确定暂时保存吗?")){
				return false
			}else{
				status	=	false;
			}
		}
		status	=	false;
		$.ajax({
			type	: "POST",
			dataType: "json",
			url		: 'index.php?mod=distributorBasicInformation&act=modifyDistributorBasicInformation&status='+status,
			data	: $("#contentForm").serialize(),//序列化表单里所有的内容
			success	: function (msg){
				alert(msg.errMsg);
				if(msg.errCode=='200'){
					window.location.reload(true);
				}
			}
		});
	});
	$("input[name='type']").on("click",function(){
		var url	=	window.location.href;
		var urlArr	=	url.split("&type");
		url		=	urlArr[0];
		var type=	$(this).val();
		window.location.href=url+"&type="+type;
		
	});
	//高级信息是否填写
	$(".slide-bt").on("click",function(){
		if($("input[name='advanceInformation']").val()=='on'){
			$("input[name='advanceInformation']").val("off");
		}else{
			$("input[name='advanceInformation']").val("on");
		}
	})

	$("input[name='continue']").on('click',function(){
		if($("input[name='save']").click()){
			window.location.href="index.php?mod=distributorBasicInformation&act=addShop";
		}
	});
    //新增联系人
	$("#addPersnPhone").on('click',function(){
        var flag    =   true;
        $("#PersnPhoneExt").children().each(function(){
            if($(this).css("display")=='none'&&flag){
                flag    =   false;
                $(this).css("display","inline");
            }
        });
        if(flag){
            alert("最多只能添加5个联系人");
        }

	})
	$("a[name='delPersnPhoneExt']").on("click",function(){
        $(this).prev().val("");
        $(this).prev().prev().val("");
        $(this).parent().css("display","none");
    });
	$("#backstagesSaveBase").on('click',function(){
		//var url	=	window.location.href;
		var id 	=	getId();
		if(id){
			$.ajax({
				type	: "post",
				dataType: "json",
				url		: 'index.php?mod=develop&act=modifyBackstageBase&status='+status+"&id="+id,
				data	: $("#contentForm").serialize(),//序列化表单里所有的内容
				success	: function (msg){
					alert(msg.errMsg);
					if(msg.errCode='200'){
						window.location.reload(true);
					}
				}
			});
		}
	});
	
	$("#backstagesSaveSenior").on('click',function(){
		//var url	=	window.location.href;
		var id 	=	getId();
		if(id){
			$.ajax({
				type	: "post",
				dataType: "json",
				url		: 'index.php?mod=develop&act=modifyBackstageSenior&status='+status+"&id="+id,
				data	: $("#contentForm").serialize(),//序列化表单里所有的内容
				success	: function (msg){
					alert(msg.errMsg);
					if(msg.errCode='200'){
						window.location.reload(true);
					}
				}
			});
		}
	});
});
function getId(){
	var url	=	window.location.href;
	var urlArr	=	url.split("&");
	var tmp	=	'';
	for(var i=0;i<urlArr.length;i++){
		if(urlArr[i].split("=")[0]=='dpId'){
			return urlArr[i].split("=")[1];
		};
	}
	return false;
}
//检测数据
function checkData(){
	var msg	=	'';
	//验证开发者类型
	var type	=	$.trim($("input:radio[name='type']:checked").val());
	if(type!='1'&&type!='2'){
		$("input[name='type']").focus();
		msg	= "开发者类型不合法";
	}
	//验证公司全称
	var company	=	$.trim($("input[name='company']").val());
	if(company==''){
		$("input[name='company']").focus();
		msg	= "名称必须填写";
	}
	if(minLengthLimit($("input[name='company']"),2)){
		return "##";
	}
	//验证公司英文简称
	var companyShortName	=	$.trim($("input[name='companyShortName']").val());
	if(companyShortName==''){
		$("input[name='companyShortName']").focus();
		msg	= "英文简称必须填写";
	}
	if(minLengthLimit($("input[name='companyShortName']"),2)){
		msg	= "##";
	}
	//验证公司法人
	var companyLegalPerson	=	$.trim($("input[name='companyLegalPerson']").val());
	if(companyLegalPerson==''&&type=='2'){
		$("input[name='companyLegalPerson']").focus();
		msg	= "公司法人必须填写";
	}
	if(type=='2'&&minLengthLimit($("input[name='companyLegalPerson']"),4)){
		return "##";
	}
	
	//验证公司地址
	var companyAddressProvince	=	$.trim($("select[name='companyAddressProvince']").val());
	var companyAddressCity		=	$.trim($("select[name='companyAddressCity']").val());
	var companyAddressDistrict	=	$.trim($("select[name='companyAddressDistrict']").val());
	if(companyAddressProvince==''){
		$("select[name=companyAddressProvince]").focus();
		msg	= "地址必须填写完整";
	}
	
	//验证不需要重复填写市区?
	var companyAddressExtend	=	$.trim($("input[name='companyAddressExtend']").val());
	if(companyAddressExtend==''){
		$("input[name='companyAddressExtend']").focus();
		msg	= "详细地址必须填写";
	}
	if(minLengthLimit($("input[name='companyAddressExtend']"),5)){
		return "##";
	}
	//验证联系人姓名
	var contactPerson	=	$.trim($("input[name=contactPerson]").val());
	if(contactPerson==''){
		$("input[name='contactPerson']").focus();
		msg	= "联系人姓名必须填写";
	}
	if(minLengthLimit($("input[name='contactPersonExt[]']"),4)){
		return "##";
	}
	if(minLengthLimit($("input[name='contactPerson']"),4)){
		return "##";
	}
	//验证联系人常用13位有效手机号码
	var contactPersonPhone	=	$.trim($("input[name=contactPersonPhone]").val());
	if(contactPersonPhone.length<6){
		$("input[name='contactPersonPhone']").focus();
		msg	= "必须填写有效手机号码";
	}
	if(minLengthLimit($("input[name='contactPersonPhone']"),6,true)){
		return "##";
	}
	if(minLengthLimit($("input[name='contactPersonPhoneExt[]']"),6,true)){
		return "##";
	}

	
	//验证主营产品
	var checkboxArr = document.getElementsByName("mainProducts[]");
	var mainProductsFlag	=	false;
	for(var i = 0; i<checkboxArr.length;i++){
		if(checkboxArr[i].checked==true){
			mainProductsFlag	=	true;
		}
	}
	if(!mainProductsFlag){
		$("input[name='mainProducts[]']").focus();
		msg	= "必须选择至少一种的主营产品";
	}
	

	
	//验证主销国家
	var soldToCountries	=	$.trim($("input[name='soldToCountries']").val());
	if(soldToCountries==''){
		//$("input[name='soldToCountries']").focus();
		msg	= "必须填写主销国家";
	}
	if(minLengthLimit($("input[name='soldToCountries']"),2)){
		return "##";
	}
	//验证身份证-图片
	var id_card_url	=	$.trim($("input[name='idCard']").val());
	if(id_card_url==''&&$("#idCardUrl").length==0){
		//$("input[name='soldToCountries']").focus();
		msg	= "身份证不能为空";
	}
	//验证营业执照
	var business_license_url	=	$.trim($("input[name='businessLicense']").val());
	if(business_license_url==''&&type=='2'&&$("#businessLicenseUrl").length==0){
		//$("input[name='business_license_url']").focus();
		msg	= "营业执照不能为空";
	}
	
	//验证税务登记证
	var tax_registration_url	=	$.trim($("input[name='taxRegistration']").val());
	if(tax_registration_url==''&&type=='2'&&$("#taxRegistrationUrl").length==0){
		//$("input[name='tax_registration_url']").focus();
		msg	= "税务登记证不能为空";
	}
	return msg;
}
function minLengthLimit(obj,min,flag){
	var str	=	obj.val();
	if(str==''){
		return false;
	}
	if(flag){//数字检测
		if(str.replace(/[^0-9]/g,'')!=str){
			obj.focus();
			obj.parent().append('<span style="color:red" name="warning_message"><br>只能填入数字</span>');
			$("[name='warning_message']").fadeOut(1500);
			return true;
		}
	}
	if(GetLength(str)<min){
		obj.focus();
		obj.parent().append('<span style="color:red" name="warning_message"><br>最少需要'+min+'个字符</span>');
		$("[name='warning_message']").fadeOut(1500);
		return true;
	}
	return false;
}

function uploadPic(){
	var PHPSESSID	=	getPHPSESSID();
	var developerType	=	$("input:radio[name='type']:checked").val();
	var type	=	"*.jpg;*.gif;*.png;";//GIF,JPG,PNG
	var size	=	"5 MB";
	if(window.location.href.indexOf('mod=develop&act=backstageBase')=='-1'){
		var mod	=	"distributorBasicInformation";
	}else{
		var mod	=	"develop";
	}
	var dpId	=	getId();
	if(!dpId){
		dpId	=	0;
	}
	var settings1 = {
		flash_url : "js/swfupload/swfupload/swfupload.swf",
		upload_url: "/index.php",	
		post_params: {
			"mod" : mod,
			"act" : "uploadPic",
			"uploadPicName" : "idCard",
			"PHPSESSID"		: PHPSESSID,
			"dpId"			: dpId,
		},
		file_size_limit : size,
		file_types : type,
		file_types_description : type,
		file_upload_limit : 10,  //配置上传个数
		file_queue_limit : 0,
		custom_settings : {
			progressTarget : "idCardFsUploadProgress",
			cancelButtonId : "idCardBtnCancel"
		},
		debug: false,
	
		// Button settings
		button_image_url: "js/swfupload/images/TestImageNoText_65x29.png",
		button_width: "65",
		button_height: "29",
		button_placeholder_id: "idCardSpanButtonPlaceHolder",
		button_text: '<span class="theFont">浏览</span>',
		button_text_style: ".theFont { font-size: 16; }",
		button_text_left_padding: 12,
		button_text_top_padding: 3,
		
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	
	};
	swfu1 = new SWFUpload(settings1);
	
	if(developerType=='1'){
		return true;
	}
	var settings2 = {
		flash_url : "js/swfupload/swfupload/swfupload.swf",
		upload_url: "/index.php",	
		post_params: {
			"mod" : mod,
			"act" : "uploadPic",
			"uploadPicName" : "businessLicense",
			"PHPSESSID"		: PHPSESSID,
			"dpId"			: dpId,
		},
		file_size_limit : size,
		file_types : type,
		file_types_description : type,
		file_upload_limit : 10,  //配置上传个数
		file_queue_limit : 0,
		custom_settings : {
			progressTarget : "businessLicenseFsUploadProgress",
			cancelButtonId : "businessLicenseBtnCancel"
		},
		debug: false,
	
		// Button settings
		button_image_url: "js/swfupload/images/TestImageNoText_65x29.png",
		button_width: "65",
		button_height: "29",
		button_placeholder_id: "businessLicenseSpanButtonPlaceHolder",
		button_text: '<span class="theFont">浏览</span>',
		button_text_style: ".theFont { font-size: 16; }",
		button_text_left_padding: 12,
		button_text_top_padding: 3,
		
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	
	};
	swfu2 = new SWFUpload(settings2);
		
	var settings3 = {
		flash_url : "js/swfupload/swfupload/swfupload.swf",
		upload_url: "/index.php",	
		post_params: {
			"mod" : mod,
			"act" : "uploadPic",
			"uploadPicName" : "taxRegistration",
			"PHPSESSID"		: PHPSESSID,
			"dpId"			: dpId,
		},
		file_size_limit : size,
		file_types : type,
		file_types_description : type,
		file_upload_limit : 1,  //配置上传个数
		file_queue_limit : 0,
		custom_settings : {
			progressTarget : "taxRegistrationFsUploadProgress",
			cancelButtonId : "taxRegistrationBtnCancel"
		},
		debug: false,
	
		// Button settings
		button_image_url: "js/swfupload/images/TestImageNoText_65x29.png",
		button_width: "65",
		button_height: "29",
		button_placeholder_id: "taxRegistrationSpanButtonPlaceHolder",
		button_text: '<span class="theFont">浏览</span>',
		button_text_style: ".theFont { font-size: 16; }",
		button_text_left_padding: 12,
		button_text_top_padding: 3,
		
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	
	};
	swfu3 = new SWFUpload(settings3);
}
function GetLength(str) {
    ///<summary>获得字符串实际长度，中文2，英文1</summary>
    ///<param name="str">要获得长度的字符串</param>
    var realLength = 0, len = str.length, charCode = -1;
    for (var i = 0; i < len; i++) {
        charCode = str.charCodeAt(i);
        if (charCode >= 0 && charCode <= 128) realLength += 1;
        else realLength += 2;
    }
    return realLength;
}

function getPHPSESSID(){
	return $("input[name='PHPSESSID']").val();
}
