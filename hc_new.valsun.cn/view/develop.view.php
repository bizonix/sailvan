<?php
/**
 * DevelopView开发者管理
 * @author lgy
 */
class DevelopView extends AdminBaseView{
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 店铺列表
	 */
	public function view_shopList(){
		$platforms		= C('PLATFORMS');
		$sites			= C('SITES');
		$shopInfo		= A('DistributorBasicInformation')->act_getShopList();
		$this->smarty->assign('showPage', $shopInfo['page']->fpage(array(4,5,6,7,8,9)));
		$this->smarty->assign('platforms',$platforms);
		$this->smarty->assign('sites',$sites);
		$this->smarty->assign('shops',$shopInfo['shops']);
		$this->smarty->assign('platNum',$shopInfo['platNum']);
		$this->smarty->assign('ebay',$shopInfo['ebay']);
		$this->smarty->assign('ebayCount',$shopInfo['ebayCount']);
		$this->smarty->display('backstageStoreList.html');
	}
	
	/**
	 * 审核店铺账号
	 */
	public function view_shopStatus(){
		$ai		= A('ApiIntegration');
		$act	= A('DistributorBasicInformation');
		$status	= trim($_POST['status']);
		$shopId	= trim($_POST['shopid']);
		$res	= $act->act_changeStatus();
		$isChange = 0;
		if(!empty($res) && $status == '3'){
			//部署图片水印
			$res 	= 	$ai->act_picIntegtation();
			if(!empty($res)){
				//将用户账号信息同步到开放系统内外网
				$res 	= 	$ai->act_accountInforIntegation();
				if(!empty($res)){
					//提供接口给开放系统，用于拉取可运送国家和不可运送国家
					$res 	  = $ai->act_synDistributorShopInfoToPaSys();
					if(!empty($res)){
						$isChange = 1;
					}else{
						$isChange = 0;
					}
				}
			}
		}
		
		if(!$isChange && $status == '3'){
			$_POST['status'] = '2';
			$_POST['shopid'] = $shopId;
			$act->act_changeStatus();
			unset($_POST['status']);
			unset($_POST['shopid']);
		}
		echo $this->ajaxReturn();
	}
	
	/**
	 * 授权列表
	 */
	public function view_authList(){
		$act	= A('DistributorBasicInformation');
		$ret	= $act->act_authList();
		$this->smarty->assign('cates',$ret['cates']);
		$this->smarty->assign('develop',$ret['develop']);
		$this->smarty->assign('flag',$ret['develop']['flag']);
		$this->smarty->display('backstageAuthList.html');
	}
	
	/**
	 * 重新生成TOKEN
	 */
	public function view_resetToken(){
		$newToken =   md5(microtime());
		echo $this->ajaxReturn($newToken);
	}
	
	
	/**
	 * 授权列表保存开发者信息
	 * @author lgy
	 */
	public function view_saveDev(){
		echo $this->ajaxReturn(A('DistributorBasicInformation')->act_saveDev());
	}
	
	/**
	 * 授权列表审核
	 * @author lgy
	 */
	public function view_authStatus(){
		echo $this->ajaxReturn(A('DistributorBasicInformation')->act_authStatus());
	}
	/**
	 * token更新
	 */
	public function view_apiOpen(){
		echo $this->ajaxReturn(A('DistributorBasicInformation')->act_newToken());
	}
	
	/**
	 * 基本信息-后台
	 * @author wcx
	 */
	public function view_backstageBase(){
	    $act   =   A('DistributorBasicInformation');
	    $data  =   $act->act_getDistributorBasicInformationById();
	    if(empty($data)){
	    	$this->error("没有该用户信息","index.php?mod=developerInformationList&act=index");
	    }
	    $pcApi     =   M('DistributorBasicInformation');
	    F("dp");
	    $category     =    $act->act_getRootCategoryInfo();
	    $loginName  =   $data['email'];
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
	    $idCardName   =   get_getSuffixByName("idCard",$loginName);
	    $idCardUrl    =   $baseDir.$idCardName;
	    if(is_file($idCardUrl)){
	        $this->smarty->assign("idCardUrl","/images/distributor/".$loginName."/".$idCardName);
	    }
	    $businessLicenseName  =   get_getSuffixByName("businessLicense",$loginName);
	    $businessLicenseUrl   =   $baseDir.$businessLicenseName;
	    if(is_file($businessLicenseUrl)){
	        $this->smarty->assign("businessLicenseUrl","/images/distributor/".$loginName."/".$businessLicenseName);
	    }
	    $taxRegistrationName  =   get_getSuffixByName("taxRegistration",$loginName);
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
	            'category'              =>  $category,
	            'dpId'                  =>  $data['id'],
	            'company'               =>  $data['company'],
	            'companyShortName'      =>  $data['company_short_name'],
	            'companyLegalPerson'    =>  $data['company_legal_person'],
	            'address2'              =>  $data['address2'],
	            'companyAddressExtend'  =>  $data['address'],
	            'contactPerson'         =>  $data['user_name'],
	            'contactPersonPhone'    =>  $data['phone'],
	            'mainProducts'          =>  $mainProducts,
	            'soldToCountries'       =>  $data['sold_to_countries'],
	            'intentionProducts'     =>  implode(',',$intentionProducts),
	            'contactPersonExt'      =>  $contactPersonExt,
	            'contactPersonPhoneExt' =>  $contactPersonPhoneExt,
	    ));
	    if(!empty($_GET['type'])){
	        $data['type']   =   $_GET['type'];
	    }
	    if(empty($data['type'])){
	        $type =   '2';
	    }else{
	        $type =   trim($data['type']);
	    }
	    $this->smarty->assign('PHPSESSID', session_id());
	    if($type=='1'){
	        $this->smarty->display('backstageBasePerson.html');
	    }else{
            $this->smarty->display('backstageBaseCompany.html');
	    }
	}
	/**
	 * 高级信息-后台
	 * @author wcx
	 */
	public function view_backstageSenior(){
	    $act   =   A('DistributorBasicInformation');
	    $data  =   $act->act_getDistributorBasicInformationById();
	    if(empty($data)){
	        $this->error("没有该用户信息","index.php?mod=developerInformationList&act=index");
	    }
	    $advancedData   =   json_decode($data['advance_data'],true);
	    //var_dump($data);exit;

        $this->smarty->assign(array(
                'category'                  =>  $category,
                'dpId'                      =>  $data['id'],
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
                //""  =>  $data[''],
        ));
        $type =   trim($data['type']);
        
	    if($type=='1'){
	        $this->smarty->display('backstageSeniorPerson.html');
	    }else{
	        $this->smarty->display('backstageSeniorCompany.html');
	    }
	}
	public function view_uploadPic(){
	    F("dp");
	    if (isset($_REQUEST["PHPSESSID"])) {
	        session_id($_REQUEST["PHPSESSID"]);
	    }
	    $dpInfo        =   A("DistributorBasicInformation")->act_getDistributorBasicInformationById();
	    $loginName     =   $dpInfo['email'];
	    $uploadName    =   $_POST['uploadPicName'];
	    $baseDir       =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$loginName."/";
	    del_picByName($uploadName);
	    $time          =   time();
	    $suffixArr     =   array('jpg','jpeg','gif','bmp','png');
	    //var_dump($_FILES);exit;
	    $flag          =   uploadFile("Filedata",$baseDir,$uploadName.$time,$suffixArr);
	    $name          =   get_getSuffixByName($uploadName.$time,$loginName);
	    echo $this->ajaxReturn(array("name"=>$uploadName,"ret"=>$flag,"url"=>'/images/distributor/'.$loginName.'/'.$name));
	}
	/**
	 * 修改高级信息
	 * @author wcx
	 */
	public function view_modifyBackstageSenior(){
	    echo $this->ajaxReturn(A('DistributorBasicInformation')->act_modifyBackstageSenior());
	}
	/**
	 * 修改基本信息
	 * @author wcx
	 */
	public function view_modifyBackstageBase(){
	    echo $this->ajaxReturn(A('DistributorBasicInformation')->act_modifyBackstageBase());
	}
	
	public function view_getIntentionProducts(){
	    $apiInfo  =   A("DistributorBasicInformation");
	    $data     =   $apiInfo->act_getIntentionProducts();
	    if($data===false){
	        echo $this::ajaxReturn();;
	    }else{
	        echo $this::ajaxReturn(array("status"=>$data));
	    }
	}
}