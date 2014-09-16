<?php
/**
 * 类名：BasicInforAct
 * 功能：用户的基本信息控制
 * 版本：v1.0
 * 作者：邹军荣
 * 时间：2014/07/21
 */
class BasicInforAct extends CheckAct {
	
	public function __construct(){
		parent::__construct();
	}
	
	//修改密码
	public function act_changePassWord() {
		
		$curPwd = trim($_POST['curPwd']);
		$newPwd = trim($_POST['newPwd']);
		$repPwd = trim($_POST['repPwd']);
		if($newPwd == $repPwd){
				$userInfor = M('Developer')->getDeveloper("*","id = ".$this->act_getUserInfor("id"));
				$pwdIsRight =	false;
				$powerInfo		=   M("interfacePower")->getUserInfoByLoginEmail($this->act_getUserInfor("email"));
				if(!empty($powerInfo)){ //以鉴权为准
					if($powerInfo['loginPsd'] == md5(md5(trim($curPwd)))){
						$pwdIsRight = true;
					}
				}else{ //以本系统为准
					if($userInfor[0]['login_pwd'] == md5(md5(trim($curPwd)))){
						$pwdIsRight = true;
					}
				}
				if($pwdIsRight){
					M('Developer')->begin();
					$updatePwd = M('Developer')->updateDataByColumn("id",$this->act_getUserInfor("id"),array("login_pwd"=>md5(md5($newPwd))));
					if($updatePwd > 0) {
						if(!empty($powerInfo)){ //以鉴权为准
								$loginName		= $this->act_getUserInfor("email");
								$psw	 		= $newPwd;
								$updateStatus 	= M('interfacePower')->updateGlobalUserPsw($loginName, $psw);
								if($updateStatus['errCode'] == "0"){
									M('Developer')->commit();
									self::$errMsg[200] = get_promptmsg(200);
								}else{
									M('Developer')->rollback();
									self::$errMsg[1903] = '密码同步到鉴权系统失败！';
								}
						}else{
							M('Developer')->commit();
							self::$errMsg[200] = get_promptmsg(200);
						}
					}else{
						self::$errMsg[10151] = get_promptmsg(10151);
					}
				}else{
					self::$errMsg[10152] = get_promptmsg(10152);
				}
		}else{
			self::$errMsg[10153] = get_promptmsg(10153);
		}
	}

}