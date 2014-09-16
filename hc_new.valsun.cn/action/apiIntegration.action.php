<?php
/**
 * ApiIntegtationAct
 * 功能：用于公共的ajax处理动作
 * @author 邹军荣
 * v 1.0
 * 2014/06/26
 */
class ApiIntegrationAct extends CheckAct {

	public function __construct(){
		parent::__construct();
	}
	/*
	 * 图片系统脚本整合
	 * zjr
	 */
	public function act_picIntegtation(){
		$dpId			= $_REQUEST['dpId'];
		$developerMod	= M('Developer');
		if(!$dpId){
			self::$errMsg[10142] = get_promptmsg(10142);
			return false;
		}
		$userInfor	  	= $developerMod->getDeveloper("*","id = ".$dpId);
		$shopId 		= 	$_REQUEST['shopid'];
		$shopInfor		=	M('DistributorShop')->getShopInfo("*",'id = '.$shopId);
		$baseDir     	=   C("DISTRIBUTOR_KEY_PICTURE_DIR").$userInfor[0]['email']."/";
		$shopName	   	=   str_replace("_", "", $shopInfor[0]['shop_account']);
		$waterMarkPath	=	$baseDir.$shopInfor[0]['plat_form_id']."/".$shopName.".png";
		if(!is_file($waterMarkPath)){
			self::$errMsg[10143] = get_promptmsg(10143);
			return false;
		}
// 		$waterMarkPath	=	$_SERVER ['HTTP_HOST']."/images/distributor/".$userInfor[0]['email']."/".$shopInfor[0]['plat_form_id']."/".$shopName.".png";
// 		if(!is_file($waterMarkPath)){
// 			self::$errMsg[20205] = '未获取到店铺远程水印';
// 			return false;
// 		}
// 		$picsItf 		=	M('InterfacePics');
// 		$saveRes		=	$picsItf->saveDistributorWaterMark(json_encode(array("shopName"=>$shopName,"imgUrl"=>$waterMarkPath)));


		$filePath	=	$waterMarkPath;
		$content	= 	file_get_contents($filePath);
		$fileName	=	$shopName.".png";
		$url	 =	C("PICS_SYS_URL_LOCAL")."mod=apiPicture&act=saveDistributorWaterMarkByStream&jsonp=1&shopName=".$shopName;
		$http_entity_type = 'application/x-www-from-urlencoded'; //发送的格式multipart/form-data, application/x-www-from-urlencoded
		$context = array(
				'http'=>array(
						'method'=>'POST',
						// 这里可以增加其他header..
						'header'=>"Content-type: " .$http_entity_type ."\r\n".'Content-length: '.strlen($content),
						'content'=>$content
				)
		);
		$stream_context =	stream_context_create($context);
		$data	=	file_get_contents($url,FALSE,$stream_context);
		$data	=	json_decode($data,true);
		if($data["data"]){
			exec("/usr/local/bin/php ".WEB_PATH."crontab/php-amqplib/workplace/picSystemToDistributor.php ".$shopName." ".$shopName."  &> /dev/null &");
			return true;
		}else{
		    self::$errMsg[10144] = get_promptmsg(10144);
			return false;
		}
	}

	/*
	 * 整合公司账号同步到开放系统
	 * zjr
	 */
	public function act_accountInforIntegation(){
		$dpId			= $_REQUEST['dpId'];
		$developerMod	= M('Developer');
		if(!$dpId){
			self::$errMsg['12000'] = "未获取到该用户的ID，无法同步信息至开放系统！";
			return false;
		}
		$basInfoSta	  	= $developerMod->getDeveloper("*","id = ".$dpId);
		if(!empty($basInfoSta)){
			$sendInfor		= array(
					"username"		=>	$basInfoSta[0]['app_key'],
					"password"		=>	$basInfoSta[0]['login_pwd'],
					"token"			=>	$basInfoSta[0]['token'],
					"groupid"		=>	10,
					"email"			=>	$basInfoSta[0]['email'],
					"mobile"		=>	$basInfoSta[0]['phone'],
					"qq"			=>	'',
					"address"		=>	$basInfoSta[0]['address2']." ".$basInfoSta[0]['address'],
					"company"		=>	$basInfoSta[0]['company'],
					"status"		=>	$basInfoSta[0]['status'],
					"regtime"		=>	$basInfoSta[0]['create_time'],
					"regip"			=>	'',
					"logintime"		=>	'',
					"loginip"		=>	'',
			);
		}else{
			self::$errMsg[10131] = get_promptmsg(10131,'分销商');
			return false;
		}

		$synStatus = array();

		//开始同步到开放系统 外网
		include_once WEB_PATH.'lib/service/http.php';
		$http = new Http('http://idc.open.valsun.cn/admin_open/openInterface.php');
		$http->addPostParam(array('distributionBasicInfor'=>json_encode($sendInfor)));
		$http->addHeader("Author:zoujunrong");
		if(!$http->post()){
			//如果是javascript请求，输出是给javascript的，可能就需要对输出转码
			self::$errMsg[10145] = get_promptmsg(10145, $http->err_str);
			return false;
		}else{
// 			echo $http->getResponse('header')."---header<br/>";
			$synStatus["outOpenSystem"] = $http->getContent();
		}

		//开始同步到开放系统 外网
		$http->setURL('http://open.valsun.cn:88/admin_open/openInterface.php');
		$http->addPostParam(array('distributionBasicInfor'=>json_encode($sendInfor)));
		$http->addHeader("Author:zoujunrong");
		if(!$http->post()){
			//如果是javascript请求，输出是给javascript的，可能就需要对输出转码
			self::$errMsg[10146] = get_promptmsg(10146, $http->err_str);
			return false;
		}else{
// 			echo $http->getResponse('header')."---header<br/>";
			$synStatus["innerOpenSystem"] = $http->getContent();
		}
		return $synStatus;

	}

	/*
	 * 同步分销商店铺信息至pa系统
	 * zjr
	 */
	public function act_synDistributorShopInfoToPaSys(){
		$dpId			= $_REQUEST['dpId'];
		$developerMod	= M('Developer');
		if(!$dpId){
			self::$errMsg[10147] = get_promptmsg(10147);
			return false;
		}
		$sql			= 'select company,shop_account,site_id,ship_country,no_ship_country,b_paypal_account,s_paypal_account,goods_location,apply_listing_config from dp_developer left join dp_distributor_shop on dp_developer.id = dp_id where dp_developer.id = "'.$dpId.'" and dp_distributor_shop.status = 3';
		$dpInfor		= $developerMod->getDeveloperInfoBySql($sql);
		if(empty($dpInfor)){
			self::$errMsg[10131] = get_promptmsg(10131,'分销商店铺');
			return false;
		}
		//将
		foreach ($dpInfor as $key=>$val){
			$dpInfor[$key]['goods_location']   		=   explode("_", $dpInfor[$key]['goods_location']);
			//将多个相同的账号整合在一起
			$siteSimples							=	C("SITESSIMPLE");
			$dpInfor[$key]['site_id']   			=   $siteSimples[$dpInfor[$key]['site_id']];
			$shopConfig 							= 	json_decode($val['apply_listing_config'],true);
			$dpInfor[$key]['apply_listing_config'] 	=   base64_encode(json_encode($shopConfig[0]));
		}
		//获取鉴权公司id
		$companyName   =   $dpInfor[0]['company'];
		$ret           =   $this->act_getPowerCompanyInfo($companyName);
		if(empty($ret)){//鉴权系统不存在该公司
			self::$errMsg[10133] = get_promptmsg(10133);
			return false;
		}else{
			$companyId  =   $ret['companyId'];
		}
		if(!empty($dpInfor)){
			//开始同步
			$synRes = M('interfacePa')->synDistributorShopInfor($companyId,json_encode($dpInfor));
			if(!$synRes){
			    self::$errMsg[10148] = get_promptmsg(10148);
				return false;
			}
		}else{
			self::$errMsg[10131] = get_promptmsg('店铺');
			return false;
		}
		return $synRes;
	}

	//整合公司账号同步到鉴权系统 wcx
	public function act_powerAddDeveloper(){
	    $dpId  =   trim($_REQUEST['dpId']);
	    $type  =   trim($_REQUEST['type']);
	    $info  =   M("Developer")->getDeveloper('*','id="'.$dpId.'"');
	    if(empty($info)){
	    	return false;
	    }else{
	        $info  =   $info[0];
	    }
	    $companyName   =   $info['company'];
	    $principal     =   $info['user_name'];
	    $address       =   $info['address'];
	    $phone         =   $info['phone'];
	    $companyEnName =   $info['company_short_name'];
	    $email         =   $info['email'];
	    $userPsd       =   $info['login_pwd'];
		$ret  =   M("interfacePower")->addDevelopToPower($companyName,$principal,$address,$phone,$companyEnName,$email,$userPsd,$type);
		if(!empty($ret)){//如果首次是添加鉴权则生成新密码，如果不是首次则密码不变
		    $pwd  =   $ret['pwd'];
		    if(!empty($pwd)){
                $info  =   M("Developer")->updateDataByColumn('email',$email,array("login_internal_pwd"=>$pwd));
                return $info;
		    }
		    return true;
		}else{
		    $this::$errMsg[10149] =   get_promptmsg(10149);
			return false;
		}
	}
	//获取鉴权系统公司信息
	private function act_getPowerCompanyInfo($company){
	    $allInfo       =   M("InterfacePower")->getCompanyInfo();
	    foreach($allInfo as $v){
	    	if($v['companyName']==$company){
	    	    return $v;
	    		break;
	    	}
	    }
	    self::$errMsg[10133] =   get_promptmsg(10133);
	    return false;
	}
	//整合ebay刊登数据库
	public function act_insertNewEbayDB(){
        $dpId  =   trim($_REQUEST['dpId']);
        $info  =   M("Developer")->getDeveloper('*','id="'.$dpId.'"');
        if(empty($info)){
            return false;
        }else{
            $info  =   $info[0];
        }
        //获取分类
        $cateIds       =   json_decode($info['intention_products'],true);
        if(empty($cateIds)){
            self::$errMsg[10115] =   get_promptmsg(10115);
            return false;
        }else{
            $cateIds    =   implode(',',$cateIds);
        }
        //获取鉴权公司id
        $companyName   =   $info['company'];
        $ret           =   $this->act_getPowerCompanyInfo($companyName);
        if(empty($ret)){//鉴权系统不存在该公司
        	return false;
        }else{
            $companyId  =   $ret['companyId'];
        }
        return M("interfacePa")->createEbayDB($companyId,$cateIds);

	}

	//获取整合ebay刊登数据库信息
	public function act_getInsertNewEbayDBInfo(){
	    $dpId  =   trim($_REQUEST['dpId']);
	    $info  =   M("Developer")->getDeveloper('*','id="'.$dpId.'"');
	    if(empty($info)){
	        self::$errMsg[10118] =   get_promptmsg("分销商");
	        return false;
	    }else{
	        $info  =   $info[0];
	    }
	    //获取分类
	    $cateIds       =   json_decode($info['intention_products'],true);
	    if(empty($cateIds)){
	        self::$errMsg[10115] =   get_promptmsg(10115);
	        return false;
	    }else{
	        $cateIds    =   implode(',',$cateIds);
	    }
	    //获取鉴权公司id
	    $companyName   =   $info['company'];
	    $ret           =   $this->act_getPowerCompanyInfo($companyName);

	    if(empty($ret)){//鉴权系统不存在该公司
	        return false;
	    }else{
	        $companyId  =   $ret['companyId'];
	    }
	    $ret   =   M("interfacePa")->getCreateEbayDBInfo($companyId);
	    return $ret;

	}

	/*
	 * 拉取不运送国家
	* zjr
	*/

	public function act_getExcludeCountry(){
		$siteId		=	$_REQUEST['siteId'];
		if(empty($siteId)){
			self::$errMsg[10150] =   get_promptmsg(10150);
			return false;
		}
		$paItf 		=	M('InterfacePa');
		$res		=	$paItf->getExcludeShippingCountry($siteId);
		return $res;
	}
	/*
	 * 拉取运送国家
	* zjr
	*/

	public function act_getShipCountry(){
		$siteId		=	$_REQUEST['siteId'];
		if(empty($siteId)){
			self::$errMsg[10150] =   get_promptmsg(10150);
			return false;
		}
		$paItf 		=	M('InterfacePa');
		$res		=	$paItf->getShippingCountry($siteId);
		return $res;
	}
	/*
	 * 用于生成分销商的开放类别信息到pa系统
	* zjr
	*/

	public function act_synDistributorOpenCategoryToPaSys(){
		$dpId			= $_REQUEST['dpId'];
		$developerMod	= M('Developer');
		if(!$dpId){
		    self::$errMsg[10147] =   get_promptmsg(10147);
			return false;
		}
		$dpInfor		= $developerMod->getDeveloper("*","id = $dpId");
		if(empty($dpInfor)){
			self::$errMsg[10131] = get_promptmsg(10131,'分销商店铺');
			return false;
		}
		//获取鉴权公司id
		$companyName   =   $dpInfor[0]['company'];
		$ret           =   $this->act_getPowerCompanyInfo($companyName);
		if(empty($ret)){//鉴权系统不存在该公司
			self::$errMsg[10133] = get_promptmsg(10133);
			return false;
		}else{
			$companyId  =   $ret['companyId'];
		}
		if(!empty($dpInfor)){
			if(!empty($dpInfor[0]['intention_products'])){
				//开始同步
				$synRes = M('interfacePa')->synDistributorOpenCategory($companyId,$dpInfor[0]['intention_products']);
				if(!$synRes){
				    self::$errMsg[10148] = get_promptmsg(10148);
					return false;
				}else{
					self::$errMsg[200] = get_promptmsg(200);
					return true;
				}
			}else{
				self::$errMsg[10115] = get_promptmsg(10115);
				return false;
			}
		}else{
			self::$errMsg[10118] = get_promptmsg(10118,'店铺');
			return false;
		}
	}

	/*
	 * 整合现有的分销商店铺信息，基本信息，进入分销商系统
	 * 仅本次使用（其他人请勿调用）
	 */
	public function _fenxiaoinfo(){
		$disInfo = M('interfacePower')->getAllCompanyInfo();
		$hasInfo = array(
				'chenkaidan@qq.com'				=>	'dresslink',
				'26694696@qq.com'				=>	'soho',
				'9006699@gmail.com'				=>	'育姿百货',
				'zguan@gogomg.com'				=>	'贝速贸易',
				'316472206@qq.com'				=>	'东莞市汇邮电子商务有限公司',
				'yfh9696@163.com'				=>	'【物流系统】中国邮政开放业务',
				'807251443@qq.com'				=>	'仕芃贸易',
				'test100701@sailvan.com'		=>	'何胜文个人分销商',
				'jiangxiaoli@lightinthebox.com'	=>	'兰亭集势贸易',
				'test1004@sailvan.com'			=>	'分销商自动化系统测试04团队',
				'test1008@sailvan.com'			=>	'刊登自动化系统测试08',
				'test1010@sailvan.com'			=>	'刊登自动化系统测试10',
				'swhe1052@163.com'				=>	'刊登自动化系统测试15晚',
				'460986430@qq.com'				=>	'南京尼考克',
				'zkbtj@163.com'					=>	'倍利加',
				'348611868@qq.com'				=>	'寻佑兰个人分销商',
				'158770353@qq.com'				=>	'左测试用',
				'royce@catmatic.com'			=>	'商铭',
				'dengxiuli@office.bfewww.com'	=>	'广州市贝易信息科技有限公司',
				'545886143@qq.com'				=>	'思科特科技',
				'info@toni-tech.com'			=>	'托尼有限公司',
				'joeli@qq.com'					=>	'李爱林(个人)',
				'377739132@qq.com'				=>	'林益池(个人)',
				'101295970@qq.com'				=>	'泉州电子商务局',
				'444808785@qq.com'				=>	'泉港邮政',
				'shawn.chen@allreachtech.com'	=>	'万方网络',
				'yaochunhui@aukeys.com'			=>	'傲基电子',
				'ada@kingflashelec.com'			=>	'凯飞亚电子',
				'392356300@qq.com'				=>	'深圳奥特斯电子',
				'yks-lxj@youkeshu.com'			=>	'有棵树科技',
				'szwyan@tom.com'				=>	'浩然盈科通讯',
				'anyixianshi@163.com'			=>	'润德维科技',
				'janet@aitaocity.com'			=>	'深圳市爱淘城网络科技有限公司',
				'lewan119@sina.com'				=>	'环球金贸',
				'lichaohong@bingdle.com'		=>	'深圳市缤购科技有限公司',
				'chenwenhui@sailvan.com'		=>	'芬哲服饰',
				'chenwenping@sailvan.com'		=>	'赛维网络',
				'list01@tomtop.com'				=>	'通拓科技',
// 				''	=>	'LED',
// 				''	=>	'易联软件',
				'arthur@goldensat.net'			=>	'深圳美华',
				'282937038@qq.com'				=>	'艺凡数码',
				'1471118722@qq.com'				=>	'漳州邮政EMS国际部',
				'zpyz1125@163.com'				=>	'漳浦邮政',
				'627928575@qq.com'				=>	'王佳个人分销商',
				'13959816868@139.com'			=>	'福建省泉邮信息技术公司',
				'valerie0311@qq.com'			=>	'福建省邮政公司厦门分公司',
				'ireal@live.cn'					=>	'艾瑞尔外贸',
				'trade0223@163.com'				=>	'辛小芳个人分销商',
				'acill99@163.com'				=>	'香港睿铭信息科技有限公司',
		);

		$category_limit	=	array(
				//南京尼考克网络科技有限公司 romwe  李鹏
				"13"	=> array(  //备注：之前app_key是 10001
						"name"           => "南京尼考克网络科技有限公司 romwe(更换后)",
						"categorys"      => "[1,2,4]",  //限制推送的类别
				),

				//深圳市通拓科技有限公司 tomtop
				"36"	=> array(
						"name"           => "深圳市通拓科技有限公司 tomtop",
						"categorys"      => '[1,2,3,4,9]',
				),

				//深圳市傲基电子商务有限公司
				"20"	=> array(
						"name"           => "深圳市傲基电子商务有限公司",
						"categorys"      => '[1,2,4,9]',
				),

				//深圳市奥特斯电子科技有限公司
				"12"	=> array(
						"name"           => "深圳市奥特斯电子科技有限公司",
						"categorys"      => '[1,2,4,7,9,10,11,12,13]',
				),
				//深圳市环球金贸电子商务有限公司
				"25"	=> array(
						"name"           => "深圳市环球金贸电子商务有限公司",
						"categorys"      => '[1,2,4,9]',
				),
		);

		foreach ($disInfo as $key=>$value){
			$isExist = false;
			foreach ($hasInfo as $k=>$v){
				if($v == $value['shortName']){
					$disInfo[$key]['email'] = $k;
					$disInfo[$key]['status'] = 0;
					$isExist = true;
					if(strpos($v, "(个人)") > 0){
						$disInfo[$key]['type'] = 1;
					}else{
						$disInfo[$key]['type'] = 2;
					}
					$intentCategory = $category_limit[$disInfo[$key]['companyId']]['categorys'];
					if(empty($intentCategory)){
						$intentCategory = json_encode(array(1,2,3,4,5,6,7,8,9,10,11,12,13));
					}
					$data = array(
								"company"				=>	$disInfo[$key]['companyName'],
								"company_short_name"	=>	$disInfo[$key]['shortName'],
								"address"				=>	$disInfo[$key]['companyAddress'],
								"phone"					=>	$disInfo[$key]['companyPhone'],
								"user_name"				=>	$disInfo[$key]['companyPrincipal'],
								"type"					=>	$disInfo[$key]['type'],
								"intention_products"	=>	$intentCategory,
								"status"				=>	$disInfo[$key]['status'],
							);

					$dpMod  =   M('Developer');
					//更新数据库
					$updateFlag = $dpMod->updateDataByColumn('email',$k,$data);
					//插入店铺信息
					$where    =   "email='".$k."'";
					$dpInfo   =   $dpMod->getDeveloper("*",$where);
					//获取店铺配置信息
					$shopConfig = file_get_contents(WEB_PATH."conf/hasditributor/".$disInfo[$key]['companyId']."/dpShopInfo.conf");
					$shopConfig = json_decode($shopConfig,true);
					if(!empty($shopConfig)&&$dpInfo[0]['id']){
						foreach ($shopConfig as $j=>$jv){
							$shopAccount 	= $jv['shop_account'];
							$goodsLocation 	= implode("_", $jv['goods_location']);
							$bigPaypal 		= $jv['b_paypal_account'];
							$smallPaypal 	= $jv['s_paypal_account'];
							$ListingConfig 	= base64_decode($jv['apply_listing_config']);
							$shipCountry	= json_decode($jv['ship_country'],true);
							$noShipCountry	= json_decode($jv['no_ship_country'],true);
							foreach ($shipCountry as $sk=>$sv){
								$siteSimple = C('SITESSIMPLE');
								$siteId		= 0;
								foreach ($siteSimple as $ssk=>$ssv){
									if($ssv == $sk){
										$siteId = $ssk;
									}
								}
								$shipCountryVal 	= json_encode(explode(",", $sv));
								$noShipCountryVal	= json_encode(explode(",", $noShipCountry[$sk]));
								$shopInfo =	array(
										'dp_id'       			=> $dpInfo[0]['id'],  //开发者ID
										'plat_form_id'  		=> 1, //平台ID
										'site_id'  				=> $siteId, //站点Id
										'shop_account' 			=> $shopAccount, //更新时间
										'listing_address'		=> '', //创建时间
										'b_paypal_account'  	=> $bigPaypal,
										's_paypal_account' 		=> $smallPaypal,
										'shop_watermark' 		=> C("DISTRIBUTOR_KEY_PICTURE_DIR").$k.'/1/'.$shopAccount.'.png',
										'goods_location'		=> $goodsLocation,
										'ship_country'	  		=> $shipCountryVal,
										'no_ship_country'		=> $noShipCountryVal,
										'apply_listing_config'	=> json_encode(array(json_decode($ListingConfig,true))),
										'add_time'	  			=> time()
								);
								$addShopInfo = M('DistributorShop')->saveShopInfo($dpInfo[0]['id'],0, $shopInfo);
								$ret   =   M('MyEmpower')->getMyEmpower('status,id',"open_service_id=3 and dp_id='".$dpInfo[0]['id']."'");
								if(empty($ret)&&$addShopInfo){
									$serviceData3  =   array(

											'dp_id'            =>  $dpInfo[0]['id'],
											'open_service_id'  =>  3,
											'status'           =>  '2',
											'apply_time'       =>  time(),
									);
									$ret   =   M('MyEmpower')->insertEmpowerData($serviceData3);
									$serviceData4  =   array(

											'dp_id'            =>  $dpInfo[0]['id'],
											'open_service_id'  =>  4,
											'status'           =>  '2',
											'apply_time'       =>  time(),
									);
									$ret   =   M('MyEmpower')->insertEmpowerData($serviceData4);
								}
							}
						}

					}
					if(empty($updateFlag)){
						$disInfo[$key]['updateFlag'] = false;
					}else{
						$disInfo[$key]['updateFlag'] = true;
					}
				}
			}
			if(!$isExist) unset($disInfo[$key]);
		}

		print_r($disInfo);
		echo count($disInfo);
	}

	/*
	 * 对外接口
	 * 功能：通过公司ID和水印或店铺名称获取开放的类别
	 * zjr
	 */

	public function act_getOpenCategory(){
		$companyId 			= trim($_REQUEST['companyId']);
		$shopAccount		= trim($_REQUEST['shopAccount']);
		$developerMod		= M('Developer');
		$distributorShopMod	= M('DistributorShop');
		$where		   		= "shop_account = '".$shopAccount."' group by dp_id";
		$shops		   		= $distributorShopMod->getShopInfo("*",$where);
		$openCategorys		= array();
		if(!empty($shops)){
			foreach ($shops as $val){
				$dpInfor	   =	$developerMod->getDeveloper("*","id = {$val['dp_id']}");
				//获取鉴权公司id
				$companyName   =	$dpInfor[0]['company'];
				$ret           =	$this->act_getPowerCompanyInfo($companyName);
				if(empty($ret)){//鉴权系统不存在该公司
					self::$errMsg[11133] = '不存在该公司';
					return false;
				}elseif($ret['companyId'] == $companyId){
					if(!empty($dpInfor[0]['intention_products'])){
						$openCategorys = json_decode($dpInfor[0]['intention_products'],true);
					}else{
						self::$errMsg[11134] = "尚未填写类目";
						return false;
					}
					break;
				}
			}
			return $openCategorys;
		}else{
			self::$errMsg[11131] = "不存在该店铺";
			return false;
		}
	}
}
?>