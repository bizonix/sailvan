<?php
/*
 *通用验证方法类
 *@add by : linzhengxiang ,date : 20140523
 */
class CheckAct extends CommonAct{

	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * 验证国家简码是否符合规范和是否存在
	 * @param string $shortcode
	 */
	protected function act_checkCountryCode ($shortcode){
		if (preg_match("/^[A-Z]{2,3}$/", $shortcode)===0){
			$this::$errMsg[10001] =   get_promptmsg(10001,$shortcode);
			return false;
		}
		/*查询模型验证 待完成*/
		return true;
	}

	/**
	 * 验证国家名称是否符合规范和是否存在
	 * @param string $shortcode
	 */
	protected function act_checkCountryName ($countryname){
		if (preg_match("/^[A-Z]{1}/", $countryname)===0){
			$this::$errMsg[10002] =   get_promptmsg(10002,$countryname);
			return false;
		}
		/*查询模型验证 待完成*/
		return true;
	}

	/**
	 * 验证SKU是否符合规范和是否存在
	 * @param string $sku
	 */
	protected function act_checkSkuEffect ($sku){
		if (preg_match("/^[A-Z0-9]{3}/", $sku)===0){
		    $this::$errMsg[10003] =   get_promptmsg(10003,$sku);
			return false;
		}
		/*查询模型验证 待完成*/
		return true;
	}

	protected function act_formatField(){

	}
	/**
	 * 验证基础信息是否完整
	 */
    protected function act_checkBaseInfo(){
        $type                  =   trim($_REQUEST['type']);//开发者类型
        $company               =   trim($_REQUEST['company']);//公司名称
        $companyShortName      =   trim($_REQUEST['companyShortName']);//公司英文简称
        $companyLegalPerson    =   trim($_REQUEST['companyLegalPerson']);//公司法人
        $companyAddressProvince=   trim($_REQUEST['companyAddressProvince']);//地址-省
        $companyAddressCity    =   trim($_REQUEST['companyAddressCity']);//地址-市
        $companyAddressDistrict=   trim($_REQUEST['companyAddressDistrict']);//地址-区
        $companyAddressExtend  =   trim($_REQUEST['companyAddressExtend']);//地址-详细
        $contactPerson         =   trim($_REQUEST['contactPerson']);//联系人
        $contactPersonPhone    =   trim($_REQUEST['contactPersonPhone']);//联系人电话
        $contactPersonExt      =   $_REQUEST['contactPersonExt'];//其他联系人
        $contactPersonPhoneExt =   $_REQUEST['contactPersonPhoneExt'];//其他联系人电话
        $mainProducts          =   $_REQUEST['mainProducts'];//主销产品
        $soldToCountries       =   trim($_REQUEST['soldToCountries']);//卖往国家
        if(strlen($company)<2||empty($company)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"名称");
        	return false;
        }
        if(strlen($companyShortName)<2||empty($companyShortName)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"简称");
            return false;
        }
        if(empty($companyAddressProvince)||empty($companyAddressCity)||empty($companyAddressDistrict)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"地址");
            return false;
        }
        if(strlen($companyAddressExtend)<5||empty($companyAddressExtend)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"详细地址");
            return false;
        }
        if(strlen($contactPerson)<4||empty($contactPerson)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"联系人名字");
            return false;
        }
        if(!preg_match_all('/^[0-9]{6,20}$/i',$contactPersonPhone,$tmp)){
            $this::$errMsg[10112] =   get_promptmsg(10112,"联系人电话不");
            return false;
        }

        foreach($contactPersonExt as $k=>$v){
            if(!empty($v)||!empty($contactPersonPhoneExt[$k])){
                if(strlen($v)<4||empty($v)){
                    $this::$errMsg[10112] =   get_promptmsg(10112,"其他联系人名字");
                    return false;
                }
                if(!preg_match_all('/^[0-9]{6,20}$/i',$contactPersonPhoneExt[$k],$tmp)){
                    $this::$errMsg[10112] =   get_promptmsg(10112,"其他联系人电话");
                    return false;
                }
            }
        }
        if(empty($mainProducts)){
            $this::$errMsg[10115] =   get_promptmsg(10115);
            return false;
        }
        $pcApi     =   M('InterfacePc');
        $category  =   $pcApi->getRootCategoryInfo();
        $category  =   array_flip($category);
        foreach($mainProducts as $v){
        	if(!in_array($v,$category)){
        	    $this::$errMsg[10114] =   get_promptmsg(10114);
        	    return false;
        	}
        }
        if($type=='1'){
            if(strlen($companyLegalPerson)<4||empty($companyLegalPerson)){//公司法人
                $this::$errMsg[10112]   =   get_promptmsg(10112,"公司法人");
                return false;
            }
        }
        if($type!='2'&&$type!='1'){
            $this::$errMsg[10113]   =   get_promptmsg(10113);
            return false;
        }
        return true;
    }
    /**
	 * 验证店铺是否完整
	 */
    protected function act_checkShopInfo($data){
        $arr1    =   array(
                "shop_account",
                "listing_address",
                "b_paypal_account",
                "s_paypal_account",
                "shop_watermark",
                "goods_location",
                "ship_country",
                "no_ship_country",

        );
        //apply_listing_config
        $arr2   =   array(
                "userToken",
                "siteID",
                "devID",
                "appID",
                "certID",
                "serverUrl",
        );
        //var_dump($data);exit;
        foreach($data as $k=>$v){
            if(in_array($k,$arr1)){
                if($v==''||$v=='null'){
                    //$this::$errMsg[10116]   =   get_promptmsg(10116,$k);
                    return false;
                }
            }else if($k=='apply_listing_config'){
                $apply_listing_config   =   json_decode($v,true);
                foreach($apply_listing_config[0] as $kk=>$vv){
                    if(in_array($kk,$arr2)){
                        if($vv==''||$vv=='null'){
                            //$this::$errMsg[10116]   =   get_promptmsg(10116,$kk);
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    /*
     * 验证一下数据是否有特殊字符
     */
    protected function act_filterScript($sring){
    	return preg_replace("/<script[^>]*>.*<\/script>/si", '', $sring);
    }
    /*
     * InterfaceVersion添加修改时数据判断
     */
    protected function act_InterfaceVersionDataCheck($data){
        if(empty($data)){
            return false;
        }
    }
}
?>