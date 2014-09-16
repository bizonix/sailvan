<?php
/**
 * 功能：控制登录方面的一系列动作
 * @author zjr
 * v 1.0
 * 时间：2014/06/27
 *
 */
class BackstagesLoginView extends AdminBaseView {

	/*
	 * 登录页面
	 * zjr
	 */
	public function view_index() {
        $this->smarty->display('backstagesLogin.html');
	}

	/*
	 * 提交账号密码登录
	 * zjr
	 */
	public function view_login(){
		$act	=	A('BackstagesLogin');
		echo $this->ajaxReturn($act->act_login());
		//echo $this->ajaxReturn($act->act_login(), $act->act_getErrorMsg());
	}

	/*
	 * 退出登录
	 * zjr
	 */
	public function view_logout(){
		A('BackstagesLogin')->act_logout();
		redirect_to("../index.php?mod=backstagesLogin&act=index");
	}
}
?>