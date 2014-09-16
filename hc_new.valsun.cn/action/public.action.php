<?php
/**
 * PublicAct
 * 功能：用于公共的ajax处理动作
 * @author 邹军荣
 * v 1.0
 * 2014/06/26 
 */
class PublicAct extends CheckAct {
	
	public function __construct(){
		parent::__construct();
	}
	
	//验证邮箱的合法性
	public function act_checkEmail () {
// 	    self::$errMsg[200] = "aaa";//邮箱已经被注册10169
// 	    return true;
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
		
		if($email) {
			$developer = M('Developer')->getDeveloper("status","email='".$email."' ");
			
			if($developer[0]['status'] == 4) {
			    
				self::$errMsg[10155] = get_promptmsg(10155);//账号已注销
				return false;
			} elseif($developer[0]['status'] == 5) {
			    
				self::$errMsg[10154] = get_promptmsg(10154);//账号未激活
				return true;
			} elseif(count($developer) > 0) {
			    
				self::$errMsg[10166] = get_promptmsg(10166);//邮箱已经被注册
				return false;
			} else {
			    self::$errMsg[200] = get_promptmsg(10169);//邮箱不存在
				return true;
			}
		}else {
		    
			self::$errMsg[10167] = get_promptmsg(10167);//邮箱没输入
			return false;
		}
		
	}
	
	//验证验证码
	public function act_checkCode () {
		$checkCode = isset($_REQUEST['checkCode']) ? $_REQUEST['checkCode'] : '';
		if($checkCode==$_COOKIE['verifycode']) {
			return true;
		} else {
			self::$errMsg[10168] = get_promptmsg(10168);//验证码错误
			return false;
		}
	}
	
	/*
	 * 发送验证邮箱
	 * zjr
	 */
	public function act_sendEmail($flag=''){
		$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
		$flag  = $flag ? $flag : (isset($_REQUEST['flag']) ? $_REQUEST['flag'] : '');
		$developer = M('Developer')->getDeveloper("*","email='".$email."' ");
		if(count($developer) > 0) {
			$toEmail = array(
					'0'    =>  array('email' => $developer[0]['email'], 'userName' => $developer[0]['userName'] ? $developer[0]['userName'] : '未知'),
			);
		}else{
			self::$errMsg[10157] = get_promptmsg(10157);
			return false;
		}
		if(empty($toEmail)) {
			self::$errMsg[10158] = get_promptmsg(10158);
			return false;
		}
		
		$title		= '华成平台 邮箱验证！ ';
		if($flag == 'checkPassword') {
			$content	= '<a target="_blank" style="color: #006699;word-wrap: break-word;table-layout:fixed;" href="'.WEB_URL.'index.php?mod=login&act=checkEmail&sendTime='.time().'&flag=checkPassword&email='.$email.'&auth='.substr(md5(md5($email)), 0,16).'".>'.WEB_URL.'index.php?mod=login&act=checkEmail&sendTime='.time().'&flag=checkPassword&email='.$email.'&auth='.substr(md5(md5($email)), 0,16).'</a>';
			$content	= '<p>您好，您于 '.date("Y-m-d H:i:s",time()).' 在华成云商操作<font color="red">密码修改验证</font>，系统自动为您发送了这封邮件</p><p>您可以点击以下链接验证，验证之后即可修改密码：</p><p style="word-wrap: break-word;">'.$content.'</p>';
		}elseif($flag == 'checkRegister'){
			$content	= '<a target="_blank" style="color: #006699;word-wrap: break-word;table-layout:fixed;" href="'.WEB_URL.'index.php?mod=login&act=checkEmail&sendTime='.time().'&flag=checkRegister&email='.$email.'&auth='.substr(md5(md5($email)), 0,16).'".>'.WEB_URL.'index.php?mod=login&act=checkEmail&sendTime='.time().'&flag=checkRegister&email='.$email.'&auth='.substr(md5(md5($email)), 0,16).'</a>';
			$content	= '<p>您好，您于 '.date("Y-m-d H:i:s",time()).' 在华成云商操作<font color="red">注册账号</font>，系统自动为您发送了这封激活邮件</p><p>您可以点击以下链接验证，验证之后即可完成激活：</p><p style="word-wrap: break-word;">'.$content.'</p>';
		}else {
			self::$errMsg[10159] = get_promptmsg(10159);
			return false;
		}
		$emailStyle = file_get_contents(WEB_PATH."html/template/v1/emailTemplate.html");
		$emailStyle = preg_replace('/\{content\}/i',$content,$emailStyle);
		$emailStyle = preg_replace('/\{webUrl\}/i',WEB_URL,$emailStyle);
		//实例化邮件对象
		include_once WEB_PATH.'lib/PHPMailer/sendEmail.php';
		$sendmail = sendEmail($toEmail, $title, $emailStyle);
		if(strlen($sendmail) > 1) {		//如果邮件发送失败，则将错误信息返回到$sendmail变量内，
			self::$errMsg[10160] = get_promptmsg(10160,$sendmail);
			return false;
		}
		if($flag == 'checkPassword'){
		    self::$errMsg[200] = get_promptmsg(10165);
		}elseif($flag == 'checkRegister'){
		    self::$errMsg[200] = get_promptmsg(10164);
		}
		return true;
	}
	
	/**
	 * 功能：获取信息的完成度
	 * zjr
	 */
	public function act_getInforProgress(){
		//判断进度条    标志位为1时就去数据库重新拉取判断
		if($this->act_getUserSomeInfor('progressInforFlag') == 1){
			F("dp");
			$totalNums		= 0;
			$comNums   		= 0;
			//**********获取基本信息的完成情况******
			$developerMod	= M('Developer');
			$basInfoSta	  	= $developerMod->getDeveloper("*","id = ".$this->act_getUserInfor('id'));
			if($basInfoSta[0]['status'] > 3){
				$checkArr 		= array("type","company","phone","address","company_short_name","address2","main_products","sold_to_countries","user_name","plat_form_id","shop_account","listing_address","b_paypal_account","s_paypal_account");
				$baseDir      	=   C("DISTRIBUTOR_KEY_PICTURE_DIR").$this->act_getUserInfor('email')."/";
				$idCardName   	=   get_getSuffixByName("idCard");
				$idCardUrl    	=   $baseDir.$idCardName;
				if(is_file($idCardUrl)){
					$comNums += 1;
				}
				if($basInfoSta[0]['type'] == 2){
					$totalNums 	= 13;
					//判断企业法人
					if($basInfoSta[0]['company_legal_person']) $comNums += 1;
					//判断营业执照
					$businessLicenseName  =   get_getSuffixByName("businessLicense");
					$businessLicenseUrl   =   $baseDir.$businessLicenseName;
					if(is_file($businessLicenseUrl)){
						$comNums += 1;
					}
					//判断税务登记
					$taxRegistrationName  =   get_getSuffixByName("taxRegistration");
					$taxRegistrationUrl   =   $baseDir.$taxRegistrationName;
					if(is_file($taxRegistrationUrl)){
						$comNums += 1;
					}
				}else{
					$totalNums 	= 10;
				}
				foreach($basInfoSta[0] as $key=>$val){
					if(in_array($key, $checkArr) && $val != "null" && $val) $comNums += 1;
				}
				$this->act_setUserSomeInfor('basicInforProgress', ceil(($comNums/$totalNums)*100)."%");   //基本信息完成百分比
				//*******************************
				//**********获取店铺信完成情况*********
				$distributorShopMod	=	M('DistributorShop');
				$shopInfo			=	$distributorShopMod->getShopInfo("*","dp_id= ".$this->act_getUserInfor('id'));
				if(count($shopInfo) == 0) {  //判断是否有店铺  没有就默认为其他的【平台
					$totalNums	+=	3;
				}else{
					$nowNums 	= 0;     //主要用来记录店铺中必填项中已填写数
					$bigNums 	= 0;     //用于记录添加的店铺中必填写相中填写最多的那个店铺填写的项
					$platForm 	= 1;	 //记录平台
					foreach ($shopInfo as $value){
						if($value['plat_form_id'] == 1){  //判断平台
							$nowNums = 0;
							foreach($value as $key=>$val) {
								if(in_array($key, $checkArr) && $val){
									$nowNums += 1;
								}
								if($key == 's_paypal_account') break;
							}
							if($nowNums > $bigNums) {
								$bigNums 	= $nowNums;
								$platForm	= $value['plat_form_id'];
							}
						}else{
							$nowNums = 0;
							foreach($value as $key=>$val) {
								if(in_array($key, $checkArr) && $val){
									$nowNums += 1;
								}
								if($key == 'listing_address') break;
							}
							if($nowNums > $bigNums) {
								$bigNums = $nowNums;
								$platForm	= $value['plat_form_id'];
							}
						}
					}
					$comNums += $bigNums;
					if($platForm == 1){
						$totalNums	+=	5;
						$this->act_setUserSomeInfor('shopInforProgress', ceil(($bigNums/5)*100)."%");   //店铺资料完成百分比
					}else{
						$totalNums	+=	3;
						$this->act_setUserSomeInfor('shopInforProgress', ceil(($bigNums/3)*100)."%");   //店铺资料完成百分比
					}
				}
				//*******************************
				//
				$this->act_setUserSomeInfor('progressInfor', ceil(($comNums/$totalNums)*100)."%");
				$this->act_setUserSomeInfor('progressInforFlag', 0);
			}else{
				$this->act_setUserSomeInfor('progressInfor', "100%");
				$this->act_setUserSomeInfor('progressInforFlag', 0);
			}
		}
		
		//标志位为1时，就去判断是否未认证状态
// 		if($this->act_getUserSomeInfor('checkFlag') == 1){
			$developerMod	= M('Developer');
			$basInfoSta	  	= $developerMod->getDeveloper("*","id = ".$this->act_getUserInfor('id'));
			$this->act_setUserSomeInfor('checkInfor', $basInfoSta[0]['status']);
			$this->act_setUserSomeInfor('checkFlag', 0);
// 		}

		//判断各类服务的申请状态
// 		if($this->act_getUserSomeInfor('serviceFlag') == 1){
			$myEmpowerMod	=	M('MyEmpower');
			$myEmpowers		=	$myEmpowerMod->getMyEmpower("*","dp_id=".$this->act_getUserInfor('id'));
			$services		=	array();
			foreach ($myEmpowers as $val){
				$services[]	=	$val['open_service_id'];
			}
			$this->act_setUserSomeInfor('serviceInfor', $services);
			$this->act_setUserSomeInfor('serviceFlag', 0);
// 		}

		return array(
				"progressInfor"			=>	$this->act_getUserSomeInfor('progressInfor'),
				"checkInfor"			=>	$this->act_getUserSomeInfor('checkInfor'),
				"serviceInfor"			=>	$this->act_getUserSomeInfor('serviceInfor'),
				"shopInforProgress"		=>	$this->act_getUserSomeInfor('shopInforProgress'),
				"basicInforProgress"	=>	$this->act_getUserSomeInfor('basicInforProgress'),
			);
	}
	
	/*
	 * 功能：认证分销商
	 * zjr
	 */
	
	public function act_checkDistributor(){
		$this->act_setUserSomeInfor('serviceFlag', 0);
		$this->act_setUserSomeInfor('checkFlag', 0);
		$this->act_setUserSomeInfor('progressInforFlag', 1);
		$checkRes	=	$this->act_getInforProgress();
		$result		=	0;
		if($checkRes["progressInfor"] == "100%"){
			$developerMod	= M('Developer');
			$result = $developerMod->updateDataByColumn("id",$this->act_getUserInfor('id'),array("status"=>0));
		}
		if(!$result){
			self::$errMsg[10161] = get_promptmsg(10161);
			return false;
		}
		return $result;
	}
}
?>