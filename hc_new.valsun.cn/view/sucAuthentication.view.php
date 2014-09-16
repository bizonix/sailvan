<?php
/**
 * SucAuthenticationView
 * 功能：分销商授权页面
 * @author wcx
 * 2014/06/28
 *
 */
class SucAuthenticationView extends BaseView {
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
        $this->smarty->assign("progressInfor", A('Public')->act_getInforProgress());
    }
	public function view_index() {

	    $DistributorBasicInformation   =   A('DistributorBasicInformation');
	    $data                          =   $DistributorBasicInformation->act_getDistributorBasicInformation();
        if($data['status']=='6'){
            header('Location:/index.php?mod=distributorBasicInformation&act=index');
        }
        $category     =    $DistributorBasicInformation->act_getRootCategoryInfo();
        $data['main_products']  =   json_decode($data['main_products'],true);
        $mainProducts   =   array();
        foreach($data['main_products'] as $v){
            $mainProducts[] =   $category[$v];
        }
        $loginName  =   _authcode($_COOKIE['hcUser']);
        $loginName  =   json_decode($loginName,true);
        $loginName  =   $loginName['email'];
        $data['intention_products']  =   json_decode($data['intention_products'],true);
        $intentionProducts   =   array();
        foreach($data['intention_products'] as $v){
            $intentionProducts[] =   $category[$v];
        }
        $loginName  =   _authcode($_COOKIE['hcUser']);
        $loginName  =   json_decode($loginName,true);
        $loginName  =   $loginName['email'];
        $baseDir       =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$loginName."/";
        $this->smarty->assign(array(

                "loginName"             =>  $loginName,
                'type'                  =>  $data['type'],
                'company'               =>  $data['company'],
                'companyShortName'      =>  $data['company_short_name'],
                'companyLegalPerson'    =>  $data['company_legal_person'],
                'address'               =>  $data['address'],
                'address2'              =>  $data['address2'],
                'contactPerson'         =>  $data['user_name'],
                'contactPersonPhone'    =>  $data['phone'],
                'mainProducts'          =>  implode(',',$mainProducts),
                'soldToCountries'       =>  $data['sold_to_countries'],
                'intentionProducts'     =>  implode(',',$intentionProducts),
                'contactPersonExt'      =>  json_decode($data['contact_person_ext'],true),
                'contactPersonPhoneExt' =>  json_decode($data['contact_person_phone_ext'],true),

        ));
        //图片地址
        //echo $baseDir."idCard.jpg";exit;
        F("dp");
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
                    //""  =>  $data[''],
            ));
        }
        if($data['type']=='1'){
            $this->smarty->display('sucAuthenticationPersonal.html');
        }else{
            $this->smarty->display('sucAuthentication.html');
        }
	}


}
?>