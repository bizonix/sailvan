<?php
/**
 * 类名：LoginAct
 * 功能：登录
 * 版本：v1.0
 * 作者：邹军荣
 * 时间：2014/06/25
 * errCode：
 */
class LoginAct extends CheckAct {
	public function __construct(){
		parent::__construct();
	}

	/*
	 * 获取地址列表信息
	 */
	public function act_login() {
		$useremail		=	isset($_REQUEST['useremail']) ? $_REQUEST['useremail'] : '';
		$userpassword	=	isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : '';
		$checkCode		=	isset($_REQUEST['checkCode']) ? $_REQUEST['checkCode'] : '';

		$dvp		=	M('Developer');
		//获取erp_account的做大值
		$datas		=	$dvp->getDeveloper("*","email = '".$useremail."'"," order by id desc ",1,1);
		if(!empty($datas) && $datas[0]['status'] != 5 && $datas[0]['status'] != 4){
			$userInfo		=	$datas[0];
			$powerInfo		=   M("interfacePower")->getUserInfoByLoginEmail($useremail);
			if(!empty($powerInfo)){
// 				$powerLogin		=   M("interfacePower")->userLogin($useremail, $userpassword); 
				if($powerInfo['loginPsd'] == md5(md5(trim($userpassword)))){
					$dpInfor		=	array(
							"id"	 			=>	$userInfo['id'],
							"email"	 			=>	$userInfo['email'],
							"status"		 	=>	$userInfo['status'],
							"app_key"			=>	$userInfo['app_key'],
							"pw_global_id"		=>	$powerInfo['userId'],
					);
					setcookie('hcUser',_authcode(json_encode($dpInfor),'ENCODE'),0,"/");
					$_SESSION['loginStatus'] = "in";
					$this->act_setUserSomeInfor('progressInforFlag', 1);
					self::$errMsg[200] = get_promptmsg(200,'登录');
					return true;
				}else{
					self::$errMsg[10152] = get_promptmsg(10152);
					return false;
				}
			}else{
				if($datas[0]['login_pwd'] == md5(md5(trim($userpassword)))){
					$dpInfor		=	array(
							"id"	 			=>	$userInfo['id'],
							"email"	 			=>	$userInfo['email'],
							"status"		 	=>	$userInfo['status'],
							"app_key"			=>	$userInfo['app_key'],
					);
					setcookie('hcUser',_authcode(json_encode($dpInfor),'ENCODE'),0,"/");
					$_SESSION['loginStatus'] = "in";
					$this->act_setUserSomeInfor('progressInforFlag', 1);
					self::$errMsg[200] = get_promptmsg(200,'登录');
					return true;
				}else{
					self::$errMsg[10152] = get_promptmsg(10152);
					return false;
				}
			}
		}else if($datas[0]['status'] == 5){
			$mailType	= explode("@", $useremail);
			$emailAddrs = C('EMAILADDRESS');
			//替换特殊邮箱edu
			$splitArray = explode(".", $mailType[1]);
			if(in_array("edu", $splitArray)){
				$mailType[1] 				= str_replace($splitArray[0], "**", $mailType[1]);
				$emailAddrs[$mailType[1]]	= str_replace("**", $splitArray[0], $emailAddrs[$mailType[1]]);
			}
			
			if(!empty($emailAddrs[$mailType[1]])){
				self::$errMsg[10051] = "尚未激活，<a style='font-size:12px;text-decoration:blink' target='view_window' href='".$emailAddrs[$mailType[1]]."'>去邮箱激活</a>";
			}else{
				self::$errMsg[10154] = get_promptmsg(10154);
			}
			return false;
		}else if($datas[0]['status'] == 4){
			self::$errMsg[10155] = get_promptmsg(10155);
			return false;
		}else{
			self::$errMsg[10156] = get_promptmsg(10156);
			return false;
		}
	}

	/*
	 * 发送验证邮箱
	 * zjr
	 */
	public function act_sentCheckEmail() {
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
		$developer = M('Developer')->getDeveloper("*","email='".$email."' ");
		if(count($developer) > 0) {
			$toEmail = array(
				'0'		=> array('email' => $developer[0]['email'], 'userName' => $developer[0]['userName'] ? $developer[0]['userName'] : '未知'),
			);
		}else{
			self::$errMsg[10157] = get_promptmsg(10157);
			return false;
		}
		$content	= '<a target="_blank" style="color: #006699;" href="'.WEB_URL.'index.php?mod=login&act=checkEmail&sendTime='.time().'&email='.$email.'&auth='.substr(md5(md5($email)), 0,16).'".>'.md5(time()).'</a>';
		if(empty($toEmail)) {
			self::$errMsg[10158] = get_promptmsg(10158);
			return false;
		}

		$title		= '华成平台 邮箱验证！ ';
		$content = '<p>您好，您于 '.date("Y-m-d H:i:s",time()).' 在华成云商操作<font color="red">密码修改验证</font>，系统自动为您发送了这封邮件</p><p>您可以点击以下链接验证，验证之后即可修改密码：</p><p>'.$content.'</p>';
    	$emailStyle = file_get_contents(WEB_PATH."html/template/v1/emailTemplate.html");		
		$emailStyle = preg_replace('/\{content\}/i',$content,$emailStyle);
		$emailStyle = preg_replace('/\{webUrl\}/i',WEB_URL,$emailStyle);

		//实例化邮件对象
		include_once WEB_PATH.'lib/PHPMailer/sendEmail.php';
// 		$emial = new SendMail();
// 		var_dump($toEmail);exit;
		$sendmail = sendEmail($toEmail, $title, $emailStyle);
// 		var_dump($sendmail);exit;
		if(strlen($sendmail) > 1) {		//如果邮件发送失败，则将错误信息返回到$sendmail变量内，
			self::$errMsg[10106] = $sendmail;
			return false;
		}
		return true;
    }
    
    /*
     * 验证的邮箱的动作
     * zjr
     */
    public function act_checkEmail(){
    	$email		= isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    	$auth 		= isset($_REQUEST['auth']) ? $_REQUEST['auth'] : '';
    	$sendTime 	= isset($_REQUEST['sendTime']) ? $_REQUEST['sendTime'] : 0;
    	$flag 	 	= isset($_REQUEST['flag']) ? $_REQUEST['flag'] : '';
    	if($flag == 'checkPassword'){
    		if((time()-$sendTime)/(3600*24)>1) return 2;
	    	if($email&&$auth){
	    		if(substr(md5(md5($email)), 0,16)==trim($auth)){
	    			setcookie('email', $email,time()+3600,"/");
	    			setcookie('auth', $auth,time()+3600,"/");
	    			setcookie('sendTime', $sendTime,time()+3600,"/");
	    			return 1;    //邮件验证成功
	    		}
	    	}
    	}elseif($flag == 'checkRegister'){
    		if($email&&$auth){
    			if(substr(md5(md5($email)), 0,16)==trim($auth)){
    				$acticeStatus = M('Developer')->updateDataByColumn("email",$email,array("status"=>6));
    				if($acticeStatus > 0) {
    					return 11;    //邮件激活成功
    				}else {
    					return 12;   //邮件激活失败
    				}
    			}
    		}
    	}else{
    		return 4; 		// "未知邮件验证类型，无法完成操作！";
    	}
    	return 0;			// 操作失败，未知原因！
    }
    
    /*
     * 修改密码的动作
     * zjr
     */
    public function act_updatePassword(){
    	$userpassword		= isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : '';
    	$email				= isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
    	$auth 				= isset($_COOKIE['auth']) ? $_COOKIE['auth'] : '';
    	$sendTime 			= isset($_COOKIE['sendTime']) ? $_COOKIE['sendTime'] : 0;
    	if((time()-$sendTime)/(3600*24)>1) return 2;
    	if($email&&$auth){
    		if(substr(md5(md5($email)), 0,16) == trim($auth)){
    			$userInfor = M('Developer')->getDeveloper("*","email = '".$email."'");
    			M('Developer')->begin();
    			$updatePwd = M('Developer')->updateDataByColumn("email",$email,array("login_pwd"=>md5(md5($userpassword))));
    			if($updatePwd > 0) {
    				$countRows		=   M("interfacePower")->getUserInfoByLoginEmail($email);
    				if(!empty($countRows)){ //以鉴权为准
    					$loginName		= $email;
    					$psw	 		= $userpassword;
    					$updateStatus 	= M('interfacePower')->updateGlobalUserPsw($loginName, $psw);
    					if($updateStatus['errCode'] == "0"){
    						M('Developer')->commit();
    						return 1;
    					}else{
    						M('Developer')->rollback();
    						return 3;
    					}
    				}else{
    					M('Developer')->commit();
    					return 1;
    				}
				}else{
					return 3;
				}
    		}
    	}
    	return 0;
    }
    
    /*
     * 修改密码的动作
     * zjr
     */
    public function act_acitveUser(){
    	$userpassword		= isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : '';
    	$email				= isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
    	$auth 				= isset($_COOKIE['auth']) ? $_COOKIE['auth'] : '';
    	$sendTime 			= isset($_COOKIE['sendTime']) ? $_COOKIE['sendTime'] : 0;
    	if((time()-$sendTime)/(3600*24)>1) return 2;
    	if($email&&$auth){
    		if(substr(md5(md5($email)), 0,16)==trim($auth)){
    			$updatePwd = M('Developer')->updateDataByColumn("email",$email,array("login_pwd"=>md5(md5($userpassword))));
    			if($updatePwd > 0) {
    				return 1;
    			}else{
    				return 3;
    			}
    		}
    	}
    	return 0;
    }
    
    /*
     * 验证是否已经登录
     * zjr
     */
    public function act_checkLogin(){
    	if($_SESSION['loginStatus'] == "out"){
    		return "out";
    	}else{
    		$_SESSION['loginStatus'] = "in";
    		return $_COOKIE['now_url'];
    	}
    }
    
    /*
     * 退出登录操作
     * zjr
     */
    public function act_logout(){
    	setcookie('hcUser','',0,"/");
    	setcookie('hcAdmin','',0,"/");
    	$_SESSION['loginStatus'] = "out";
    }
}