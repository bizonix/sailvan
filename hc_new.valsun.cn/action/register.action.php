<?php
/**
 * 类名：registerAct
 * 功能：登录
 * 版本：v1.0
 * 作者：邹军荣
 * 时间：2014/06/24
 * errCode：1060
 */
class RegisterAct extends CheckAct {
	
	public function __construct(){
		parent::__construct();
	}
	//获取地址列表信息
	public function act_register() {
		
		$email			=	isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
		$password		=	isset($_REQUEST['userpassword']) ? $_REQUEST['userpassword'] : '';
		$dvp			=	M('Developer');
		$deper			=	$dvp->getDeveloper("*","email = '".$email."'");
		if($deper[0]['status'] == 5){
			$addDeveloper = $dvp->updateDataByColumn("email",$email,array("create_time"=>time(),"update_time"=>time()));
			return $addDeveloper;
		}else if(count($deper) == 0){
			//获取erp_account的做大值
			$datas			=	$dvp->getDeveloper("*","1"," order by erp_account desc ",1,1);  
			$accountNums	=	str_replace("AG", '', $datas[0]['erp_account']);
			$erpAccount		=	"AG".($accountNums+1);
			$app_key 		= 	random_app_key(5);  //随机生成随机数
			//在开发者平台增加用户
			$newDeveloper = array(
				'email'       => trim($email),  //邮箱
				'login_pwd'   => md5(md5(trim($password))), //登录密码				
				'update_time' => time(), //更新时间
				'create_time' => time(), //创建时间	
				'app_key'     => $app_key,
				'erp_account' => $erpAccount,
				'status'	  => 5
			);
			$addDeveloper = $dvp->insertData($newDeveloper);
			return $addDeveloper;
		}else{
			self::$errMsg[10162] = get_promptmsg(10162);
			return false;
		}
	}

}