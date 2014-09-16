<?php
/**
 * 功能：控制登录方面的一系列动作
 * @author 邹军荣
 * v 1.0
 * 时间：2014/06/27
 *
 */
class LoginView extends BaseView {

	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * 登录页面的控制
	 * zjr
	 */
	public function view_login() {
		$loginStatus = A('Login')->act_checkLogin();
		if($loginStatus == "out"){
			$this->smarty->display('login.html');
		}else{
			redirect_to($loginStatus);
		}
	}

	/*
	 * 来自登录页面的请求控制
	 * zjr
	 */
	public function view_loginPost(){
		$act		=	A('Login');
		$checkCode 	= 	A('Public')->act_checkCode();   //验证验证码是否正确
		$login      =   '';
		if($checkCode){
			$login  =   $act->act_login();
		}
		echo $this->ajaxReturn($login);
	}

	/*
	 * 退出登录
	 * zjr
	 */
	public function view_logout(){
		A('login')->act_logout();
		redirect_to("../index.php?mod=login&act=login");
	}
	
	/*
	 * 忘记密码功能的显示
	 * zjr
	 */
	public function view_forget() {
		$this->smarty->assign('flag', "stepOne");
		$this->smarty->display('forgotPassword.html');
	}
	
	/*
	 * 忘记密码页面的请求控制
	 * zjr
	 */
	public function view_forgetPost() {
		$act		=	A('Login');
		$sendEmail 	= 	A('Public')->act_sendEmail("checkPassword");
		if($sendEmail) {
			$email 		= isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
			$mailType	= explode("@", $email);
			$emailAddrs = C('EMAILADDRESS');
			//替换特殊邮箱edu
			$splitArray = explode(".", $mailType[1]);
			if(in_array("edu", $splitArray)){
				$mailType[1]				= str_replace($splitArray[0], "**", $mailType[1]);
				$emailAddrs[$mailType[1]]	= str_replace("**", $splitArray[0], $emailAddrs[$mailType[1]]);
			}
			
			if(!empty($emailAddrs[$mailType[1]])){
				$this->smarty->assign('emailAddress',$emailAddrs[$mailType[1]]);
				$this->smarty->assign('email',$email);
			}else{
				write_log(WEB_PATH."log/noCachedEmail.log", $mailType[1]);
				$this->smarty->assign('emailAddress',"unknown");
				$this->smarty->assign('email',$email);
			}
			$this->smarty->assign('flag',"sendEmailOk");
		}else {
			$this->smarty->assign('flag',"checkEmailNo");
		}
		$this->smarty->display('forgotPassword.html');
	}
	
	/*
	 * 通过邮箱链接返回信息的处理
	* zjr
	*/
	public function view_updatePassword(){
		$act	=	A('Login');
		$jump	=	$act->act_updatePassword();
		if($jump==1){
			redirect_to('index.php?mod=login&act=checkEmail&jump=13');
		}else{
			$this->smarty->assign('flag',"checkEmailNo");
			$this->smarty->display('forgotPassword.html');
		}
	}
	
	/*
	 * 通过邮箱链接返回信息的处理
	 * zjr
	 */
	public function view_checkEmail(){
		$act	=	A('Login');
		$jump 	= 	isset($_REQUEST['jump']) ? $_REQUEST['jump'] : $act->act_checkEmail();
		if($jump==2) {
			$this->smarty->assign('flag', "emailOutTime");
		}elseif($jump==1){
			$this->smarty->assign('flag',"thtep");
		}elseif($jump==11){
			$this->smarty->assign('activeMsg',"恭喜你，成功激活，马上登录吧！");
		}elseif($jump==12){
			$this->smarty->assign('activeMsg',"激活失败，请重新激活！");
		}elseif($jump==13){
			$this->smarty->assign('activeMsg',"修改密码成功！");
		}else{
			$this->smarty->assign('flag',"checkEmailNo");
		}
		//如果错误小于10 跳转到 forgotPassword.html  用于忘记密码验证，否则是注册验证
		if($jump < 10){
			$this->smarty->display('forgotPassword.html');
		}else{
			$this->smarty->display('login.html');
		}
	}
}
?>