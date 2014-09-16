<?php
/**
 * DistributorBasicInformationView
 * 功能：认证分销商基本信息修改/新增
 * @author wcx
 * 2014/06/28
 *
 */
class DistributorBasicInformationView extends BaseView {
	
	public function __construct(){

		parent::__construct();
		
		if (!isset($_REQUEST["PHPSESSID"])) {
		  $this->smarty->assign("progressInfor", A('Public')->act_getInforProgress());
		}
	}
	public function view_index() {
	    $distributorBasicInformation   =   A('DistributorBasicInformation');
	    
	    $data      =   $distributorBasicInformation->act_getDistributorBasicInformation();
	    F("dp");
	    
	    switch ($data['status']){
                case '6'://未认证
                    $pcApi     =   A('DistributorBasicInformation');
                    $category     =    $distributorBasicInformation->act_getRootCategoryInfo();
                    $loginName  =   _authcode($_COOKIE['hcUser']);
                    $loginName  =   json_decode($loginName,true);
                    $loginName  =   $loginName['email'];
                    if(!empty($_GET['type'])){
                        $data['type']   =   $_GET['type'];
                    }
    	    	    if(empty($data['type'])){
    	    	        $type =   '2';
    	    	    }else{
    	    	        $type =   trim($data['type']);
    	    	    }
    	    	    $this->smarty->assign(array(
    	    	            'category'  =>  $category,
    	    	            'PHPSESSID' =>  session_id(),
    	    	    )); 
    	    	    $data['main_products']  =   json_decode($data['main_products'],true);
    	    	    $mainProducts   =   array();
    	    	    foreach ($category as $k=>$v){
    	    	    	if(in_array($k, $data['main_products'] )){
    	    	    	    $mainProducts[$k]    =   1;
    	    	    	}else{
    	    	    	    $mainProducts[$k]    =   2;
    	    	    	}
    	    	    }
    	    	    
    	    	    //图片信息
    	    	    $baseDir      =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$loginName."/";
    	    	    $idCardName   =   get_getSuffixByName("idCard");
    	    	    $idCardUrl    =   $baseDir.$idCardName;
    	    	    if(is_file($idCardUrl)){
    	    	        $this->smarty->assign("idCardUrl","/images/distributor/".$loginName."/".$idCardName);
    	    	    }
    	    	    $businessLicenseName  =   get_getSuffixByName("businessLicense");
    	    	    $businessLicenseUrl   =   $baseDir.$businessLicenseName;
    	    	    if(is_file($businessLicenseUrl)){
    	    	        $this->smarty->assign("businessLicenseUrl","/images/distributor/".$loginName."/".$businessLicenseName);
    	    	    }
    	    	    $taxRegistrationName  =   get_getSuffixByName("taxRegistration");
    	    	    $taxRegistrationUrl   =   $baseDir.$taxRegistrationName;
    	    	    if(is_file($taxRegistrationUrl)){
    	    	        $this->smarty->assign("taxRegistrationUrl","/images/distributor/".$loginName."/".$taxRegistrationName);
    	    	    }
    	    	    $contactPersonExt     =   json_decode($data['contact_person_ext'],true);
    	    	    $contactPersonPhoneExt=   json_decode($data['contact_person_phone_ext'],true);
    	    	    for($index=0;$index<4;$index++){
    	    	    	if(!isset($contactPersonExt[$index])){
    	    	    	    $contactPersonExt[$index]    =   '';
    	    	    	}
    	    	    }
    	    	    
    	    	    $this->smarty->assign(array(

    	    	            'company'               =>  $data['company'],
    	    	            'companyShortName'      =>  $data['company_short_name'],
    	    	            'companyLegalPerson'    =>  $data['company_legal_person'],
    	    	            'address2'              =>  $data['address2'],
    	    	            'companyAddressExtend'  =>  $data['address'],
    	    	            'contactPerson'         =>  $data['user_name'],
    	    	            'contactPersonPhone'    =>  $data['phone'],
    	    	            'mainProducts'          =>  $mainProducts,
    	    	            'soldToCountries'       =>  $data['sold_to_countries'],
    	    	            'contactPersonExt'      =>  $contactPersonExt,
    	    	            'contactPersonPhoneExt' =>  $contactPersonPhoneExt,

    	    	    ));
    	    	    //高级信息
    	    	    $advancedData   =   json_decode($data['advance_data'],true);
    	    	    //var_dump($data);exit;
    	    	    if(!empty($advancedData)){
    	    	        $this->smarty->assign(array(
    	    	                //高级信息
    	    	                'bank'                      =>  $advancedData['bank'],
    	    	                'bankName'                  =>  $advancedData['bank_name'],
    	    	                'bankUser'                  =>  $advancedData['bank_user'],
    	    	                'bankCardNo'                =>  $advancedData['bank_card_no'],
    	    	                'compangSumPerson'          =>  $advancedData['compang_sum_person'],
    	    	                'companyType'               =>  $advancedData['company_type'],
    	    	                'lastYearSales'             =>  $advancedData['last_year_sales'],
    	    	                'predictSalesByYear'        =>  $advancedData['predict_sales_by_year'],
    	    	                'retail'                    =>  $advancedData['retail'],
    	    	                'wholesale'                 =>  $advancedData['wholesale'],
    	    	                'predictSalesByEveryMonth'  =>  $advancedData['predict_sales_by_every_month'],
    	    	                'startElectricBusinessTime' =>  $advancedData['start_electric_business_time'],
    	    	                'electricBusinessPlatform'  =>  $advancedData['electric_business_platform'],
    	    	                'otherContactPersonName'    =>  $advancedData['other_contact_person_name'],
    	    	                'otherContactPhone'         =>  $advancedData['other_contact_phone'],
    	    	        ));
    	    	    }
    	    	    if($type=='2'){
    	    	        $this->smarty->display('distributorBasicInformation.html');
    	    	    }else{
    	    	        $this->smarty->display('basicInformationPersonal.html');
    	    	    }
    	    	    
	    	    break;
                case '0'://已认证未申请
                case '1'://审核中(授权中)
                case '2'://通过审核(通过授权)
                case '3'://未通过审核(未通过授权)
                    redirect_to("index.php?mod=sucAuthentication&act=index");
                break;
                case '4'://注销
                case '5'://未通过审核(未通过授权)
                	redirect_to('index.php?mod=index&act=index');
                	break;
                
	    }

	}
	public function view_modifyDistributorBasicInformation(){
	    if(A('DistributorBasicInformation')->act_modifyDistributorBasicInformation()){
	        echo $this->ajaxReturn();
	    }else{
	    	$distributorBasicInformation->act_setUserSomeInfor('progressInforFlag', 1);
	    	echo $this->ajaxReturn();
	    }
	}

	/*
	 * 功能：添加和修改店铺信息
	 * zjr
	 */
	public function view_addShop(){
		$flag = @$_REQUEST['flag'];
		if($flag == "updateShopInfo"){
			$shopId 	= $_REQUEST['shopId'];
			$shopInfo 	= A("DistributorBasicInformation")->act_getShopInfoById();
			$this->smarty->assign('shop',$shopInfo);
			$this->smarty->assign('updateFlag',$flag);
		}else{
			$platForm = @$_REQUEST['platForm'];
			$platForm = isset($platForm) ? $platForm : 1;
			$shopInfo[0]['plat_form_id'] = $platForm;
			$this->smarty->assign('shop',$shopInfo);
		}
		$this->smarty->assign('PHPSESSID', session_id());
		$this->smarty->display('addShop.html');
	}

	/*
	 * 添加店铺处理动作控制
	 * zjr
	 */
	public function view_addShopPost(){
		$checkFlag = $_REQUEST['checkFlag'];
		$act  = A("DistributorBasicInformation");
		$res['save'] = $act->act_addShopInfo();
		if(!$res['save']){
			echo $this->ajaxReturn();
			exit;
		}
		if($checkFlag == "checkDistributor"){
			$res['check'] = A('Public')->act_checkDistributor();
		}
		if($res['save']){
			$act->act_setUserSomeInfor('progressInforFlag', 1);
		}
		echo $this->ajaxReturn($res);
	}
	
	/*
	 * 删除店铺处理动作控制
	 * zjr
	 */
	public function view_deleteShopPost(){
		echo $this->ajaxReturn(A("DistributorBasicInformation")->act_deleteShopById());
	}
	
	/*
	 * 删除店铺处理动作控制
	 * zjr
	 */
	public function view_checkShopIsExistPost(){
		echo $this->ajaxReturn(A("DistributorBasicInformation")->act_checkShopIsExist());
	}

	/*
	 * 店铺列表页面
	 * zjr
	 */
	public function view_shopInfo(){
		$act  		= A("DistributorBasicInformation");
		$flag		= @$_REQUEST['flag'];
		if($flag == "searchShop"){
			$res		= $act->act_getSearchShops();
		}else{
			$res		= $act->act_getShopInfo();
		}
		$this->smarty->assign('shops',$res['shops']);
		$this->smarty->assign('showPage', $res['page']);
		$this->smarty->display('storeDataList.html');
	}
	/*
	 * 店铺列表页面
	 * zjr
	 */
	public function view_showShopInfo(){
		$act  									= A("DistributorBasicInformation");
		$shopInfo  								= $act->act_getShopInfoById();
		if($shopInfo[0]['dp_id'] != $this->_userid){
			redirect_to("../index.php?mod=distributorBasicInformation&act=shopInfo");
		}else{
			$this->smarty->assign('shop',$shopInfo);
			$this->smarty->display('details.html');
		}
	}

	public function view_uploadPic(){
	    F("dp");
	    if (isset($_REQUEST["PHPSESSID"])) {
	    	session_id($_REQUEST["PHPSESSID"]);
	    }
	    $loginName     =   json_decode(_authcode($_COOKIE['hcUser']),true);
        $loginName     =   $loginName['email'];
	    $uploadName    =   $_POST['uploadPicName'];
	    $baseDir       =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$loginName."/";
	    del_picByName($uploadName);
	    $time          =   time();
	    $suffixArr     =   array('jpg','jpeg','gif','bmp','png');
	    $flag          =   uploadFile("Filedata",$baseDir,$uploadName.$time,$suffixArr);
	    $name          =   get_getSuffixByName($uploadName.$time);
	    echo $this->ajaxReturn(array("name"=>$uploadName,"ret"=>$flag,"url"=>'/images/distributor/'.$loginName.'/'.$name));
	}

	/*
	 * 拉取不运送国家
	 * zjr
	 */
	public function view_getExcludeCountryPost(){
		$paItf 		   =	M('InterfacePa');
		$res		   =	$paItf->getExcludeShippingCountry($_REQUEST['siteId']);
		echo $this->ajaxReturn($res);
	}
	/*
	 * 拉取运送国家
	 * zjr
	 */
	public function view_getShipCountryPost(){
		$paItf 		   =	M('InterfacePa');
		$res		   =	$paItf->getShippingCountry($_REQUEST['siteId']);
		echo $this->ajaxReturn($res);
	}
	/*
	 * 重命名水印图函数
	 * zjr
	 */
	public function view_changWatermarkName(){
		F("dp");
		$loginName     =   json_decode(_authcode($_COOKIE['hcUser']),true);
		$loginName     =   $loginName['email'];
		$baseDir       =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$loginName."/";
		$newName       =   $_REQUEST['newName'];
		$newName	   =   str_replace("_", "", $newName);
		$shopPlat      =   $_REQUEST['shopPlat'];
		$picPath	   =   $baseDir.$shopPlat."/";
		if(!is_dir($picPath)){
        	mkdir($picPath,0777);
        }
        $name          =   get_getSuffixByName("watermark1");
		$renameFlag	   =   rename($baseDir.$name, $picPath.$newName.'.png');
		echo $this->ajaxReturn(array("flag"=>$renameFlag,"imgUrl"=>"/images/distributor/".$loginName."/".$shopPlat."/".$newName.'.png'));
	}
	public function view_getExistShopInfo(){
	    echo $this->ajaxReturn(A("DistributorBasicInformation")->act_getExistShopInfo());
	}
}
?>