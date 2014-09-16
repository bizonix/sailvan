<?php
/**
 * BackstagesLoginAct
 * 功能：后台登陆
 * @author wcx
 * v 1.0
 * 2014/07/15 
 */
class BackstagesLoginAct extends CheckAct {
	
	public function __construct(){
		parent::__construct();
	}
	
	//验证合法性
	public function act_login () {
	    $userName = trim($_REQUEST['useremail']);
	    $password = trim($_REQUEST['userpassword']);
		$where=   'is_delete=0 AND email="'.$userName.'"';
		$ret  =   M("BacksatagesLogin")->getAdmin("*",$where);
		if(empty($ret))
		{
		    self::$errMsg[10135]  =   get_promptmsg(10135);
			//self::$errMsg=g;
			return false;		
		}
		$loginInfo  =   M("interfacePower")->userLogin($userName, $password);
		if(!$loginInfo) 
		{
		    self::$errMsg[10136]  =   get_promptmsg(10136);
			return false;
		}
		else
		{
			//登录成功
		    $tmp		=	array(
		            "userId"          =>	$loginInfo['userId'],
		            "userToken"       =>	$loginInfo['userToken'],
		            "userName"        =>	$loginInfo['userName'],
		            "userCnName"      =>	$loginInfo['userCnName'],
		            "globalUserId"    =>	$loginInfo['globalUserId'],
		    );
		    setcookie('hcAdmin',_authcode(json_encode($tmp),'ENCODE'),0,"/");
		    $_SESSION['loginStatus'] = "in";
		    self::$errMsg[200]  =   get_promptmsg(200);
			return true;
		}
	}
	public function act_logout(){
	    setcookie('hcAdmin','',0,"/");
	    $_SESSION['loginStatus'] = "out";
	}
}
?>