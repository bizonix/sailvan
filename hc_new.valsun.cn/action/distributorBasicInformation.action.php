<?php
/**
 * DistributorBasicInformationAct分销商基础信息管理
 * @author wcx
 */
class DistributorBasicInformationAct extends CheckAct{
	public function __construct(){
		parent::__construct();
	}
	public function act_getDistributorBasicInformation(){
		$getData  =   M('Developer');
		$where    =   "email='".$this->act_getDevelopeLoginEmail()."'";
		$data     =   $getData->getDeveloper("*",$where);
		if($data===false){
			return false;
		}
		return $data[0];
	}

	/**
	 * 修改分销商基础信息
	 * @author wcx
	 */
	public function act_modifyDistributorBasicInformation(){
	    //基本信息
	    $data      =   $this->act_packageBaseInfo();
	    
	    $status    =   trim($_REQUEST['status']);//信息是否完备
	    //高级
        $data['advance_data']  =   $this->act_packageSeniorInfo();
// 	    //获取店铺状态
// 	    $id    =   $this->act_getUserInfor('id');
// 	    $shopStatus    =   M('DistributorShop')->getShopStatusByDpId($id);
// 	    var_dump($shopStatus);exit;
// 	    if($status=='true'&&$shopStatus){
// 	        $status    =   "0";
// 	    }else{
// 	        $status    =   "6";
// 	    }
// 	    $data['status'] =   $status;
        $email          =   $this->act_getDevelopeLoginEmail();
        if(empty($email)){
            self::$errMsg[10120] =   get_promptmsg(10120,'登录账号');
            return false;
        }
        //如果存在同样的公司则不给修改  测试时先关闭，正式上线必须开启
        $existEmail =   M('Developer')->getDeveloper("email","company='".mysql_real_escape_string($data['company'])."' and is_delete='0'");
        
        if(!empty($existEmail)&&$existEmail[0]['email']!=$email){
        	self::$errMsg[10119] =   get_promptmsg(10119,'公司名字');
            return false;
        }
        return M('Developer')->updateDataByColumn("email",$email,$data);
        
	}

	/**
	 * 组装数据：高级信息
	 * @author wcx
	 */
	private function act_packageSeniorInfo(){
	    //银行信息
	    $bank                      =   @trim($_REQUEST['bank']);//银行名称
	    $bankName                  =   @trim($_REQUEST['bankName']);//银行详细名称
	    $bankUser                  =   @trim($_REQUEST['bankUser']);//开户人
	    $bankCardNo                =   @trim($_REQUEST['bankCardNo']);//银行卡号
	    //公司信息
	    $compangSumPerson          =   @trim($_REQUEST['compangSumPerson']);//公司规模
	    $companyType               =   @trim($_REQUEST['companyType']);//公司类型
	    $lastYearSales             =   @trim($_REQUEST['lastYearSales']);//去年销售额
	    $predictSalesByYear        =   @trim($_REQUEST['predictSalesByYear']);//预计今年销售额
	    $retail                    =   @trim($_REQUEST['retail']);//零售
	    $wholesale                 =   @trim($_REQUEST['wholesale']);//批发
	    $predictSalesByEveryMonth  =   @trim($_REQUEST['predictSalesByEveryMonth']);//预计每月销售额
	    $startElectricBusinessTime =   @trim($_REQUEST['startElectricBusinessTime']);//开始电商时间
	    $electricBusinessPlatform  =   @trim($_REQUEST['electricBusinessPlatform']);//主营平台
	    $otherContactPersonName    =   @trim($_REQUEST['otherContactPersonName']);//其他联系人
	    $otherContactPhone         =   @trim($_REQUEST['otherContactPhone']);//其他联系方式

	    $advanceData               =   array(
	            "bank"                      =>  $bank,
	            "bank_name"                    =>  $bankName,
	            "bank_user"                    =>  $bankUser,
	            "bank_card_no"                 =>  $bankCardNo,
	            "compang_sum_person"           =>  $compangSumPerson,
	            "company_type"                 =>  $companyType,
	            "last_year_sales"              =>  $lastYearSales,
	            "predict_sales_by_year"        =>  $predictSalesByYear,
	            "retail"                       =>  $retail,
	            "wholesale"                    =>  $wholesale,
	            "predict_sales_by_every_month" =>  $predictSalesByEveryMonth,
	            "start_electric_business_time" =>  $startElectricBusinessTime,
	            "electric_business_platform"   =>  $electricBusinessPlatform,
	            "other_contact_person_name"    =>  $otherContactPersonName,
	            "other_contact_phone"          =>  $otherContactPhone,
	    );
	    return json_encode($advanceData);
	}
	/**
	 * 组装数据：基础信息
	 *
	 * @param int      $type 开发者类型  1:个人 2:公司
	 * @param String   $company 公司名称
	 * @param String   $companyShortName 公司英文简称
	 * @param String   $companyLegalPerson 公司法人
	 * @param String   $companyAddressProvince 地址-省
	 * @param String   $companyAddressCity 地址-市
	 * @param String   $companyAddressDistrict 地址-区
	 * @param String   $companyAddressExtend 地址-详细
	 * @param String   $contactPerson 联系人
	 * @param String   $contactPersonPhone 联系人电话
	 * @param String   $mainProducts 主销产品
	 * @param String   $soldToCountries 卖往国家
	 * @param String   $id_card_url 身份证
	 * @param String   $business_license_url 营业执照
	 * @param String   $tax_registration_url 税务登记
	 * @return String
	 * @author wcx
	 */
	private function act_packageBaseInfo(){
	    $type                  =   @trim($_REQUEST['type']);//开发者类型
	    $company               =   @trim($_REQUEST['company']);//公司名称
	    $companyShortName      =   @trim($_REQUEST['companyShortName']);//公司英文简称
	    $companyLegalPerson    =   @trim($_REQUEST['companyLegalPerson']);//公司法人
	    $companyAddressProvince=   @trim($_REQUEST['companyAddressProvince']);//地址-省
	    $companyAddressCity    =   @trim($_REQUEST['companyAddressCity']);//地址-市
	    $companyAddressDistrict=   @trim($_REQUEST['companyAddressDistrict']);//地址-区
	    $companyAddressExtend  =   @trim($_REQUEST['companyAddressExtend']);//地址-详细
	    $contactPerson         =   @trim($_REQUEST['contactPerson']);//联系人
	    $contactPersonPhone    =   @trim($_REQUEST['contactPersonPhone']);//联系人电话
	    $contactPersonExt      =   @json_encode($_REQUEST['contactPersonExt']);//其他联系人
	    $contactPersonPhoneExt =   @json_encode($_REQUEST['contactPersonPhoneExt']);//其他联系人电话
	    $mainProducts          =   @json_encode($_REQUEST['mainProducts']);//主销产品
	    $soldToCountries       =   @trim($_REQUEST['soldToCountries']);//卖往国家
	    $data  =   array(
	            "type"                     =>  $type,
	            "company"                  =>  $company,
	            "company_short_name"       =>  $companyShortName,
	            "company_legal_person"     =>  $companyLegalPerson,
	            "address2"                 =>  $companyAddressProvince.'-'.$companyAddressCity.'-'.$companyAddressDistrict,
	            "address"                  =>  $companyAddressExtend,
	            "user_name"                =>  $contactPerson,
	            "phone"                    =>  $contactPersonPhone,
	            "contact_person_ext"       =>  $contactPersonExt,
	            "contact_person_phone_ext" =>  $contactPersonPhoneExt,
	            "main_products"            =>  $mainProducts,
	            "sold_to_countries"        =>  $soldToCountries,
	    );
	    return $data;
	}
	/**
	 * 修改基础信息
	 * @author wcx
	 */
	public function act_modifyBackstageBase(){
        $id     =   $_REQUEST['id'];
        $data   =   $this->act_packageBaseInfo();
		return M('Developer')->updateDataByColumn("id",$id,$data);
	}
	/**
	 * 修改高级信息
	 * @author wcx
	 */
	public function act_modifyBackstageSenior(){
	    $id     =   $_REQUEST['id'];
	    $data   =   array();
        $data['advance_data']   =   $this->act_packageSeniorInfo();
	    return M('Developer')->updateDataByColumn("id",$id,$data);
	}
	public function act_uploadPic(){
	}


	/**
	 * 功能：添加店铺的信息
	 * @param tinyint  $shopPlat1 平台的ID号
	 * @param String   $shopAccount1 店铺的账号信息
	 * @param String   $shopLisingAddress1 店铺的一条listing地址
	 * @param String   $bigPaypal1  大的paypal账号
	 * @param String   $smallPaypal1 小的paypal账号
	 * @param String   $watermark 水印图片
	 * @param String   $shippingCountry1   运送国家
	 * @param String   $noShippingCountry1 不运送国家
	 * @param String   $goodsLocationCountry1  商品所在国家
	 * @param String   $goodsLocationCity1 商品所在城市
	 * @param String   $shopToken1 商店的userToken
	 * @param String   $siteID1   店铺的站点号
	 * @param String   $devID1  店铺的devID
	 * @param String   $appID1  店铺的appID
	 * @param String   $certID1  店铺的certID1
	 * @param String   $serverUrl1  店铺的serverUrl1
	 * @author zjr
	 */
	public function act_addShopInfo(){
		$flag 		                =   trim($_REQUEST['flag']);//标志 用于判断保存和验证
		$shopPlat1                  =   trim($_REQUEST['shopPlat1']);//平台ID
		$siteId  	                =   trim($_REQUEST['siteId']);//站点ID
		$shopId               		=   trim($_REQUEST['shopId']);//店铺ID号
		$shopAccount1               =   trim($this->act_filterScript($_REQUEST['shopAccount1']));//店铺账号
		$shopLisingAddress1      	=   trim($this->act_filterScript($_REQUEST['shopLisingAddress1']));//店铺listing的地址
		$bigPaypal1    				=   trim($this->act_filterScript($_REQUEST['bigPaypal1']));//大paypal
		$smallPaypal1				=   trim($this->act_filterScript($_REQUEST['smallPaypal1']));//小paypal
		$watermarkUrl  				=   trim($_REQUEST['watermarkUrl']);//水印
		$shippingCountry1			=   json_encode($this->act_filterScript($_REQUEST['shippingCountry1']));//运输国家
		$noShippingCountry1			=   json_encode($this->act_filterScript($_REQUEST['noShippingCountry1']));//不运送国家
//		$siteSimple					=	C("SITESSIMPLE");
//		$siteSimple					=	$siteSimple[$siteId];
//		$shippingCountry1			=   json_encode(array($siteSimple=>implode(",", $_REQUEST['shippingCountry1'])));//运输国家
//		$noShippingCountry1			=   json_encode(array($siteSimple=>implode(",", $_REQUEST['noShippingCountry1'])));//不运输国家		
		$goodsLocationCountry1      =   trim($_REQUEST['goodsLocationCountry1']);//物品所在国家
		$goodsLocationCity1   		=   trim($this->act_filterScript($_REQUEST['goodsLocationCity1']));//物品所在城市
		$shopToken1      		    =   trim($this->act_filterScript($_REQUEST['shopToken1']));//店铺的userToken
		$siteID1    				=   trim($this->act_filterScript($_REQUEST['siteID1']));//店铺的siteID
		$devID1    					=   trim($this->act_filterScript($_REQUEST['devID1']));//店铺的DevID
		$appID1  					=   trim($this->act_filterScript($_REQUEST['appID1']));//店铺的appID
		$certID1    				=   trim($this->act_filterScript($_REQUEST['certID1']));//店铺的certID
		$serverUrl1   				=   trim($this->act_filterScript($_REQUEST['serverUrl1']));//店铺的serverUrl
		$userInfor     =   json_decode(_authcode($_COOKIE['hcUser']),true);
		$shop		   =   M('DistributorShop');
		
		if($shopPlat1 == 1){
			//存储店铺信息
			$shopInfo = array(
					'dp_id'       			=> $userInfor['id'],  //开发者ID
					'plat_form_id'  		=> $shopPlat1, //平台ID
					'site_id'  				=> $siteId, //站点Id
					'shop_account' 			=> $shopAccount1, //更新时间
					'listing_address'		=> $shopLisingAddress1, //创建时间
					'b_paypal_account'  	=> $bigPaypal1,
					's_paypal_account' 		=> $smallPaypal1,
					'shop_watermark' 		=> $watermarkUrl,
					'goods_location'		=> $goodsLocationCountry1."_".$goodsLocationCity1,
					'ship_country'	  		=> $shippingCountry1,
					'no_ship_country'		=> $noShippingCountry1,
			        'apply_listing_config'	=> json_encode(array(array(
			        	    "userToken" =>  $shopToken1,
			                "siteID" =>  $siteID1,
			                "devID" =>  $devID1,
			                "appID" =>  $appID1,
			                "certID" =>  $certID1,
			                "serverUrl" =>  $serverUrl1,
			        ))),
					'add_time'	  			=> time()
			);
			if(!$shopAccount1){
				self::$errMsg[10121] = get_promptmsg(10121,'账号');
				return false;
			}elseif(mb_strlen($shopLisingAddress1,'UTF8') < 15 && $shopLisingAddress1){
				self::$errMsg[10122] = get_promptmsg(10122);
				return false;
			}elseif(preg_match("/^[\x7f-\xff]+$/", $goodsLocationCity1)){
				self::$errMsg[10123] = get_promptmsg(10123);
				return false;
			}elseif(strlen($shopToken1) != 872 && $shopToken1){
				self::$errMsg[10124] = get_promptmsg(10124,'userToken');
				return false;
			}elseif(strlen($siteID1) > 10){
				self::$errMsg[10125] = get_promptmsg(10125,'siteID','60');
				return false;
			}elseif(strlen($devID1) > 60){
				self::$errMsg[10125] = get_promptmsg(10125,'devID','60');
				return false;
			}elseif(strlen($appID1) > 60){
				self::$errMsg[10125] = get_promptmsg(10125,'appID','60');
				return false;
			}elseif(strlen($serverUrl1) > 60){
				self::$errMsg[10125] = get_promptmsg(10125,'serverUrl','60');
				return false;
			}
			if($flag == "applyListing"){
				$shippingCountry 	= json_decode($shippingCountry1,true);
				$noShippingCountry 	= json_decode($noShippingCountry1,true);
				if(!$shopAccount1){
					self::$errMsg[10121] = get_promptmsg(10121,'账号');
					return false;
				}elseif($siteId == "-"){
					self::$errMsg[10121] = get_promptmsg(10121,'站点');
					return false;
				}elseif(!$shopLisingAddress1){
					self::$errMsg[10122] = get_promptmsg(10122);
					return false;
				}elseif(!$bigPaypal1){
					self::$errMsg[10127] = get_promptmsg(10127,'大paypal');
					return false;
				}elseif(!$smallPaypal1){
					self::$errMsg[10127] = get_promptmsg(10127,'小paypal');
					return false;
				}elseif(!$watermarkUrl || !file_exists(WEB_PATH."html".$watermarkUrl)){
					self::$errMsg[10120] = get_promptmsg(10120,'水印图片');
					return false;
				}elseif(!$goodsLocationCity1){
					self::$errMsg[10128] = get_promptmsg(10128,'物品所在地');
					return false;
				}elseif(empty($shippingCountry)){
					self::$errMsg[10128] = get_promptmsg(10128,'运送国家');
					return false;
				}elseif(empty($noShippingCountry)){
					self::$errMsg[10128] = get_promptmsg(10128,'不运送国家');
					return false;
				}elseif(strlen(trim($shopToken1)) != 872){
					self::$errMsg[10124] = get_promptmsg(10124,'userToken');
					return false;
				}elseif(!trim($siteID1)){
					if(!is_numeric($siteID1)){
						self::$errMsg[10127] = get_promptmsg(10127,'siteID');
						return false;
					}
				}elseif(!trim($devID1)){
					self::$errMsg[10127] = get_promptmsg(10127,'devID');
					return false;
				}elseif(!trim($appID1)){
					self::$errMsg[10127] = get_promptmsg(10127,'appID');
					return false;
				}elseif(!trim($serverUrl1)){
					self::$errMsg[10127] = get_promptmsg(10127,'serverUrl');
					return false;
				}
				$shopInfo['status'] = 2;
			}else{
				$shopInfo['status'] = 1;
			}
			$shopAddFlag = $shop->saveShopInfo($userInfor['id'],$shopId,$shopInfo);
			
			//*************如果是申请刊登授权成功，则将
			if($shopAddFlag && $shopInfo['status'] == 2){
				$ret   =   M('MyEmpower')->getMyEmpower('status,id',"open_service_id=4 and dp_id='".$this->act_getUserInfor('id')."'");
				if(empty($ret)){
					$data  =   array(
				
							'dp_id'            =>  $this->act_getUserInfor('id'),
							'open_service_id'  =>  4,
							'status'           =>  '2',
							'apply_time'       =>  time(),
					);
					$ret   =   M('MyEmpower')->insertEmpowerData($data);
					if($ret===false){
					    $this::$errMsg =   M('MyEmpower')->getErrorMsg();
						return false;
					}
				}else{
					if($ret[0]['status'] != '3'){
						$data  =   array(
								'status'           =>  '2',
								'apply_time'       =>  time(),
						);
						$ret  =   M('MyEmpower')->updateMyEmpower(array("id"=>$ret[0]['id']),$data);
						if($ret===false){
						    $this::$errMsg =   M('MyEmpower')->getErrorMsg();
						    return false;
						}
					}
				}
				
			}
			$shopAddFlag = empty($shopId) ? $shopAddFlag : $shopId;
			return $shopAddFlag;
		}else{
			if(!$shopAccount1){
				self::$errMsg[10121] = get_promptmsg(10121,'账号');
				return false;
			}elseif(mb_strlen($shopLisingAddress1,'UTF8') < 15 && $shopLisingAddress1){
				self::$errMsg[10122] = get_promptmsg(10122);
				return false;
			}
			//存储店铺信息
			$shopInfo = array(
					'dp_id'       			=> $userInfor['id'],  //开发者ID
					'plat_form_id'  		=> $shopPlat1, //登录密码
					'shop_account' 			=> $shopAccount1, //更新时间
					'listing_address'		=> $shopLisingAddress1, //创建时间
					'add_time'	  			=> time()
			);
			if($flag == "saveInfo"){
				$shopInfo['status'] = 1;
			}elseif($flag == "applyListing"){
				$shopInfo['status'] = 2;
			}
			$shopAddFlag = $shop->saveShopInfo($userInfor['id'],$shopId,$shopInfo);
			$shopAddFlag = empty($shopId) ? $shopAddFlag : $shopId;
			return $shopAddFlag;
		}
	}

	/**
	 * 获取店铺信息
	 * zjr
	 */
	public function act_getShopInfo(){
		$userInfor     =   json_decode(_authcode($_COOKIE['hcUser']),true);
		$shop		   =   M('DistributorShop');
		$where		   =   'dp_id = '.$userInfor['id'];
		$shops		   =   $shop->getShopInfo("*",$where,'',$this->page,$this->perpage);
		$perpage   	   =   $this->act_getPerpage();
		$shopCount 	   =   $this->act_getShopListCount($where);
		$page 		   =   new Page($shopCount,$perpage, '', 'CN');
		$pageformat    =   $shopCount>$perpage ? array(4,5,6,7,8,9) : array(4);
		return array("shops"=>$shops,"page"=>$page->fpage($pageformat));
	}

	/**
	 * 验证分销商店铺是否已经存在
	 * zjr
	 */
	public function act_checkShopIsExist(){
		$userInfor     	=   json_decode(_authcode($_COOKIE['hcUser']),true);
		$shopAccount	= 	$_REQUEST['shopAccount'];
		$siteId			= 	$_REQUEST['siteId'];
		$shop		  	=   M('DistributorShop');
		$shops		   	=   $shop->getShopInfo("*","shop_account = '".$shopAccount."'");
		if(count($shops) > 0){
			foreach ($shops as $key=>$val){
				if($val['dp_id'] != $userInfor['id']){
					return 1;
				}else if($val['site_id'] == $siteId){
					return 2;
				}
			}
		}else{
			return 0;
		}
	}

	/**
	 * 根据条件查找店铺信息
	 * @param  char  siteID  店铺站点
	 * @param  tinyint  status  店铺状态
	 * @param  string  shopAccount  店铺账号
	 * zjr
	 */
	public function act_getSearchShops(){
		$userInfor     =   json_decode(_authcode($_COOKIE['hcUser']),true);
		$platFormID 	   =   $_REQUEST['platFormID'];
		$status  	   =   $_REQUEST['status'];
		$shopAccount   =   trim($_REQUEST['shopAccount']);
		$shopAccount   =   mysql_real_escape_string($shopAccount);

		$where		   =   'dp_id = '.$userInfor['id'];
		if($platFormID != "-"){
			$where	  .=   ' and plat_form_id = '.$platFormID;
		}
		if($status != "-"){
			$where	  .=   ' and status = '.$status;
		}
		if($shopAccount){
			$where	  .=   ' and shop_account like "%'.$shopAccount.'%"';
		}
		$shop		   =   M('DistributorShop');
		$shops		   =   $shop->getShopInfo("*",$where,'',$this->page,$this->perpage);
		$perpage   	   =   $this->act_getPerpage();
		$shopCount 	   =   $this->act_getShopListCount($where);
		$page 		   =   new Page($shopCount,$perpage, '', 'CN');
		$pageformat    =   $shopCount>$perpage ? array(4,5,6,7,8,9) : array(4);
		return array("shops"=>$shops,"page"=>$page->fpage($pageformat));
	}

	/**
	 * 获取单个店铺详细信息
	 * zjr
	 */
	public function act_getShopInfoById(){
		$shopId		   =   $_REQUEST['shopId'];
		$shop		   =   M('DistributorShop');
		$shopInfo	   =   $shop->getShopInfo("*",'id = '.$shopId);
		return $shopInfo;
	}
	/**
	 * 删除单个店铺详细信息
	 * zjr
	 */
	public function act_deleteShopById(){
		$shopId		   =   $_REQUEST['shopId'];
		$shop		   =   M('DistributorShop');
		$res		   =   $shop->deleteShopInfo($shopId,$this->act_getUserInfor('id'));
		return $res;
	}

	/**
	 * 获取店铺数量
	 * zjr
	 */
	public function act_getShopListCount($where){
		return M('DistributorShop')->getShopListCountByWhere($where);
	}

	/**
	 * 获取店铺列表
	 * lgy
	 */
	public function act_getShopList(){
		F('page');
		$dpId 	= isset($_REQUEST['dpId']) ? $_REQUEST['dpId'] : 0;
		$page 	= isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

		$shopList	 = M('DistributorShop')->getShopInfo('*'," `dp_id` = {$dpId} "," order by status asc , plat_form_id asc",$page);
		$shopStatus  = C('SHOPSTATUS');
		$perpage   	 = $this->act_getPerpage();
		$shopCount 	 = $this->act_getShopListCount(" `dp_id` = {$dpId} ");
		$page 		 = new Page($shopCount,$perpage, '', 'CN');
		$status1Arr	 = array();//排序
		$countryMap	 = C('COUNTRY_MAP');
 		foreach ($shopList as $k=>$shop){
			$shopList[$k]['apply_listing_config']	= json_decode($shop['apply_listing_config'],true);
			$shopList[$k]['apply_listing_config']	= $shopList[$k]['apply_listing_config'][0];
			$shopList[$k]['ship_country']			= json_decode($shop['ship_country'],true);
			$shopList[$k]['no_ship_country']		= implode(',',json_decode($shop['no_ship_country'],true));
			$shopList[$k]['countrys']  			    = M('InterfacePa')->getShippingCountry($shop['site_id']);
			$shopList[$k]['goods_location']			= explode('_', $shopList[$k]['goods_location']);
			$shopList[$k]['goods_location'][0]		= isset($countryMap[$shopList[$k]['goods_location'][0]]) ? $countryMap[$shopList[$k]['goods_location'][0]] : $shopList[$k]['goods_location'][0];
			$shopList[$k]['statusCode']				= $shopStatus[$shopList[$k]['status']];
			if($shopList[$k]['status'] == 1){
				$status1Arr[]	= $shopList[$k];
				unset($shopList[$k]);
			}
		}
		$shopList 	= array_merge($shopList,$status1Arr);

		$platNums		= M('DistributorShop')->getPlatNum($dpId);
		$platNumTemp	= array();
		$platNum		= array();
		foreach ($platNums as $plat){
			$platNumTemp[$plat['platId']][$plat['status']] 	= $plat['num'];
		}
		$ebayCount			= (int)array_sum($platNumTemp[1]);
		$ebay['已接入刊登']		= (int)$platNumTemp[1][3];
		$ebay['审核中']		= (int)$platNumTemp[1][2];
		$ebay['未通过']		= (int)$platNumTemp[1][4];
		$ebay['未申请']		= (int)$platNumTemp[1][1];
		$platNum['速卖通']	= (int)array_sum($platNumTemp[2]);
		$platNum['亚马逊']	= (int)array_sum($platNumTemp[4]);
		$platNum['其他']		= (int)array_sum($platNumTemp[3]);

		return array('shops' => $shopList,'platNum' => $platNum,'ebayCount' => $ebayCount,'ebay' => $ebay,"page" => $page);
	}

	/**
	 * 改变店铺状态
	 * @author lgy
	 */
	public function act_changeStatus(){
		$shopId		= trim($_POST['shopid']);
		$status		= trim($_POST['status']);
		if($status=='3'){//如果审核通过,必须先ebay店铺检验是否已经刊登授权了
		    $whereArr =   array(
                'dp_id'             =>  trim($_POST['dpId']),
                'open_service_id'   =>  '4',//ebay刊登
		    );
		    $platFormId   =   M('DistributorShop')->getShopInfo("plat_form_id,shop_account","id='".$shopId."'");
		    $shopAccount  =   $platFormId[0]['shop_account'];
		    $platFormId   =   $platFormId[0]['plat_form_id'];
		    if($platFormId=='1'){
		        $ret  =   M("MyEmpower")->getMyEmpower("status","dp_id='".$whereArr['dp_id']."' AND open_service_id='4'");
		        if(empty($ret)||$ret[0]['status']!='3'){
		            $this::$errMsg[10129]   =   get_promptmsg(10129);
		            return false;
		        }
		        unset($_POST['shopid']);
		        unset($_POST['dpId']);
		        return M('DistributorShop')->updateDataWhere($_POST,array("dp_id"=>$whereArr['dp_id'],"plat_form_id"=>'1',"shop_account"=>$shopAccount,"status"=>"2"));
		        
		    }
			
		}
		//修改 如果通过某个账号的一个则全部通过
		
		unset($_POST['shopid']);
		unset($_POST['dpId']);
		return M('DistributorShop')->updateData($shopId,$_POST);
	}

	/**
	 * 授权列表
	 * @author lgy
	 */
	public function act_authList(){
		$dpId 		= isset($_REQUEST['dpId']) ? $_REQUEST['dpId'] : 0;
		$shopStatus = C('SHOPSTATUS');
		$cates		= M('interfacePc')->getRootCategoryInfo();
		$develop	= M('Developer')->getDeveloper('*'," id = {$dpId}");
		$develop	= $develop[0];
		$myEmpower	= M('MyEmpower')->getMyEmpower('status,open_service_id'," dp_id = '{$dpId}'");
		$develop['intention_products']	 	 = json_decode($develop['intention_products'],true);
		$develop['api_open']		 	 = empty($shopStatus[$myEmpower[1]['status']])?"未申请":$shopStatus[$myEmpower[1]['status']];
		$develop['pc_data_open']		 = empty($shopStatus[$myEmpower[2]['status']])?"未申请":$shopStatus[$myEmpower[2]['status']];
		$develop['pic_sys_open']		 = empty($shopStatus[$myEmpower[3]['status']])?"未申请":$shopStatus[$myEmpower[3]['status']];
		$develop['ebay_sys_open']	     = empty($shopStatus[$myEmpower[4]['status']])?"未申请":$shopStatus[$myEmpower[4]['status']];
		$develop['flag']  =   '';
		if(($myEmpower[1]['status']=='3'||$myEmpower[1]['status']=='5')||($myEmpower[2]['status']=='3'||$myEmpower[2]['status']=='5')||($myEmpower[3]['status']=='3'||$myEmpower[3]['status']=='5')||($myEmpower[4]['status']=='3'||$myEmpower[4]['status']=='5')){
		    $develop['flag']  =   'disabled';
		} 
		$develop['manager_message']	 		 = $myEmpower[0]['manager_message'];
		return array('cates'=>$cates , 'develop'=>$develop);
	}
	public function act_getValidShopByDpId(){
	    $userInfor     =   json_decode(_authcode($_COOKIE['hcUser']),true);
	    $shop		   =   M('DistributorShop');
	    $shops		   =   $shop->getShopInfo("*",'dp_id = "'.$this->act_getUserInfor('id').'" and plat_form_id="1" and is_delete="0"' );
	    foreach($shops as $k=>$v){
	    	if(!$this->act_checkShopInfo($v)){
	    		unset($shops[$k]);
	    	}
	    }
	    return $shops;
	}

	/**
	 * 授权列表保存开发者信息
	 * @author lgy
	 */
	public function act_saveDev(){
		$dpId 	= isset($_REQUEST['dpId']) ? $_REQUEST['dpId'] : 0;
		isset($_POST['intention_products']) && $_POST['intention_products']	= json_encode($_POST['intention_products']);
		isset($_POST['token_expire_time']) && $_POST['token_expire_time']	= strtotime($_POST['token_expire_time']);
		unset($_POST['dpId']);
		$data	= $_POST;
        return M('Developer')->updateData($dpId,$data);
	}

	/**
	 * 授权列表审核
	 * @author lgy
	 */
	public function act_authStatus(){
		$dpId	= $_POST['dpId'];
		$openService   =   M('OpenService')->getOpenServiceNyName();
		$data          =   array();
		$whereArr      =   array();
		foreach($_POST as $k=>$v){
			if(isset($openService[$k])){
			    $whereArr['open_service_id'] =   $openService[$k]['id'];
			    $data['status']              =   $v;
			    break;
			}
		}
		if(empty($whereArr['open_service_id'])){
		    $this::$errMsg[10130] =   get_promptmsg(10130,'开发服务id');
			return false;
		}
	    if(isset($_POST['manager_message'])){//
	        $data['manager_message']   =   $_POST['manager_message'];
	    }
	    $whereArr['dp_id'] =   $dpId;
        return M('MyEmpower')->updateMyEmpower($whereArr,$data);
	}
	/**
	 * 分销商列表
	 * @author wcx
	 */
	public function act_getAllDistributorBasicInformation(){
		return M('Developer')->getDeveloper("*",$this->act_DistributorBasicInformationWhere(),'order by id desc',$this->page,$this->perpage);
	}
	/**
	 * 分销商列表数量
	 * @author wcx
	 */
	public function act_getAllDistributorBasicInformationCount(){
	    return M('Developer')->getDeveloperCount($this->act_DistributorBasicInformationWhere());
	}
    /**
	 * 分销商列表条件组装
	 * @author wcx
	 */
	public function act_DistributorBasicInformationWhere(){
	    $where             =   "1 ";
	    $type              =   @trim($_REQUEST['type']);
	    $status            =   @trim($_REQUEST['status']);
	    $companyAndPhone   =   @trim($_REQUEST['companyAndPhone']);
	    $tokenStatus       =   @trim($_REQUEST['tokenStatus']);
	    if(!empty($type)){
	        $where .=  " AND type='$type'";
	    }
	    if($status!=''){
	        $where .=  " AND status='$status'";
	    }
	    if($companyAndPhone!=''){
	        $where .=  " AND (company like '%$companyAndPhone%' OR phone like '%$companyAndPhone%')";
	    }
	    if(!empty($tokenStatus)){
	        if($tokenStatus=='1'){//有效
	            $where .=  " AND token_expire_time >'".time()."'";
	        }else{//过期
	            $where .=  " AND token_expire_time <='".time()."'";
	        }
	    }
	    return $where;
	}
	/**
	 * 改变分销商状态为注销或者认证
	 * @author wcx
	 */
	public function act_changeAccountStatus(){
		$type =   $_REQUEST['type'];
		$id   =   $_REQUEST['id'];
		switch($type){
			case 'cancel':
			    $status  =   "4";
			    break;
			case 'authentication':
			    $status  =   "0";
		}
		return M('Developer')->updateDataByColumn('id',$id,array("status"=>$status));
	}
/**
	 * 获取分销商基本信息
	 * @author wcx
	 */
	public function act_getDistributorBasicInformationById(){
		$id       =   $_REQUEST['dpId'];
		if(empty($id)){
		    $this::$errMsg[10127] =   get_promptmsg(10127,'分销商id');
			return false;
		}
		$getData  =   M('Developer');
		$data     =   $getData->getDeveloper("*","id='$id'");
		return $data[0];
	}
	/**
	 * 判断分销商信息的完整性
	 * @author zjr
	 */
	public function _getBasicInforIsOk($userInfor){
		F("dp");
		$developer	   =   M('Developer');
		$developerInfo = $developer->getDeveloper("*"," id=".$userInfor['id']);
		$flagType	   = 0;
		$dp			   = $developerInfo[0];
		if($dp == 6){
			if(!$dp['user_name']||!$dp['phone']||!$dp['address']||!$dp['address2']||!$dp['company_short_name']||!$dp['company']||!$dp['main_products']||!$dp['sold_to_countries']){
				$flagType = 6;
			}
			$baseDir      =   C("DISTRIBUTOR_KEY_PICTURE_DIR").$userInfor['email']."/";
    	    $idCardName   =   get_getSuffixByName("idCard");
    	    $idCardUrl    =   $baseDir.$idCardName;
    	    if(!is_file($idCardUrl)){
    	    	$flagType = 6;
    	    }
			if($developerInfo[0]['type'] == 2){
				$businessLicenseName  =   get_getSuffixByName("businessLicense");
    	    	$businessLicenseUrl   =   $baseDir.$businessLicenseName;
    	    	if(is_file($businessLicenseUrl)){
    	    		$flagType = 6;
    	    	}
    	    	$taxRegistrationName  =   get_getSuffixByName("taxRegistration");
    	    	$taxRegistrationUrl   =   $baseDir.$taxRegistrationName;
    	    	if(is_file($taxRegistrationUrl)){
    	    		$flagType = 6;
    	    	}
			}
			return $developer->updateDataByColumn("id",$userInfor['id'],array("status"=>$flagType));
		}
	}
	
	/**
	 * 获取申请产品信息
	 * @return array
	 * @author wcx
	 */
	public function act_getIntentionProducts(){
	    $dpId     =   $_REQUEST['dpId'];
	    if(empty($dpId)){
	        $this::$errMsg[10127] =   get_promptmsg(10127,'分销商id');
	    	return false;
	    }
	    $getData  =   M('Developer');
	    $where    =   "id='".$dpId."'";
	    $data     =   $getData->getDeveloper("intention_products",$where);
	    $data     =   $data[0]['intention_products'];
	    if($data===false){
	        $this::$errMsg[10115] =   get_promptmsg(10115);
	        return false;
	    }
	    $data     =   json_decode($data,true);
	    if(empty($data)){
	        return false;
	    }else{
	        return $data;
	    }
	}
	public function act_getRootCategoryInfo(){
	    $pcApi     =   M('InterfacePc');
	    return $pcApi->getRootCategoryInfo();
	}
	public function act_newToken(){
	    $newToken 	  = md5(microtime());
	    $expireTime	  = time()+31536000;
	    $updata		  = array('token' => $newToken,'token_expire_time' => $expireTime);
	    M('Developer')->updateData($_POST['dpId'],$updata);
	    $updata['token_expire_time']	= date('Y-m-d H:i:s',$expireTime);
	    return $updata;
	}
	public function act_getExistShopInfo(){
		$shopAccount  =   trim($_REQUEST['shopAccount']);
		$whereData    =   array(
			
		        "shop_account"    =>  $shopAccount,
		        "dp_id"           =>  $this->act_getUserInfor('id'),
		);
		$ret  =   M("DistributorShop")->getData("*",$whereData);
		if(empty($ret)){
		    return false;
		}
		$newData  =   array();
		foreach($ret as $k=>$v){
		    if($v['status']=='3'){//已通过审核
		        $newData  =   $v;
		        break;
		    }
		    foreach($v as $name=>$value){
		    	if(!isset($newData[$name])){
		    	    $newData[$name]  =   $value;
		    	}
		    }
		}
		$newData['apply_listing_config']    =    json_decode($newData['apply_listing_config'],true);
		$newData['goods_location']          =    explode('_', $newData['goods_location']);
		$newData['no_ship_country']         =    json_decode($newData['no_ship_country'],true);
		$newData['ship_country']            =    json_decode($newData['ship_country'],true);
		return $newData;
	}
	/*
	 * 获取分销商信息（定价系统）
	 */
    public function act_getDeveloperInfo(){
		$dpIdArr  =  $_REQUEST['dpIdArr'];
		$where    =  "";
		if($dpIdArr=="All"){
		    $where    .=  "1";
		}else{
		    $dpIdArr  =   json_decode($dpIdArr,true);
			$where   .=  " id in ('".implode("','", $dpIdArr)."')";
		}

		$data     =   M("Developer")->getDeveloper('*', $where, 'order by id desc',1, 9999999999);
        $apiInfp  =   M("OpenService")->getOpenService();
        foreach($data as $k=>$v){
            $id =   $v['id'];
            $power  =   M("MyEmpower")->getMyEmpower('*', "dp_id='$id'");
            $pass   =   array();
            $noPass =   array();
            if(empty($power)){
                foreach($apiInfp as $index=>$v){
                    $noPass[$index] =   $v['cn_name'];
                }
            }else{
                foreach($power as $kk=>$vv){
                    if($vv['status']=='3'){
                        $pass[$vv['open_service_id']] =   $apiInfp[$vv['open_service_id']]['cn_name'];
                    }
                }
                foreach($apiInfp as $index=>$v){
                    if(!isset($pass[$index])){
                        $noPass[$index] =   $v['cn_name'];
                    }
                }
            }
            $data[$k]['nopass'] =   $noPass;
            $data[$k]['pass']   =   $pass;
        }
		if($data===false){
		    return false;
		}
		return $data;
	}
}
?>